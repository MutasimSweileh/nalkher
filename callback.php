<?php
include 'inc.php';
define('CONSUMER_KEY',$St->tw_id);
define('CONSUMER_SECRET', $St->tw_key);
if (isset($_REQUEST['oauth_token']) && $_SESSION['oauth_token'] !== $_REQUEST['oauth_token']) {
  $_SESSION['oauth_status'] = 'oldtoken';
  header('Location: /');
}
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
$access_token = $connection->getAccessToken($_REQUEST['oauth_verifier']);
$_SESSION['access_token'] = $access_token;
$user_info = $connection->get('account/verify_credentials');
    if (isset($user_info->error)) {
        header('Location: /');
    } else {
      $access_token_oauth_token = $_SESSION['access_token']['oauth_token'] ;
      $access_token_oauth_token_secret = $_SESSION['access_token']['oauth_token_secret'];
	   $twitter_otoken= $_SESSION['oauth_token'];
	   $twitter_otoken_secret= $_SESSION['oauth_token_secret'];
	   $screen_name = $_SESSION['access_token']['screen_name'];
	   $email='';
        $uid = $user_info->id;
        $username = $user_info->name;
        $userdata = checkUser($uid, 'twitter', $username,$email,$twitter_otoken,$twitter_otoken_secret,$access_token_oauth_token,$access_token_oauth_token_secret,$screen_name);
        if(!empty($userdata)){
            session_start();
            $_SESSION['tid'] = $userdata['id'];
            $_SESSION['oauth_id'] = $uid;
            $_SESSION['username'] = $userdata['username'];
            $_SESSION['oauth_provider'] = $userdata['oauth_provider'];
            $_SESSION['tw']="true";
            $_SESSION['name_tw']=$username;
            $_SESSION['sname_tw']=$screen_name;
?>
     <script type="text/javascript">
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
function setCookie(cname, cvalue, exdays,d) {
    if(d){
    d = exdays*24;
    }else{
    d = exdays;
    }
    var d = new Date();
    d.setTime(d.getTime() + (d*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}

if(getCookie("url") != ""){
  window.location.replace(getCookie("url"));
  setCookie("url","",1);
}else{
  window.location.replace("../");

}
</script>




<?php

        }
    }
?>
