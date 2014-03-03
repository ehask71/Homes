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
        $i=0;
        if(count($orders) > 0){
            foreach($orders AS $order){
                $this->Email = new CakeEmail();
                $this->Email->config('default');
                $this->Email->to(array('ehask71@gmail.com'=>'Eric Haskins'));
                $this->Email->subject(Configure::read('Sitename').' Billing Notification');
                $this->Email->emailFormat('text');
                $this->Email->template('billingnotify7');
                $this->Email->viewVars(array('order'=>$order));
                $this->Email->send();
                $this->out($order['Account']['firstname'].' '.$order['Account']['lastname']);
                $this->out('Order: '.$order['Order']['id']);
                $this->out('---> $'.$order['Order']['total']);
                $i++;
            }
        }
	if(Configure::read('NotifyAdmin') == 'true'){
            
        }
	return true;
    }

}

