<?php

/**
 * CakePHP RegistrationController
 * @author Eric
 */
App::uses('AppController', 'Controller');

class RegistrationController extends AppController {

    public $name = 'Registration';
    public $uses = array('Account', 'Transaction', 'ZipData');
    public $components = array('AuthNetXml','Cart');

    public function beforeFilter() {
	parent::beforeFilter();
	$this->Auth->allow('register','cartadd');
    }

    public function index() {
	$this->redirect('/register/personal-info');
    }

    /**
     * Registration Process
     */
    public function register() {
	if ($this->request->is('post')) {
	    $this->Account->set($this->data);
	    if ($this->Account->accountValidate()) {
		if ($this->Account->save($this->request->data)) {
		    $userid = $this->Account->getLastInsertID();
		    // Assign a Role
		    $this->loadModel('RoleUser');
		    $roleuser = $this->RoleUser->addUserSite($userid);
		    // Log the user in
		    $role = array();
		    $role[] = array(
			'id' => 2,
			'alias' => 'member',
			'RolesUser' => array(
			    'id' => $roleuser,
			    'user_id' => $userid,
			    'role_id' => 2
			)
		    );
		    $this->request->data['Account'] = array_merge($this->request->data['Account'], array('id' => $userid, 'Role' => $role));
		    $this->Auth->login($this->request->data['Account']);

		    $this->Session->setFlash(__('Account Created.'));
		    $this->redirect('/register/select-counties');
		} else {
		    $this->Session->setFlash(__('There was a problem. Please, try again.'));
		}
	    }
	}
    }

    // Registration Step 2
    public function select() {
	if ($this->request->is('post')) {
	    
	} else {
	    $counties = $this->ZipData->getCountiesByState('FL', true);
	    $this->request->data['state'] = 'FL';
	    $this->request->data['counties'] = $counties;
	    $this->set('cty', $counties);
	}
    }

    // Billing Profile
    public function billing() {
	if ($this->request->is('post')) {
	    // Billing Profile
	    $data['id'] = $this->Auth->user('id');
	    $data['email'] = $this->request->data['Account']['email'];
	    $data['firstname'] = $this->request->data['Account']['firstname'];
	    $data['lastname'] = $this->request->data['Account']['lastname'];
	    $data['address'] = $this->request->data['Account']['address'];
	    $data['city'] = $this->request->data['Account']['city'];
	    $data['state'] = $this->request->data['Account']['state'];
	    $data['zip'] = $this->request->data['Account']['zip'];
	    $data['phone'] = $this->request->data['Account']['phone'];
	    $data['ccnum'] = '4111111111111111';
	    $data['ccexpyr'] = '2014';
	    $data['ccexpmnth'] = '11';
	    $data['cvv'] = '123';

	    $cimresponse = $this->AuthNetXml->create_customer_profile_request($data);
	    if (!$cimresponse->isError()) {
		CakeLog::write('debug', 'CIM success');
		$update['Account']['id'] = $this->Auth->user('id');
		$update['Account']['authnet_profile'] = $cimresponse->customerProfileId;
		$this->Account->create();
		$this->Account->save($update);
	    } else {
		//echo $cimresponse->__toString();
		CakeLog::write('debug', $cimresponse->messages->resultCode . ' ' . $cimresponse->messages->message->code . ' ' . $cimresponse->customerProfileId . ' ' . $cimresponse->customerPaymentProfileIdList->numericString);
	    }
	}
    }

    public function finsh() {
	
    }

    /**
     *  End Registration Process Actions
     */
    
    public function cartadd(){
        //$this->autoRender = false;
        if($this->request->is('post')){
            $this->Cart->add($this->request->data['id']);
        }
        $this->Cart->cart();
        echo json_encode($this->Session->read('Shop.Order'));
    }
}
