<?php

/* 
 * Copyright 2014 High Octane Brands LLC
 * You may not use this file unless you or your domain are properly
 * Licensed to do so.
 */

class EmailConfig {

	/*public $default = array(
		'transport' => 'Smtp',
		'from' => array('do-not-reply@cashforhomes.com' => 'CashForHomes'),
		'host' => 'localhost',
		'port' => 25,
		'timeout' => 30,
		'username' => 'do-not-reply@rackspeed.net',
		'password' => '12131213',
		'client' => null,
		'log' => false,
		//'charset' => 'utf-8',
		//'headerCharset' => 'utf-8',
	);*/
        public $default = array(
            'from' => array('do-not-reply@leaguelaunch.com' => 'League Launch'),
            'host' => 'mail.leaguelaunch.com',
            'port' => 25,
            'username' => 'do-not-reply@leaguelaunch.com',
            'password' => '87.~~?ZG}eI}',
            'transport' => 'Smtp',
            'client' => null,
            'log' => false);
        /*
	public $default = array(
		'transport' => 'Mail',
		'from' => 'do-not-reply@cashforhomes.com',
		//'charset' => 'utf-8',
		//'headerCharset' => 'utf-8',
	); */

}