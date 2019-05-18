<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
//        $this->load->helper('url');
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');
        $this->load->model('profile_model');
    }


    public function check_login()
    {
        if(empty($this->session->logged_in))
            redirect('main');
    }



    public function email(){
        $to      = 'w_nalina@hotmail.com'; // Send email to our user
        $subject = 'Signup | Verification'; // Give the email a subject
        $message = '
 
        Thanks for signing up!
        Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
         
        ------------------------
        Username: tt
        Password: tt
        ------------------------
        
        Please click this link to activate your account:
        http://www.yourwebsite.com/verify.php?email='.$to.'&hash=tt
 
        '; // Our message above including the link

        $headers = 'From:noreply@yourwebsite.com' . "\r\n"; // Set from headers
        mail($to, $subject, $message, $headers);
    }


    public function sign_up()
    {

        $this->form_validation->set_rules('firstname', 'FirstName', 'required');
        $this->form_validation->set_rules('lastname', 'LastName', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'ConfirmPassword', 'required');

        $submit_data['firstname'] = $this->input->post('firstname', TRUE);
        $submit_data['lastname'] = $this->input->post('lastname', TRUE);
        $submit_data['email'] = $this->input->post('email', TRUE);
//        $hashed_password = password_hash($_POST["password"],PASSWORD_DEFAULT);
        $submit_data['password'] = password_hash($this->input->post('password', TRUE), PASSWORD_DEFAULT);
//        $submit_data['confirm_password'] = $this->input->post('confirm_password', TRUE);


        if ($this->form_validation->run() == FALSE) {

            $this->load->view('header');
            $this->load->view('home', $submit_data);
            $this->load->view('footer');
        }
        else
        {
            $user_id = $this->profile_model->get_user_sort();
            $user_id = $user_id + 1;
            $submit_data['user_id'] = (string)$user_id;
            if ($this->profile_model->insert_user($submit_data)) {
                $this->session->set_flashdata('notify_message', 'Add new post successfully.');
            } else {
                $this->session->set_flashdata('notify_message', 'Oh! There is a problem.');
            }
            // Load view
            redirect("camera/show_camera", 'refresh');



        }
    }


    public function login()
    {

        // Load form validation
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header');
            $this->load->view('home');
            $this->load->view('footer');
        } else {
            redirect('camera/show_camera', 'refresh');
        }
    }

    public function check_database($password)
    {
        if (empty($password)) {
            $this->form_validation->set_message('check_database', 'The Password field is required.');
            return FALSE;
        }

        // Load post_model.php
        $this->load->model('profile_model');

        $email = $this->input->post('email');
//        echo $email;


        if ($this->profile_model->login($email, $password)) {
            $this->session->set_userdata('email', $email);
            $this->session->set_userdata('logged_in', '1');
            return TRUE;
        }
        $this->form_validation->set_message('check_database', 'Invalid username or password.');
        return FALSE;
    }

    public function logout()
    {
        $this->load->helper('url');

        $this->session->sess_destroy();
        redirect('/');
    }

}