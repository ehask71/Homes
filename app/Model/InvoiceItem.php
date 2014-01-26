<?php
/**
 * CakePHP InvoiceItem
 * @author ehaskins
 */
App::uses('AppModel', 'Model');

class InvoiceItem  extends AppModel {
    public $primaryKey = 'id';   
    
    public $belongsTo = array('Invoice');
    
}

