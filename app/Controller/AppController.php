<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {

    public $viewClass = 'Theme';
    public $theme = 'cashfor';
    public $helpers = array(
	'Session',
        'Auth',
	'Html' => array('className' => 'BoostCake.BoostCakeHtml'),
	'Form' => array('className' => 'BoostCake.BoostCakeForm'),
	'Paginator' => array('className' => 'BoostCake.BoostCakePaginator'),
    );
    public $components = array(
	'Session',
	'RequestHandler',
	'Auth' => array(
	    'authorize' => array('Tiny'),
	    'authenticate' => array(
		'all' => array('userModel' => 'Account'),
		'Form' => array(
		    'fields' => array('username' => 'email', 'password' => 'password'),
		    'scope' => array(
			'Account.is_active' => 'yes'
		    ),
		    'recursive' => 1,
		)),
	    'loginRedirect' => array('controller' => 'account', 'action' => 'index','professionals' => true),
	    'logoutRedirect' => array('/login'),
	    'loginAction' => '/login',
	    'flash' => array(
		'element' => 'alert',
		'key' => 'auth',
		'params' => array(
		    'plugin' => 'BoostCake',
		    'class' => 'alert-error'
		)
	    )
	),
	'DebugKit.Toolbar'
    );

    public function beforeFilter() {
	if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
	    $this->layout = 'admin';
	}
	if(isset($this->params['prefix']) && $this->params['prefix'] == 'professionals'){
	    $this->layout = 'professional';
	}
	$this->set('userinfo', $this->Auth->user());
	$this->set('loggedIn', $this->Auth->loggedIn());
    }
    
    public function beforeRender() {
        parent::beforeRender();
        
        // Load Popular Counties
        $route = Router::parse(Router::url( NULL, true ));
        if(!isset($route['prefix'])){
            $this->loadModel('ZipData');
            $popd = $this->ZipData->popularCounties();
            //$popd = shuffle($popd);
            $pop = '';
            foreach($popd AS $v){
                $pop .= '<a href="/buy/'.$v[0]['slug'].'">'.$v['ZipData']['county'].','.$v['ZipData']['state'].'</a>&nbsp;';
            }
            $this->set('popular_counties',$pop);
        }
        
    }

}
