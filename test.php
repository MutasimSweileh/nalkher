<?php
include "inc.php";
$nofooter = true;


$data = array(
'from'      => "you@youremail.com",
'fromname'  => "Your Name",
'to' =>$St->email,
'toname'    => "Example User",
'subject' =>"test",
'text' =>"good"
);
echo send_mail($data);



  ?>
