<?php
require_once('Tumblr/API/Client.php');
$consumerKey = 'oC4gxQu86SlNNp0ysV3yL9hFhEXVn2DrZlRCG1RHVMtHMmJWpP';
$consumerSecret = 'SJoPJZj2jc6jGVSZCYIPfzpuknLXOniIbEYOnFgsBDMk1aKuvJ';
//$TUMBLR_OAUTH_CALLBACK = $St->url."/tumbler.php";
$client = new Tumblr\API\Client(
  'oC4gxQu86SlNNp0ysV3yL9hFhEXVn2DrZlRCG1RHVMtHMmJWpP',
  'SJoPJZj2jc6jGVSZCYIPfzpuknLXOniIbEYOnFgsBDMk1aKuvJ',
  'kDfvxx73c0yiDxmwIfto2r15EL7Hz9JrWCgdu1D4XQmLyxdqj7',
  'DobS6DW2Kcg1PDpjgBauwB3H8PTmrnWX7gVyZV2psHYUhc0WYV'
);

// Make the request
$user = $client->getUserInfo();
echo $user;
?>
