<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Camera_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
//        $this = get_instance();
        $this->load->library("Mongo_db");
        $this->load->model('group_model');
    }

    public function get_all_camera()
    {
        $user_id = $this->session->email;
//        $data = $this->mongo_db->get_where("camera", ['owner' => $user_id]);
//        $data2 = $this->mongo_db->get_where("camera", ['owner' => $user_id], ['status' => 'disable']);
//        array_push($data,$data2 );


//        $data = $this->mongo_db->where_in('status', ['enable', 'disable'])->get('camera');
//        $this->mongo_db->or(['owner' => $user_id, 'status' => 'enable', 'status' => $this->mongo_db->gte(18)]);
//        $data = $this->mongo_db->where_in('status', ['enable', 'disable'])->get('camera');
//        $data = $this->mongo_db->where(['owner' => $user_id])->get('camera');
//        $data = $this->mongo_db->where('status', ['http' => $this->mongo_db->in([200, 201, 404, 500, 503])])->get('camera');
//        $data = $this->mongo_db->get('camera');
//        $data = json_decode($data);

        $this->mongo_db->where([
            'status' => $this->mongo_db->in(['enable', 'disable']),
            'owner' => $user_id
        ]);

        $results = $this->mongo_db->get('camera');
        $cameras = [];
        foreach ($results as $result)
        {
            if($result['group_id'] != 'none')
            {
                $group = $this->group_model->get_group($result['group_id']);
                $group_name = $group['group_name'];
                $result['group_name'] = $group_name;
                array_push($cameras, $result);
            }
            else
            {
                $result['group_name'] = 'none';
                array_push($cameras, $result);
            }

        }
        return $cameras;
    }

    public function get_camera($cam_id)
    {
        $user_id = $this->session->email;
//        $data = $this->mongo_db->get_where("camera", ['cam_id' => $cam_id]);
        $data = $this->mongo_db->where('cam_id', $cam_id)->get('camera');
        $data = $data[0];
        if($data['group_id'] != 'none')
        {
            $group = $this->group_model->get_group($data['group_id']);
            $group_name = $group['group_name'];
            $data['group_name'] = $group_name;
//            array_push($cameras, $result);
        }
        else
        {
            $data['group_name'] = 'none';
//            array_push($cameras, $result);
        }
//        $data = $this->mongo_db->get('camera');
//        $data = json_decode($data);
        return $data;
    }

    public function get_camera_name($cam_id)
    {
        $data = $this->mongo_db->select(['cam_name'])->where('cam_id', $cam_id)->get('camera');
        return $data[0];
    }

    public function get_camera_group_id($group_id)
    {
        $data = $this->mongo_db->select(['cam_name', 'location'])->where('group_id', $group_id)->get('camera');
        if($data)
            return $data[0];
        else
            return NULL;
    }

    public function update_enable_stream($cam_id)
    {
        $this->mongo_db->set(['stream'=> 'stream'])->where('cam_id', $cam_id);
        $this->mongo_db->update('camera', [
            'upsert' => TRUE
        ]);
    }

    public function update_disable_stream($cam_id)
    {
        $this->mongo_db->set(['stream'=> 'none'])->where('cam_id', $cam_id);
        $this->mongo_db->update('camera', [
            'upsert' => TRUE
        ]);
    }
    public function update_camera($cam_id, $data){
//        $data = $this->mongo_db->get_where("camera", ['cam_id' => $cam_id]);
//        $this->mongo_db->update('camera', $data, array('cam_id'=>$cam_id));
//        $this->mongo_db->update->updateOne(
//            [ 'restaurant_id' => '40356151' ],
//            [ '$set' => [ 'name' => 'Brunos on Astoria' ]]
//

        $this->mongo_db->set(['cam_name'=> $data['cam_name'],
//            'cam_id' => $data['cam_id'],
            'status' => $data['status'],
            'location' => $data['location'],
            'group_id' => $data['group_id']])->where('cam_id', $cam_id);

// Updates first fruit in list. If there is no fruit create one.
        $this->mongo_db->update('camera', [
            'upsert' => TRUE
        ]);
//        $this->mongo_db->update('camera', $data);
    }

    public function delete_camera($cam_id){
//        $this->mongo_db->delete('camera', array('id'=>$id));
//        return $this->mongo_db->where('cam_id', $cam_is)->delete('camera');
        $camera = $this->mongo_db->where('cam_id', $cam_id)->get('camera');
        $camera = $camera[0];
        $camera['status'] = 'deactivate';
        $this->mongo_db->insert('camera_old',$camera);

        return $this->mongo_db->set(['status'=> 'deactivate'])->where('cam_id', $cam_id)->update('camera');

    }




    //camera admin
    public function reg_camera_admin($cam_id, $owner)
    {
        return $this->mongo_db->set(['owner'=> $owner])->where('cam_id', $cam_id)->update('camera_admin');
    }

    public function deactivate_camera_admin($cam_id)
    {
        return $this->mongo_db->set(['owner'=> 'none'])->where('cam_id', $cam_id)->update('camera_admin');
    }
}