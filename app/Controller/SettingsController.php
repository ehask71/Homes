<?php
/**
 * CakePHP SettingsController
 * @author Eric
 */
App::uses('AppController', 'Controller');

class SettingsController extends AppController {
    
    public $name = 'Settings';
    public $uses = array('ZipData');
    
    public function beforeFilter() {
	parent::beforeFilter();
        $this->Auth->allow('index');
    }
    
    public function index(){
        
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
            }
        }
    }
}

