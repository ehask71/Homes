<?php

App::uses('Controller', 'Controller');


class AppController extends Controller {
    
    public $viewClass = 'Theme';
    public $theme = 'default';
    public $components = array('DebugKit.Toolbar');
    
    
}
