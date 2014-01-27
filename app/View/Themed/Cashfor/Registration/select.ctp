<?php $this->Html->scriptStart(array('block' => 'scriptBottom')); ?> 
$(document).ready(function() {
$('#counties').on('click','option', function() {
var title = $(this).text();
var val = $(this).attr('value');
var exists = false;
$('#selectedcounties > li').each(function() {
if (this.value == val) {
exists = true;
return false;
}
});
if (!exists) {
$.post("/registration/cartadd.json",{id:val},function(data){
if(data.cart.Order.total != null){
$('#carttotal').html('$'+data.cart.Order.total);
} else {
$('#carttotal').html('$0.00');
}
});
$('#selectedcounties').append('<li value="' + val + '">' + title + '</li>');
}
});

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
alert(parseFloat(data.cart.Order.total) + parseFloat(<?php echo Configure::read('Setupfee');?>));
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
<div class="span12">
    <div class="row">
        <div class="span6">
            <?php
            echo $this->Form->create(null, array('default' => false, 'id' => 'cform',
                'inputDefaults' => array(
                    'div' => 'control-group',
                    'label' => array(
                        'class' => 'control-label'
                    ),
                    'wrapInput' => 'controls'
                ),
                'class' => 'well form-horizontal'
            ));
            ?>
            <?php echo $this->Form->input('state', array('label' => array('text' => 'Select A State', 'class' => 'control-label'), 'id' => 'state', 'options' => Configure::read('States'), 'onchange' => 'fetchCounties();')); ?>
            <?php echo $this->Form->input('counties', array('label' => array('text' => 'Select your Counties', 'class' => 'control-label'), 'id' => 'counties', 'multiple' => 'multiple', 'type' => 'select', 'options' => $cty)); ?>
            <?php echo $this->Form->button('Next Step', array('class' => 'btn', 'onclick' => 'checkCart();')); ?>
            <?php echo $this->Form->end(); ?>
        </div>
        <div class="span6">
            <h2>Selected Counties</h2>
            <ul id="selectedcounties">

            </ul>
            Total:<span id="carttotal">$0.00</span>
            <div id="debug"></div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function fetchCounties() {
        var st = $('#state').val();
        if (st != '') {
            $.ajax({
                type: "GET",
                url: '/account/gc.json',
                data: {
                    st: st,
                },
                dataType: "json",
                success: function(sys) {
                    var html = '';
                    $.each(sys.counties, function(key, val) {
                        html += '<option value="' + key + '">' + val + '</option>';
                    });
                    $('#counties').html(html);
                }
            });
        }
    }
</script>
<script src='http://www1.moon-ray.com/v2.4/analytics/tracking.js' type='text/javascript'></script>
<script>
    _mri = "11292_1_2";
    mrtracking();
</script>

