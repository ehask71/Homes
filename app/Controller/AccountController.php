<?php

/**
 * CakePHP AccountController
 * @author Eric
 */
App::uses('AppController', 'Controller');

class AccountController extends AppController {

    public $name = 'Account';
    public $uses = array('Account', 'Lead', 'Transaction', 'ZipData');
    public $components = array('AuthNetXml');

    public function beforeFilter() {
	parent::beforeFilter();
	$this->Auth->allow('register', 'login', 'logout', 'forgotpwd');
    }

    /**
     *  Profile Related Functions
     */
    public function index() {
	$this->Paginator->settings = array(
	    'conditions' => array('Lead.user_id' => $this->Auth->user('id')),
	    'limit' => 20
	);
	$data = $this->Paginator->paginate('Lead');
	$this->set(compact('data'));
    }

    public function edit() {
	if ($this->request->is('post')) {
	    if ($this->Account->accountValidate()) {
		if ($this->Account->save($this->request->data)) {
		    $this->Session->setFlash(__('Profile Updated'));
		    $this->redirect('/account/edit');
		}
	    }
	}
	$prof = $this->Account->find('first', array(
	    'conditions' => array(
		'Account.id' => $this->Auth->user('id')
	    )
	));
	$this->request->data = $prof;
    }

    public function billingprofiles() {
	if($this->Auth->user('authnet_profile') != 0){
	    $data['customerProfileId'] = $this->Auth->user('authnet_profile');
	    $cimresponse = $this->AuthNetXml->get_customer_profile($data);
	    if (!$cimresponse->isError()) {
		$xml = json_decode(json_encode((array) $cimresponse), 1);
		$profile = array(
		   // 'id' => $xml['AuthnetXMLresponse_xml']['profile']['customerPaymentProfileId'],
		    //'billto' => $xml['AuthnetXMLresponse_xml']['profile']['paymentProfiles']['billTo'],
		    //'payment' => $xml['AuthnetXMLresponse_xml']['profile']['paymentProfiles']['payment']['creditCard'],
		);
		
		echo "<pre>";
		echo $xml['AuthnetXMLresponse_xml']['profile']['customerPaymentProfileId'].' <-- $xml["AuthnetXMLresponse_xml"]["profile"]["customerPaymentProfileId"]';
		echo "<br><br>";
                foreach ($xml AS $k=>$v){
                    echo "<b>Var Dump $k</b>:<br>";
		    var_dump($k)."<br>";
                    echo "<b>Print_r</b>:<br>";
		    print_r($v)."<br><br>";
		    if(trim($k) == 'AuthnetXMLresponse_xml'){
			$profile = $v;
		    }
		}
                echo "</pre>";
		
		$this->set('profile',$xml);
	    } else {
		$this->Session->setFlash(__('No Billing Profiles Found!'));
		$this->redirect('/account/');
	    }
	} else {
	    // No Billing Profile
	    $this->Session->setFlash(__('Please Create A Billing Profile'));
	    $this->redirect('/account/createbillingprofile/');
	}
    }

    public function editbilling($id) {
	if($id != ''){
	    $data = array();
	    
	} else {
	    $this->Session->setFlash(__('Missing Billing Profile'));
	    $this->redirect('/account/');
	}
    }
    
    public function createbillingprofile(){
	if($this->Auth->user('authnet_profile') != 0){
	    $this->Session->setFlash(__('Profile Exists!'));
	    $this->redirect('/account/editbilling/');
	}
	if ($this->request->is('post')) {
	    // Billing Profile
	    $data['id'] = $this->Auth->user('id');
	    $data['email'] = $this->Auth->user('email');
	    $data['firstname'] = $this->request->data['Payment']['firstname'];
	    $data['lastname'] = $this->request->data['Payment']['lastname'];
	    $data['address'] = $this->request->data['Payment']['billing_address'];
	    $data['city'] = $this->request->data['Payment']['billing_city'];
	    $data['state'] = $this->request->data['Payment']['billing_state'];
	    $data['zip'] = $this->request->data['Payment']['billing_zip'];
	    $data['phone'] = $this->request->data['Payment']['phone'];
	    $data['ccnum'] = '4111111111111111';
	    $data['ccexpyr'] = '2014';
	    $data['ccexpmnth'] = '11';
	    $data['cvv'] = '123';

	    $cimresponse = $this->AuthNetXml->create_customer_profile_request($data);
	    if (!$cimresponse->isError()) {
		CakeLog::write('debug', 'CIM success');
		$update = array();
		$update['Account']['id'] = $this->Auth->user('id');
		$update['Account']['authnet_profile'] = $cimresponse->customerProfileId;
		$this->Account->create();
		if($this->Account->save($update)){
		    $this->Session->write('Auth', $this->User->read(null, $this->Auth->user('id')));
		    $this->Session->setFlash(__('Billing Profile Created'));
		    $this->redirect('/account/createbillingprofile/');
		}
	    } else {
		//echo $cimresponse->__toString();
		CakeLog::write('debug', $cimresponse->messages->resultCode . ' ' . $cimresponse->messages->message->code . ' ' . $cimresponse->customerProfileId . ' ' . $cimresponse->customerPaymentProfileIdList->numericString);
		$this->Session->setFlash(__('Error Creating The Billing Profile'));
		$this->redirect('/account/billingprofiles/');
	    }
	}
    }

    public function history() {
	$this->Paginator->settings = array(
	    'conditions' => array('Transaction.user_id' => $this->Auth->user('id')),
	    'limit' => 20
	);
	$data = $this->Paginator->paginate('Transaction');
	$this->set(compact('data'));
    }

    public function properties() {
	
    }

    public function addproperty() {
	
    }

    public function editproperty() {
	
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
    public function selectcounties() {
	if ($this->request->is('post')) {
	    
	} else {
	    $counties = $this->ZipData->getCountiesByState('FL', true);
	    $this->request->data['state'] = 'FL';
	    $this->request->data['counties'] = $counties;
	    $this->set('cty', $counties);
	}
    }

    // Billing Profile
    public function billingprofile() {
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

    public function finshregistration() {
	
    }
    /**
     *  End Registration Process Actions
     */
    
    
    /**
     *   Helper Functions
     */
    public function login() {
	if ($this->request->is('post')) {
	    if ($this->Auth->login()) {
		$this->redirect($this->Auth->redirect());
	    } else {
		echo '<pre>';
		print_r($this->Auth->user());
		//print_r($this->Auth);
		echo '</pre>';
		$this->Session->setFlash('Your username or password was incorrect.');
	    }
	}
    }

    public function logout() {
	$this->redirect($this->Auth->logout());
    }

    public function forgetpwd() {
	if ($this->request->is('post')) {
	    $account = $this->Account->find('first', array(
		'conditions' => array(
		    'Account.email' => $this->request->data['Account']['email']
		)
	    ));
	    if (count($account) > 0) {
		$data['id'] = $account['Account']['id'];
		$data['reset_code'] = md5($this->request->data['Account']['email'] . date('Y-m-d h:i:s'));

		if ($this->Account->save($data)) {
		    App::uses('CakeEmail', 'Network/Email');
		    $email = new CakeEmail();
		    $email->from(array('do-not-reply@leaguelaunch.com' => Configure::read('Settings.leaguename')))
			    ->config(array('host' => 'mail.leaguelaunch.com', 'port' => 25, 'username' => 'do-not-reply@leaguelaunch.com', 'password' => '87.~~?ZG}eI}', 'transport' => 'Smtp'))
			    ->sender(Configure::read('Settings.admin_email'))
			    ->replyTo(Configure::read('Settings.admin_email'))
			    ->cc(Configure::read('Settings.admin_email'))
			    ->to($account['Account']['email'])
			    ->subject(Configure::read('Settings.leaguename') . ' Password Reset')
			    ->template('forgot_passwd')
			    ->theme(Configure::read('Settings.theme'))
			    ->emailFormat('text')
			    ->viewVars(array('account' => $account, 'code' => $data['reset_code']))
			    ->send();
		}
	    }
	    $this->Session->setFlash(__('Check Your Email. If your in our system you should get an email.'), 'alerts/info');
	    $this->redirect(array('action' => 'resetcode'));
	}
    }

    public function resetcode() {
	$this->autoRender = false;
	$account = array();
	// From Form
	if ($this->request->is('post')) {
	    if ($this->request->data['Account']['code'] != '' && strlen($this->request->data['Account']['code']) == 32) {
		$account = $this->Account->find('first', array(
		    'conditions' => array(
			'Account.reset_code' => $this->request->data['Account']['code']
		    )
		));
	    }
	    if (isset($this->request->data['Account']['password']) && isset($this->request->data['Account']['confirm_password']) && isset($this->request->data['Account']['rstcode'])) {
		// We are restting the passwd
		if ($this->request->data['Account']['password'] == $this->request->data['Account']['confirm_password'] && $this->request->data['Account']['password'] != '') {
		    $account = $this->Account->find('first', array(
			'conditions' => array(
			    'Account.reset_code' => $this->request->data['Account']['rstcode']
			)
		    ));

		    $data['id'] = $account['Account']['id'];
		    $data['password'] = $this->request->data['Account']['password'];
		    $data['reset_code'] = '';

		    if ($this->Account->save($data)) {
			App::uses('CakeEmail', 'Network/Email');
			$email = new CakeEmail();
			$email->from(array('do-not-reply@leaguelaunch.com' => Configure::read('Settings.leaguename')))
				->config(array('host' => 'mail.leaguelaunch.com', 'port' => 25, 'username' => 'do-not-reply@leaguelaunch.com', 'password' => '87.~~?ZG}eI}', 'transport' => 'Smtp'))
				->sender(Configure::read('Settings.admin_email'))
				->replyTo(Configure::read('Settings.admin_email'))
				->cc(Configure::read('Settings.admin_email'))
				->to($account['Account']['email'])
				->subject(Configure::read('Settings.leaguename') . ' Password Changed')
				->template('passwd_changed')
				->theme(Configure::read('Settings.theme'))
				->emailFormat('text')
				->viewVars(array('account' => $account))
				->send();

			$this->Session->setFlash(__('Password Changed!'), 'alerts/success');
			$this->redirect('/login');
		    }
		} else {
		    $this->Session->setFlash('Passwords Do Not Match or Blank', 'alerts/error');
		    $this->redirect('/account/resetcode/?code=' . $this->request->data['Account']['rstcode']);
		}
	    }
	}
	// From Email Link
	if ($this->request->query['code'] != '' && strlen($this->request->query['code']) == 32) {
	    $account = $this->Account->find('first', array(
		'conditions' => array(
		    'Account.reset_code' => $this->request->query['code']
		)
	    ));
	}

	if (count($account) > 0) {
	    $this->set('code', $account['Account']['reset_code']);
	    $this->render('new_password');
	} else {
	    $this->render('entercode');
	}
    }

    public function isAuthorized($user) {
	if ($user['role'] == 'admin') {
	    return true;
	}
	if (in_array($this->action, array('edit', 'delete'))) {
	    if ($user['id'] != $this->request->params['pass'][0]) {
		return false;
	    }
	}
	return true;
    }

    public function gc() {
	if ($this->request->query['st'] != '') {
	    $counties = $this->ZipData->getCountiesByState($this->request->query['st'], true);

	    $this->set(compact('counties'));
	    $this->set('_serialize', array('counties'));
	}
    }

}
