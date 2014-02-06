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
        mail('ehask71@gmail.com','Test Invoice',print_r($orderinfo,1));
        $data = array();
        $data[$this->alias]['account_id'] = $orderinfo['Order']['account_id'];
        $data[$this->alias]['order_id'] = $orderinfo['Order']['id'];
        $data[$this->alias]['name'] = Configure::read('Sitename').' Invoice '.date('Y-m-d');
        $data[$this->alias]['description'] = '';
        $data[$this->alias]['total'] = $orderinfo['Order']['total'];
        $data[$this->alias]['paid'] = 0;
        // Add Items
        $i = 0;
        foreach($orderinfo['OrderItem'] AS $item){
            $data['InvoiceItem'][$i]['description'] = $item['name'];
            $data['InvoiceItem'][$i]['price'] = $item['price'];
            $i++;  
        }
        if($setup){
            $data['InvoiceItem'][$i]['description'] = 'Setup Fee';
            $data['InvoiceItem'][$i]['price'] = sprintf('%0.2f', (int) Configure::read('Setupfee'));
            // Fix Total
            $data[$this->alias]['total'] = ($data[$this->alias]['total'] + (int) Configure::read('Setupfee'));
        }
        
        mail('ehask71@gmail.com','Invoice Data', print_r($data,1));
        $this->saveAll($data, array('validate' => 'first'));
        $invoice_id = $this->getLastInsertID();
        
        return array('id'=>$invoice_id,'total'=>$data[$this->alias]['total']);
    }

}
