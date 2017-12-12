<?php
include "inc.php";
$nofooter = true;


$us = getUser("posts","where type='8'");
for ($i=0; $i < count($us); $i++) {
 $str =  strpos($us[$i]['text'],'3lm');
 echo $us[$i]['text']."</br>";
if($str){
Remove("posts","where id=".$us[$i]['id']);

}

}
  ?>
