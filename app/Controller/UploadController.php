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
        if (isset($this->params['session_id'])) {
            $this->Session->id($this->params['session_id']);
        }
        parent::beforeFilter();
        $this->Auth->allow();
    }

    public function index() {
        
    }

}
