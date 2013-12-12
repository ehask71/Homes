<?php
/**
 * CakePHP AuthNetXmlComponent
 * @author Eric
 */
App::import('Vendor', 'Authnet', array('file' => 'Authnet' . DS . 'AuthNetXml.class.php'));
class AuthNetXmlComponent extends Component {

    public $components = array();
    
    public $xml = null;
    
    private $server = AuthnetXML::USE_DEVELOPMENT_SERVER;

    public function __construct(\ComponentCollection $collection, $settings = array()) {
        $this->controller = $collection->getController();
        parent::__construct($collection, $settings);
    }

    public function initialize(Controller $controller) {
        
    }

    public function startup(Controller $controller) {
        
    }

    public function beforeRender(Controller $controller) {
        
    }

    public function shutDown(Controller $controller) {
        
    }

    public function beforeRedirect(Controller $controller, $url, $status = null, $exit = true) {
        
    }
    
    
    public function payment_profile_create($profileid,$data){
        
    }
    
    public function create_customer_profile_request($data){
        $xml = new AuthnetXML(Configure::read('Authnet.apilogin'), Configure::read('Authnet.txnkey'), $this->server);
        $xml->createCustomerProfileRequest(array(
            'profile' => array(
		'merchantCustomerId' => Configure::read('SitePrefix').$data['id'],
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
                                'expirationDate' => $data['ccexpyr'].'-'.$data['ccexpmnth'],
                                'cardCode' => $data['cvv']
                            ),
			),
		),
            ),
            'validationMode' => 'testMode'
	));
        
        return $xml;
    }
    
    public function get_customer_profile($data){
        $xml = new AuthnetXML(Configure::read('Authnet.apilogin'), Configure::read('Authnet.txnkey'), $this->server);
	$xml->getCustomerProfileRequest(array(
	    'customerProfileId' => $data['customerProfileId']
	));
	
	return $xml;
    }
}
