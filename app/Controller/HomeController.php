<?php
/**
 * CakePHP HomeController
 * @author Eric
 */
App::uses('AppController', 'Controller');

class HomeController extends AppController {
    
    public $name = 'Home';
    public $uses = array('ZipCodes');
    
    public function beforeFilter() {
	parent::beforeFilter();
	$this->Auth->allow();
    }
    
    public function index(){
        
    }
    
    public function sell(){
        if($this->request->is('post')){
	    // From the Index
	    if(isset($this->request->data['ZipCodes']['fzip']) && isset($this->request->data['ZipCodes']['fname']) && isset($this->request->data['ZipCodes']['femail'])){
		$zipinfo = $this->ZipCodes->getZipInfo($this->request->data['ZipCodes']['fzip']);
		$data = array(
		    'name' => $this->request->data['ZipCodes']['fname'],
		    'email' => $this->request->data['ZipCodes']['femail'],
		    'phone' => $this->request->data['ZipCodes']['fphone'],
		    'zip' => $this->request->data['ZipCodes']['fzip'],
		    'city' => (isset($zipinfo['ZipCodes']['city']))?$zipinfo['ZipCodes']['city']:'',
		    'state' => (isset($zipinfo['ZipCodes']['state']))?$zipinfo['ZipCodes']['state']:'',
		    'address' => $this->request->data['ZipCodes']['faddress']
		);
		$this->request->data = $data;
	    } else {
		
	    }
	}
    }
    
    public function buy(){
	// Check for Slug Params
        if(isset($this->request->params['county']) && isset($this->request->params['state'])){
            $this->set('slug',$this->request->params['county'].'-'.$this->request->params['state']);
        }
    }
    
    
    
}
