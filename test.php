<?php
include "inc.php";
$nofooter = true;


$us = getUser("posts"," ");
for ($i=0; $i < count($us); $i++) {
 $str =  strpos($us[$i]['text'],'خدمة');
// echo $us[$i]['text']."</br>";
if($str){
$sq =  Remove("posts","where id=".$us[$i]['id']);
echo $sq."</br>";
}

}
  ?>
