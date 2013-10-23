<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	//Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
        Router::connect('/', array('controller' => 'home', 'action' => 'index'));
	Router::connect('/contact', array('controller' => 'home', 'action' => 'contact'));
	Router::connect('/why-us', array('controller' => 'home', 'action' => 'why'));
	Router::connect('/privacy', array('controller' => 'home', 'action' => 'privacy'));
	Router::connect('/terms', array('controller' => 'home', 'action' => 'terms'));
	Router::connect('/sitemap', array('controller' => 'seo', 'action' => 'sitemap'));
	Router::connect('/robots.txt', array('controller' => 'seo', 'action' => 'robots'));
	Router::connect('/sell', array('controller' => 'home', 'action' => 'sell'));
        Router::connect('/buy/',array('controller'=>'home','action'=>'buy'));
        Router::connect('/buy/:county-:state',array('controller'=>'home','action'=>'buy'),array('county'=>'[a-zA-Z0-9_-]+','state'=>'[a-zA-Z0-9_-]+'));

	// Registration Flow
	Router::connect('/register/personal-info', array('controller' => 'registration', 'action' => 'register'));
	Router::connect('/register/select-counties', array('controller' => 'registration', 'action' => 'select'));
	Router::connect('/register/billing-info', array('controller' => 'registration', 'action' => 'billing'));
	Router::connect('/register/finish', array('controller' => 'registration', 'action' => 'finsh'));
	
        // Login
        Router::connect('/login', array('controller' => 'account', 'action' => 'login'));
        Router::connect('/logout', array('controller' => 'account', 'action' => 'logout'));
/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
	Router::parseExtensions();
/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
