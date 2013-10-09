<h2>Register</h2>
<?php
echo $this->Form->create();
echo $this->Form->input('firstname',array('label'=>'First Name'));
echo $this->Form->input('lastname',array('label'=>'Last Name'));
echo $this->Form->input('address');
echo $this->Form->input('address2');
echo $this->Form->input('city');
echo $this->Form->input('state');
echo $this->Form->input('zip');
echo $this->Form->input('country',array('type'=>'select','options'=>Configure::read('States'),'style'=>'chzn-select'));
echo $this->Form->input('phone',array('type'=>'text'));
echo $this->Form->input('email');
echo $this->Form->input('password');
echo $this->Form->input('confirm_password');
echo $this->Form->input('agever',array('type'=>'checkbox','value'=>1,'label' =>'Are you over the age of 13'));
echo $this->Form->input('agreeterms',array('type'=>'checkbox','value'=>1,'label' => 'I agree to the <a href="/terms" target="_blank">Terms & Conditions</a>'));
echo $this->Form->end('Register');
?>