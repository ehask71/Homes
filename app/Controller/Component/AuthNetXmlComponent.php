<?php
/**
 * CakePHP AuthNetXmlComponent
 * @author Eric
 */
App::import('Vendor', 'Facebook', array('file' => 'Authnet' . DS . 'AuthNetXML.class.php'));
class AuthNetXmlComponent extends Component {

    public $components = array();

    public function __construct(\ComponentCollection $collection, $settings = array()) {
        $this->controller = $collection->getController();
        parent::__construct($collection, $settings);
    }

    public function initialize($controller) {
        
    }

    public function startup($controller) {
        
    }

    public function beforeRender($controller) {
        
    }

    public function shutDown($controller) {
        
    }

    public function beforeRedirect($controller, $url, $status = null, $exit = true) {
        
    }
    
    
    public function payment_profile_create($profileid,$data){
        
    }
    
    public function customer_profile_request($data){
        $xml = new AuthnetXML(Configure::read('Authnet.apilogin'), Configure::read('Authnet.txnkey'), AuthnetXML::USE_DEVELOPMENT_SERVER);
        $xml->createCustomerProfileRequest(array(
            'profile' => array(
		'merchantCustomerId' => Configure::read('SitePrefix').$data['id'],
		'email' => $data['email'],
		/*'paymentProfiles' => array(
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
		),*/
            ),
            'validationMode' => 'liveMode'
	));
        
        return $xml;
    }
}
