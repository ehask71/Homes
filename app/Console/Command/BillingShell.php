<?php

class BillingShell extends AppShell {

    //public $tasks = array('Summarize');

    public function main() {
        if($this->args[0] == 'summary'){
            // Run Summary  cron ->  cd /home/ehask/public_html/vverify/app && Console/cake site summary 15
            $this->Summarize->execute($this->args[1]);
	    // WTF
	    //mail('ehask71@gmail.com','Summarize','Summary Completed @ '.date('Y m d H:i:s'));
        }
    }

}