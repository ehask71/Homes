<?php

/* 
 * Copyright 2014 High Octane Brands LLC
 * You may not use this file unless you or your domain are properly
 * Licensed to do so.
 */
App::import('Vendor', 'Authnet', array('file' => 'Authnet' . DS . 'AuthNetXml.class.php'));

class BillingTask extends Shell {
    
    public $uses = array('Invoice');
    
    public function execute() {
        $invoices = $this->Invoice-find('all',array(
            'conditions' => array(
                'Invoice.duedate' => date('Y-m-d'),
                'Invoice.paid' => 0
            )
        ));
        
        if(count($invoices) > 0){
            foreach ($invoices AS $invoice){
                
            }
        }
    }
    
}
