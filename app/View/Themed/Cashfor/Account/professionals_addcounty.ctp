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
	    <ul id="selectedcounties">

	    </ul>
	</div>
    </div>
</div>
<script type="text/javascript">
    $('#counties > option').live('click', function() {
	var title = $(this).attr('title');
	var val = $(this).attr('value');
	var exists = false;
	$('#selectedcounties > li').each(function() {
	    if (this.value == val) {
		exists = true;
		return false;
	    }
	});
	if (!exists) {
	    $('#selectedcounties').append('<li value="' + val + '">' + title + '</li>');
	}
    });

    $('#second > li').live('click', function() {
	$(this).remove();
    });


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