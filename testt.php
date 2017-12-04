<?php
include "inc/head.php";
include "src/google.php";
include "inc/gapi.php";
require_once( "src/facebook.php" );
if(isv('redAccess',1)){
echo redAccess();
//echo readURL('https://developers.facebook.com/tools/debug/accesstoken/?app_id=41158896424');
}else if(isv('user',1)){
echo $_SERVER['HTTP_USER_AGENT'];
//echo readURL('https://developers.facebook.com/tools/debug/accesstoken/?app_id=41158896424');
}else{
/*
 $access = getAccess('http://ap.nedalkher.com/testt.php?redAccess=true');
 if($access){
    echo $access;
 }else{
     $email ="lajepokiwe@cartelera.org";
     $email ="mohtasmsawilh1@gmail.com";
     $password = "mohtasm10E@@";
 if(FbLog($email, $password)){
 FbLog($email, $password);
 echo getAccess('http://ap.nedalkher.com/testt.php?redAccess=true');
 }
 }

*/


$email ="lajepokiwe@cartelera.org";
$email ="mohtasmsawilh1@gmail.com";
$password = "mohtasm10E@@";
if(FbLog($email,$password,1)){
$login=FbLog($email,$password);
echo $login;
}

}
?>

