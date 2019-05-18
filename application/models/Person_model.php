<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Person_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
//        $this = get_instance();
        $this->load->library("Mongo_db");
        $this->load->helper('url');
        $this->load->model('camera_model');
    }

    public function get_all_person($group_id)
    {
//        $user_id = $this->session->email;
//        $data1 = $this->mongo_db->get_where("user", ['email' => $user_id]);
//        $data2 = $this->mongo_db->get_where("person_group_person", ['group_sn' => $group_sn]);
        $data = $this->mongo_db->where('group_id', $group_id)->get('person_group_person');
//        $data = $this->mongo_db->get('person_group')
//        $data = json_decode($data);
//        print_r($data[0]['person_list']) ;
        return $data[0]['person_list'];
    }

    public function get_all_found()
    {
        $email = $this->session->email;
        $user = $this->mongo_db->where('email', $email)->get('user');
        $user_id = $user[0]['user_id'];
        $groups = $this->mongo_db->select(['group_id'])->where('owner', $user_id)->get('person_group');
//        $group_id = array(0=>'tt');
        $found_person = [];
        $found_person['group_name'] = [];
        $data['group_id'] = [];
        $data['found_list'] = [];
        foreach ($groups as $group){
            $found = $this->mongo_db->where('group_id', $group['group_id'])->get('found_person');
//            foreach ($found as $value)
//            {
//                $lenght = count($value['found_list']);
//                $value['found_list']
//            }
//            $camera = $this->camera_model->get_camera_group_id($group['group_id']);
            array_push($found_person, $found);

        }
//        $found_person['group_name'] = $groups['group_name'];
        return $found_person;
    }

    public function get_found_person($group_id, $person_id)
    {
        $data = $this->mongo_db->where(['group_id' => $group_id, 'person_id' => $person_id])->get('found_person');
        if (isset($data[0]))
            return $data[0]['found_list'];
        else
            return 'none';
    }

    public function get_person($group_id, $person_id)
    {
        $data = $this->mongo_db->where('group_id', $group_id)->get('person_group_person');
        $person_lists = $data[0]['person_list'];
        foreach ($person_lists as $person)
        {
            if($person['person_id'] == $person_id)
            {
                return $person;
            }
        }
    }



    public function insert_person($data, $group_id)
    {
        // This sample uses the Apache HTTP client from HTTP Components (http://hc.apache.org/httpcomponents-client-ga/)
        require_once 'HTTP/Request2.php';

        $request = new Http_Request2('https://southeastasia.api.cognitive.microsoft.com/face/v1.0/persongroups/'.$group_id.'/persons');
        $url = $request->getUrl();

        $headers = array(
            // Request headers
            'Content-Type' => 'application/json',
            'Ocp-Apim-Subscription-Key' => 'ce5f9a111c7a4a26b8fd0f88ab2fe47a',
        );

        $request->setHeader($headers);

        $parameters = array(
            // Request parameters
        );

        $url->setQueryVariables($parameters);

        $request->setMethod(HTTP_Request2::METHOD_POST);

        $body = array(
            'name'=>  $data['person_name'],
//                "userData"=> "user-provided data attached to the person group.",
//                "recognitionModel"=> "recognition_02"
        );
        $request->setBody(json_encode($body));//replace it with your name and userData

        try
        {
            if($response = $request->send())
            {
                $res = $response->getBody();
                $res =  explode(':', $res);
                $res = str_replace( '}', '',$res[1]);
                $res = str_replace( '"', '',$res);
                $data['person_id'] = $res;

                if($this->mongo_db->push('person_list', $data)->where('group_id', $group_id)->update('person_group_person'))
                {
                    $group = $this->mongo_db->where('group_id', $group_id)->get('person_group');
                    $person_sn = $group[0]['person_sn'];
                    $person_sn = $person_sn + 1;
                    $this->mongo_db->set(['person_sn'=> $person_sn])->where('group_id', $group_id);

                    $this->mongo_db->update('person_group', [
                        'upsert' => TRUE
                    ]);

                    $person['person_id'] = $res;
                    $person['group_id'] = $group_id;
                    $person['found_list'] = array();
                    if( $this->mongo_db->insert('found_person', $person))
                        return $res;
                }

            }
//            return $this->mongo_db->insert('person_group_person',$data);
//            echo $response->getBody();
        }
        catch (HttpException $ex)
        {
            echo $ex;
        }

    }

    public function add_face($person_id, $group_id, $add_img)
    {
        // This sample uses the Apache HTTP client from HTTP Components (http://hc.apache.org/httpcomponents-client-ga/)
        require_once 'HTTP/Request2.php';

        $request = new Http_Request2('https://southeastasia.api.cognitive.microsoft.com/face/v1.0/persongroups/'.$group_id.'/persons/'.$person_id.'/persistedFaces');
        $url = $request->getUrl();

        $headers = array(
            // Request headers
            'Content-Type' => 'application/octet-stream',
            'Ocp-Apim-Subscription-Key' => 'ce5f9a111c7a4a26b8fd0f88ab2fe47a',
        );

        $request->setHeader($headers);

        $parameters = array(
            // Request parameters
//            'userData' => '{string}',
//            'targetFace' => '{string}',
        );

        $url->setQueryVariables($parameters);

        $request->setMethod(HTTP_Request2::METHOD_POST);

//        $url = "./public/upload/1.jpg";
//        print $url;
//        $image = 'D:/image/4.jpg';
        $image = 'C:/xampp/htdocs/code2/public/upload/'.$add_img;
        $fp = fopen($image, 'rb');

        $request->setBody($fp);
//        $body = array(
//            'url' => $fp,
////                "userData"=> "user-provided data attached to the person group.",
////                "recognitionModel"=> "recognition_02"
//        );
//
//        $request->setBody($image);
//        $request->setBody(json_encode($body));//replace it with your name and userData

        try
        {
            $response = $request->send();
            $response = $response->getBody();
            $res_add = json_decode($response, true);
            if(isset($res_add['error'])){
                $error['result'] = 'error';
                $error['msg'] = $res_add['error']['message'];
                return $error;
            }
            else
            {
                $persons = $this->mongo_db->getOneWhere('person_group_person', ['group_id' => $group_id]);
                $persons = $persons[0]['person_list'];
                foreach ($persons as $person)
                {
                    if($person['person_id'] == $person_id)
                    {
                        $this->mongo_db->pull('person_list', $person)->where('group_id', $group_id)->update('person_group_person');

                        $count = $person['count_img'];
                        $count = $count + 1;
                        $person['count_img'] = $count;

                        $this->mongo_db->push('person_list', $person)->where('group_id', $group_id)->update('person_group_person');

                        $error['result'] = 'success';
                        $error['msg'] = $res_add['persistedFaceId'];
                        return $error;

//                        $this->mongo_db->insert('person_group_person_old',$person);
                    }
//                        print_r($person);
                }
//

//                $person = $this->mongo_db->where('person_id', $person_id)->get('person_group_person');
//                $count = $person[0]['count_img'];
////                echo $count;
//                $count = $count + 1;
////                echo $count;
//                $this->mongo_db->set(['count_img'=> $count])->where('person_id', $person_id);
//
//                $this->mongo_db->update('person_group_person', [
//                    'upsert' => TRUE
//                ]);
            }
//            echo $response->getBody();
        }
        catch (HttpException $ex)
        {
            return $ex;
        }

    }

    public function train($group_id)
    {
        // This sample uses the Apache HTTP client from HTTP Components (http://hc.apache.org/httpcomponents-client-ga/)
        require_once 'HTTP/Request2.php';

        $request = new Http_Request2('https://southeastasia.api.cognitive.microsoft.com/face/v1.0/persongroups/'.$group_id.'/train');
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

        $request->setMethod(HTTP_Request2::METHOD_POST);

// Request body
        $request->setBody("{body}");

        try
        {
            return $request->send();
//            echo $response->getBody();
        }
        catch (HttpException $ex)
        {
            echo $ex;
        }

    }

    public function update_count_img($person_id)
    {

//        $this->mongo_db->set(['count_img'=> $data['cam_name']])->where('cam_id', $cam_id);
//
//        $this->mongo_db->update('camera', [
//            'upsert' => TRUE
//        ]);
    }

    public function delete_person($person_id, $group_id)
    {
        // This sample uses the Apache HTTP client from HTTP Components (http://hc.apache.org/httpcomponents-client-ga/)
        require_once 'HTTP/Request2.php';

        $request = new Http_Request2('https://southeastasia.api.cognitive.microsoft.com/face/v1.0/persongroups/'.$group_id.'/persons/'.$person_id);
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
//                $person = $this->mongo_db->where('group_id', $group_id)->get('person_group_person');
                $persons = $this->mongo_db->getOneWhere('person_group_person', ['group_id' => $group_id]);
                $persons = $persons[0]['person_list'];
                foreach ($persons as $person)
                {
                    if($person['person_id'] == $person_id)
                    {
                        if($this->mongo_db->push('person_list', $person)->where('group_id', $group_id)->update('person_group_person_old'))
                        {
                            $group = $this->mongo_db->where('group_id', $group_id)->get('person_group');
                            $person_sn = $group[0]['person_sn'];
                            $person_sn = $person_sn - 1;
                            $this->mongo_db->set(['person_sn'=> $person_sn])->where('group_id', $group_id);

                            $this->mongo_db->update('person_group', [
                                'upsert' => TRUE
                            ]);
                            return  $this->mongo_db
                                ->pull('person_list', $person)
                                ->where('group_id', $group_id)
                                ->update('person_group_person');
                            break;
                        }

//                        $this->mongo_db->insert('person_group_person_old',$person);
                    }
//                        print_r($person);
                }
//                $this->mongo_db->insert('person_group_person_old',$person[0]);
//        $this->mongo_db->set(['status'=> 'deactivate'])->where('person_id', $person_id);

//        $this->mongo_db->update('person_group_old', [
//            'upsert' => TRUE
//        ]);

//                return $this->mongo_db->where('person_id', $person_id)->delete('person_group_person');
            }
//            echo $response->getBody();
        }
        catch (HttpException $ex)
        {
            echo $ex;
        }



    }
}