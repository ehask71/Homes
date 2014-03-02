<?php

/* 
 * Copyright 2014 High Octane Brands LLC
 * You may not use this file unless you or your domain are properly
 * Licensed to do so.
 */
App::uses('Controller', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class NotifyTask extends Shell {

    public $uses = array('Order');
    
    public $Email = null;

    public function execute($interval=7) {
        $this->out($interval);
        $orders = $this->Order->find('all',array(
            'conditions' => array(
                'and' => array(
                'Order.status' => 1,
                'CURDATE() = DATE_SUB(nextbill, INTERVAL '.$interval.' DAY)')
            )
        ));
        
        if(count($orders) > 0){
            foreach($orders AS $order){
                $this->Email = new CakeEmail();
                $this->Email->to(array('ehask71@gmail.com'=>'Eric Haskins'));
                $this->Email->from(array('no-reply@cashforhomes.com'=> Configure::read('Sitename')));
                $this->Email->subject(Configure::read('Sitename').' Billing Notification');
                $this->Email->send(print_r($order,1));
                mail('ehask71@gmail.com','Test',  print_r($order,1));
                print_r($order);
            }
        }
	
	return true;
    }

}

