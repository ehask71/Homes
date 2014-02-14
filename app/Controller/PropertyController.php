<?php

/**
 * CakePHP PropertyController
 * @author Eric
 */
App::uses('AppController', 'Controller');

class PropertyController extends AppController {

    public function beforeFilter() {
	parent::beforeFilter();
	$this->Auth->allow();
    }

    public function index() {
	
    }

}
