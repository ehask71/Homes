<?php

App::uses('Controller', 'Controller');


class AppController extends Controller {
    
   /* public $viewClass = 'Theme';
    public $theme = 'default';*/
    public $components = array(
        'DebugKit.Toolbar',
        'Session',
        'Auth' => array(
            //'authorize' => array('Tiny'),
            'authenticate' => array(
                'all' => array('userModel' => 'Account'),
                'Form' => array(
                    'fields' => array('username' => 'email', 'password' => 'password'),
                    'scope' => array(
                        'Account.is_active' => 'yes'
                    ),
                    'recursive' => 1,
            )),
            'flash' => array('key' => 'auth', 'element' => 'alerts/error'),
            'loginRedirect' => array('controller' => 'home', 'action' => 'index'),
            'logoutRedirect' => array('controller' => 'account', 'action' => 'login'),
            'loginAction' => '/login',
        )
	    );
    
    public function beforeFilter() {
	
    }
}
