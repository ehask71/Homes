<?php

/**
 * CakePHP Lead
 * @author Eric
 */
App::uses('AppModel', 'Model');

class Lead extends AppModel {

    public $primaryKey = 'id';

    public function validateLead() {
        $validate1 = array(
            'firstname' => array(
                'mustNotEmpty' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Please enter first name')
            ),
            'lastname' => array(
                'mustNotEmpty' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Please enter last name')
            ),
            'email' => array(
                'mustNotEmpty' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Please enter an email'),
                'validEmailRule' => array(
                    'rule' => 'email',
                    'message' => 'Invalid email address'
                )
            ),
            'phone' => array(
                'mustNotEmpty' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Please enter a phone number')
            ),
            'address' => array(
                'mustNotEmpty' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Please enter the address')
            ),
            'city' => array(
                'mustNotEmpty' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Please enter the city')
            ),
            'state' => array(
                'mustNotEmpty' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Please select the state')
            ),
            'zip' => array(
                'mustNotEmpty' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Please enter the zip code')
            ),
            'bathrooms' => array(
                'mustNotEmpty' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Please select bathrooms')
            ),
            'bedrooms' => array(
                'mustNotEmpty' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Please select bedrooms')
            ),
            'propertytype' => array(
                'mustNotEmpty' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Please select the property type')
            ),
            'askingprice' => array(
                'mustNotEmpty' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Please select the asking price range')
            ),
            'reason' => array(
                'mustNotEmpty' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Please enter your reason for selling')
            ),
        );

        $this->validate = $validate1;
        return $this->validates();
    }

    public function chartLast15day() {
        $last15 = $this->query("SELECT UNIX_TIMESTAMP(DATE(created))*1000 date, COUNT(id) totalCount
                FROM leads Lead
                WHERE DATE(created) BETWEEN DATE_SUB( CURDATE() , INTERVAL 15 DAY ) AND CURDATE() 
                GROUP BY DATE(created) ORDER BY date desc");
        $last = array();
        $last['label'] = 'Leads Last 15 Days';
        if (count($last15) > 0) {
            foreach($last15 AS $data){
                $last['data'][] = array( (int)$data[0]['date'],(int)$data[0]['totalCount']);
            }
        }
        return json_encode($last);
    }

}
