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
    
    public function buy(){
        echo '<pre>';
        print_r($this->request);
        if(isset($this->request->params['slug'])){
            $this->set('slug',$this->request->params['slug']);
        }
    }
    
    
    
}
