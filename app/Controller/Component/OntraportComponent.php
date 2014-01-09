<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * CakePHP OntraportComponent
 * @author ehaskins
 */
class OntraportComponent extends Component {

    public $components = array();
    public $appid = '2_11292_SI205ZRK3';
    public $key = 'f7TTGzJXBuAaYYG';

    public function initialize($controller) {
        
    }

    public function startup($controller) {
        
    }

    public function beforeRender($controller) {
        
    }

    public function shutDown($controller) {
        
    }

    public function beforeRedirect($controller, $url, $status = null, $exit = true) {
        
    }

    public function add() {
        
    }

    public function add_tag() {
        $data = "
            <contact id='16972'>
                <tag>Tag1</tag>
                <tag>Tag2</tag>
            </contact>
            ";
        
        $this->send($data);
    }

    public function send($data, $reqType = 'add') {
        $data = urlencode(urlencode($data));
        $postargs = "appid=" . $appid . "&key=" . $key . "&return_id=1&reqType=" . $reqType . "&data=" . $data;
        $request = "https://api.moon-ray.com/cdata.php";

        //Start the curl session and send the data
        $session = curl_init($request);
        curl_setopt($session, CURLOPT_POST, true);
        curl_setopt($session, CURLOPT_POSTFIELDS, $postargs);
        curl_setopt($session, CURLOPT_HEADER, false);
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

        //Store the response from the API for confirmation or to process data
        $response = curl_exec($session);

        //Close the session
        curl_close($session);

        return $response;
    }

}
