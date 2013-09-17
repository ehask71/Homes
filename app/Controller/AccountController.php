<?php
/**
 * CakePHP AccountController
 * @author Eric
 */
App::uses('AppController', 'Controller');

class AccountController extends AppController {
    
    public $name = 'Account';
    
    public function beforeFilter() {
	parent::beforeFilter();
    }
    
    public function index(){
        
    }
    
}

