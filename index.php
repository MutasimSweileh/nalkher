<?php
include "inc/head.php";
if($Gapp != "login"){
include "inc/header.php";
                     }
//echo locale_get_default();                     
$access = $St->token;
if($Gapp == "login"){
    include "inc/login.php";
}else if($Gapp == "logout"){
 session_destroy();
 echo  redMsg('success',"Êã ÊÓÌíá ÇáÎÑæÌ ÈäÌÇÍ",1,0,"../");
}else{
    include "inc/home.php";

}

include "inc/footer.php";
?>



