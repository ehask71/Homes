<div class="span10">
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
	<legend>Edit Profile</legend>
    <?php echo $this->Form->input('firstname', array('label' => 'Firstname')); ?>
    <?php echo $this->Form->input('lastname', array('label' => 'Lastname')); ?>
    <?php echo $this->Form->input('email', array('label' => 'Email')); ?>
    <?php echo $this->Form->input('phone', array('label' => 'Phone')); ?>
    <?php echo $this->Form->input('address', array('label' => 'Address')); ?>
    <?php echo $this->Form->input('address2', array('label' => 'Address 2')); ?>
    <?php echo $this->Form->input('city', array('label' => 'City')); ?>
    <?php echo $this->Form->input('state', array('label' => 'State', 'type' => 'select', 'options' => Configure::read('States'))); ?>
    <?php echo $this->Form->input('zip', array('label' => 'Zip')); ?>
    <?php echo $this->Form->input('country', array('label' => 'Country', 'type' => 'select', 'options' => Configure::read('Countries'))); ?>
    <?php echo $this->Form->submit('Update Profile', array(
			'class' => 'btn'
		));?>
    <?php echo $this->Form->input('id', array('type' => 'hidden')); ?>
    </fieldset>
    <?php echo $this->Form->end(); ?>
</div>