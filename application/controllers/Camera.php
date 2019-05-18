<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Camera extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
//        $this->load->helper('url');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('camera_model');
        $this->load->model('group_model');
    }

    public function check_login()
    {
        if(empty($this->session->logged_in))
            redirect('main');
    }

    public function show_camera()
    {
        $this->check_login();
//        $this->load->model('camera_model');
        $data['cameras'] = $this->camera_model->get_all_camera();
//        $data['group_name'] = $this->group_model->get_group();
        $this->load->view('header_profile');
        $this->load->view('camera', $data);
        $this->load->view('footer');
//        print_r($data);
    }

    public function update_camera($cam_id)
    {
        $this->check_login();
        // Load post_model.php
//        $this->load->model('camera_model');

        // Load form validation library and set rules
//        $this->load->library('form_validation');

        $this->form_validation->set_rules('cam_name', 'CamName', 'required');
//        $this->form_validation->set_rules('cam_id', 'CamId', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('location', 'Location', 'required');
        $this->form_validation->set_rules('group_id', 'GroupId', 'required');
//        $this->form_validation->set_rules('group_id', 'GroupId', 'required');
//        $this->form_validation->set_rules('latitude', 'Latitude', 'required');
//        $this->form_validation->set_rules('longitude', 'Longitude', 'required|regex_match[/^([\d\.])+$/]');

        if ($this->form_validation->run() == FALSE) {

            $data['groups'] = $this->group_model->get_all_group();
            $data['camera'] = $this->camera_model->get_camera($cam_id);
//            print_r($data) ;

            $this->load->view('header_profile');
            $this->load->view('update_camera', $data);
            $this->load->view('footer');
        }
        else
        {
            $submit_data['cam_name'] = $this->input->post('cam_name', TRUE);
//            $submit_data['cam_id'] = $this->input->post('cam_id', TRUE);
            $submit_data['status'] = $this->input->post('status', TRUE);
            $submit_data['location'] = $this->input->post('location', TRUE);
            $submit_data['group_id'] = $this->input->post('group_id', TRUE);

//            $group = $this->group_model->get_group_group_name($submit_data['group_id']);
//            $submit_data['group_id'] = $group['group_id'];
//            $submit_data['latitude'] = $this->input->post('latitude', TRUE);
//            $submit_data['longitude'] = $this->input->post('longitude', TRUE);

            $tt = array( 'cam_name' => 'cam1');
            if ($this->camera_model->update_camera($cam_id, $submit_data))
            {
                $_SESSION['notify_message'] = 'Update post successfully.';
                $this->session->mark_as_flash('notify_message');
            }
            else
            {
                $_SESSION['notify_message'] = 'oh! There is a problem.';
                $this->session->mark_as_flash('notify_message');
            }

            // Load view
            redirect('camera/show_camera', 'refresh');
        }
    }

    public function delete_camera($cam_id)
    {
        $this->check_login();

//        $this->load->model('camera_model');

        if($this->camera_model->delete_camera($cam_id))
        {
            $this->camera_model->deactivate_camera_admin($cam_id);
            $_SESSION['notify_message'] = 'Delete post successfully';
        }
        else
        {
            $_SESSION['notify_message'] = 'oh! There is a problem.';
        }
        $this->session->mark_as_flash('notify_message');

        // Load view
        redirect('camera/show_camera', 'refresh');
    }


}