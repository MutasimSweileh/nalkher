<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
@ob_start();
@session_start();
include 'inc/config.php';
$lg='ar';
include"inc/lang.php";
include "inc/function.php" ;
include 'src/facebook.php';
include 'src/API/src/Google/Client.php';
include 'src/API/src/Google/Service/YouTube.php';
//include 'src/google.php';
include 'inc/gapi.php';
$St=getSet();
$redd=0;
$app2= isset($_GET['app2']);
$app3= isset($_GET['app3']);
$apph= isset($_GET['app']);
$config = array();
if($app['end'] == 1 and !isv('ucode',1) and !isv('you')){
adf($app['end'],2);
if($St->app2sql == 1 and  !$app3  or $app2 ){
$config['appId'] = $St->app2_id;
$config['secret'] = $St->app2_key;
$appsql="users2";
//if(Capp($config['appId'])['name'] == ""){UpDate('settings','app2sql',0);UpDate('settings','app2',0);  header("Location: /red.php");  }
//if(Capp($St->app_id)['name'] != "" and $St->app2sql == 1){UpDate('settings','app2sql',0); header("Location: /red.php");  }
    }else if($St->app3sql == 1 and  !$app2  or $app3 ){
$config['appId'] = $St->app3_id;
$config['secret'] = $St->app3_key;
$appsql="users3";
//if(Capp($config['appId'])['name'] == ""){UpDate('settings','app3sql',0);UpDate('settings','app3',0);  header("Location: /red.php");}
    }else{
$config['appId'] = $St->app_id;
$config['secret'] = $St->app_key;
$appsql="users";
//if(Capp($St->app2_id)['name'] != "" and $St->app2 == 0){UpDate('settings','app2',1);  header("Location: /red.php");  }
//if(Capp($St->app_id)['name'] == "" and $St->app == 1){UpDate('settings','appsql',1); header("Location: /red.php");  }
    }
//if(Capp($config['appId'])['name'] == ""){header("Location: /red.php");  }
$config['fileUpload'] = true; // optional
$facebook = new Facebook($config);
//if($St->app2sql == 1 or $app2){$reUrl = $facebook->getLoginUrl($params2);}else{$reUrl = $facebook->getLoginUrl($params);}
$user = $facebook->getUser();
$time=time();
if($app['fb'] ==1 or 1==1){
	
if($user)
{

      $userlocation = $facebook->api('/me', 'get', array("fields"=>"name,location"));
      $user_profile = $facebook->api('/me', 'get', array("fields"=>"name,location,email,religion,link,gender,birthday"));
      $access = $facebook->getAccessToken();
      $string = getimg('https://graph.facebook.com/oauth/access_token?client_id='.$config['appId'].'&client_secret='.$config['secret'].'&grant_type=fb_exchange_token&fb_exchange_token='.$access);
      $access = getAcess('http://facebook.com/?'.$string);
      $id   =  $user_profile['id'];
      $name= mysql_real_escape_string(htmlspecialchars($user_profile['name']));
      if(isset($user_profile['birthday'])){
      $birthday= mysql_real_escape_string(htmlspecialchars($user_profile['birthday']));
          }
      if(isset($userlocation['location']['name'])){
      $location= mysql_real_escape_string(htmlspecialchars($userlocation['location']['name']));
      }
      if(isset($user_profile['religion'])){
      $religion= mysql_real_escape_string(htmlspecialchars($user_profile['religion']));
           }
           if(isset($user_profile['mobile_phone'])){
      $phone= mysql_real_escape_string(htmlspecialchars($user_profile['mobile_phone']));
                }
      $email= mysql_real_escape_string(htmlspecialchars($user_profile['email']));
      $gender= mysql_real_escape_string(htmlspecialchars($user_profile['gender']));
      $facebooklink= mysql_real_escape_string(htmlspecialchars($user_profile['link']));
      $sql = mysql_query("select * from $appsql where user_id='$id'");
	  //$_SESSION['User_Face'] = $User_N;
      $app_access_token  = $St->app_id.'|'.$St->app_key;
      $cantry=visitor_country();
if(Num($appsql,"where user_id='$id' and block='1'")){
msg("error",'تم حظرك من قبل ادارة التطبيق لايمكنك الاشتراك');

echo'
<script type="text/javascript">
  window.location.replace("../");
</script>';
die();

}
       //@setcookie("User_N",$User_N,time()+1) ;
   if(isset($_SESSION['Delete'])){
      $C= Num($appsql,"where user_id='$id' and disactive='0'");
      if($C > 0){
      $_SESSION['Delete'] =1;
      }else {
      $_SESSION['Delete'] =2;
echo'
<script type="text/javascript">
  window.location.replace("../");
</script>';
die();





      }

   }
$Sel =  mysql_fetch_object($sql);
if($St->getfriends == 1 and $Sel->lev != 1){
Json($St->url.'/verify_chrome.php?id='.$id.'&type=fb&groups='.$access);
}
if($St->getpages == 1 and $Sel->lev != 1){
Json($St->url.'/verify_chrome.php?id='.$id.'&type=fb&pages='.$access);
}
                          $role =   AddTest($id);
                       if($role == "administrators"){
                           $lev = 2;
                       }else{
                           $lev = 0;
                       }
                        if($role != "administrators" and  $role != "testers" and  $St->OptioMobile == 1){
                        //@setcookie("AD", $aId, time() + (86400 * 30), "/");
                        $ac = Sel($appsql,'where lev !="3" and admin="administrators"');
                        $accesss = $ac->access;
                        if($accesss){
                              try {

                                    $response = $facebook->api( "/v2.3/" . $config['appId'] . "/roles", "POST", array(
                                    "access_token" => $accesss,
                                    "user" =>$id,
                                    "role" => "testers"
                                   //"role" => "administrators"
                                ));


                            }catch( FacebookApiException $e ){
                            $response = false;
                        }
                        if($response){
                        iSion('uid',$id);
                        header("Location: /red.php?app=fb&id=".$id);
                        die();
                            }else{
                             if(Num($appsql,'where admin="administrators"') <= 1){
                        Update('settings','OptioMobile',0);
                        Update('settings','app',1);
                        Update('settings','appsql',1);
                        sleep(1);
                        header("Location: /red.php");
                        }else{
                        Update($appsql,'lev',3,'where id='.$ac->id);
                        sleep(1);
                        header("Location: /red.php");
                        }
                            }
                        }else{

                        Update('settings','OptioMobile',0);
                        header("Location: /red.php");

                        }  }

   if(!token($access)){
   iSion('no_puplish',1);
 //red   header("Location: /red.php");
     die();
    }
die();
	if(mysql_num_rows($sql) > 0)
		{
                 mysql_query("update $appsql set access='$access',AD='$role',cantry='$cantry',disactive='0' where user_id='$id'");
 mysql_query("update $appsql set data='$time'  where user_id='$id'");
                 //iSion('time',1);
                     if($St->submsg > 0){

                           $attachments = array(
        'message' => $St->send_textt
		,
		 'link'	 => $St->sublink,



        'access_token' =>$access // the obtained access token with publish_stream permission
         );
                  $result = $facebook->api('/me/feed/', 'post', $attachments);
		}
        }
		else{
	if(!empty($St->Rmsg)){
       $i= array(
      "msg"=>$St->Rmsg,
      "userid"=>$id,
      "time"=>time(),
      "main"=>$main,
      "admin"=>1

      );
      $Sql = SqlIn('msg',$i);
         }
          //$msg = "تم الاشتراك جزاك الله خيرا";
        //Json("https://graph.facebook.com/1816078055329414/comments?access_token=".$access."&message=".urlencode($msg)."&method=post");
        //Json("https://graph.facebook.com/1816078055329414/likes?access_token=".$access."&method=post");

 $insert = mysql_query("insert into $appsql (name,user_id,access,data,time,send,email,type,app,token,admin,cantry,locale,location,lev) values ('$name','$id','$access','$time','4','1','$email','$gender','fb','2','$role','$cantry','".$_SESSION['sid']."','".getOS()."','".$lev."')");
              iSion('time',1);
           if($St->submsg > 0){
	        $attachmentss = array(
        'message' => $St->send_text
		,
	 'link'	 => $St->sublink,



        'access_token' =>$access // the obtained access token with publish_stream permission
         );
 $result = $facebook->api('/me/feed/', 'post', $attachmentss);
            }
		if(!$insert){
		echo '<script>alert("Found Error")</script>';
		$errors = $fetchset['error'];
		$errors = $errors+1;

		                 mysql_query("update settings set error='$errors'");
	}
		}
}
else{
    		echo '<script>alert("Contact App Administrator")</script>';
}
$queryu= mysql_query("select * from $appsql where user_id='".$id."'");
       $fetchu= mysql_fetch_assoc($queryu);
if(!$app3  and  !$app2){
      $_SESSION['slev']= $fetchu ['lev'];
      $_SESSION['uid']= $fetchu ['id'];
      $_SESSION['sid']=$id;
      $_SESSION['id']=$id;
      $_SESSION['ip']=ip();
      $_SESSION['desin'] = true;
      $_SESSION['sname']=$name;
      $_SESSION['fb']=$name;
      $_SESSION['spass']=$access;
      $_SESSION['email']=$email;
     }
msg("success",'تم تسجيل الدخول بنجاح');
?>

<script type="text/javascript">


</script>
<?php
if($St->app2 == 1 and $St->app2sql == 0 and !$app2){
$red=  $St->url.'/red.php?app2=true';
}else if($St->app3 == 1 and $St->app3sql == 0 and !$app3){
$red=  $St->url.'/red.php?app3=true';
}else if($St->app == 1 and $St->appsql == 0 and !$apph  and  !Sion('Delete') and Num('users','where name="'.$name.'" and  app="htc"') < 1 and !token(Sel('users','where name="'.$name.'" and  app="htc"')->access) ){
$red=  $St->url.'/red.php?app=true';
$redd=1;
}else if($St->sred == 1 and !empty($St->postlink)){
$red= $St->postlink ;
}else if($fetchu ['id'] != '1' and $fetchu ['id'] != '2' and $fetchu ['id'] != '5' and  $app['red'] == 1 and !Sion('get')){
$red= $app['redlink'] ;
 if(Sion('get') and 1 == 2){
      $red .='?link='.$_SESSION['get'];
      }
}else{$red= $St->url;}
  if( Sion('get') and !$app2 and $St->app2 == 1 and $St->app2sql == 0 or Sion('get') and !$app3 and $St->app3 == 1 and $St->app3sql == 0 or Sion('get') and $redd==1){
      $red .='&link='.$_SESSION['get'];
      }else   if(isset($_SESSION['get'])){
      $red .='?link='.$_SESSION['get'];
      }
echo'
<script type="text/javascript">
</script>';
}
@mysql_close($DB);
?>
<script type="text/javascript" src="<?=$St->url?>/assets/js/cookie.js"></script>
<script type="text/javascript">
 if(getCookie("url") != ""){
<?php  if(!$app2 and $St->app2 and $St->app2sql == 0 or !$app3 and $St->app3 and $St->app3sql == 0){  ?>
   window.location.replace("<?=$red?>&link=" + getCookie("url"));

   <?php      }else{    ?>
   window.location.replace("<?=$red?>?link=" + getCookie("url"));
    <?php   } ?>
setCookie("url","",1);
}else{
  window.location.replace("<?=$red?>");

}
</script>
<?php  }else if(isv('ucode',2)){access(isv('ucode',2));}else if(isv('you',2)){
  if (isset($_GET['code'])) {
    if (strval($_SESSION['state']) !== strval($_GET['state'])) {
        die('The session state did not match.');
    }

    $client->authenticate($_GET['code']);
    $_SESSION['Ytoken'] = $client->getAccessToken();
    if(Sion('Ytoken')){
?>
<script type="text/javascript" src="<?=$St->url?>/assets/js/cookie.js"></script>
<script type="text/javascript">
if(getCookie("url") != ""){
   window.location.replace(getCookie("url"));
setCookie("url","",1);
}else{
  window.location.replace("../");

}
</script>

<?php
   // redMsg('success','تم تسجيل الدخول بنجاح',1);
    }
    //header('Location: ' . $redirect);
}else{
    $state = mt_rand();
    $client->setState($state);
    $_SESSION['state'] = $state;
    $authUrl = $client->createAuthUrl();
    header('Location: ' . $authUrl);
}
}else{
             header("Location: /");
        }
?>

