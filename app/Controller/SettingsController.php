<?php
/**
 * CakePHP SettingsController
 * @author Eric
 */
App::uses('AppController', 'Controller');

class SettingsController extends AppController {
    
    public $name = 'Settings';
    
    public function beforeFilter() {
	parent::beforeFilter();
    }
    
    public function admin_index(){
        
    }
    
}

