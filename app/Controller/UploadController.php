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
    }

    public function index() {
        $targetFolder = '/uploads'; // Relative to the root

        $verifyToken = md5('unique_salt' . $_POST['timestamp']);

        if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
            $tempFile = $_FILES['Filedata']['tmp_name'];
            $targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
            $targetFile = rtrim($targetPath, '/') . '/' . $_FILES['Filedata']['name'];

            // Validate the file type
            $fileTypes = array('jpg', 'jpeg', 'gif', 'png'); // File extensions
            $fileParts = pathinfo($_FILES['Filedata']['name']);

            if (in_array($fileParts['extension'], $fileTypes)) {
                move_uploaded_file($tempFile, $targetFile);
                echo '1';
            } else {
                echo 'Invalid file type.';
            }
        }
    }

}
