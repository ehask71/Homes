<?php

/**
 * CakePHP Order
 * @author ehaskins
 */
App::uses('AppModel', 'Model');

class Order extends AppModel {

    public $primaryKey = 'id';
    public $hasMany = array('OrderItem');
    public $belongsTo = array('Account');

}
