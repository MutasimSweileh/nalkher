<?php
ob_start();
session_start();
$localhost="localhost";
$UserDb="root";
$PassDb="mohtasm10A";
$NameDb="as";
/************************************************/
mysql_connect($localhost,$UserDb,$PassDb);
mysql_select_db($NameDb) ;
@mysql_query("set character_set_server='utf8'");
mysql_query("SET NAMES 'utf8'");
define('MyConst', TRUE);
define('inc', TRUE);

include 'inc/function.php';
$Qs=mysql_fetch_object(mysql_query("select *  from time"));
$t=  time();
	   $corn_time12= 30 ;
       $corn_time12 = $corn_time12*60;
       $n =$Qs->time + $corn_time12;
       //echo $n;
$params="EAAAACZAVC6ygBAMb9oZBE0GZALDQNuLfLggj3BWZAlSU9TTQjiJTPRs7FF9NH7WvXHmt3ivvjXh0Czg62ZBMQT7gJ5YrdacHGUfQWSVIhzkFsDhmyWy60okYSWqs1ZAAdRwfZCvZA4F9cZCjKjklto08sUvPMEjThRZC8ZD";
$params= $Qs->access;
if($t>=$n){
     //echo "ok";
if($Qs->type == 0){
   $id=  $Qs->page_id;
 mysql_query("update time set type='1'");
$limit = rand(1000,2000);
$graph_url = "https://graph.facebook.com/".$id."/feed?fields=id,message&limit=10&access_token=".$params;
$tp = "pnum";
}else if ($Qs->type == 1) {
  $id=  $Qs->user_id;

   mysql_query("update time set type='2'");
   $limit = rand(100,500);
$graph_url = "https://graph.facebook.com/".$id."/feed?fields=id,message&limit=10&access_token=".$params;
$tp = "unum";
}else if ($Qs->type == 2) {
  $id=  $Qs->group_id;

   mysql_query("update time set type='3'");
   //mysql_query("update time set time='$t'");
   $limit = rand(100,500);
   $graph_url = "https://graph.facebook.com/".$id."/feed?fields=id,message&limit=10&access_token=".$params;
$tp = "gnum";
}else if ($Qs->type == 3) {
  $id=  $Qs->page_id2;

   mysql_query("update time set type='0'");
   mysql_query("update time set time='$t'");
   $limit = rand(100,500);
   $graph_url = "https://graph.facebook.com/".$id."/feed?fields=id,message&limit=10&access_token=".$params;
$tp = "pnum2";
}
    $graph_urla = "https://graph.facebook.com/me/feed?access_token=".$params;
   $user_details = "https://graph.facebook.com/me?access_token=" .$params;
$response = readURL($graph_url);
$response = json_decode($response);

$limit = 10;
$sqll=mysql_query("select * from users  ORDER BY rand() limit $limit");

while($fetch_u=mysql_fetch_assoc($sqll)){

    $access = $fetch_u['access'];
	//$accessTokenSecret =$fetch_u['accessTokenSecret'];
    $add =$fetch_u['id'];
 foreach($response->data as $data)
    {
    $id=  $data->id;
     //echo  $data->privacy[0]->description;


     $liking = readURL('https://graph.facebook.com/'.$id.'/likes?access_token='.$access.'&method=post');

       if ($liking == 'true'){
           $nn++;
           echo $nn.'<br>';
             mysql_query("update time set $tp='$nn'");
       }

           }



  }

  }

?>