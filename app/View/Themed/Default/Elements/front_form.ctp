<?php
echo $this->Form->create('ZipCodes');
echo $this->Form->input('name');
echo $this->Form->input('phone');
echo $this->Form->input('email');
echo $this->Form->input('address');
echo $this->Form->end('SUBMIT');
?>