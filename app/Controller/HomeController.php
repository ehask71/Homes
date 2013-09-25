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
	    if(isset($this->request->params['fzip']) && isset($this->request->params['fname']) && isset($this->request->params['femail'])){
		$data = array(
		    'name' => $this->request->params['fname'],
		    'email' => $this->request->params['femail'],
		    'phone' => $this->request->params['fphone'],
		    'zip' => $this->request->params['fzip'],
		    'address' => $this->request->params['faddress']
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
