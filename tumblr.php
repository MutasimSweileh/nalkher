<?php
include "inc.php";
$consumerKey = 'oC4gxQu86SlNNp0ysV3yL9hFhEXVn2DrZlRCG1RHVMtHMmJWpP';
$consumerSecret = 'SJoPJZj2jc6jGVSZCYIPfzpuknLXOniIbEYOnFgsBDMk1aKuvJ';
$TUMBLR_OAUTH_CALLBACK = $St->url."/tumblr.php";
if (isset($_REQUEST['oauth_token'])) {
  $_SESSION['oauth_status'] = 'oldtoken';
  if ($_SESSION['oauth_token'] !== $_REQUEST['oauth_token'])
  header('Location: '.$TUMBLR_OAUTH_CALLBACK);
  $access_token = $_SESSION['access_token_tumblr'];
  $connection = new TumblrOAuth($consumerKey, $consumerSecret, $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
  $access_token = $connection->getAccessToken($_REQUEST['oauth_verifier']);
  $connection = new TumblrOAuth($consumerKey, $consumerSecret, $access_token['oauth_token'], $access_token['oauth_token_secret']);
  $user_info = $connection->get('user/info');
  SqlIn("Tumblr",array("oauth_username"=>$user_info->response->user->name,"oauth_token"=>$access_token['oauth_token'],"oauth_secret"=>$access_token['oauth_token_secret']));
  //print_r($user_info);
 $res =  $connection->post('blog/how2beadad/post', array('type' => 'photo',"source"=>"https://www.baldingbeards.com/wp-content/uploads/2016/09/best-body-hair-trimmer-1-768x512.jpg","link"=>$St->url, 'caption' => 'Text of post here'));
 print_r($res);
}else{
$connection = new TumblrOAuth($consumerKey, $consumerSecret);
$request_token = $connection->getRequestToken($TUMBLR_OAUTH_CALLBACK);
$_SESSION['oauth_token'] = $token = $request_token['oauth_token'];
$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
switch ($connection->http_code) {
  case 200:
    $url = $connection->getAuthorizeURL($token);
    header('Location: ' . $url);
    break;
  default:
    echo 'Could not connect to Tumblr. Refresh the page or try again later.';
}
}
?>
