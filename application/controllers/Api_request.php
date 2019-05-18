<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_request extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('PHPRequests');
        $this->load->helper('url');
    }

    public function index(){
//        $cam_id = '22:22:22:22:22:22';
//        $cam_id = $_GET['cam_id'];
//
//        if($cam_id == NULL){
//            echo 'not have camera id';
//        }
//        else{
            $response = Requests::get('https://southeastasia.api.cognitive.microsoft.com/face/v1.0/ce5f9a111c7a4a26b8fd0f88ab2fe47a/detect?returnFaceId=true');
//            echo 'http://localhost/code2/api/item/status/cam_id/'.$cam_id;
            $responseData = $response->body;
            $data = json_decode($responseData, true);
//            $status = array( "status" => $data['status']);
//            $status = json_encode($status, JSON_PRETTY_PRINT);
//            $status = $responseData['status'];
//            $status = array( 'status' => $responseData['status']);
//            $arrData = json_decode($responseData,true);
//            $arrData = json_encode($responseData,true);
//            $status = array( 'status' => $arrData['status']);
            echo "<pre>";
            print_r($responseData); // ทดสอบแสดงข้อมูลจากตัวแปร array
            echo "</pre>";
            return $responseData;
//        }

    }

    public function post(){

        $data = array('cam_name' => 'nn', 'owner' => 'nn', 'cam_id' => '1111 11111');
        print_r($data) ;
        $headers = array('Content-Type' => 'application/json');
//        $response = Requests::post('http://localhost/code2/api/found',$headers,json_encode($data));
//        echo "<pre>";
//        $responseData = $response->body;
//        $data1 = json_decode($responseData, true);
//        print_r($responseData); // ทดสอบแสดงข้อมูลจากตัวแปร array
//        echo "</pre>";
    }
}