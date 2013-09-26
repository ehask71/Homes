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
        $this->Auth->allow('login', 'logout', 'register', 'forgetpwd', 'resetcode');
    }
    
    public function index(){
        
    }
    
    public function register(){
        
    }

    public function login() {
	if ($this->request->is('post')) {
	    if ($this->Auth->login()) {
		$this->redirect($this->Auth->redirect());
	    } else {
		$this->Session->setFlash('Your username or password was incorrect.');
	    }
	}
    }
    
    public function logout() {
        
    }
}

