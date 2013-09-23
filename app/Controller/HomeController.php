<?php
/**
 * CakePHP HomeController
 * @author Eric
 */
App::uses('AppController', 'Controller');

class HomeController extends AppController {
    
    public function beforeFilter() {
	parent::beforeFilter();
	$this->Auth->allow();
    }
    
    public function index(){
        
    }
    
    public function sell($slug=null){
        $this->set('slug',$slug);
    }
    
    
    
}
