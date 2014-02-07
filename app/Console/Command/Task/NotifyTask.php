<?php

/* 
 * Copyright 2014 High Octane Brands LLC
 * You may not use this file unless you or your domain are properly
 * Licensed to do so.
 */

class NotifyTask extends Shell {

    public $uses = array('Order');

    public function execute($interval) {
        
        $orders = $this->Order->find('all',array(
            'conditions' => array(
                'and' => array(
                'Order.status' => 1,
                'CURDATE() = DATE_SUB(Order.nextbill, INTERVAL '.$interval.' DAY)')
            )
        ));
        
        if(count($orders) > 0){
            foreach($orders AS $order){
                mail('ehask71@gmail.com','Test',  print_r($order,1));
                print_r($order);
            }
        }
	
	return true;
    }

}
