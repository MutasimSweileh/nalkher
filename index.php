<?php
include "inc/head.php";
if($Gapp != "logout"){
include "inc/header.php";
}
//echo locale_get_default();
$access = $St->token;
if($Gapp == "login"){
 if(isand(true) && !isv("user",1) && $St->android_login || isand(true) && !isv("user",1) &&  !$St->server_login){
  $Lurl = "https://goo.gl/AWnTJ4";
  header("Location: ".$Lurl);
      }else{
  include "inc/login.php";
  }
}else if($Gapp == "logout"){
 session_destroy();
 echo  redMsg('success',"�� ����� ������ �����",1,0,"../");
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
}else if($Gapp == 'sms'){
include 'inc/sms.php';
}else if($Gapp == 'img'){
include 'img.php';
}else if($Gapp == 'privacy'){
include 'inc/Privacy.php';
}else if($Gapp == 'rfb'){
header("Location: ../login.html");
}else if($Gapp == 'tw')
{

    $connection = new TwitterOAuth($St->tw_id,$St->tw_key);
    $request_token = $connection->getRequestToken($St->url.'/callback.php');

    $_SESSION['oauth_token'] = $token = $request_token['oauth_token'];
    $_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];

    switch ($connection->http_code) {
      case 200:
        $url = $connection->getAuthorizeURL($token);
        header('Location: ' . $url);
        break;
      default:
        echo 'Could not connect to Twitter. Refresh the page or try again later.';
    }

}else{
    include "inc/home.php";

}

include "inc/footer.php";
?>
