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
            ?>
            <fieldset>
                <?php
                echo $this->Form->input('id',array('type'=>'hidden'));
                echo $this->Form->input('firstname');
                echo $this->Form->input('lastname');
                echo $this->Form->input('email');
                echo $this->Form->input('address');
                echo $this->Form->input('address2');
                echo $this->Form->input('city');
                echo $this->Form->input('state', array('options' => Configure::read('States')));
                echo $this->Form->input('zip');
                echo $this->Form->input('country', array('options' => Configure::read('Countries')));
                echo $this->Form->input('phone');
                echo $this->Form->input('password');
                echo $this->Form->input('confirm_password',array('label'=>array('text'=>'Confirm Password','class'=>'control-label')));
                ?>
                <div class="form-actions">
                    <?php echo $this->Form->submit('Save', array('class' => 'btn btn-primary')); ?>
                </div>
            </fieldset>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</div>