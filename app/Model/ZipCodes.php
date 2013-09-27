<?php
/**
 * CakePHP ZipCodes
 * @author Eric
 */
App::uses('AppModel', 'Model');

class ZipCodes extends AppModel {
    public $name = 'ZipCodes';
    public $primaryKey = 'id';
    public $useTable = 'zip_codes';
    public $belongsTo = array(
        'ZipData' => array(
            'className' => 'ZipData',
            'foreignKey' => 'zd_id'
        )
    );
    
    public function getZipInfo($zip){
	$data = $this->find('first',array(
	    'conditions' => array(
		'ZipCodes.ZipCode' => $zip
	    ),
            'joins' => array(
                array('')
            )
	));
	
	return $data;
    }
    
    public function getZipUser($zip){
        $user = $this->find('first',array(
            'conditions' => array(
                'ZipCodes.ZipCode' => $zip
            )
        ));
        
        return $user;
    }
}
