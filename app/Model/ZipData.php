<?php

/**
 * CakePHP ZipData
 * @author Eric
 */
App::uses('AppModel', 'Model');

class ZipData extends AppModel {

    public $primaryKey = 'id';
    public $useTable = 'zip_data';
    public $hasMany = array(
        'ZipCodes' => array(
            'className' => 'ZipCodes',
            'foreignKey' => 'zd_id'
        )
    );
    
    

}

