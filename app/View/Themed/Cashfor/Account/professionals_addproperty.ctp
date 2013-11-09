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
        'uploader': '/upload/".CakeSession::id()."',
        'folder': '/app/webroot/files',
        'cancelImg': '/img/cancel.png',
        'multi': true
    });
    });";
$this->Html->scriptBlock($script, array('block'=>'scriptBottom'));