<?php
if(isset($error)){ echo $error; }
echo form_open_multipart('upload_manager/upload');
echo form_upload('image');
echo form_submit('submit', 'Upload');
echo form_close();
//phpinfo();
?>

