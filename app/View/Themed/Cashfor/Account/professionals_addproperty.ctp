<?php
$this->Html->script('/js/jquery.uploadify.min.js', array('block' => 'scriptBottom'));
?>
<div class="span10"> 
    <div class="row">
        <div class="span12">
            <div id="propimg"></div>
        </div>
    </div>
</div>
<?php 
$script = "$( document ).ready(function() {
    $('#propimg').uploadify({
        'swf': '/uploadify.swf',
        'uploader': '/upload/index/".CakeSession::id()."',
        'multi': true,
        'height': 40,
        'width': 150
    });
    });";
$this->Html->scriptBlock($script, array('block'=>'scriptBottom'));