<?php
/**
 * CakePHP SeoController
 * @author Eric
 */
App::uses('AppController', 'Controller');

class SeoController extends AppController {
    
    public $name = 'Seo';
    
    public function index(){
        
    }
    
    public function sitemap(){
	
    }
    
    public function robots(){
	$this->autoRender = false;
	
    }
    
}
