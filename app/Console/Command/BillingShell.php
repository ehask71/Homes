<?php

class BillingShell extends AppShell {

    public $tasks = array('Notify');

    public function main() {
        // Notify Customers 
        echo "Starting Billing Cron.....\n";
        mail('ehask71@gmail.com','Test', 'Testing Cron '.$this->args[1]);
        if($this->args[0] == 'notify'){
            // Run Summary  cron ->  cd /home/ehask/public_html/vverify/app && Console/cake site summary 15
            echo 'Running Notify Interval '.$this->args[1]."\n";
            $this->Notify->execute($this->args[1]);

        }
        if($this->args[0] == 'generateInvoices'){
            
        }
        
    }

}