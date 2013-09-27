<h2>Sell</h2>
<?php 
echo $this->Form->create('Lead');
echo $this->Form->input('firstname',array(
    'label'=> 'First Name'
));
echo $this->Form->input('lastname',array(
    'label'=> 'Last Name'
));
echo $this->Form->input('email',array(
    'label'=> 'Email'
));
echo $this->Form->input('phone',array(
    'label'=> 'Phone'
));
echo $this->Form->input('altphone',array(
    'label'=> 'Alt Phone'
));
echo $this->Form->input('address',array(
    'label'=> 'Address'
));
echo $this->Form->input('city',array(
    'label'=> 'City'
));
echo $this->Form->input('state',array(
    'label'=> 'State'
));
echo $this->Form->input('zip',array(
    'label'=> 'Zip Code'
));

echo $this->Form->input('bedrooms',array(
    'label'=> 'Bedrooms'
));
echo $this->Form->input('bathrooms',array(
    'label'=> 'Bathrooms'
));
echo $this->Form->input('occupied',array(
    'label'=> 'Is The Property Occupied?','type' => 'checkbox'
));
echo $this->Form->input('listed',array(
    'label'=> 'Listed With A Realtor?'
));
echo $this->Form->input('propertytype',array(
    'label'=> 'Property Type'
));
echo $this->Form->input('askingprice',array(
    'label'=> 'Asking Price'
));
echo $this->Form->input('reason',array(
    'label'=> 'Reason For Selling'
));
echo $this->Form->input('comments',array(
    'label'=> 'Comments'
));
echo $this->Form->end('Submit');
?>