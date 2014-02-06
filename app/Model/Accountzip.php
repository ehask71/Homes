<?php

/**
 * CakePHP Accountzip
 * @author Eric
 */
App::uses('AppModel', 'Model');

class Accountzip extends AppModel {

    public $primaryKey = 'id';

    public function addZip2Account($acct, $zips = array()) {
	$data = array();
	$i = 0;
	if (count($zips) > 0) {
	    foreach ($zips AS $zip) {
		$data[$i]['account_id'] = $acct;
		$data[$i]['zd_id'] = $zip;
		$i++;
	    }
	    $this->saveMany($data);
	}
    }

}
