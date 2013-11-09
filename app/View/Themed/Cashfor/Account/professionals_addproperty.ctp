<?php
$this->Html->script('/js/jquery.uploadify.min.js', array('block' => 'scriptBottom'));
?>
<div class="span10"> 
    <div class="row">
        <div class="span12">
            <div id="propimg"></div>
        </div>
    </div>
    <div class="row">
        <ul class="thumbnails" id="thumbview">
            
        </ul>
    </div>
</div>
<?php 
$timestamp = time();
$script = "$( document ).ready(function() {
    $('#propimg').uploadify({
        'swf': '/uploadify.swf',
        'uploader': '/upload/index.json?ses=".CakeSession::id()."',
        'formData': {
                    'timestamp' : '".$timestamp."',
                    'token'     : '".md5('cashfor2013HO' . $timestamp)."'
                },
        'multi': true,
        'height': 40,
        'width': 150,
        'onUploadSuccess' : function(file, data, response) {
            appendNew(data);
        }
    });
    });
    
function appendNew(data){
    $('#thumbview').prepend('<li class=\"span4\"><div class=\"thumbnail\"><img src=\"'+data.path+data.file+'\" alt=\"'+data.file+'\"><div class=\"caption\"><h3>'+data.file+'</h3><p>Description</p><p align=\"center\"><a href=\"javascript:void(0);\" class=\"btn btn-primary btn-block\">Open</a></p></div></div></li>');
}";
$this->Html->scriptBlock($script, array('block'=>'scriptBottom'));