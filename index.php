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
}else if($Gapp == 'contact'){
include 'inc/contact.php';
}else if($Gapp == 'post'){
include 'inc/post.php';
}else if($Gapp == 'set'){
$_SESSION['set'] = 1;
include 'inc/set.php';
}else if($Gapp == 'pages'){
include 'inc/pages.php';
}else if($Gapp == 'myposts'){
include 'inc/myposts.php';
}else if($Gapp == 'msg'){
include 'inc/msg.php';
}else if($Gapp == 'video'){
include 'inc/post.php';
}else if($Gapp == 'img'){
include 'img.php';
}else if($Gapp == 'privacy'){
include 'inc/Privacy.php';
}else{
    include "inc/home.php";

}

include "inc/footer.php";
?>



