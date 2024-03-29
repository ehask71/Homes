<?php
/**
 * CakePHP Account
 * @author Eric
 */
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');

class Account extends AppModel {
    public $primaryKey = 'id';
    
    public $hasAndBelongsToMany = array(
	'Role' => array(
	    'className' => 'Role',
	    'joinTable' => 'roles_users',
	    'foreignKey' => 'user_id',
	    'assosciationForeignKey' => 'role_id',
	    'unique' => 'keepExisting'
	)
    );
    
    public $hasMany = array('Order');
    
    public function beforeSave($options = array()) {
	if (isset($this->data[$this->alias]['password'])) {
	    $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
	}
	return true;
    }
    
    public function accountValidate() {
	$validate1 = array(
	    'firstname' => array(
		'mustNotEmpty' => array(
		    'rule' => 'notEmpty',
		    'message' => 'Please enter your First Name')
	    ),
	    'lastname' => array(
		'mustNotEmpty' => array(
		    'rule' => 'notEmpty',
		    'message' => 'Please enter your Last Name')
	    ),
            'address' => array(
		'mustNotEmpty' => array(
		    'rule' => 'notEmpty',
		    'message' => 'Please Enter your Address')
	    ),
            'city' => array(
		'mustNotEmpty' => array(
		    'rule' => 'notEmpty',
		    'message' => 'Please Enter your City')
	    ),
            'state' => array(
		'mustNotEmpty' => array(
		    'rule' => 'notEmpty',
		    'message' => 'Please Select Your State')
	    ),
	    'zip' => array(
		'mustNotEmpty' => array(
		    'rule' => 'notEmpty',
		    'message' => 'Please Enter your Zip/Postal Code')
	    ),
	    'country' => array(
		'mustNotEmpty' => array(
		    'rule' => 'notEmpty',
		    'message' => 'Please Select Your Country'
		)
	    ),
            'phone' => array(
		'mustNotEmpty' => array(
		    'rule' => 'notEmpty',
		    'message' => 'Please enter Your Contact Number'
		)
	    ),
	    'email' => array(
		'mustNotEmpty' => array(
		    'rule' => 'notEmpty',
		    'message' => 'Please Enter Your Email'
		),
		'validEmailRule' => array(
		    'rule' => 'email',
		    'message' => 'Invalid email address'
		),
		'uniqueEmailRule' => array(
		    'rule' => 'isUnique',
		    'message' => 'Email already registered'
		)
	    ),
	    'password' => array(
		'mustNotEmpty' => array(
		    'rule' => 'notEmpty',
		    'message' => 'Please Enter Your Password'
		),
		'passwordequal' => array(
		    'rule' => 'checkpasswords',
		    'message' => 'Passwords dont match'
		)
	    ),
	    'confirm_password' => array(
		'mustNotEmpty' => array(
		    'rule' => 'notEmpty',
		    'message' => 'Please Confirm Password'
		)
	    ),
	    'agreeterms' => array(
		'notEmpty' => array(
		    'rule' => array('comparison', '!=', 0),
		    'required' => true,
		    'message' => 'Please Agree to the Terms if you want to proceed.'
		)
	    ),
	);

	$this->validate = $validate1;
	return $this->validates();
    }
    
    public function accountValidateEdit() {
	$validate1 = array(
	    'firstname' => array(
		'mustNotEmpty' => array(
		    'rule' => 'notEmpty',
		    'message' => 'Please enter your First Name')
	    ),
	    'lastname' => array(
		'mustNotEmpty' => array(
		    'rule' => 'notEmpty',
		    'message' => 'Please enter your Last Name')
	    ),
            'address' => array(
		'mustNotEmpty' => array(
		    'rule' => 'notEmpty',
		    'message' => 'Please Enter your Address')
	    ),
            'city' => array(
		'mustNotEmpty' => array(
		    'rule' => 'notEmpty',
		    'message' => 'Please Enter your City')
	    ),
            'state' => array(
		'mustNotEmpty' => array(
		    'rule' => 'notEmpty',
		    'message' => 'Please Select Your State')
	    ),
	    'zip' => array(
		'mustNotEmpty' => array(
		    'rule' => 'notEmpty',
		    'message' => 'Please Enter your Zip/Postal Code')
	    ),
	    'country' => array(
		'mustNotEmpty' => array(
		    'rule' => 'notEmpty',
		    'message' => 'Please Select Your Country'
		)
	    ),
            'phone' => array(
		'mustNotEmpty' => array(
		    'rule' => 'notEmpty',
		    'message' => 'Please enter Your Contact Number'
		)
	    ),
	    'email' => array(
		'mustNotEmpty' => array(
		    'rule' => 'notEmpty',
		    'message' => 'Please Enter Your Email'
		),
		'validEmailRule' => array(
		    'rule' => 'email',
		    'message' => 'Invalid email address'
		),
		'uniqueEmailRule' => array(
		    'rule' => 'isUnique',
		    'message' => 'Email already registered'
		)
	    )
	);

	$this->validate = $validate1;
	return $this->validates();
    }

    function checkpasswords() {
	if (strcmp($this->data['Account']['password'], $this->data['Account']['confirm_password']) == 0) {
	    return true;
	}
	return false;
    }
    
    public function checkAcctSlug($slug){
	$res = $this->find('first',array(
	    'conditions' => array(
		'Account.slug' => $slug,
		'Account.is_active' => 'yes'
	    )
	));
	
	if(count($res) > 0){
	    return $res;
	}
	
	return false;
    }
    
    public function getAccountByCounty($state,$county){
        $result = $this->find('first',array(
            
        ));
    }
}

