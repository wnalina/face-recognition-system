<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
//        $this = get_instance();
        $this->load->library("Mongo_db");
    }

    public function get_all_camera()
    {
        $data = $this->mongo_db->get("camera");
        return $data;
    }

    public function get_camera($cam_id)
    {
        $email = $this->session->email;
        $data = $this->mongo_db->where(['cam_id' => $cam_id, 'owner' => $email])->get('camera');
        if(isset($data[0]))
            return $data[0];
        else
            return NULL;
    }

    public function get_key_azure($key_sn)
    {
        $data = $this->mongo_db->where('key_sn', $key_sn)->get("key_azure");
        return $data[0];
    }

    public function get_group($group_id)
    {
        $data = $this->mongo_db->where('group_id', $group_id)->get("person_group");
        return $data[0];
    }
    public function insert_camera($data)
    {
        if($this->mongo_db->insert('camera', $data))
            return true;
    }

    public function insert_user($data)
    {
        if($this->mongo_db->insert('user', $data))
            return true;
    }

    public function insert_found_person($data)
    {
//        $l = count($data);
//        for($i = 0 ; $i < $l; $i++)
//        {
//            $val = $data[i];
////                $data = array(
////                    'person_name' => $value['name'],
////                    'confidence' => $value['confidence'],
////                    'timestamp' =>  $value['timestamp']
////                );
//////                print_r($value)
//            $this->mongo_db->insert('found_person', $val);
//            $this->response($data, 200);
//        }
        $person_id = $data['person_id'];
        $group_id = $data['group_id'];
        unset($data['person_id']);
        unset($data['group_id']);
        if($this->mongo_db->push('found_list', $data)->where(['person_id' => $person_id, 'group_id' => $group_id ])->update('found_person'))
            return true;
    }



    public function get_all_person($group_id)
    {
        $data = $this->mongo_db->where('group_id', $group_id)->get('person_group_person');
        return $data[0]['person_list'];
    }

}