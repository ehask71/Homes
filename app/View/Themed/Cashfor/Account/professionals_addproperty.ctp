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
<script type="text/javascript">
   $( document ).ready(function() {
    $('#propimg').fileUpload({
        'uploader': '/uploadify.swf',
        'script': '/upload/<?php echo CakeSession::id();?>',
        'folder': '/app/webroot/files',
        'cancelImg': '/img/cancel.png',
        'multi': true
    });
    });
</script>