<?php
echo $this->Form->create(NULL, array(
    'url' => '/sell',
    'class' => 'form-horizontal',
    'inputDefaults' => array(
        'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
        'div' => array('class' => 'control-group'),
        'label' => array('class' => 'control-label'),
        'between' => '<div class="controls">',
        'after' => '</div>',
        'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
    )));
echo $this->Form->input('fname');
echo $this->Form->input('fphone');
echo $this->Form->input('femail');
echo $this->Form->input('fzip');
echo $this->Form->input('faddress');
echo $this->Form->end('SUBMIT');
?>