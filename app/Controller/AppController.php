<?php

App::uses('Controller', 'Controller');


class AppController extends Controller {
    
    public $viewClass = 'Theme';
    public $theme = 'default';
    
    public $components = array(
        'Session',
	'RequestHandlerComponent',
        'Auth' => array(
            'authorize' => array('Tiny'),
            'authenticate' => array(
                'all' => array('userModel' => 'Account'),
                'Form' => array(
                    'fields' => array('username' => 'email', 'password' => 'password'),
                    'scope' => array(
                        'Account.is_active' => 'yes'
                    ),
                    'recursive' => 1,
            )),
            'loginRedirect' => array('controller' => 'home', 'action' => 'index'),
            'logoutRedirect' => array('controller' => 'account', 'action' => 'login'),
            'loginAction' => '/login',
        ),
	'DebugKit.Toolbar'
	    );
    
    public function beforeFilter() {
	$this->set('userinfo', $this->Auth->user());
        $this->set('loggedIn', $this->Auth->loggedIn());
    }
}
