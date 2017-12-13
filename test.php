<?php
include "inc.php";
$nofooter = true;


$data = array(
'from' => "mohtasmsawilh1@gmail.com",
'to' =>$St->email,
'subject' =>"test",
'text' =>"good"
);
echo send_mail($data);



  ?>
