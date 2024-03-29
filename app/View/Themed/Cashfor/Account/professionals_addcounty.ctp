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
function getCart(){
    $.get("/registration/cartadd.json",function(data){
	if(data.cart.Order.total != null){
	   $('#carttotal').html('$'+data.cart.Order.total);
	} else {
	    $('#carttotal').html('$0.00');
	}
	$.each(data.cart.OrderItem,function(i,item){
	    $('#selectedcounties').append('<li value="' + item.product_id + '">$' + item.price +' '+ item.name  + '</li>');
	});
    });
}
<?php $this->Html->scriptEnd();?>
<div class="span10">
    <div class="row">
	<div class="span6">
	    <?php
	    echo $this->Form->create(null, array(
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
	    <?php echo $this->Form->input('state', array('label' => 'Select A State', 'id' => 'state', 'options' => Configure::read('States'), 'onchange' => 'fetchCounties();')); ?>
	    <?php echo $this->Form->input('counties', array('label' => 'Select your Counties', 'id' => 'counties', 'multiple' => 'multiple', 'type' => 'select', 'options' => $cty)); ?>
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