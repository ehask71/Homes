<?php
App::uses('AppController', 'Controller');
/**
 * CakePHP UploadController
 * @author EricMain
 */

class UploadController extends AppController {

    public $name = 'UploadController';
    
    public $components = array();
    
    public $uses = array();


    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow();
    }
    
    public function index(){
        
    }

}
