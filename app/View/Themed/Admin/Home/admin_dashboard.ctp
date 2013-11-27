<div class="row-fluid">
    <div class="span8 widget blue">
        <div id="leads-chart" style="height: 282px"></div>
    </div>
    <div class="span4 widget green">
        &nbsp;
    </div>
</div>
<?php $this->Html->scriptStart(array('inline' => false)); ?>
$(document).ready(function(){
var options = {
    lines: {
        show:true
    },
    points: { show:true},
    xaxis:{
        tickDecimals:0,
        tickSize: 1
    }
};
$.plot('#leads-chart',<?php echo $last15;?>,options);
});
<?php $this->Html->scriptEnd(); ?>