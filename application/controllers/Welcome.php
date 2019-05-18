<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
    {
        require_once 'HTTP/Request2.php';

        $request = new Http_Request2('https://southeastasia.api.cognitive.microsoft.com/face/v1.0/persongroups/1-test4/persons');
        $url = $request->getUrl();

        $headers = array(
            // Request headers
            'Content-Type' => 'application/json',
            'Ocp-Apim-Subscription-Key' => 'ce5f9a111c7a4a26b8fd0f88ab2fe47a',
        );

        $request->setHeader($headers);

        $parameters = array(// Request parameters
        );

        $url->setQueryVariables($parameters);

        $request->setMethod(HTTP_Request2::METHOD_POST);

        $body = array(
            'name' => 'nn',
//                "userData"=> "user-provided data attached to the person group.",
//                "recognitionModel"=> "recognition_02"
        );
        $request->setBody(json_encode($body));//replace it with your name and userData

        try {
            $response = $request->send();
            $res = $response->getBody();
            $res =  explode(':', $res);
            $res = str_replace( '}', '',$res[1]);
//            $res = str_replace( '\"', '',$res);
//            $person_id = $res[1];
//            $res = str_getcsv($person_id,"\"","") ;
//            $res =  explode('\"', $res);

            echo $res;
            echo gettype($res);
        } catch (HttpException $ex) {
            echo $ex;

        }
    }
}
