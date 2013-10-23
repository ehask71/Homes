<?php
echo $this->Form->create(NULL, array(
    'url' => '/sell',
    'class' => 'form-horizontal',
    'inputDefaults' => array(
	'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
	'div' => array('class' => 'control-group'),
	'label' => array('class' => 'control-label'),
	'class' => array('class' => 'span12'),
	'between' => '<div class="controls">',
	'after' => '</div>',
	'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
)));
echo $this->Form->input('ffname', array('label' => array('text' => 'Firstname', 'class' => 'control-label')));
echo $this->Form->input('flname', array('label' => array('text' => 'Lastname', 'class' => 'control-label')));
echo $this->Form->input('fphone', array('label' => array('text' => 'Phone', 'class' => 'control-label')));
echo $this->Form->input('femail', array('label' => array('text' => 'Email', 'class' => 'control-label')));
echo $this->Form->input('fzip', array('label' => array('text' => 'Zip', 'class' => 'control-label')));
echo $this->Form->input('faddress', array('label' => array('text' => 'Address', 'class' => 'control-label')));
?>
<div class="btn-group">
    <button type="submit" name="submit" class="big-btn"><span>Submit</span></button>
</div>
<?php
echo $this->Form->end();
?>