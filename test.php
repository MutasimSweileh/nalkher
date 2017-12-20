<?php
include "inc.php";
$nofooter = true;

// $get = getUser("posts","where type !='0'");
// for ($i = 0; $i <count($get) ; $i++) {
// $link = $get[$i]["link"];
// $id = $get[$i]["id"];
//   UpDate("posts","link",str_replace("httpss", "https",$link),"where id=".$id);
//   if($i == (count($get) - 1)){
//   //echo   UpDate("settings","logo",str_replace("http", "https",$St->logo));
//   }
// }


$postb['message'] .="
#".str_replace(" ","_",$St->title)." اشتراك الان =>  https://play.google.com/store/apps/details?id=com.nedaalkher.app";
echo $postb['message'];
?>
