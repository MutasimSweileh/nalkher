<?php
include "inc.php";
$St=getSet();
$consumerKey = 'oC4gxQu86SlNNp0ysV3yL9hFhEXVn2DrZlRCG1RHVMtHMmJWpP';
$consumerSecret = 'SJoPJZj2jc6jGVSZCYIPfzpuknLXOniIbEYOnFgsBDMk1aKuvJ';
$tumblr = new Tumblr($consumerKey, $consumerSecret);

// Get the request tokens based on your consumer and secret and store them in $token
$token = $tumblr->getRequestToken();

// Set session of those request tokens so we can use them after the application passes back to your callback URL
$_SESSION['oauth_token'] = $token['oauth_token'];
$_SESSION['oauth_token_secret'] = $token['oauth_token_secret'];

// Grab the Authorize URL and pass through the variable of the oauth_token
$data = $tumblr->getAuthorizeURL($token['oauth_token']);

// The user will be directed to the "Allow Access" screen on Tumblr
//header("Location: " . $data);
echo $data;
?>
