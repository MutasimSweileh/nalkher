<?php
include 'inc.php';
$St=getSet();
$a= array($St->url."/cron.php?quran=true",$St->url."/cron.php?post=true",$St->url."/cron.php?post=quran");
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
