<div class="row-fluid">
    <div class="box span12">
        <div class="box-header"></div>
        <div class="box-content">
            <?php
            echo $this->Form->create('Account', array(
                'inputDefaults' => array(
                    'div' => 'control-group',
                    'label' => array(
                        'class' => 'control-label'
                    ),
                    'wrapInput' => 'controls'
                ),
                'class' => 'well form-horizontal'
            ));
            
            echo $this->Form->input('firstname',array('label'=>'Firstname'));
            echo $this->Form->input('lastname',array('label'=>'Lastname'));
            echo $this->Form->input('email',array('label'=>'Email'));
            echo $this->Form->input('address',array('label'=>'Address'));
            echo $this->Form->input('address2',array('label'=>'Address2'));
            echo $this->Form->input('city',array('label'=>'City'));
            echo $this->Form->input('state',array('label'=>'State','options'=>  Configure::read('States')));
            echo $this->Form->input('zip',array('label'=>'Zip'));
            echo $this->Form->input('country',array('label'=>'Country','options'=>  Configure::read('Countries')));
            echo $this->Form->input('phone',array('label'=>'Phone'));
            ?>
        </div>
    </div>
</div>