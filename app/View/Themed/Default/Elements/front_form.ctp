<?php
echo $this->Form->create(NULL,array('url'=>'/sell'));
echo $this->Form->input('fname');
echo $this->Form->input('fphone');
echo $this->Form->input('femail');
echo $this->Form->input('fzip');
echo $this->Form->input('faddress');
echo $this->Form->end('SUBMIT');
?>