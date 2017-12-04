<?php
@ob_start();
@session_start();
include 'inc/config.php';
$lg='ar';
include"inc/lang.php";
include "inc/function.php" ;
$St=getSet();
$a= array($St->url."/cron.php?quran=true",$St->url."/cron.php?post=true");
for($i=0;$i<count($a);$i++){
$access = $a[$i];
if(!strpos($access,'php')){
echo readURL($access.'/cron.php');
}else{
echo readURL($access);
}
//echo $access.'/cron.php';
}
// echo "good";
die();
?>