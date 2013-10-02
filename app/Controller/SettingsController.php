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
            /*
             0-49,999	 $300 per month
             50,000-249,999	 $500 per month
             250,000-499,999	 $750 per month
             500,000-749,999	 $1000 per month
             750,000-999,999	 $1250 per month
             1m-1.99m	 $1500 per month
             2m-2.99m	 $2000 per month
             3m+	 $2500 per month
             */
            $county = $this->ZipData->query("SELECT * FROM zip_data ZipData WHERE ZipData.state != ''");
            
            foreach ($county AS $val){
                echo $val['ZipData']['county'].' '.$val['ZipData']['PST045212'].'<br>';
            }
        }
    }
}

