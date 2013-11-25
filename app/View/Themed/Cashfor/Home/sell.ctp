<div class='row'>
    <div class='span6'>
<h2>Sell</h2>
<?php 
echo $this->Form->create('Lead',array(
    'class' => 'form-horizontal',
    'inputDefaults' => array(
	'required' => false,
	'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
	'div' => array('class' => 'control-group'),
	'label' => array('class' => 'control-label'),
	'class' => array('class' => 'span12'),
	'between' => '<div class="controls">',
	'after' => '</div>',
	'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
)));
echo $this->Form->input('firstname',array('label' => array('text' => 'Firstname', 'class' => 'control-label')));
echo $this->Form->input('lastname',array('label' => array('text' => 'Lastname', 'class' => 'control-label')));
echo $this->Form->input('email',array('label' => array('text' => 'Email', 'class' => 'control-label')));
echo $this->Form->input('phone',array('label' => array('text' => 'Phone', 'class' => 'control-label')));
echo $this->Form->input('altphone',array('label' => array('text' => 'Alt Phone', 'class' => 'control-label')));
echo $this->Form->input('address',array('label' => array('text' => 'Address', 'class' => 'control-label')));
echo $this->Form->input('city',array('label' => array('text' => 'City', 'class' => 'control-label')));
echo $this->Form->input('state',array('label' => array('text' => 'State', 'class' => 'control-label'),'options'=>  Configure::read('States')));
echo $this->Form->input('zip',array('label' => array('text' => 'Zip Code', 'class' => 'control-label')));
echo $this->Form->input('bedrooms',array('label' => array('text' => 'Bedrooms', 'class' => 'control-label'),'options'=>  Configure::read('Bedrooms')));
echo $this->Form->input('bathrooms',array('label' => array('text' => 'Bathrooms', 'class' => 'control-label'),'options'=>  Configure::read('Bathrooms')));
echo $this->Form->input('occupied',array('label' => array('text' => 'Is The Property Occupied?', 'class' => 'control-label'),'type' => 'checkbox'));
echo $this->Form->input('listed',array('label' => array('text' => 'Listed With A Realtor?', 'class' => 'control-label')));
echo $this->Form->input('propertytype',array('label' => array('text' => 'Property Type', 'class' => 'control-label'),'options'=>  Configure::read('PropertyTypes')));
echo $this->Form->input('askingprice',array('label' => array('text' => 'Asking Price', 'class' => 'control-label'),'options'=>  Configure::read('AskingPrice')));
echo $this->Form->input('reason',array('label' => array('text' => 'Reason For Selling', 'class' => 'control-label')));
echo $this->Form->input('comments',array('label' => array('text' => 'Comments', 'class' => 'control-label')));
echo $this->Form->input('tmplead',array('type' =>'hidden'));
echo $this->Form->end('Submit');
?>
    </div>
</div>