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
  $connection = new TumblrOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
  $user_info = $connection->get('/user/info');
  print_r($user_info);
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
