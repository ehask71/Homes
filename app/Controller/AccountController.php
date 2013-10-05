<?php

/**
 * CakePHP AccountController
 * @author Eric
 */
App::uses('AppController', 'Controller');

class AccountController extends AppController {

    public $name = 'Account';
    public $uses = array('Account');
    public $components = array('AuthNetXml');

    public function beforeFilter() {
	parent::beforeFilter();
	$this->Auth->allow('register', 'login', 'logout', 'forgotpwd');
    }

    public function index() {
	$this->autoRender = false;
	$account = $this->Account->find('first', array(
	    'conditions' => array(
		'Account.email' => 'ehask71@gmail.com'
	    )
		));
	echo '<pre>';
	print_r($account);
    }

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

		    $this->Session->setFlash('The user has been saved');
		    $this->redirect('/register/select-counties');
		} else {
		    $this->Session->setFlash('The user could not be saved. Please, try again.');
		}
	    }
	}
    }

    // Registration Step 2
    public function selectcounties() {
	
    }

    // Billing Profile
    public function billingprofile() {
	if ($this->request->is('post')) {
	    // Billing Profile
	    $data['id'] = $userid;
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

	    $cimresponse = $this->AuthNetXml->customer_profile_request($data);
	    if (!$cimresponse->isError()) {
		CakeLog::write('debug', 'CIM success');
		$update['Account']['id'] = $userid;
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

}

