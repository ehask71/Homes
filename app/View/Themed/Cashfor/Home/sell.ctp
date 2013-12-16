<div class='row'>
    <div class='span7'>
<h2>Sell</h2>
<div id="form-container">
<div id="form-wrapper-large">
    <div id="form-content">
        
    
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
</div>
    </div>
    <div class="span5">
        <h2>What to Expect</h2>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
        <p>
            Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum consequat mi. Donec fermentum. Pellentesque malesuada nulla a mi. Duis sapien sem, aliquet nec, commodo eget, consequat quis, neque. Aliquam faucibus, elit ut dictum aliquet, felis nisl adipiscing sapien, sed malesuada diam lacus eget erat. Cras mollis scelerisque nunc. Nullam arcu. Aliquam consequat. Curabitur augue lorem, dapibus quis, laoreet et, pretium ac, nisi. Aenean magna nisl, mollis quis, molestie eu, feugiat in, orci. In hac habitasse platea dictumst.
        </p>

        
    </div>
</div>