<h2>Payment Info</h2>
<?php
$year = date('Y');
$years[$year] = $year;
for($i=1;$i<=15;$i++){
    $year = $year + $i;
    $years[$year] = $year;
}
echo $this->Form->create('Payment',array(
    'inputDefaults'=>array(
	'required' => FALSE
    )));

echo $this->Form->input('cardnum',array('label' => 'Card Number'));
echo $this->Form->input('cvv',array('label' => 'CVV Code (on back)'));
echo $this->Form->input('expmnth',array('label' => 'Exp Month','options'=>array(
    '01'=>'01',
    '02'=>'02',
    '03'=>'03',
    '04'=>'04',
    '05'=>'05',
    '06'=>'06',
    '07'=>'07',
    '08'=>'08',
    '09'=>'09',
    '10'=>'10',
    '11'=>'11',
    '12'=>'12')));
echo $this->Form->input('expyear',array('label' => 'Exp Year','options'=>$years));
echo $this->Form->input('cardholder',array('label' => 'Name on Card'));
echo $this->Form->input('name',array('label' => 'Name This Profile (for your records)',
	'value'=>'bpf_'.substr($userinfo['firstname'],0,1).$userinfo['lastname'].date('is')
));
echo $this->Form->input('billing_company',array('label' => 'Company'));
echo $this->Form->input('billing_address',array('label' => 'Address'));
echo $this->Form->input('billing_city',array('label' => 'City'));
echo $this->Form->input('billing_state',array('label' => 'State','options'=>Configure::read('States')));
echo $this->Form->input('billing_zip',array('label' => 'Zip'));
echo $this->Form->input('phone',array('label' => 'Phone'));
echo $this->Form->input('comments',array('label' => 'Comment'));
echo $this->Form->end('Finish Registration');
?>