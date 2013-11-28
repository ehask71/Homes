<div class="row-fluid">
    <div class="box span12">
        <div class="box-header">Edit Member</div>
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
            
            echo $this->Form->input('firstname');
            echo $this->Form->input('lastname');
            echo $this->Form->input('email');
            echo $this->Form->input('address');
            echo $this->Form->input('address2');
            echo $this->Form->input('city');
            echo $this->Form->input('state',array('options'=>  Configure::read('States')));
            echo $this->Form->input('zip');
            echo $this->Form->input('country',array('options'=>  Configure::read('Countries')));
            echo $this->Form->input('phone');
            ?>
        </div>
    </div>
</div>