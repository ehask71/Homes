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
    public $url = 'https://api.moon-ray.com/cdata.php';

    public function initialize(Controller $controller) {
        
    }

    public function startup(Controller $controller) {
        
    }

    public function add($data,$id) {
        $data = '<contact>
                    <Group_Tag name="Contact Information">
                        <field name="First Name">'.$data['firstname'].'</field>
                        <field name="Last Name">'.$data['lastname'].'</field>
                        <field name="E-Mail">'.$data['email'].'</field>
                        <field name="Address">'.$data['address'].'</field>
                        <field name="Address 2">'.$data['address2'].'</field>
                        <field name="City">'.$data['city'].'</field>
                        <field name="Country">'.$data['country'].'</field>
                        <field name="State">'.$data['state'].'</field>
                        <field name="Zip Code">'.$data['zip'].'</field>
                        <field name="Office Phone">'.$data['phone'].'</field>
                        <field name="register - password">'.$data['password'].'</field>
                        <field name="register - i agree to terms and conditions">'.$data['agreeterms'].'</field>
                        <field name="pURL Link">'.$id.'</field>
                    </Group_Tag>
                    <Group_Tag name="Sequences and Tags">
                        <field name="Contact Tags">#1 Personal Info*/*#1 Register</field>
                    </Group_Tag>
                </contact>';
        
        $this->response($this->send($data));
        
    }

    public function add_tag($id,$tags) {
        $t = '';
        if(is_array($tags)) {
            foreach ($tags AS $tag){
                $t .= '<tag>'.$tag.'</tag>';
            }
        } else {
            $t = '<tag>'.$tag.'</tag>';
        }
        $data = '
            <contact id="'.$id.'">
                '.$t.'
            </contact>
            ';
        
        $this->send($data);
    }

    public function send($data, $reqType = 'add') {
        $data = urlencode(urlencode($data));
        $postargs = "appid=" . $this->appid . "&key=" . $this->key . "&return_id=1&reqType=" . $reqType . "&data=" . $data;

        //Start the curl session and send the data
        $session = curl_init($this->url);
        curl_setopt($session, CURLOPT_POST, true);
        curl_setopt($session, CURLOPT_POSTFIELDS, $postargs);
        curl_setopt($session, CURLOPT_HEADER, false);
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

        //Store the response from the API for confirmation or to process data
        $response = curl_exec($session);

        //Close the session
        curl_close($session);

        return simplexml_load_string($response);
    }
    
    public function response($data,$type='add'){
        
        if($data->status == 'Success'){
            return $data->contact['id'];
        } else {
            return false;
        }
    }

}
