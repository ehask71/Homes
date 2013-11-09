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
$timestamp = time();
$script = "$( document ).ready(function() {
    $('#propimg').uploadify({
        'swf': '/uploadify.swf',
        'uploader': '/upload/index/".CakeSession::id()."',
        'formData': {
                    'timestamp' : '".$timestamp."',
                    'token'     : '".md5('cashfor2013HO' . $timestamp)."'
                },
        'multi': true,
        'height': 40,
        'width': 150
    });
    });";
$this->Html->scriptBlock($script, array('block'=>'scriptBottom'));