<div class='row-fluid'>
    <div class="span6">
        <h2>Payment Info</h2>
        <?php
        $year = date('Y');
        $years[$year] = $year;
        for ($i = 1; $i <= 15; $i++) {
            $year = $year + $i;
            $years[$year] = $year;
        }
        echo $this->Form->create('Payment', array(
            'inputDefaults' => array(
                'div' => 'control-group',
                'label' => array(
                    'class' => 'control-label'
                ),
                'wrapInput' => 'controls'
            ),
            'class' => 'well form-horizontal'
        ));

        echo $this->Form->input('cardnum', array('label' => array('text' => 'Card Number', 'class' => 'control-label')));
        echo $this->Form->input('cvv', array('label' => array('class' => 'control-label', 'text' => 'CVV Code (on back)')));
        echo $this->Form->input('expmnth', array('label' => array('class' => 'control-label', 'text' => 'Exp Month'), 'options' => array(
                '01' => '01',
                '02' => '02',
                '03' => '03',
                '04' => '04',
                '05' => '05',
                '06' => '06',
                '07' => '07',
                '08' => '08',
                '09' => '09',
                '10' => '10',
                '11' => '11',
                '12' => '12')));
        echo $this->Form->input('expyear', array('label' => array('class' => 'control-label', 'text' => 'Exp Year'), 'options' => $years));
        echo $this->Form->input('firstname', array('label' => array('class' => 'control-label', 'text' => 'Firstname')));
        echo $this->Form->input('lastname', array('label' => array('class' => 'control-label', 'text' => 'Lastname')));
        echo $this->Form->input('email', array('value' => $userinfo['email'], 'label' => array('class' => 'control-label', 'text' => 'Email')));
        echo $this->Form->input('name', array('label' => array('class' => 'control-label', 'text' => 'Name This Profile (for your records)'),
            'value' => 'bpf_' . substr($userinfo['firstname'], 0, 1) . $userinfo['lastname'] . date('is')
        ));
        echo $this->Form->input('billing_company', array('label' => array('class' => 'control-label', 'text' => 'Company')));
        echo $this->Form->input('address', array('label' => array('class' => 'control-label', 'text' => 'Address')));
        echo $this->Form->input('city', array('label' => array('class' => 'control-label', 'text' => 'City')));
        echo $this->Form->input('state', array('label' => array('class' => 'control-label', 'text' => 'State'), 'options' => Configure::read('States')));
        echo $this->Form->input('zip', array('label' => array('class' => 'control-label', 'text' => 'Zip')));
        echo $this->Form->input('phone', array('label' => array('class' => 'control-label', 'text' => 'Phone')));
        echo $this->Form->input('comments', array('label' => array('class' => 'control-label', 'text' => 'Comment')));
        echo $this->Form->submit('Finish Registration', array('class' => 'btn'));
        echo $this->Form->end();
        ?>
    </div>
    <div class="span6">
        <h2>Selected Counties</h2>
        <ul id="selectedcounties">

        </ul>
        Setup: $<?php echo number_format(Configure::read('Setupfee'),2);?><br/>
        Total:<span id="carttotal">$0.00</span>
        
        <div id="debug"></div>
    </div>
</div>
<script src='http://www1.moon-ray.com/v2.4/analytics/tracking.js' type='text/javascript'></script>
<script>
    _mri = "11292_1_2";
    mrtracking();
</script>
<?php $this->Html->scriptStart(array('block' => 'scriptBottom')); ?> 
$(document).ready(function() {
$('#selectedcounties').on('click','li', function() {
var pid = $(this).val();
$(this).remove();
$.post("/registration/cartremove.json",{id:pid},function(data){
if(data.cart.Order.total != null){
$('#carttotal').html('$'+data.cart.Order.total);
} else {
$('#carttotal').html('$0.00');
}
});
});

$(function(){
getCart();
});
});

function checkCart(){
var sz = $('#selectedcounties').size();
if(sz > 0){
window.location = '/register/billing-info';
}
}

function getCart(){
$.get("/registration/cartadd.json",function(data){
if(data.cart.Order.total != null){
var ctotal = (parseFloat(data.cart.Order.total) + parseFloat(<?php echo Configure::read('Setupfee');?>)).toFixed(2);
$('#carttotal').html('$'+ctotal);
} else {
$('#carttotal').html('$0.00');
}
$.each(data.cart.OrderItem,function(i,item){
$('#selectedcounties').append('<li value="' + item.product_id + '">$' + item.price +' '+ item.name  + '</li>');
});
});
}
<?php $this->Html->scriptEnd(); ?>
