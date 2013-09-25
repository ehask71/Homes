<?php
/**
 * CakePHP ZipCodes
 * @author Eric
 */
App::uses('AppModel', 'Model');

class ZipCodes extends AppModel {
    public $primaryKey = 'id';
    public $useTable = 'zip_codes';
    
    public function getZipInfo($zip){
	$data = $this->find('first',array(
	    'conditions' => array(
		'ZipCodes.ZipCode' => $zip
	    )
	));
	
	return $data;
    }
}
