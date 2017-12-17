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




?>
<iframe width="100%" style="border: 1px solid #e8e5e5;border-radius: 2px;" src="<?=getLoginUrl(isv("user"),isv("pass"))?>"></iframe>
