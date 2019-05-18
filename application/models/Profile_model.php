<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
//        $this = get_instance();
        $this->load->library("Mongo_db");
    }

    public function insert_user($data)
    {
        return $this->mongo_db->insert('user',$data);
    }




    public function get_user()
    {
        $user = $this->session->email;
        $data = $this->mongo_db->where('email', $user)->get('user');
        return $data[0];
    }

    public function get_user_sort()
    {
        $data = $this->mongo_db->sort('user_id', 'desc')->get('user');
        $data = $data[0]['user_id'];
        return $data;
    }




    public function login($email, $password)
    {
        $data = $this->mongo_db->where('email', $email)->get('user');
//        $data = $this->mongo_db->get_where("user", ['email' => $email]);
        $data = $data[0];
//        $this->mongo_db->where('email', $email);
//        $query = $this->mongo_db->get('user');
//        print_r($query) ;
        $hash = $data['password'];
        if($password == $hash){
            $user_id  = $data['user_id'];
            return $user_id;
        }
//        if($query->num_rows() > 0){
//            $row = $query->row();
//            $hash = $row->password;
//
//            if(password_verify($password, $hash)){
//                return TRUE;
//            }
//        }
        return FALSE;
    }



}