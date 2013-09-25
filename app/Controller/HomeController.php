<?php
/**
 * CakePHP HomeController
 * @author Eric
 */
App::uses('AppController', 'Controller');

class HomeController extends AppController {
    
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
	    if(isset($this->request->params[ZipCodes]['fzip']) && isset($this->request->params[ZipCodes]['fname']) && isset($this->request->params[ZipCodes]['femail'])){
		$zipinfo = $this->ZipCodes->getZipInfo($this->request->params[ZipCodes]['fzip']);
		$data = array(
		    'name' => $this->request->params[ZipCodes]['fname'],
		    'email' => $this->request->params[ZipCodes]['femail'],
		    'phone' => $this->request->params[ZipCodes]['fphone'],
		    'zip' => $this->request->params[ZipCodes]['fzip'],
		    'city' => (isset($zipinfo[ZipCodes][city]))?$zipinfo[ZipCodes][city]:'',
		    'state' => (isset($zipinfo[ZipCodes][state]))?$zipinfo[ZipCodes][state]:'',
		    'address' => $this->request->params[ZipCodes]['faddress']
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
