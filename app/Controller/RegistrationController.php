<?php

/**
 * CakePHP RegistrationController
 * @author Eric
 */
App::uses('AppController', 'Controller');

class RegistrationController extends AppController {

    public $name = 'Registration';
    public $uses = array('Account', 'Transaction', 'ZipData', 'Order', 'Invoice');
    public $components = array('AuthNetXml', 'Cart', 'Ontraport');
    public $helpers = array('Session');

    public function beforeFilter() {
	parent::beforeFilter();
	$this->Auth->allow('register', 'cartadd', 'cartclear', 'cartremove');
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

		    // Initial Contact Created in Ontraport Here
		    $ont = (integer) $this->Ontraport->add($this->request->data['Account'], $userid);

		    $this->Account->create();
		    $this->Account->id = $userid;
		    $this->Account->saveField('ontraport', $ont);

		    $this->request->data['Account']['ontraport'] = (integer) $ont;

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
	    $data['email'] = $this->request->data['Payment']['email'];
	    $data['firstname'] = $this->request->data['Payment']['firstname'];
	    $data['lastname'] = $this->request->data['Payment']['lastname'];
	    $data['address'] = $this->request->data['Payment']['address'];
	    $data['city'] = $this->request->data['Payment']['city'];
	    $data['state'] = $this->request->data['Payment']['state'];
	    $data['zip'] = $this->request->data['Payment']['zip'];
	    $data['phone'] = $this->request->data['Payment']['phone'];
	    $data['ccnum'] = $this->request->data['Payment']['cardnum'];
	    $data['ccexpyr'] = $this->request->data['Payment']['expyear'];
	    $data['ccexpmnth'] = $this->request->data['Payment']['expmnth'];
	    $data['cvv'] = $this->request->data['Payment']['cvv'];

	    $cimresponse = $this->AuthNetXml->create_customer_full_profile_request($data);
	    if ($cimresponse) {
		CakeLog::write('debug', 'CIM success');
		$update['Account']['id'] = $this->Auth->user('id');
		$update['Account']['authnet_profile'] = $cimresponse['profileId'];
		$update['Account']['authnet_payment'] = $cimresponse['paymentId'];
		$this->Session->write('Billing', $data);
		$this->Session->write('Billing.ccnum', 'XXXX-XXXX-XXXX-' . substr($data['ccnum'], -4));
		$this->Account->create();
		$this->Account->save($update);
		// Change Ontraport
		$this->Ontraport->add_tag($this->Auth->user('ontraport'), array('#1 Billing Info'));
		$this->redirect('/register/review');
	    } else {
		$this->Session->setFlash(__('There there was a problem creating your billing profile. Please try again.'), 'alert', array(
		    'plugin' => 'BoostCake',
		    'class' => 'alert-error'
		));
		$this->redirect('/register/billing-info');
	    }
	}
    }

    public function review() {
	$shop = $this->Session->read('Shop');
	if ($this->request->is('post')) {
	    // We are charging them Now
	    $user = $this->Auth->user();
	    $account = $this->Account->find('first', array(
                'recursive' => -1,
		'conditions' => array(
		    'Account.id' => $user['id']
		)
	    ));

	    if (count($account) > 0 && $shop['Order']['total'] != '0.00') {
		// Ready to rock
		$shop['Order']['status'] = 1;
		$shop['Order']['site_id'] = 0;
		$shop['Order']['account_id'] = $account['Account']['id'];
		$shop['Order']['nextbill'] = date('Y-m-d');
		$zips = array_keys($shop['OrderItem']);


		if ($this->Order->saveAll($shop, array('validate' => 'first'))) {
		    // Lets Add the Invoice
		    $orderid = $this->Order->getLastInsertID();

		    $invoice = $this->Invoice->createInvoice($orderid, TRUE);

		    $data = array();
		    $data['amount'] = sprintf('%0.2f', $invoice['total']);
		    $data['invoice'] = $invoice['id'];
		    $data['authnet_profile'] = $account['Account']['authnet_profile'];
		    $data['authnet_payment'] = $account['Account']['authnet_payment'];

		    $cim = $this->AuthNetXml->createCustomerProfileTransactionRequest($data);
		    mail('ehask71@gmail.com', 'AuthNet Results', print_r($cim, 1));
		    if ($cim) {
			$response = explode(",", (string) $cim);
			$this->Invoice->create();
			$indata = array();
			$indata['id'] = $invoice['id'];
			$indata['auth'] = $response[4];
			$indata['txnid'] = $response[6];
			$indata['paid'] = 1;
			$this->Invoice->save($indata);
			
			//Update Next Invoice Date
			$this->Order->query("UPDATE orders SET nextbill = DATE_ADD(nextbill, INTERVAL 1 MONTH) WHERE id='".$orderid."'");
			
			// Add Zips to Account
			$this->loadModel('Accountzip');
			$this->Accountzip->addZip2Account($user['id'],$zips);
			// Change Ontraport
			$this->Ontraport->add_tag($user['ontraport'], array('#1 Sales'));
                        // Clear the Cart
                        $this->Cart->clear();
			// YAY Redirect to Finish
			$this->redirect('/register/finish');
		    } else {
			$this->Session->setFlash(__('There there was a problem charging your card. Please try again.'), 'alert', array(
			    'plugin' => 'BoostCake',
			    'class' => 'alert-error'
			));
			$this->redirect('/register/review');
		    }
		}
	    }
	}
	$this->set('shop', $shop);
    }

    public function finish() {
	
    }

    /**
     *  End Registration Process Actions
     */
    public function cartadd() {
	if ($this->request->is('post')) {
	    $this->Cart->add($this->request->data['id']);
	}
	$this->set('cart', $this->Session->read('Shop'));
	$this->set('_serialize', array('cart'));
    }

    public function cartremove() {
	if ($this->request->is('post')) {
	    $this->Cart->remove($this->request->data['id']);
	}
	$this->set('cart', $this->Session->read('Shop'));
	$this->set('_serialize', array('cart'));
    }

    public function cartclear() {
	$this->Cart->clear();
	$this->set('cart', $this->Session->read('Shop'));
	$this->set('_serialize', array('cart'));
    }

}
