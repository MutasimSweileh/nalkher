<?php
include "inc.php";
$St=getSet();
$consumerKey = 'oC4gxQu86SlNNp0ysV3yL9hFhEXVn2DrZlRCG1RHVMtHMmJWpP';
$consumerSecret = 'SJoPJZj2jc6jGVSZCYIPfzpuknLXOniIbEYOnFgsBDMk1aKuvJ';
$TUMBLR_OAUTH_CALLBACK = $St->url."/tumbler.php";
// build a TumblrOAuth object using our application's keys
		//$connection = new Tumblr($consumerKey, $consumerSecret);

		// get temporary credentials from tumblr
		//$request_token = $connection->getRequestToken($TUMBLR_OAUTH_CALLBACK);

		// save temporary credentials to a session for use in step 2
		//$_SESSION['oauth_token'] = $request_token['oauth_token'];
		//$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];

		// if connection is successful, build authorization link and redirect to tumblr so the user can authorize our app
		//if($connection->http_code == 200) {
			//header('location:'.$connection->getAuthorizeURL($request_token['oauth_token']));
		//} else {
			// could not connect to tumblr. is the API down? did we forget to register our application?
			//die('Could not connect to Tumblr.');
		//}
    $client = new Client($consumerKey, $consumerSecret);
$requestHandler = $client->getRequestHandler();
$requestHandler->setBaseUrl('https://www.tumblr.com/');

// start the old gal up
$resp = $requestHandler->request('POST', 'oauth/request_token', array());

// get the oauth_token
$out = $result = $resp->body;
$data = array();
parse_str($out, $data);

// tell the user where to go
echo 'https://www.tumblr.com/oauth/authorize?oauth_token=' . $data['oauth_token'];
$client->setToken($data['oauth_token'], $data['oauth_token_secret']);
?>
