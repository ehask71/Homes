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
        if ($this->action == 'index') {
            CakeSession::id(@$_GET['ses']);
            CakeSession::start();
        }
        parent::beforeFilter();
    }

    public function index() {
        $rtn = array();
        $verifyToken = md5('cashfor2013HO' . @$_POST['timestamp']);
        if (!empty($_FILES) && @$_POST['token'] == $verifyToken) {
            // Validate the file type
            $fileTypes = array('jpg', 'jpeg', 'gif', 'png'); // File extensions
            $fileParts = pathinfo($_FILES['Filedata']['name']);
            // Rename 
            $tempFile = $_FILES['Filedata']['tmp_name'];
            $targetPath = ROOT . DS . APP_DIR . DS . WEBROOT_DIR . DS . 'files';
            
            $filename = $this->Auth->user('id').'_'.md5(time().$_FILES['Filedata']['name']).'.'.$fileParts['extension'];
            $targetFile = rtrim($targetPath, DS) . DS . $filename;

            if (in_array($fileParts['extension'], $fileTypes)) {
                move_uploaded_file($tempFile, $targetFile);
                $rtn = array(
                    'file' => $filename,
                    'path' => DS . APP_DIR . DS . WEBROOT_DIR . DS . 'files' . DS,
                );
            } else {
                $rtn = array('error'=>'Invalid file type.');
            }
        }
        $this->set('data',$rtn);
        $this->set('_serialize', array('data'));
    }

}
