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
            console.log(response);
            appendNew(data);
        }
    });
    });
    
function appendNew(data){
    var obj = JSON.parse(data);
    $('#thumbview').prepend('<li><div class=\"thumbnail clearfix\"><img src=\"'+obj.data.path+obj.data.file+'\" alt=\"'+obj.data.file+'\"><div class=\"caption\"><small>'+obj.data.file+'</small><p align=\"center\"><a href=\"javascript:void(0);\" class=\"btn btn-primary btn-block\">Open</a></p></div></div></li>');
}";
$this->Html->scriptBlock($script, array('block'=>'scriptBottom'));