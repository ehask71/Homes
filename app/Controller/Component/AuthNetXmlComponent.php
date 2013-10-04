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
    
}
