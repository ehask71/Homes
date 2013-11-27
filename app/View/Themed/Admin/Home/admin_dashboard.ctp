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
tickSize: 15
}
};

var options2 = {
    grid: { 
        hoverable: true,  
        tickColor: "rgba(255,255,255,0.05)",
        borderWidth: 0},
    legend: {
        show: true
    },
    points: { show:true},
    lines: {
        show:true,
        fill: false,
	lineWidth: 2 
    },
    colors: ["rgba(255,255,255,0.8)", "rgba(255,255,255,0.6)", "rgba(255,255,255,0.4)", "rgba(255,255,255,0.2)"],
    xaxis: {ticks:15, tickDecimals: 0, color: "rgba(255,255,255,0.8)",mode:"time",timeformat:"%m/%d"},
    yaxis: {ticks:5, tickDecimals: 0, color: "rgba(255,255,255,0.8)" }
}

$.plot('#leads-chart',[<?php echo $last15; ?>],options2);
});
<?php $this->Html->scriptEnd(); ?>