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

    public function createInvoice($ordid,$setup=FALSE) {
        $order = new Order();
        $orderinfo = $order->find('first', array(
            'conditions' => array(
                'Order.id' => $ordid
            )
          )
        );
        $data = array();
        $data[$this->alias]['account_id'] = $orderinfo[$this->alias]['account_id'];
        $data[$this->alias]['order_id'] = $orderinfo[$this->alias]['order_id'];
        $data[$this->alias]['name'] = '';
        $data[$this->alias]['desc'] = '';
        $data[$this->alias]['total'] = '';
        $data[$this->alias]['paid'] = 0;
        // Add Items
        $i = 0;
        foreach($orderinfo['OrderItem'] AS $item){
            $data[$i]['InvoiceItem']['description'] = $item['name'];
            $data[$i]['InvoiceItem']['price'] = $item['price'];
            $i++;  
        }
        if($setup){
            $data[$i]['InvoiceItem']['description'] = 'Setup Fee';
            $data[$i]['InvoiceItem']['price'] = sprintf('%0.2f', (int) Configure::read('Setupfee'));
        }
        $this->saveAll($data);
    }

}
