<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
//        $this->load->helper('url');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('group_model');
        $this->load->model('profile_model');
        $this->load->model('person_model');
    }

    public function check_login()
    {
        if(empty($this->session->logged_in))
            redirect('main');
    }
    
    public function show_all_group()
    {
        $this->check_login();
//        $this->load->model('group_model');
        $data['groups'] = $this->group_model->get_all_group();
        $group['groups'] = [];
        foreach ( $data['groups'] as $key => $value)
        {
            $group_id = $value['group_id'];
            $all_person = $this->person_model->get_all_person($group_id);
            $count_person = sizeof($all_person);
//            $value2[] = $value;
            $value['count_person'] = $count_person;
//            echo $count_person;
            array_push($group['groups'],$value);
//            print_r($value);
        }
//        print_r($group)  ;
        $this->load->view('header_profile');
        $this->load->view('show_group', $data);
        $this->load->view('footer');
    }

    public function add_group()
    {
        $this->check_login();

//        $this->load->library('form_validation');
        $this->form_validation->set_rules('group_name', 'GroupName', 'required');
//        $this->form_validation->set_rules('group_id', 'GroupId', 'required');

        $submit_data['group_name'] = $this->input->post('group_name', TRUE);
        // Get the other data
//        $submit_data['group_id'] = $this->input->post('group_id', TRUE);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header_profile');
            $this->load->view('add_group', $submit_data);
            $this->load->view('footer');
        }
        else
        {
            $user = $this->profile_model->get_user();


            $submit_data['group_name'] = $this->input->post('group_name', TRUE);

            $message= $submit_data['group_name'];

            $res = strtolower(str_replace( ' ', '',$message));


            $submit_data['group_id'] = $user['user_id'].'-'.$res;
//            $submit_data['status'] = 'enable';
            $submit_data['owner'] = $user['user_id'];
            $submit_data['person_sn'] = 0;



            if ($this->group_model->insert_group($submit_data)) {
                $this->session->set_flashdata('notify_message', 'Add new post successfully.');
            } else {
                $this->session->set_flashdata('notify_message', 'Oh! There is a problem.');
            }
            // Load view
            redirect('group/show_all_group', 'refresh');




        }
    }

    public function delete_group($group_id)
    {
        $this->check_login();
//        $this->load->model('group_model');

        if($this->group_model->delete_group($group_id))
        {
            $_SESSION['notify_message'] = 'Delete post successfully';
        }
        else
        {
            $_SESSION['notify_message'] = 'oh! There is a problem.';
        }
        $this->session->mark_as_flash('notify_message');

        // Load view
        redirect('group/show_all_group', 'refresh');

    }
}