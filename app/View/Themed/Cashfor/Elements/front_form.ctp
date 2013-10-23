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
echo $this->Form->input('ffname',array('label' => 'Firstname','class' => 'control-label'));
echo $this->Form->input('flname',array('label' => 'Lastname','class' => 'control-label'));
echo $this->Form->input('fphone',array('label' => 'Phone','class' => 'control-label'));
echo $this->Form->input('femail',array('label' => 'Email','class' => 'control-label'));
echo $this->Form->input('fzip',array('label' => 'Zip','class' => 'control-label'));
echo $this->Form->input('faddress',array('label' => 'Address','class' => 'control-label'));
echo $this->Form->end('SUBMIT');
?>