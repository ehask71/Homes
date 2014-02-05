<?php

/**
 * CakePHP Invoice
 * @author ehaskins
 */
App::uses('AppModel', 'Model');
App::uses('Order', 'Model');
App::uses('InvoiceItem', 'Model');

class Invoice extends AppModel {

    public $primaryKey = 'id';

    public function createInvoice($ordid,$setup=false) {
        $order = new Order();
        $orderinfo = $order->find('first', array(
            'conditions' => array(
                'Order.id' => $ordid
            )
          )
        );

        $data[$this->alias]['account_id'] = $orderinfo[$this->alias]['account_id'];
        $data[$this->alias]['order_id'] = $orderinfo[$this->alias]['order_id'];
        $data[$this->alias]['name'] = Configure::read('Sitename').' Invoice '.date('Y-m-d');
        $data[$this->alias]['desc'] = '';
        $data[$this->alias]['total'] = '';
        $data[$this->alias]['paid'] = 0;
        // Add Items
        foreach($orderinfo['OrderItem'] AS $item){
            
        }
        $this->saveAll($data);
    }

}
