<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Person extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
//        $this->load->helper('url');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('person_model');
        $this->load->model('profile_model');
        $this->load->model('group_model');
        $this->load->library("Mongo_db");
    }

    public function check_login()
    {
        if(empty($this->session->logged_in))
            redirect('main');
    }

    public function upload($group_id)
    {
//        $countfiles = count($_FILES['person_img']['name']);
//        echo $countfiles;
        if (! empty($_FILES['person_img']['name']))
        {
            $photosCount = count($_FILES['person_img']['name']);
            for ($i = 0; $i < $photosCount; $i ++)
            {
                $filename = $_FILES['person_img']['name'][$i];

//                print_r($value);
//                echo $value;

                $images = $_FILES["person_img"]["tmp_name"][$i];
                $new_images = $group_id.'-'."thumbnail_".$_FILES["person_img"]["name"][$i];
                copy($_FILES["person_img"]["tmp_name"][$i],"upload/".$_FILES["person_img"]["name"][$i]);
                $width=100; //*** Fix Width & Heigh (Autu caculate) ***//
                $size=GetimageSize($images);
                //            print_r($size) ;
                //            $width_old = $size[0];
                //            $height_old = $size[1];
                //            echo 'width'.$width_old.'-';
                //            echo 'height'.$height_old.'-';
                $height=round($width*$size[1]/$size[0]);
                //            echo $height.'-';
                $images_orig = ImageCreateFromJPEG($images);
                //            echo $images_orig.'-';
                $photoX = ImagesX($images_orig);
                //            echo $photoX.'-';
                $photoY = ImagesY($images_orig);
                //            echo $photoY.'-';
                $images_fin = ImageCreateTrueColor($width, $height);
                //            echo $images_fin.'-';
                if(ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY))
//                    echo 'resize';
                if(ImageJPEG($images_fin,"upload/".$new_images))
                    echo 'uploaded';
                ImageDestroy($images_orig);
                ImageDestroy($images_fin);
            }

        }


    }
    public function test_form()
    {
        $this->load->view('person/test2');
    }

    function do_upload()
    {
        // File upload configuration
        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'jpg';
        $config['max_size'] = '1024';
//        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        $fileInfos = array();
//        $errors = array();
        if (! empty($_FILES['person_img']['name']))
        {
            $photosCount = count($_FILES['person_img']['name']);
            for ($i = 0; $i < $photosCount; $i ++) {

                // Create file upload info
                $_FILES['photo']['name'] = $_FILES['person_img']['name'][$i];
                $_FILES['photo']['type'] = $_FILES['person_img']['type'][$i];
                $_FILES['photo']['tmp_name'] = $_FILES['person_img']['tmp_name'][$i];
                $_FILES['photo']['error'] = $_FILES['person_img']['error'][$i];
                $_FILES['photo']['size'] = $_FILES['person_img']['size'][$i];

                // Upload file to server
                if ($this->upload->do_upload('photo')) {
//                    array_push($fileInfos, array(
//                        'fileInfo' => $this->upload->data()
//                    ));

                } else {
//                    array_push($errors, array(
//                        'error' => $this->upload->display_errors()
//                    ));
                }
            }
        }

//        if (count($errors) != 0) {
//            $data['errors'] = $errors;
//            $this->load->view('person/test2', $data);
//        } else {
//            $data['fileInfos'] = $fileInfos;
//            $this->load->view('person/success', $data);
//        }
    }
    public function test_insert(){
//        $data['group_id'] = 'myteams';
//        $data['person_list'] = array();
//        $this->mongo_db->insert('user', $data);

        $person['person_name'] = '22';
        $person['person_id'] = '22';
//        $this->mongo_db-set('person_list', 'apple');
//        $updateStatus = $this->mongo_db->update('user', [
//            'upsert' => TRUE
//        ]);
        if( $this->mongo_db->insert('person_group_person', $person) && $this->mongo_db->insert('person_group_person_old', $person))
            return 'success';
//        $this->mongo_db->push('person_list', $person)->where('group_id', 'myteams')->update('user');
    }

    public function found_person()
    {
//        $this->check_login();

        $founds = $this->person_model->get_all_found();


        $groups = $this->group_model->get_group_name();
        $data['groups'] = $groups;
//        $data['cameras'] = [];
//        $data_vir['cam_name'] = [];
//        $data_vir['location'] = [];

//        print_r($founds[0][0]);
//        echo count($founds[1]);
        for($i = 0; $i < count($groups); $i++)
        {
//            echo count($founds);
//            print_r($founds[0]);
            for($j = 0; $j < count($founds[$i]); $j++)
            {

//                print_r($founds[$i][$j]);
                $len = count($founds[$i][$j]['found_list']);
                $len = $len - 1;
                if($len >= 0)
                {
                    $cam_id = $founds[$i][$j]['found_list'][$len]['cam_id'];
//                    print_r($cam_id);
                    $cameras = $this->camera_model->get_camera_name($cam_id);
//                    print_r($cameras['cam_name']);
                    $cam_name =$cameras['cam_name'];
                    $founds[$i][$j]['found_list'][$len]['cam_name'] = $cam_name;
//                    print_r($founds[$i][$j]['found_list'][$len]['cam_name']);
                }
                $group_id = $founds[$i][$j]['group_id'];
                $person_id = $founds[$i][$j]['person_id'];
                $person  = $this->person_model->get_person($group_id, $person_id);
                $founds[$i][$j]['person_name'] = $person['person_name'];
                $founds[$i][$j]['person_img'] = $person['person_img'];

//
            }
        }

        $data['founds'] = $founds;
//        foreach ($groups as $value)
//        {
//            $cameras = $this->camera_model->get_camera_group_id($value['group_id']);
//            $data_vir['cam_name'] =  $cameras['cam_name'];
//            $data_vir['location'] = $cameras['location'];
//            array_push($data['cameras'], $data_vir);
//        }

        $this->load->view('header_profile');
        $this->load->view('show_foundperson', $data);
        $this->load->view('footer');

//        print_r($data);
    }

    public function track_person()
    {
        $this->form_validation->set_rules('group_id', 'GroupId', 'required');
        $this->form_validation->set_rules('person_id', 'PersonId', 'required');

        $groups = $this->group_model->get_all_group();
        $persons = [];
        $person_name = [];
        $data['groups'] = $groups;
        foreach ($groups as $group)
        {
            $person = $this->person_model->get_all_person($group['group_id']);
            foreach ($person as $value)
            {
//                array_push($person_name, $value)
            }
            array_push($persons, $person);
        }
        $data['persons'] = $persons;

        if ($this->form_validation->run() == FALSE) {

//        $data['person'] = $this->person_model->
            $this->load->view('header_profile');
            $this->load->view('show_trackperson', $data);
            $this->load->view('footer');
        }
        else
        {
            $group_id = $this->input->post('group_id', TRUE);
            $person_id = $this->input->post('person_id', TRUE);

            $data['group_id'] = $group_id;

            $found = $this->person_model->get_found_person($group_id, $person_id);

            if ($found != 'none')
            {
                for($i = 0; $i < count($found); $i++)
                {
//                print_r($founds[$i][$j]);
                    $cam_id = $found[$i]['cam_id'];
//                    print_r($cam_id);
                    $cameras = $this->camera_model->get_camera_name($cam_id);
//                    print_r($cameras['cam_name']);
                    $cam_name =$cameras['cam_name'];
                    $found[$i]['cam_name'] = $cam_name;
//                    print_r($founds[$i][$j]['found_list'][$len]['cam_name']);
                }
            }



            $data['founds'] = $found;
            $group = $this->group_model->get_group($group_id);
            $data['group_name'] = $group['group_name'];
            $person = $this->person_model->get_person($group_id, $person_id);
            $data['person_name'] = $person['person_name'];
            $data['person_img'] = $person['person_img'];
            $this->load->view('header_profile');
            $this->load->view('show_trackperson', $data);
            $this->load->view('footer');


        }


    }

    public function show_person($group_id)
    {
        $this->check_login();


        $data['persons'] = $this->person_model->get_all_person($group_id);
        $data['group_id'] = $group_id;
        $this->load->view('header_profile');
        $this->load->view('show_person', $data);
        $this->load->view('footer');
//        print_r($data);
    }

    public function add_person($group_id)
    {
        $this->check_login();

        $this->form_validation->set_rules('person_name', 'PersonName', 'required');

        $submit_data['person_name'] = $this->input->post('person_name', TRUE);

        $tmp_img = "";
        $error = NULL;


        if ($this->form_validation->run() == FALSE) {
            $submit_data['group_id'] = $group_id;

            $this->load->view('header_profile');
            $this->load->view('add_person', $submit_data);
            $this->load->view('footer');
        }
        else
        {
            $user = $this->profile_model->get_user();
            $user_id = $user['user_id'];
//            $submit_data['group_id'] = $group_id;

            $submit_data['person_name'] = $this->input->post('person_name', TRUE);
            $submit_data['person_id'] = '1';
            $submit_data['count_img'] = 0;
            $person_id = NULL;


            if (! empty($_FILES['person_img']['name']))
            {
                $dir_img = 'public/upload/';
                $photosCount = count($_FILES['person_img']['name']);
                for ($i = 0; $i < $photosCount; $i ++)
                {
                    $source_img = $_FILES["person_img"]["tmp_name"][$i];
                    $des_img = $user_id.'_'.$group_id.'_'.$submit_data['person_name'].'_'.$_FILES["person_img"]["name"][$i];
                    $des_upload = $dir_img.$des_img;
                    copy($source_img,$des_upload);

                    if($i == 0)
                    {
                        $submit_data['person_img'] = $user_id.'_'.$group_id.'_'.$submit_data['person_name'].'_'."thumbnail_".$_FILES["person_img"]["name"][$i];
                        $new_images = $user_id.'_'.$group_id.'_'.$submit_data['person_name'].'_'."thumbnail_".$_FILES["person_img"]["name"][$i];

                        $im1 = imagecreatefromstring(file_get_contents($source_img));
                        $exif = exif_read_data($source_img);
                        if(!empty($exif['Orientation'])) {
                            switch($exif['Orientation']) {
                                case 8:
                                    $im1 = imagerotate($im1,90,0);
                                    break;
                                case 3:
                                    $im1 = imagerotate($im1,180,0);
                                    break;
                                case 6:
                                    $im1 = imagerotate($im1,-90,0);
                                    break;
                            }
                        }

                        $w2=ImageSx($im1);
                        $h2=ImageSy($im1);
                        $w1 = 100;

                        $h1=floor($h2*($w1/$w2));
                        $im2=imagecreatetruecolor($w1,$h1);

                        imagecopyresampled ($im2,$im1,0,0,0,0,$w1,$h1,$w2,$h2);
                        if(ImageJPEG($im2,"public/upload/thumbnail/".$new_images))
                        {
                            ImageDestroy($im1);
                            ImageDestroy($im2);
                        }

                        $person_id = $this->person_model->insert_person($submit_data, $group_id);
                    }

                    if ($person_id)
                    {
                        $add_img = $des_img;
                        $res_add = $this->person_model->add_face($person_id, $group_id, $add_img);
                        if($res_add['result'] == 'success')
                        {
                            $this->delete_img($add_img);
                        }
                        else
                        {
                            $tmp_img = $tmp_img.$add_img.', ';
                            $error = $res_add['msg'];
                            $this->delete_img($add_img);

                        }
                    }
                }
                $this->person_model->train($group_id);
            }
            if($tmp_img == ""){
//                $this->session->set_flashdata('notify_message', $res_add['result']);
            }
            else
            {
                $this->session->set_flashdata('notify_message', $tmp_img.': '.$error.' Please select another image.');
            }
//            // Load view
            redirect("person/show_person/$group_id", 'refresh');
        }
    }

    function delete_img($name) {
        $str = 'C:/xampp/htdocs/code2/public/upload/'.$name;
        return $flgDelete = unlink($str);
    }

    public function add_face($person_id, $group_id)
    {
        $this->check_login();

        $tmp_img = "";
        $error = NULL;

        $person = $this->person_model->get_person($group_id, $person_id);
        $data['person_id'] = $person['person_id'];
        $data['person_name'] = $person['person_name'];
        $data['group_id'] = $group_id;

        if (empty($_FILES['person_img']['name']) )
        {
            $this->load->view('header_profile');
            $this->load->view('add_face', $data);
            $this->load->view('footer');
        }
        else
        {
            $submit_data['person_name'] = $this->input->post('person_name', TRUE);
            $photosCount = count($_FILES['person_img']['name']);
            for ($i = 0; $i < $photosCount; $i ++)
            {
                $des_img = $group_id.'_'.$data['person_name'].'_'.$_FILES["person_img"]["name"][$i];

                copy($_FILES["person_img"]["tmp_name"][$i],"public/upload/".$des_img);
                $add_img = $des_img;
                $res_add = $this->person_model->add_face($person_id, $group_id, $add_img);
                if($res_add['result'] == 'success')
                {
                    $this->delete_img($add_img);
                }
                else
                {

                    $tmp_img = $tmp_img.$add_img.', ';
                    $error = $res_add['msg'];
                    $this->delete_img($add_img);
                }
            }


            $this->person_model->train($group_id);
            if($tmp_img == ""){
//                $this->session->set_flashdata('notify_message', $res_add['result']);
            }
            else
            {
                $this->session->set_flashdata('notify_message', $tmp_img.': '.$error.' Please select another image.');
            }
            // Load view
            redirect("person/show_person/$group_id", 'refresh');
        }
    }

    public function test_add_face()
    {

        $a = $this->mongo_db->count('user');
        echo gettype($a);
        $b = $this->mongo_db->sort('user_id', 'desc')->get('user');
        print_r($b);
        $c = $b[0]['user_id'];
        $c = $c + 1;
        print_r(gettype($c));
        echo $c;
//        $person['person_name'] = 'nana8';
//        $person['person_id'] = 'b800f23e-eed3-4b02-b0c0-bc2ebc490e00';
//        $person['count_img'] = '3';
//        $person['person_img'] = 'nana6_thumbnail_3.jpg';
//        print_r($person);
////        unset($person['person_id']);
//        print_r($person);
//
//        $person_id = $person['person_id'];
//        unset($person['person_id']);
//        if($this->mongo_db->push('found_list', $person)->where('person_id', $person_id)->update('found_person'))
//            return true;
//        $person_id = 'dfb602f7-815e-438d-885e-29903d8ec08c';
//        $group_ig = '1-test6';
//        $add_img = '4.jpg';
//        $this->person_model->add_face($person_id, $group_ig, $add_img);

        $id = 'eed3121a-e135-4279-a57a-4a8cf487a45f';
//        $test = $this->mongo_db->where('person_list', ['person_id' => $this->mongo_db->in(['eed3121a-e135-4279-a57a-4a8cf487a45f'])])->get('person_group_person');
//        $test1 = $this->mongo_db->where(['group_id' => 'myteam'])->get('person_group_person');
//        $test1 = $test1[0]['person_list'];
//        $test2 = $this->mongo_db->where(['group_id' => 'myteam'])->get($test1);
//        $this->mongo_db->delete('person_list', $person)->where('group_id', $group_id)->update('person_group_person_old');

//        $updateStatus = $this->mongo_db->unset([
//            'person_list',])->where('group_id', 'myteam')->update('person_group_person');

//        $person['person_name'] = 'nana8';
//        $person['person_id'] = 'eed3121a-e135-4279-a57a-4a8cf487a45f';
//        $person['count_img'] = '3';
//        $person['person_img'] = 'nana6_thumbnail_3.jpg';
//        $updateStatus = $this->mongo_db
//            ->pull([
//                'person_list', $id
//            ])
//            ->where([
//                'group_id'  => 'myteam',
//                'person_id' => $id,
//            ])
//            ->update('person_group_person');
//        $this->mongo_db
//            ->pull('person_list', $person)
//            ->where('group_id', 'myteam')
//            ->update('person_group_person');

//
//        $persons = $this->mongo_db->getOneWhere('person_group_person', ['group_id' => 'myteam']);
//        $persons = $persons[0]['person_list'];
//        foreach ($persons as $person)
//        {
//            if($person['person_id'] == $id)
//            {
//                $this->mongo_db->pull('person_list', $person)->where('group_id', 'myteam')->update('person_group_person');
//
//                $count = $person['count_img'];
//                $count = $count + 1;
//                $person['count_img'] = $count;
//
//                $this->mongo_db->push('person_list', $person)->where('group_id', 'myteam')->update('person_group_person');

//                $this->mongo_db->set(['person_list' => $person])->where('group_id', 'myteam');

//                $this->mongo_db->update('person_group_person', [
//                    'upsert' => TRUE
//                ]);
//                if($this->mongo_db->push('person_list', $person)->where('group_id', 'myteam')->update('person_group_person_old'))
//                {
//                    return  $this->mongo_db
//                        ->pull('person_list', $person)
//                        ->where('group_id', $group_id)
//                        ->update('person_group_person');
//                    break;
//                }

////                        $this->mongo_db->insert('person_group_person_old',$person);
//            }
////                        print_r($person);
//        }

//        $this->mongo_db
//            ->push([
//                'person_list' => ['nn']
//            ])
//            ->where('group_id', 'myteam')
//            ->update('person_group_person');

//        $test = $this->mongo_db->getOneWhere('person_group_person', [$this->mongo_db->getOneWhere('person_list', ['person_id' => $id])]);
//        $test2 = $this->mongo_db->getOneWhere('person_list', ['person_id' => $id]);
//        $persons = $test[0]['person_list'];
//        foreach ($persons as $person)
//        {
//            if($person['person_id'] == $id)
//            {
//                if($this->mongo_db->push('person_list', $person)->where('group_id', 'myteams')->update('person_group_person_old'))
//                    return $this->mongo_db->where('group_id', 'myteams')->delete('person_group_person');
////                        $this->mongo_db->insert('person_group_person_old',$person);
//            }
//        }
//        $updateStatus = $this->mongo_db->unset([
//            'person_list',
//            'latitude'
//        ])->update('person_group_person');

//        print_r($test);
//        echo "\r\n";
//        print_r($test1);
    }

    public function delete_person($person_id, $group_id)
    {
        $this->check_login();
//        $this->load->model('group_model');

//        $person_id = $data['person_id'];
//        $group_sn = $data['group_sn'];
        if($this->person_model->delete_person($person_id, $group_id))
        {
//            $_SESSION['notify_message'] = 'Delete post successfully';
        }
        else
        {
            $_SESSION['notify_message'] = 'oh! There is a problem.';
        }
        $this->session->mark_as_flash('notify_message');

        // Load view
        redirect("person/show_person/$group_id", 'refresh');

    }
}

