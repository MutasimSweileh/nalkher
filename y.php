<?php
include "inc/config.php";
include "inc/function.php";
$token = "mELtlMAHYqR0BvgEiMq8zVek3uYUK3OJMbtyrdNPTrQB9ndV0fM7lWTFZbM4MZvD";
$block = "58d4eaaee4b0ab7b1a9a661b";
$user = "58cd16e0e4b053b86b8bb3d7";
$user = "{{fb_id}}";
$ur ="https://api.chatfuel.com/broadcast?chatfuel_token=".$token."&chatfuel_block_id=".$block."&mohtasm=mytest&test=alhamdlleh";
$ur ="https://api.chatfuel.com/bots/58d4d90de4b0ab7b1a4fc807/users/".$user."/send?chatfuel_token=".$token."&chatfuel_block_id=".$block."&mohtasm=Mohtasm+Mohamed&timeslot=12:00+25+Jan+2017";
//$j  =  Json($ur);

//echo json_encode($j);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$ur);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$server_output = curl_exec ($ch);
curl_close ($ch);
echo $server_output;
?>

<br><br><br>
