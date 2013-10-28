<div class="span10">
    <div class="row">
	<div class="span6">
	    <?php
	    echo $this->Form->create(null, array(
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
	    <?php echo $this->Form->input('state', array('label' => 'Select A State', 'id' => 'state', 'options' => Configure::read('States'), 'onchange' => 'fetchCounties();')); ?>
	    <?php echo $this->Form->input('counties', array('label' => 'Select your Counties', 'id' => 'counties', 'multiple' => 'multiple', 'type' => 'select','options'=>$cty)); ?>
	    <?php echo $this->Form->end();?>
	</div>
	<div class="span6">
	    
	</div>
    </div>
</div>