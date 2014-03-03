<?php

class BillingShell extends AppShell {

    public $tasks = array('Notify','Invoice');

    public function main() {
        // Notify Customers 
        $this->out("Starting Billing Cron.....".$this->args[0]);

        if($this->args[0] == 'notify'){
            // Run Summary  cron ->  cd /home/ehask/public_html/vverify/app && Console/cake site summary 15
            $this->out("Running Notify Interval ".$this->args[1]);
            $this->Notify->execute($this->args[1]);
        }
        if($this->args[0] == 'generateInvoices'){
            //$this->Invoice->execute()
        }
        if($this->args[0] == 'billing'){
            // Bill Customers
        }
        
    }

}