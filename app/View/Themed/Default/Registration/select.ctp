<h2>Select Your Counties</h2>
<form method="post" onsubmit="">
    <table>
	<tr>
	    <td>
		<?php echo $this->Form->input('state', array('label' => 'Select A State', 'id' => 'state', 'options' => Configure::read('States'), 'onchange' => 'fetchCounties();')); ?>
	    </td>
	</tr>
	<tr>
	    <td>
		<?php echo $this->Form->input('counties', array('label' => 'Select your Counties', 'id' => 'counties', 'multiple' => 'multiple', 'type' => 'select','options'=>$cty)); ?>
	    </td>
	</tr>
    </table>
</form>
<script type="text/javascript">
    $(document).ready(function() {

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
		    $.each(sys.counties,function(key,val){
			html += '<option value="'+key+'">'+val+'</option>';
		    });
		    $('#counties').html(html);
		}
	    });
	}
    }
</script>
<pre>
    <?php print_r($userinfo); print_r($cty) ?>
</pre>