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

    public function getCountiesByState($state, $select = false) {
        $data = $this->find('all', array(
            'recursive' => -1,
            'conditions' => array(
                'ZipData.state' => $state
            )
        ));

        if ($select && is_array($data)) {
            $return = array();
            foreach ($data AS $row) {
                $return[$row['ZipData']['id']] = '$' . $row['ZipData']['price'] . "\t\t" . $row['ZipData']['county'];
            }

            return $return;
        } else {
            return $data;
        }
    }

    public function getPricing($pop) {
        /*
          0-49,999	 $300 per month
          50,000-249,999	 $500 per month
          250,000-499,999	 $750 per month
          500,000-749,999	 $1000 per month
          750,000-999,999	 $1250 per month
          1m-1.99m	 $1500 per month
          2m-2.99m	 $2000 per month
          3m+	 $2500 per month
         */
        $price = 0.00;
        if ($pop >= 3000000) {
            $price = 2500.00;
        } elseif ($pop > 0 && $pop <= 49999) {
            $price = 300.00;
        } elseif ($pop >= 50000 && $pop <= 249999) {
            $price = 500.00;
        } elseif ($pop >= 250000 && $pop <= 499999) {
            $price = 750.00;
        } elseif ($pop >= 500000 && $pop <= 749999) {
            $price = 1000.00;
        } elseif ($pop >= 750000 && $pop <= 999999) {
            $price = 1250.00;
        } elseif ($pop >= 1000000 && $pop <= 1999999) {
            $price = 1500.00;
        } elseif ($pop >= 2000000 && $pop <= 2999999) {
            $price = 2000.00;
        }

        return $price;
    }

    public function popularCounties() {
        $data = Cache::read('popularCounties', 'short');
        if (!$data) {
            $data = $this->query("SELECT 
            CONCAT(REPLACE(county,' ','-'),'-',state) AS slug,
            county,
            state 
            FROM 
            `zip_data` AS ZipData WHERE `ZipData`.`price` != 0.00 ORDER BY `ZipData`.`PST045212` DESC LIMIT 20");
            Cache::write('popularCounties', $data, 'short');
        }

        return $data;
    }

}

