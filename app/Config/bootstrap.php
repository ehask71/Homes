<?php

/**
 * This file is loaded automatically by the app/webroot/index.php file after core.php
 *
 * This file should load/create any application wide configuration settings, such as
 * Caching, Logging, loading additional configuration files.
 *
 * You should also use this file to include any files that provide global functions/constants
 * that your application uses.
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
 * @since         CakePHP(tm) v 0.10.8.2117
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
// Setup a 'default' cache configuration for use in the application.
Cache::config('default', array('engine' => 'File'));

/**
 * The settings below can be used to set additional paths to models, views and controllers.
 *
 * App::build(array(
 *     'Model'                     => array('/path/to/models/', '/next/path/to/models/'),
 *     'Model/Behavior'            => array('/path/to/behaviors/', '/next/path/to/behaviors/'),
 *     'Model/Datasource'          => array('/path/to/datasources/', '/next/path/to/datasources/'),
 *     'Model/Datasource/Database' => array('/path/to/databases/', '/next/path/to/database/'),
 *     'Model/Datasource/Session'  => array('/path/to/sessions/', '/next/path/to/sessions/'),
 *     'Controller'                => array('/path/to/controllers/', '/next/path/to/controllers/'),
 *     'Controller/Component'      => array('/path/to/components/', '/next/path/to/components/'),
 *     'Controller/Component/Auth' => array('/path/to/auths/', '/next/path/to/auths/'),
 *     'Controller/Component/Acl'  => array('/path/to/acls/', '/next/path/to/acls/'),
 *     'View'                      => array('/path/to/views/', '/next/path/to/views/'),
 *     'View/Helper'               => array('/path/to/helpers/', '/next/path/to/helpers/'),
 *     'Console'                   => array('/path/to/consoles/', '/next/path/to/consoles/'),
 *     'Console/Command'           => array('/path/to/commands/', '/next/path/to/commands/'),
 *     'Console/Command/Task'      => array('/path/to/tasks/', '/next/path/to/tasks/'),
 *     'Lib'                       => array('/path/to/libs/', '/next/path/to/libs/'),
 *     'Locale'                    => array('/path/to/locales/', '/next/path/to/locales/'),
 *     'Vendor'                    => array('/path/to/vendors/', '/next/path/to/vendors/'),
 *     'Plugin'                    => array('/path/to/plugins/', '/next/path/to/plugins/'),
 * ));
 *
 */
/**
 * Custom Inflector rules, can be set to correctly pluralize or singularize table, model, controller names or whatever other
 * string is passed to the inflection functions
 *
 * Inflector::rules('singular', array('rules' => array(), 'irregular' => array(), 'uninflected' => array()));
 * Inflector::rules('plural', array('rules' => array(), 'irregular' => array(), 'uninflected' => array()));
 *
 */
/**
 * Plugins need to be loaded manually, you can either load them one by one or all of them in a single call
 * Uncomment one of the lines below, as you need. make sure you read the documentation on CakePlugin to use more
 * advanced ways of loading plugins
 *
 * CakePlugin::loadAll(); // Loads all plugins at once
 * CakePlugin::load('DebugKit'); //Loads a single plugin named DebugKit
 *
 */
CakePlugin::load('DebugKit');
/**
 * You can attach event listeners to the request lifecycle as Dispatcher Filter . By Default CakePHP bundles two filters:
 *
 * - AssetDispatcher filter will serve your asset files (css, images, js, etc) from your themes and plugins
 * - CacheDispatcher filter will read the Cache.check configure variable and try to serve cached content generated from controllers
 *
 * Feel free to remove or add filters as you see fit for your application. A few examples:
 *
 * Configure::write('Dispatcher.filters', array(
 * 		'MyCacheFilter', //  will use MyCacheFilter class from the Routing/Filter package in your app.
 * 		'MyPlugin.MyFilter', // will use MyFilter class from the Routing/Filter package in MyPlugin plugin.
 * 		array('callable' => $aFunction, 'on' => 'before', 'priority' => 9), // A valid PHP callback type to be called on beforeDispatch
 * 		array('callable' => $anotherMethod, 'on' => 'after'), // A valid PHP callback type to be called on afterDispatch
 *
 * ));
 */
Configure::write('Dispatcher.filters', array(
    'AssetDispatcher',
    'CacheDispatcher'
));

/**
 * Configures default file logging options
 */
App::uses('CakeLog', 'Log');
CakeLog::config('debug', array(
    'engine' => 'FileLog',
    'types' => array('notice', 'info', 'debug'),
    'file' => 'debug',
));
CakeLog::config('error', array(
    'engine' => 'FileLog',
    'types' => array('warning', 'error', 'critical', 'alert', 'emergency'),
    'file' => 'error',
));

/**
 *   Config Section
 */
Configure::write('SitePrefix','CFH');
Configure::write('Authnet.apilogin', '6VckCd8562vT');
Configure::write('Authnet.txnkey', '22Fk7S5srmm7B57r');
Configure::write('Setupfee', 3500);

Configure::write('States', array(
    '' => 'Select State',
    'AL' => "Alabama",
    'AK' => "Alaska",
    'AZ' => "Arizona",
    'AR' => "Arkansas",
    'CA' => "California",
    'CO' => "Colorado",
    'CT' => "Connecticut",
    'DE' => "Delaware",
    'DC' => "District Of Columbia",
    'FL' => "Florida",
    'GA' => "Georgia",
    'HI' => "Hawaii",
    'ID' => "Idaho",
    'IL' => "Illinois",
    'IN' => "Indiana",
    'IA' => "Iowa",
    'KS' => "Kansas",
    'KY' => "Kentucky",
    'LA' => "Louisiana",
    'ME' => "Maine",
    'MD' => "Maryland",
    'MA' => "Massachusetts",
    'MI' => "Michigan",
    'MN' => "Minnesota",
    'MS' => "Mississippi",
    'MO' => "Missouri",
    'MT' => "Montana",
    'NE' => "Nebraska",
    'NV' => "Nevada",
    'NH' => "New Hampshire",
    'NJ' => "New Jersey",
    'NM' => "New Mexico",
    'NY' => "New York",
    'NC' => "North Carolina",
    'ND' => "North Dakota",
    'OH' => "Ohio",
    'OK' => "Oklahoma",
    'OR' => "Oregon",
    'PA' => "Pennsylvania",
    'RI' => "Rhode Island",
    'SC' => "South Carolina",
    'SD' => "South Dakota",
    'TN' => "Tennessee",
    'TX' => "Texas",
    'UT' => "Utah",
    'VT' => "Vermont",
    'VA' => "Virginia",
    'WA' => "Washington",
    'WV' => "West Virginia",
    'WI' => "Wisconsin",
    'WY' => "Wyoming"));

Configure::write('Bedrooms', array(
    '' => 'Choose',
    '0' => '0',
    '1' => '1',
    '2' => '2',
    '3' => '3',
    '4' => '4',
    '5' => '5',
    '6' => '6',
    '7' => '7',
    '8+' => '8+'
));

Configure::write('Bathrooms', array(
    '' => 'Choose',
    '0' => '0',
    '1' => '1',
    '1.5' => '1.5',
    '2' => '2',
    '2.5' => '2.5',
    '3' => '3',
    '3.5' => '3.5',
    '4' => '4',
    '4.5' => '4.5',
    '5' => '5',
    '5.5' => '5.5',
    '6' => '6',
    '6' => '6',
    '7' => '7',
    '7' => '7',
    '8+' => '8+'
));

Configure::write('PropertyTypes', array(
    '' => 'Select Type',
    'Single Family' => 'Single Family',
    'Multi-Family' => 'Multi-Family',
    'TownHouse' => 'TownHouse',
    'Condo' => 'Condo',
    'Triplex' => 'Triplex',
    'Duplex' => 'Duplex',
    'Mobile Home' => 'Mobile Home',
    'Mobile w/ Land' => 'Mobile w/ Land',
    'Timeshare' => 'Timeshare',
    'Land Only' => 'Land Only',
    'Other' => 'Other'
));

Configure::write('AskingPrice', array(
    '' => 'Select Range',
    'below $25,000.00' => 'below $25,000.00',
    '$25,000.00 - $50,000.00' => '$25,000.00 - $50,000.00',
    '$50,000.00 - $75,000.00' => '$50,000.00 - $75,000.00',
    '$75,000.00 - $100,000.00' => '$75,000.00 - $100,000.00',
    '$100,000.00 - $125,000.00' => '$100,000.00 - $125,000.00',
    '$125,000.00 - $150,000.00' => '$125,000.00 - $150,000.00',
    '$150,000.00 - $175,000.00' => '$150,000.00 - $175,000.00',
    '$175,000.00 - $200,000.00' => '$175,000.00 - $200,000.00',
    '$200,000.00 - $225,000.00' => '$200,000.00 - $225,000.00',
    '$225,000.00 - $250,000.00' => '$225,000.00 - $250,000.00',
    '$250,000.00 - $275,000.00' => '$250,000.00 - $275,000.00',
    '$275,000.00 - $300,000.00' => '$275,000.00 - $300,000.00',
    '$300,000.00 - $325,000.00' => '$300,000.00 - $325,000.00',
    '$325,000.00 - $350,000.00' => '$325,000.00 - $350,000.00',
    '$350,000.00 - $375,000.00' => '$350,000.00 - $375,000.00',
    '$375,000.00 - $400,000.00' => '$375,000.00 - $400,000.00',
    '$400,000.00 - $425,000.00' => '$400,000.00 - $425,000.00',
    '$425,000.00 - $450,000.00' => '$425,000.00 - $450,000.00',
    '$450,000.00 - $475,000.00' => '$450,000.00 - $475,000.00',
    '$475,000.00 - $500,000.00' => '$475,000.00 - $500,000.00',
    '$500,000.00 - $525,000.00' => '$500,000.00 - $525,000.00',
    '$525,000.00 - $550,000.00' => '$525,000.00 - $550,000.00',
    '$550,000.00 - $575,000.00' => '$550,000.00 - $575,000.00',
    '$575,000.00 - $600,000.00' => '$575,000.00 - $600,000.00',
    '$600,000.00 - $625,000.00' => '$600,000.00 - $625,000.00',
    '$625,000.00 - $650,000.00' => '$625,000.00 - $650,000.00',
    '$650,000.00 - $675,000.00' => '$650,000.00 - $675,000.00',
    '$675,000.00 - $700,000.00' => '$675,000.00 - $700,000.00',
    '$700,000.00 - $725,000.00' => '$700,000.00 - $725,000.00',
    '$725,000.00 - $750,000.00' => '$725,000.00 - $750,000.00',
    '$750,000.00 - $775,000.00' => '$750,000.00 - $775,000.00',
    '$775,000.00 - $800,000.00' => '$775,000.00 - $800,000.00',
    '$800,000.00 - $825,000.00' => '$800,000.00 - $825,000.00',
    '$825,000.00 - $850,000.00' => '$825,000.00 - $850,000.00',
    '$850,000.00 - $875,000.00' => '$850,000.00 - $875,000.00',
    '$875,000.00 - $900,000.00' => '$875,000.00 - $900,000.00',
    '$900,000.00 - $925,000.00' => '$900,000.00 - $925,000.00',
    '$925,000.00 - $950,000.00' => '$925,000.00 - $950,000.00',
    '$950,000.00 - $975,000.00' => '$950,000.00 - $975,000.00',
    '$975,000.00 - $1,000,000.00' => '$975,000.00 - $1,000,000.00',
    '$1,000,000.00 - $1,025,000.00' => '$1,000,000.00 - $1,025,000.00',
    '$1,025,000.00 - $1,050,000.00' => '$1,025,000.00 - $1,050,000.00',
    '$1,050,000.00 - $1,075,000.00' => '$1,050,000.00 - $1,075,000.00',
    '$1,075,000.00 - $1,100,000.00' => '$1,075,000.00 - $1,100,000.00',
    '$1,100,000.00 - $1,125,000.00' => '$1,100,000.00 - $1,125,000.00',
    '$1,125,000.00 - $1,150,000.00' => '$1,125,000.00 - $1,150,000.00',
    '$1,150,000.00 - $1,175,000.00' => '$1,150,000.00 - $1,175,000.00',
    '$1,175,000.00 - $1,200,000.00' => '$1,175,000.00 - $1,200,000.00',
    '$1,200,000.00 - $1,225,000.00' => '$1,200,000.00 - $1,225,000.00',
    '$1,225,000.00 - $1,250,000.00' => '$1,225,000.00 - $1,250,000.00',
    '$1,250,000.00 - $1,275,000.00' => '$1,250,000.00 - $1,275,000.00',
    '$1,275,000.00 - $1,300,000.00' => '$1,275,000.00 - $1,300,000.00',
    '$1,300,000.00 - $1,325,000.00' => '$1,300,000.00 - $1,325,000.00',
    '$1,325,000.00 - $1,350,000.00' => '$1,325,000.00 - $1,350,000.00',
    '$1,350,000.00 - $1,375,000.00' => '$1,350,000.00 - $1,375,000.00',
    '$1,375,000.00 - $1,400,000.00' => '$1,375,000.00 - $1,400,000.00',
    '$1,400,000.00 - $1,425,000.00' => '$1,400,000.00 - $1,425,000.00',
    '$1,425,000.00 - $1,450,000.00' => '$1,425,000.00 - $1,450,000.00',
    '$1,450,000.00 - $1,475,000.00' => '$1,450,000.00 - $1,475,000.00',
    '$1,475,000.00 - $1,500,000.00' => '$1,475,000.00 - $1,500,000.00',
    '$1,500,000.00 - $1,525,000.00' => '$1,500,000.00 - $1,525,000.00',
    '$1,525,000.00 - $1,550,000.00' => '$1,525,000.00 - $1,550,000.00',
    '$1,550,000.00 - $1,575,000.00' => '$1,550,000.00 - $1,575,000.00',
    '$1,575,000.00 - $1,600,000.00' => '$1,575,000.00 - $1,600,000.00',
    '$1,600,000.00 - $1,625,000.00' => '$1,600,000.00 - $1,625,000.00',
    '$1,625,000.00 - $1,650,000.00' => '$1,625,000.00 - $1,650,000.00',
    '$1,650,000.00 - $1,675,000.00' => '$1,650,000.00 - $1,675,000.00',
    '$1,675,000.00 - $1,700,000.00' => '$1,675,000.00 - $1,700,000.00',
    '$1,700,000.00 - $1,725,000.00' => '$1,700,000.00 - $1,725,000.00',
    '$1,725,000.00 - $1,750,000.00' => '$1,725,000.00 - $1,750,000.00',
    '$1,750,000.00 - $1,775,000.00' => '$1,750,000.00 - $1,775,000.00',
    '$1,775,000.00 - $1,800,000.00' => '$1,775,000.00 - $1,800,000.00',
    '$1,800,000.00 - $1,825,000.00' => '$1,800,000.00 - $1,825,000.00',
    '$1,825,000.00 - $1,850,000.00' => '$1,825,000.00 - $1,850,000.00',
    '$1,850,000.00 - $1,875,000.00' => '$1,850,000.00 - $1,875,000.00',
    '$1,875,000.00 - $1,900,000.00' => '$1,875,000.00 - $1,900,000.00',
    '$1,900,000.00 - $1,925,000.00' => '$1,900,000.00 - $1,925,000.00',
    '$1,925,000.00 - $1,950,000.00' => '$1,925,000.00 - $1,950,000.00',
    '$1,950,000.00 - $1,975,000.00' => '$1,950,000.00 - $1,975,000.00',
    '$1,975,000.00 - $2,000,000.00' => '$1,975,000.00 - $2,000,000.00',
    '$2,000,000.00 - $2,025,000.00' => '$2,000,000.00 - $2,025,000.00',
    '$2,025,000.00 - $2,050,000.00' => '$2,025,000.00 - $2,050,000.00',
    '$2,050,000.00 - $2,075,000.00' => '$2,050,000.00 - $2,075,000.00',
    '$2,075,000.00 - $2,100,000.00' => '$2,075,000.00 - $2,100,000.00',
    '$2,100,000.00 - $2,125,000.00' => '$2,100,000.00 - $2,125,000.00',
    '$2,125,000.00 - $2,150,000.00' => '$2,125,000.00 - $2,150,000.00',
    '$2,150,000.00 - $2,175,000.00' => '$2,150,000.00 - $2,175,000.00',
    '$2,175,000.00 - $2,200,000.00' => '$2,175,000.00 - $2,200,000.00',
    '$2,200,000.00 - $2,225,000.00' => '$2,200,000.00 - $2,225,000.00',
    '$2,225,000.00 - $2,250,000.00' => '$2,225,000.00 - $2,250,000.00',
    '$2,250,000.00 - $2,275,000.00' => '$2,250,000.00 - $2,275,000.00',
    '$2,275,000.00 - $2,300,000.00' => '$2,275,000.00 - $2,300,000.00',
    '$2,300,000.00 - $2,325,000.00' => '$2,300,000.00 - $2,325,000.00',
    '$2,325,000.00 - $2,350,000.00' => '$2,325,000.00 - $2,350,000.00',
    '$2,350,000.00 - $2,375,000.00' => '$2,350,000.00 - $2,375,000.00',
    '$2,375,000.00 - $2,400,000.00' => '$2,375,000.00 - $2,400,000.00',
    '$2,400,000.00 - $2,425,000.00' => '$2,400,000.00 - $2,425,000.00',
    '$2,425,000.00 - $2,450,000.00' => '$2,425,000.00 - $2,450,000.00',
    '$2,450,000.00 - $2,475,000.00' => '$2,450,000.00 - $2,475,000.00',
    '$2,475,000.00 - $2,500,000.00' => '$2,475,000.00 - $2,500,000.00',
    '$2,500,000.00 - $2,525,000.00' => '$2,500,000.00 - $2,525,000.00',
    '$2,525,000.00 - $2,550,000.00' => '$2,525,000.00 - $2,550,000.00',
    '$2,550,000.00 - $2,575,000.00' => '$2,550,000.00 - $2,575,000.00',
    '$2,575,000.00 - $2,600,000.00' => '$2,575,000.00 - $2,600,000.00',
    '$2,600,000.00 - $2,625,000.00' => '$2,600,000.00 - $2,625,000.00',
    '$2,625,000.00 - $2,650,000.00' => '$2,625,000.00 - $2,650,000.00',
    '$2,650,000.00 - $2,675,000.00' => '$2,650,000.00 - $2,675,000.00',
    '$2,675,000.00 - $2,700,000.00' => '$2,675,000.00 - $2,700,000.00',
    '$2,700,000.00 - $2,725,000.00' => '$2,700,000.00 - $2,725,000.00',
    '$2,725,000.00 - $2,750,000.00' => '$2,725,000.00 - $2,750,000.00',
    '$2,750,000.00 - $2,775,000.00' => '$2,750,000.00 - $2,775,000.00',
    '$2,775,000.00 - $2,800,000.00' => '$2,775,000.00 - $2,800,000.00',
    '$2,800,000.00 - $2,825,000.00' => '$2,800,000.00 - $2,825,000.00',
    '$2,825,000.00 - $2,850,000.00' => '$2,825,000.00 - $2,850,000.00',
    '$2,850,000.00 - $2,875,000.00' => '$2,850,000.00 - $2,875,000.00',
    '$2,875,000.00 - $2,900,000.00' => '$2,875,000.00 - $2,900,000.00',
    '$2,900,000.00 - $2,925,000.00' => '$2,900,000.00 - $2,925,000.00',
    '$2,925,000.00 - $2,950,000.00' => '$2,925,000.00 - $2,950,000.00',
    '$2,950,000.00 - $2,975,000.00' => '$2,950,000.00 - $2,975,000.00',
    '$2,975,000.00 - $3,000,000.00' => '$2,975,000.00 - $3,000,000.00',
    '$3,000,000.00 - $3,025,000.00' => '$3,000,000.00 - $3,025,000.00',
    '$3,025,000.00 - $3,050,000.00' => '$3,025,000.00 - $3,050,000.00',
    '$3,050,000.00 - $3,075,000.00' => '$3,050,000.00 - $3,075,000.00',
    '$3,075,000.00 - $3,100,000.00' => '$3,075,000.00 - $3,100,000.00',
    '$3,100,000.00 - $3,125,000.00' => '$3,100,000.00 - $3,125,000.00',
    '$3,125,000.00 - $3,150,000.00' => '$3,125,000.00 - $3,150,000.00',
    '$3,150,000.00 - $3,175,000.00' => '$3,150,000.00 - $3,175,000.00',
    '$3,175,000.00 - $3,200,000.00' => '$3,175,000.00 - $3,200,000.00',
    '$3,200,000.00 - $3,225,000.00' => '$3,200,000.00 - $3,225,000.00',
    '$3,225,000.00 - $3,250,000.00' => '$3,225,000.00 - $3,250,000.00',
    '$3,250,000.00 - $3,275,000.00' => '$3,250,000.00 - $3,275,000.00',
    '$3,275,000.00 - $3,300,000.00' => '$3,275,000.00 - $3,300,000.00',
    '$3,300,000.00 - $3,325,000.00' => '$3,300,000.00 - $3,325,000.00',
    '$3,325,000.00 - $3,350,000.00' => '$3,325,000.00 - $3,350,000.00',
    '$3,350,000.00 - $3,375,000.00' => '$3,350,000.00 - $3,375,000.00',
    '$3,375,000.00 - $3,400,000.00' => '$3,375,000.00 - $3,400,000.00',
    '$3,400,000.00 - $3,425,000.00' => '$3,400,000.00 - $3,425,000.00',
    '$3,425,000.00 - $3,450,000.00' => '$3,425,000.00 - $3,450,000.00',
    '$3,450,000.00 - $3,475,000.00' => '$3,450,000.00 - $3,475,000.00',
    '$3,475,000.00 - $3,500,000.00' => '$3,475,000.00 - $3,500,000.00',
    '$3,500,000.00 - $3,525,000.00' => '$3,500,000.00 - $3,525,000.00',
    '$3,525,000.00 - $3,550,000.00' => '$3,525,000.00 - $3,550,000.00',
    '$3,550,000.00 - $3,575,000.00' => '$3,550,000.00 - $3,575,000.00',
    '$3,575,000.00 - $3,600,000.00' => '$3,575,000.00 - $3,600,000.00',
    '$3,600,000.00 - $3,625,000.00' => '$3,600,000.00 - $3,625,000.00',
    '$3,625,000.00 - $3,650,000.00' => '$3,625,000.00 - $3,650,000.00',
    '$3,650,000.00 - $3,675,000.00' => '$3,650,000.00 - $3,675,000.00',
    '$3,675,000.00 - $3,700,000.00' => '$3,675,000.00 - $3,700,000.00',
    '$3,700,000.00 - $3,725,000.00' => '$3,700,000.00 - $3,725,000.00',
    '$3,725,000.00 - $3,750,000.00' => '$3,725,000.00 - $3,750,000.00',
    '$3,750,000.00 - $3,775,000.00' => '$3,750,000.00 - $3,775,000.00',
    '$3,775,000.00 - $3,800,000.00' => '$3,775,000.00 - $3,800,000.00',
    '$3,800,000.00 - $3,825,000.00' => '$3,800,000.00 - $3,825,000.00',
    '$3,825,000.00 - $3,850,000.00' => '$3,825,000.00 - $3,850,000.00',
    '$3,850,000.00 - $3,875,000.00' => '$3,850,000.00 - $3,875,000.00',
    '$3,875,000.00 - $3,900,000.00' => '$3,875,000.00 - $3,900,000.00',
    '$3,900,000.00 - $3,925,000.00' => '$3,900,000.00 - $3,925,000.00',
    '$3,925,000.00 - $3,950,000.00' => '$3,925,000.00 - $3,950,000.00',
    '$3,950,000.00 - $3,975,000.00' => '$3,950,000.00 - $3,975,000.00',
    '$3,975,000.00 - $4,000,000.00' => '$3,975,000.00 - $4,000,000.00',
    '$4,000,000.00 - $4,025,000.00' => '$4,000,000.00 - $4,025,000.00',
    '$4,025,000.00 - $4,050,000.00' => '$4,025,000.00 - $4,050,000.00',
    '$4,050,000.00 - $4,075,000.00' => '$4,050,000.00 - $4,075,000.00',
    '$4,075,000.00 - $4,100,000.00' => '$4,075,000.00 - $4,100,000.00',
    '$4,100,000.00 - $4,125,000.00' => '$4,100,000.00 - $4,125,000.00',
    '$4,125,000.00 - $4,150,000.00' => '$4,125,000.00 - $4,150,000.00',
    '$4,150,000.00 - $4,175,000.00' => '$4,150,000.00 - $4,175,000.00',
    '$4,175,000.00 - $4,200,000.00' => '$4,175,000.00 - $4,200,000.00',
    '$4,200,000.00 - $4,225,000.00' => '$4,200,000.00 - $4,225,000.00',
    '$4,225,000.00 - $4,250,000.00' => '$4,225,000.00 - $4,250,000.00',
    '$4,250,000.00 - $4,275,000.00' => '$4,250,000.00 - $4,275,000.00',
    '$4,275,000.00 - $4,300,000.00' => '$4,275,000.00 - $4,300,000.00',
    '$4,300,000.00 - $4,325,000.00' => '$4,300,000.00 - $4,325,000.00',
    '$4,325,000.00 - $4,350,000.00' => '$4,325,000.00 - $4,350,000.00',
    '$4,350,000.00 - $4,375,000.00' => '$4,350,000.00 - $4,375,000.00',
    '$4,375,000.00 - $4,400,000.00' => '$4,375,000.00 - $4,400,000.00',
    '$4,400,000.00 - $4,425,000.00' => '$4,400,000.00 - $4,425,000.00',
    '$4,425,000.00 - $4,450,000.00' => '$4,425,000.00 - $4,450,000.00',
    '$4,450,000.00 - $4,475,000.00' => '$4,450,000.00 - $4,475,000.00',
    '$4,475,000.00 - $4,500,000.00' => '$4,475,000.00 - $4,500,000.00',
    '$4,500,000.00 - $4,525,000.00' => '$4,500,000.00 - $4,525,000.00',
    '$4,525,000.00 - $4,550,000.00' => '$4,525,000.00 - $4,550,000.00',
    '$4,550,000.00 - $4,575,000.00' => '$4,550,000.00 - $4,575,000.00',
    '$4,575,000.00 - $4,600,000.00' => '$4,575,000.00 - $4,600,000.00',
    '$4,600,000.00 - $4,625,000.00' => '$4,600,000.00 - $4,625,000.00',
    '$4,625,000.00 - $4,650,000.00' => '$4,625,000.00 - $4,650,000.00',
    '$4,650,000.00 - $4,675,000.00' => '$4,650,000.00 - $4,675,000.00',
    '$4,675,000.00 - $4,700,000.00' => '$4,675,000.00 - $4,700,000.00',
    '$4,700,000.00 - $4,725,000.00' => '$4,700,000.00 - $4,725,000.00',
    '$4,725,000.00 - $4,750,000.00' => '$4,725,000.00 - $4,750,000.00',
    '$4,750,000.00 - $4,775,000.00' => '$4,750,000.00 - $4,775,000.00',
    '$4,775,000.00 - $4,800,000.00' => '$4,775,000.00 - $4,800,000.00',
    '$4,800,000.00 - $4,825,000.00' => '$4,800,000.00 - $4,825,000.00',
    '$4,825,000.00 - $4,850,000.00' => '$4,825,000.00 - $4,850,000.00',
    '$4,850,000.00 - $4,875,000.00' => '$4,850,000.00 - $4,875,000.00',
    '$4,875,000.00 - $4,900,000.00' => '$4,875,000.00 - $4,900,000.00',
    '$4,900,000.00 - $4,925,000.00' => '$4,900,000.00 - $4,925,000.00',
    '$4,925,000.00 - $4,950,000.00' => '$4,925,000.00 - $4,950,000.00',
    '$4,950,000.00 - $4,975,000.00' => '$4,950,000.00 - $4,975,000.00',
    '$4,975,000.00 - $5,000,000.00' => '$4,975,000.00 - $5,000,000.00',
    'Above $5,000,000.00' => 'Above $5,000,000.00'
));