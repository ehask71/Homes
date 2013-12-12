<?php
/**
 * CakePHP SettingsController
 * @author Eric
 */
App::uses('AppController', 'Controller');

class SettingsController extends AppController {
    
    public $name = 'Settings';
    public $uses = array('ZipData');
    public $components = array('AuthNetXml');
    
    public function beforeFilter() {
	parent::beforeFilter();
        $this->Auth->allow('index');
    }
    
    public function index(){
	$this->autoRender = false;
        $county = $this->ZipData->query("SELECT * FROM zip_data ZipData WHERE ZipData.state != '' ORDER BY ZipData.price DESC");
            
            foreach ($county AS $val){
		echo $val['ZipData']['state'].' - '. $val['ZipData']['county'].'    <b>$'.$val['ZipData']['price'].'</b><br>';
	    }
    }
    
    public function admin_index(){
        
    }
    
    public function admin_pricing(){
        if ($this->request->is('post')) {
            // We need to Update Pricing
            $county = $this->ZipData->query("SELECT * FROM zip_data ZipData WHERE ZipData.state != ''");
            
            foreach ($county AS $val){
		$price = $this->ZipData->getPricing((int)$val['ZipData']['PST045212']);
                echo $val['ZipData']['county'].'    $'.$price.'<br>';
		$data = array(
		    'id' => $val['ZipData']['id'],
		    'price' => $price
		);
		$this->ZipData->save($data);
            }
        }
    }
    
    public function admin_customerprofiles(){
        $this->autoRender = false;     
        $out = $this->AuthNetXml->get_customer_profile_ids(array());
        $arr = (array)$out->ids->numericString;
        foreach ($arr AS $id){
            echo $id.'<br/>';
        }
    }
}

