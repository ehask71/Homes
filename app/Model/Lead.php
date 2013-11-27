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

    public function chartLast15() {
        $last15 = $this->query("SELECT  DATE(created) date, COUNT(id) totalCount
                FROM leads Lead
                GROUP BY DATE(created) ORDER BY date desc");
        $last = array();
        $last['label'] = 'Last 15 Days';
        if (count($last15[0]) > 0) {
            foreach($last15[0] AS $data){
                $last['data'][] = array((strtotime($data['date'])*1000),(int)$data['totalCount']);
            }
        }
        $last['lines'] = array(
            'show'=> true,
            'fill'=> false,
            'lineWidth'=>2
        );
        $last['yaxis'] = array(
            'mode'=>'time',
            'minTickSize'=> array(1, "year")
        );
        return json_encode($last);
    }

}
