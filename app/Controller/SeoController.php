<?php
/**
 * CakePHP SeoController
 * @author Eric
 */
App::uses('AppController', 'Controller');

class SeoController extends AppController {
    
    public $name = 'Seo';
    
    public function beforeFilter() {
	parent::beforeFilter();
	$this->Auth->allow();
    }
    
    public function index(){
        
    }
    
    public function sitemap(){
	
    }
    
    public function robots(){
	$this->autoRender = false;
	echo "# robots.txt generated by http://www.highoctanebrands.com \r\n";
	echo "User-agent: * \r\n";
	echo "Disallow:  \r\n";
	echo "Crawl-delay: 5 \r\n";
	echo "Disallow: /cgi-bin/ \r\n";
	echo "Disallow: /admin/ \r\n";
	echo "Sitemap: http://".$_SERVER['SERVER_NAME']."/sitemap \r\n";
    }
    
}
