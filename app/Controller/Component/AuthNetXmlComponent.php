<?php

/**
 * CakePHP AuthNetXmlComponent
 * @author Eric
 */
App::import('Vendor', 'Authnet', array('file' => 'Authnet' . DS . 'AuthNetXml.class.php'));

class AuthNetXmlComponent extends Component {

    public $components = array();
    public $xml = null;
    public $validationMode = 'testMode'; //'liveMode';
    private $server = AuthnetXML::USE_DEVELOPMENT_SERVER;

    public function __construct(\ComponentCollection $collection, $settings = array()) {
	$this->controller = $collection->getController();
	parent::__construct($collection, $settings);
    }

    public function initialize(Controller $controller) {
	
    }

    public function startup(Controller $controller) {
	
    }

    public function payment_profile_create($profileid, $data) {
	
    }

    public function create_customer_profile_request($data) {
	$xml = new AuthnetXML(Configure::read('Authnet.apilogin'), Configure::read('Authnet.txnkey'), $this->server);
	$xml->createCustomerProfileRequest(array(
	    'profile' => array(
		'merchantCustomerId' => Configure::read('SitePrefix') . $data['id'],
		'email' => $data['email']
	    ),
	    'validationMode' => $this->validationMode
	));
	if (!$xml->isError()) {
	    return $xml->customerProfileId;
	}
	return false;
    }

    public function create_customer_full_profile_request($data) {
	$xml = new AuthnetXML(Configure::read('Authnet.apilogin'), Configure::read('Authnet.txnkey'), $this->server);
	$xml->createCustomerProfileRequest(array(
	    'profile' => array(
		'merchantCustomerId' => Configure::read('SitePrefix') . $data['id'],
		'email' => $data['email'],
		'paymentProfiles' => array(
		    'billTo' => array(
			'firstName' => $data['firstname'],
			'lastName' => $data['lastname'],
			'address' => $data['address'],
			'city' => $data['city'],
			'state' => $data['state'],
			'zip' => $data['zip'],
			'phoneNumber' => $data['phone']
		    ),
		    'payment' => array(
			'creditCard' => array(
			    'cardNumber' => $data['ccnum'],
			    'expirationDate' => $data['ccexpyr'] . '-' . $data['ccexpmnth'],
			    'cardCode' => $data['cvv']
			),
		    ),
		)
	    ),
	    'validationMode' => $this->validationMode
	));
	if (!$xml->isError()) {
	    //CakeLog::write('debug', $xml->messages->resultCode . ' ' . $xml->messages->message->code . ' ' . $xml->customerProfileId . ' ' . $xml->customerPaymentProfileIdList->numericString);
	    return array('profileId' => $xml->customerProfileId, 'paymentId' => $xml->customerPaymentProfileIdList->numericString);
	}
	CakeLog::write('debug', $xml->messages->resultCode . ' ' . $xml->messages->message->code . ' ' . $xml->customerProfileId . ' ' . $xml->customerPaymentProfileIdList->numericString);
	return false;
    }

    public function create_billing_profile($data) {
	$xml = new AuthnetXML(Configure::read('Authnet.apilogin'), Configure::read('Authnet.txnkey'), $this->server);
	$xml->createCustomerProfileRequest(array(
	    'paymentProfiles' => array(
		'billTo' => array(
		    'firstName' => $data['firstname'],
		    'lastName' => $data['lastname'],
		    'address' => $data['address'],
		    'city' => $data['city'],
		    'state' => $data['state'],
		    'zip' => $data['zip'],
		    'phoneNumber' => $data['phone']
		),
		'payment' => array(
		    'creditCard' => array(
			'cardNumber' => $data['ccnum'],
			'expirationDate' => $data['ccexpyr'] . '-' . $data['ccexpmnth'],
			'cardCode' => $data['cvv']
		    ),
		),
	    ),
	    'validationMode' => 'testMode'
	));

	return $xml;
    }

    public function createCustomerProfileTransactionRequest($data) {
	$xml = new AuthNetXml(Configure::read('Authnet.apilogin'), Configure::read('Authnet.txnkey'), $this->server);
	$xml->createCustomerProfileTransactionRequest(array(
	    'transaction' => array(
		'profileTransAuthCapture' => array(
		    'amount' => $data['amount'],
		    'customerProfileId' => $data['authnet_profile'],
		    'customerPaymentProfileId' => $data['authnet_payment'],
		    'order' => array(
			'invoiceNumber' => $data['invoice'],
			'description' => @$data['description']
		    )
		),
	)));
	
	if (!$xml->isError()) {
	    return $xml->directResponse;
	}
	
	CakeLog::write('debug', $xml->messages->resultCode . ' ' . $xml->messages->message->code . ' ' . $xml->customerProfileId . ' ' . $xml->customerPaymentProfileIdList->numericString);
	return false;
    }

    public function get_customer_profile($data) {
	$xml = new AuthnetXML(Configure::read('Authnet.apilogin'), Configure::read('Authnet.txnkey'), $this->server);
	$xml->getCustomerProfileRequest(array(
	    'customerProfileId' => $data['customerProfileId']
	));

	return $xml;
    }

    public function get_customer_profile_ids($data) {
	$xml = new AuthnetXML(Configure::read('Authnet.apilogin'), Configure::read('Authnet.txnkey'), $this->server);
	$xml->getCustomerProfileIdsRequest(array());

	return $xml;
    }

}
