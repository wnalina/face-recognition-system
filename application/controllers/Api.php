    <?php

    require APPPATH . 'libraries/REST_Controller.php';

    class Api extends REST_Controller {

        /**
         * Get All Data from this method.
         *
         * @return Response
         */
        public function __construct() {
            parent::__construct();
            $this->load->model('api_model');
            $this->load->model('camera_model');
    //        $this->load->database();
        }

        /**
         * Get All Data from this method.
         *
         * @return Response
         */

        public function stream_post()
        {
            $uploaddir = "public/stream/";
            $file_name = underscore($_FILES['file']['name']);
            $uploadfile = $uploaddir . $file_name;


            move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);
            $data = array(
                array(
                    "uploaddir" => $uploaddir,
                    "error" => $_FILES['file']['error'],
                    "size" => $_FILES['file']['size'],
                )
            );
            $this->response($data, 200);
        }


        public function status_get()
        {

            $camera_data =$this->api_model->get_all_camera();




//            $cam_id = $this->get('cam_id');
            $cam_id = $this->get('cam_id');
            $key_sn = $this->get('key_sn');
            $group_id = $this->get('group_id');
            $person_sn = $this->get('person_sn');
//            $stream = $this->get('stream');
            $location = $this->get('location');

//            $azure = NULL;
            if ($cam_id === NULL || $key_sn === NULL || $group_id === NULL || $person_sn === NULL || $location == NULL)
            {
                $this->response('Not complete', REST_Controller::HTTP_OK);
            }

            else if ($key_sn == 'none')
            {
                $camera_data = $this->api_model->get_camera($cam_id);
                if($camera_data != NULL)
                {
                    $status['status'] = $camera_data['status'];
                    $status['stream'] = $camera_data['stream'];
//                        $status['key_sn'] = $value['key_sn'];
                    $key_azure_data = $this->api_model->get_key_azure($camera_data['key_sn']);

                    $status['key_sn'] = $key_azure_data['key_sn'];
                    $status['key'] = $key_azure_data['key'];
//
                    if ($camera_data['group_id'] != 'none')
                    {
                        $status['group_id'] = $camera_data['group_id'];
                        $group_data = $this->api_model->get_group($camera_data['group_id']);
                        $status['person_sn'] = $group_data['person_sn'];
                        if ($group_data['person_sn'] != 0)
                        {
                            $person_data = $this->api_model->get_all_person($camera_data['group_id']);
                            $status['person_list'] = $person_data;
                        }

                    }

                    if($camera_data['location'] != 'none')
                    {
                        $status['location'] = $camera_data['location'];
                    }

                    $status = json_encode($status, JSON_PRETTY_PRINT);

                    $this->response($status, REST_Controller::HTTP_OK);

                }
                else
                {
                    $status['status'] = 'deactivate';
                    $status = json_encode($status, JSON_PRETTY_PRINT);
                    $this->response($status, REST_Controller::HTTP_OK);
                }

            }

            else
            {
                $camera_data = $this->api_model->get_camera($cam_id);
                if($camera_data != NULL)
                {
                    $status['status'] = $camera_data['status'];
                    $status['stream'] = $camera_data['stream'];

                    if ($camera_data['group_id'] != 'none')
                    {
                        $group_data = $this->api_model->get_group($camera_data['group_id']);

                        if($group_id != $camera_data['group_id'])
                        {
                            $status['group_id'] = $camera_data['group_id'];
//                            $group_data = $this->api_model->get_group($value['group_id']);
                            $status['person_sn'] = $group_data['person_sn'];
                            if ($group_data['person_sn'] != 0)
                            {
                                $person_data = $this->api_model->get_all_person($camera_data['group_id']);
                                $status['person_list'] = $person_data;
                            }

                        }

                        if($person_sn != $group_data['person_sn'])
                        {
                            $status['person_sn'] = $group_data['person_sn'];
                            $person_data = $this->api_model->get_all_person($camera_data['group_id']);
                            $status['person_list'] = $person_data;
                        }

                    }

                    if($key_sn != $camera_data['key_sn'])
                    {
                        $status['key_sn'] = $camera_data['key_sn'];

                        $key_azure_data = $this->api_model->get_key_azure($camera_data['key_sn']);

                        $status['key_sn'] = $key_azure_data['key_sn'];
                        $status['key'] = $key_azure_data['key'];
                    }


                    if($camera_data['location'] != 'none')
                    {
                        if($location != $camera_data['location'])
                            $status['location'] = $camera_data['location'];
                    }

                    $status = json_encode($status, JSON_PRETTY_PRINT);

                    $this->response($status, REST_Controller::HTTP_OK);

                }

                else
                {
                    $status['status'] = 'deactivate';
                    $status = json_encode($status, JSON_PRETTY_PRINT);
                    $this->response($status, REST_Controller::HTTP_OK);
                }
            }
        }


        public function camera_get()
        {

            $user_name = $this->get('user_name');
            $cam_name = $this->get('cam_name');
            $cam_id = $this->get('cam_id');

            $data = array(
                'cam_name' => $cam_name,
                'cam_id' => $cam_id,
                'owner' =>  $user_name,
                'status' => 'enable',
                'config_sn' => '1',
                'group_name' => '',
                'group_id' => '',
                'key_sn' => '1'
            );

            if($this->api_model->insert_camera($data))
                $this->response(['Item created successfully.'], REST_Controller::HTTP_OK);


        }

        public function all_person_get()
        {
            $cam_id = $this->get('cam_id');
            $group_sn = $this->get('group_sn');

            $data = $this->mongo_db->get_where("camera", ['cam_id' => $cam_id]);
            $data =$data[0];
//            print_r($data);

            if($group_sn == $data['group_sn'])
            {
                $all_person = $this->api_model->get_all_person($group_sn);
                $all_person = json_encode($all_person, JSON_PRETTY_PRINT);
                $this->response($all_person, 200);
            }

        }


        public function found_post()
        {
//            $input = $this->input->post();
//            $a = $input['0'];
//            print_r($input);

            $input = $this->post('json_payload');
            $input = json_decode($input);
            $input = json_decode(json_encode($input), true);

            foreach ($input as $key => $value)
            {
                if($this->api_model->insert_found_person($value))
                    $this->response('', REST_Controller::HTTP_OK);
            }

        }

        public function reg_post()
        {
//            $input = $this->input->post();
//            $id = $this->post('name');
//            $data = array('name' => $id);
//            $this->mongo_db->insert('items',$data);
//
//            $this->response(['Item created successfully.'], REST_Controller::HTTP_OK);



            $input = $this->post('json_payload');
            $input = json_decode($input);
            $input = json_decode(json_encode($input), true);

            $data = array( 'cam_name' => $input['cam_name'],
                'cam_id' => $input['cam_id'],
                'owner' => $input['owner'],
                'status' => 'enable',
                'location' => 'none',
                'group_id' => 'none',
                'stream' => 'none',
                'key_sn' => '2');

            if($this->api_model->insert_camera($data)){
                $this->camera_model->reg_camera_admin($data['cam_id'], $data['owner']);
                $this->response('', REST_Controller::HTTP_OK);
            }

        }


        public function test_addperson_get(){
            require_once 'HTTP/Request2.php';

            $request = new Http_Request2('https://southeastasia.api.cognitive.microsoft.com/face/v1.0/persongroups/test2');
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
                'name'=> 'test2',
//                "userData"=> "user-provided data attached to the person group.",
//                "recognitionModel"=> "recognition_02"
            );
//            $body = json_encode($body);
            $request->setBody(json_encode($body));//replace it with your name and userData

            try
            {
                $response = $request->send();
                echo $response->getBody();
            }
            catch (HttpException $ex)
            {
                echo $ex;
            }

        }
        public function test_get(){

            // This sample uses the Apache HTTP client from HTTP Components (http://hc.apache.org/httpcomponents-client-ga/)
            require_once 'HTTP/Request2.php';

            $request = new Http_Request2('https://southeastasia.api.cognitive.microsoft.com/face/v1.0/persongroups/newgroup');
            $url = $request->getUrl();

            $headers = array(
                // Request headers
                'Content-Type' => 'application/json',
                'Ocp-Apim-Subscription-Key' => 'ce5f9a111c7a4a26b8fd0f88ab2fe47a',
//                'Accept' => 'application/json',
            );

            $request->setHeader($headers);

            $parameters = array(
                // Request parameters
            );

            $url->setQueryVariables($parameters);

            $request->setMethod(HTTP_Request2::METHOD_PUT);

            $request->setBody("{body}");

            try
            {
                echo "xxx";
                $response = $request->send();
                $h = $response->getStatus();
//                $s = $response->
                echo "yyy";
                echo $response->getBody();
                echo $h;
                echo "zzz";
            }
            catch (HttpException $ex)
            {
                echo $ex;
            }

        }

        public function test_delete_get(){
            // This sample uses the Apache HTTP client from HTTP Components (http://hc.apache.org/httpcomponents-client-ga/)
            require_once 'HTTP/Request2.php';

            $request = new Http_Request2('https://southeastasia.api.cognitive.microsoft.com/face/v1.0/persongroups/qq');
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
                $response = $request->send();
                echo $response->getBody();
            }
            catch (HttpException $ex)
            {
                echo $ex;
            }
        }

        public function test_user_get(){
            require_once 'HTTP/Request2.php';
//
            $request = new Http_Request2('https://southeastasia.api.cognitive.microsoft.com/face/v1.0/persongroups/myteams/persons');
            $url = $request->getUrl();

            $headers = array(
                // Request headers
                'Ocp-Apim-Subscription-Key' => 'ce5f9a111c7a4a26b8fd0f88ab2fe47a',
            );

            $request->setHeader($headers);

            $parameters = array(
                // Request parameters
                'start' => '',
                'top' => '1000',
            );

            $url->setQueryVariables($parameters);

            $request->setMethod(HTTP_Request2::METHOD_GET);

            // Request body
            $request->setBody("{body}");


            $response = $request->send();
            $body  = $response ->getBody();
            $user = json_decode($body);
            $a = $user[6];
//            $user = $user['personId'];
            $all_user = NULL;
            echo gettype($user);
        }

        public function test_group_get(){
            require_once 'HTTP/Request2.php';

            $request = new Http_Request2('https://southeastasia.api.cognitive.microsoft.com/face/v1.0/persongroups');
            $url = $request->getUrl();

            $headers = array(
                // Request headers
                'Ocp-Apim-Subscription-Key' => 'ce5f9a111c7a4a26b8fd0f88ab2fe47a',
            );

            $request->setHeader($headers);

            $parameters = array(
                // Request parameters
                'top' => '1000',
                'returnRecognitionModel' => 'false',
            );

            $url->setQueryVariables($parameters);

            $request->setMethod(HTTP_Request2::METHOD_GET);

// Request body
            $request->setBody("{body}");

            try
            {
                $response = $request->send();
                $body = $response->getBody();
                $de = json_decode(json_encode($body));
                echo $de;
            }
            catch (HttpException $ex)
            {
                echo $ex;
            }

        }

        public function user_post()
        {
//            $first_name = $this->get('first_name');
//            $last_name = $this->get('last_name');
//            $email = $this->get('email');
//            $passwd = $this->get('passwd');
//
//            $data = array(
//                'cam_name' => $cam_name,
//                'cam_id' => $cam_id,
//                'owner' =>  $user_name,
//                'status' => 'enable',
//                'config_sn' => '1',
//                'group_name' => '',
//                'group_id' => '',
//                'key_sn' => '1'
//            );
//
//
//            if($this->api_model->insert_camera($data))
//                $this->response(['Item created successfully.'], REST_Controller::HTTP_OK);
        }

        public function index_get()
        {
            $CI = get_instance();
            $CI->load->library("Mongo_db");
//            $this->load->model('api_model');
            $data = $this->api_model->get_all_camera();
//            $i = $CI->findOne(array('_id' => new MongoId('47cc67093475061e3d9536d2')));
//            $data = $this->mongo_db->get_where("camera", ['cam_id' => $mac_iddr])->row_array();
//            $i = $data[0];
//            $json = array(  "status" => $i['status']);
            $json = json_encode($data, JSON_PRETTY_PRINT);

            $this->response($json, REST_Controller::HTTP_OK);
        }

        public function index_get1($id = 0)
        {

    #        if(!empty($id)){
    #            $data = $this->db->get_where("items", ['id' => $id])->row_array();
    #        }else{
    #            $data = $this->db->get("items")->result();
    #        }

    #        $this->response($data, REST_Controller::HTTP_OK);
        }

        /**
         * Get All Data from this method.
         *
         * @return Response
         */


        /**
         * Get All Data from this method.
         *
         * @return Response
         */
        public function index_put($id)
        {
    //        $input = $this->put();
    //        $this->db->update('items', $input, array('id'=>$id));
    //
    //        $this->response(['Item updated successfully.'], REST_Controller::HTTP_OK);
        }

        /**
         * Get All Data from this method.
         *
         * @return Response
         */
        public function index_delete($id)
        {
    //        $this->db->delete('items', array('id'=>$id));
    //
    //        $this->response(['Item deleted successfully.'], REST_Controller::HTTP_OK);
        }

    }
