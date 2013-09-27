<?php

/**
 * CakePHP ZipData
 * @author Eric
 */
App::uses('AppModel', 'Model');

class ZipData extends AppModel {

    public $primaryKey = 'id';
    public $useTable = 'zip_data';
    public $belongsTo = array(
        'ZipCodes' => array(
            'className' => 'ZipCodes',
            'foreignKey' => 'fips'
        )
    );
    
    

}

