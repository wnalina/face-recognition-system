<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library("Mongo_db");
    }

    public function get_all_group()
    {
        $user_id = $this->session->email;
        $data1 = $this->mongo_db->where('email', $user_id)->get('user');
//        $data2 = $this->mongo_db->get_where("person_group", ['group_sn' => $data1[0]['group_sn']]);
        $data = $this->mongo_db->where('owner', $data1[0]['user_id'])->get('person_group');
//        $data = $this->mongo_db->get('person_group')
//        $data = json_decode($data);
        return $data;
    }

    public function get_group_name()
    {
        $email = $this->session->email;
        $user = $this->mongo_db->where('email', $email)->get('user');
        $user_id = $user[0]['user_id'];
        $groups = $this->mongo_db->select(['group_id', 'group_name'])->where('owner', $user_id)->get('person_group');
        return $groups;
    }

    public function get_group($group_id)
    {
        $group = $this->mongo_db->where('group_id', $group_id)->get('person_group');
        return $group[0];
    }

    public function get_group_group_name($group_name)
    {
        $group = $this->mongo_db->where('group_name', $group_name)->get('person_group');
        return $group[0];
    }

    public function insert_group($data)
    {
        require_once 'HTTP/Request2.php';

        $request = new Http_Request2('https://southeastasia.api.cognitive.microsoft.com/face/v1.0/persongroups/'.$data['group_id']);
        $url = $request->getUrl();

        $headers = array(
            // Request headers
            'Content-Type' => 'application/json',
            'Ocp-Apim-Subscription-Key' => 'ce5f9a111c7a4a26b8fd0f88ab2fe47a', //replace it with your key
        );

        $request->setHeader($headers);

        $parameters = array(
//                'faceListId' => 'facelistId'
        );

        $url->setQueryVariables($parameters);

        $request->setMethod(HTTP_Request2::METHOD_PUT);

// Request body
        $body = array(
            'name'=>  $data['group_name'],
//                "userData"=> "user-provided data attached to the person group.",
//                "recognitionModel"=> "recognition_02"
        );
        $request->setBody(json_encode($body));//replace it with your name and userData

        try
        {
            if($request->send())
            {

                if($this->mongo_db->insert('person_group',$data))
                {
                    $person['group_id'] = $data['group_id'];
                    $person['person_list'] = array();
                    if( $this->mongo_db->insert('person_group_person', $person) && $this->mongo_db->insert('person_group_person_old', $person))
                        return TRUE;
                }
            }
//                echo $response->getBody();
        }
        catch (HttpException $ex)
        {
            echo $ex;
        }
    }

    public function delete_group($group_id)
    {
        require_once 'HTTP/Request2.php';

        $request = new Http_Request2('https://southeastasia.api.cognitive.microsoft.com/face/v1.0/persongroups/'.$group_id);
        $url = $request->getUrl();

        $headers = array(
            // Request headers
            'Ocp-Apim-Subscription-Key' => 'ce5f9a111c7a4a26b8fd0f88ab2fe47a',
        );

        $request->setHeader($headers);

        $parameters = array(
            // Request parameters
        );

        $url->setQueryVariables($parameters);

        $request->setMethod(HTTP_Request2::METHOD_DELETE);

        // Request body
        $request->setBody("{body}");

        try
        {
            if($request->send())
            {
                $group = $this->mongo_db->where('group_id', $group_id)->get('person_group');
                $this->mongo_db->insert('person_group_old',$group[0]);
                $this->mongo_db->set(['status'=> 'deactivate'])->where('group_id', $group_id);

                $this->mongo_db->update('person_group_old', [
                    'upsert' => TRUE
                ]);

                return $this->mongo_db->where('group_id', $group_id)->delete('person_group');
            }
//            echo $response->getBody();
        }
        catch (HttpException $ex)
        {
            echo $ex;
        }



    }
}