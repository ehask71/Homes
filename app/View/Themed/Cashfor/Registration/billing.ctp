<div class='row-fluid'>
    <div class="span8">
        <h2>Payment Info</h2>
        <?php
        $year = date('Y');
        $years[$year] = $year;
        for ($i = 1; $i <= 15; $i++) {
            $year = $year + $i;
            $years[$year] = $year;
        }
        echo $this->Form->create('Payment', array(
                'inputDefaults' => array(
                    'div' => 'control-group',
                    'label' => array(
                        'class' => 'control-label'
                    ),
                    'wrapInput' => 'controls'
                ),
                'class' => 'well form-horizontal'
            ));

        echo $this->Form->input('cardnum', array('label' => array('text'=>'Card Number','class'=>'control-label')));
        echo $this->Form->input('cvv', array('label' => array('class'=>'control-label','text'=>'CVV Code (on back)')));
        echo $this->Form->input('expmnth', array('label' => array('class'=>'control-label','text'=>'Exp Month'), 'options' => array(
                '01' => '01',
                '02' => '02',
                '03' => '03',
                '04' => '04',
                '05' => '05',
                '06' => '06',
                '07' => '07',
                '08' => '08',
                '09' => '09',
                '10' => '10',
                '11' => '11',
                '12' => '12')));
        echo $this->Form->input('expyear', array('label' => array('class'=>'control-label','text'=>'Exp Year'), 'options' => $years));
        echo $this->Form->input('firstname', array('label' => array('class'=>'control-label','text'=>'Firstname')));
        echo $this->Form->input('lastname', array('label' => array('class'=>'control-label','text'=>'Lastname')));
        echo $this->Form->input('email', array('value'=>$userinfo['email'],'label' => array('class'=>'control-label','text'=>'Email')));
        echo $this->Form->input('name', array('label' => array('class'=>'control-label','text'=>'Name This Profile (for your records)'),
            'value' => 'bpf_' . substr($userinfo['firstname'], 0, 1) . $userinfo['lastname'] . date('is')
        ));
        echo $this->Form->input('billing_company', array('label' => array('class'=>'control-label','text'=>'Company')));
        echo $this->Form->input('address', array('label' => array('class'=>'control-label','text'=>'Address')));
        echo $this->Form->input('city', array('label' => array('class'=>'control-label','text'=>'City')));
        echo $this->Form->input('state', array('label' => array('class'=>'control-label','text'=>'State'), 'options' => Configure::read('States')));
        echo $this->Form->input('zip', array('label' => array('class'=>'control-label','text'=>'Zip')));
        echo $this->Form->input('phone', array('label' => array('class'=>'control-label','text'=>'Phone')));
        echo $this->Form->input('comments', array('label' => array('class'=>'control-label','text'=>'Comment')));
        echo $this->Form->submit('Finish Registration',array('class'=> 'btn'));
        echo $this->Form->end();
        ?>
    </div>
    <div class="span4">
        
    </div>
</div>