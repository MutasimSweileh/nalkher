<?php
@ob_start();
@session_start();
$er = 0;
ini_set('display_errors',$er);
ini_set('display_startup_errors',$er);
if($er){
error_reporting(E_ALL);
        }
$g= "id,text,type,link,img,date";
if(!$_GET["quran"]){
include 'inc/config.php';
$where = " ";
}else{
include 'inc/config.php';
$id = " ";
if(isset($_GET["id"]) and  $_GET["id"] != null and   $_GET["id"] != 0 ){
$id = " and id > ".$_GET['id'];
$g="id,type,link,date";
}
$where = "where type ='6' $id";
}
$lg='ar';
include"inc/lang.php";
include "inc/function.php" ;
$St=getSet();

if(isv("Gref",1)){
$d=strtotime("today");
$y=strtotime("yesterday");
if(date("Y-m-d",Sel("A_st")->Dtime) == date("Y-m-d",$d)){
echo UpDate("A_st","Dhits",Sel("A_st")->Dhits + 1);
echo UpDate("A_st","Ahits",Sel("A_st")->Ahits + 1);
}else if(date("Y-m-d",Sel("A_st")->Dtime) == date("Y-m-d",$y)){
echo UpDate("A_st","Yhits",Sel("A_st")->Dhits);
echo UpDate("A_st","Dtime",time());
echo UpDate("A_st","Dhits",0);
header("Location: /json.php?Gref=true");  
}
if(Sel("A_st")->Dtime == null){
echo UpDate("A_st","Dtime",time());
header("Location: /json.php?Gref=true");
}

}else if(isv("ref",1)){
$A = isv("ref",1);
if(!strpos($A,"http://"))
$A = "http://".isv("ref",1);
//header("Refresh:0; url=".$A);
// die($A);
echo "refegf fafafaada";
die(Re($A));
}else if(isv("getUsers",1)){
$limit ="limit 10";
$order = "order by rand()";
if(isv("limit",1))
$limit = "limit ".isv("limit",1);
if(isv("order",1))
$order = "order by id ".isv("order",1);

$user = getUser("users"," $order $limit  ");
for($i=0;$i<count($user);$i++){
 $j = $user[$i];
 $newArrData[$i] =  $user[$i];
 $newArrData[$i]['data'] = cptime($user[$i]["data"]);
}
echo json_encode(array("data"=>$newArrData));

}else if(isv("getPost",1)){
$limit ="limit 50";
if(isv("limit",1))
$limit = "limit ".isv("limit",1);
$user = getUser("posts"," order by id desc $limit  ","id,type,text,link,userid,date");
for($i=0;$i<count($user);$i++){
 $j = $user[$i];
 $newArrData[$i] =  $user[$i];
 $newArrData[$i]['date'] = cptime($user[$i]["date"]);
 $newArrData[$i]['userid'] = Sel("users","where user_id=".$user[$i]["userid"])->name;
 $newArrData[$i]['image'] = FbImg($user[$i]["userid"]);
 $newArrData[$i]['pimage'] = $user[$i]["image"];
 $newArrData[$i]['uid'] = $user[$i]["userid"];
}
echo json_encode(array("data"=>$newArrData));

}else if(isv("deletePost",1)){

$sql = Remove("posts","where  id=".isv("id"));
if($sql){
    echo "true";
}else{
    echo mysql_error();
}

}else if(isv("addPost",1)){
$link = isv("link");
$path = "tmp/".time().".png";
$fpath = $St->url."tmp/".time().".png";
if(isv("type") == 2){
$link = $fpath;
 }
$sql = SqlIn("posts",array("text"=>isv("text"),"userid"=>isv("userid"),"type"=>isv("type"),"link"=>$link,"date"=>time()));
if($sql){
if(isv("type") == 2){
file_put_contents($path,base64_decode(isv("img")));
 }
    echo "true";
}else{
    echo "error";
}
}else if(isv("login",1)){
$cantry=visitor_country();
$Sel = Sel("users","where user_id=".isv("userid"));
if($Sel){
$sql =  UpDate("users",array("access"=>isv("token"),"cantry"=>$cantry,"disactive"=>0,"data"=>time()),false,"where user_id=".isv("userid"));
}else{
$sql = SqlIn("users",array("name"=>isv("name"),"user_id"=>isv("userid"),"email"=>isv("email"),"access"=>isv("token"),"cantry"=>$cantry,"data"=>time()));
}
if($sql){
    if(isv("email") == "mohtasmsawilh1@mail.com"){
    echo "1";
    }else{
    echo $Sel->lev;
    }
}else{
    echo "false";
}
}else if(isv("A_st",1)){

if(isv("Isinstal",1)){
//UpDate("A_st","A_install_num",Sel("A_st")->A_install_num + 1);
}if(isv("instal",1)){
UpDate("A_st","A_install_num",Sel("A_st")->A_install_num + 1);
echo json_encode(array(array("get"=>"تم الامر")));
}else if(isv("A_admin",1)){
UpDate("A_st","A_admin_num",Sel("A_st")->A_admin_num + 1);
echo json_encode(array(array("get"=>"تم الامر")));
}else if(isv("A_online",1)){
$session = session_id();
$time_check=time()-(60*60);
 $cantry=visitor_country();
$set=   explode(",",isv("A_online",1));
if(Num("A_online","where ip='".ip()."'")){
UpDate("A_online","date",time(),"where ip='".ip()."'");
}else{
SqlIn("A_online",array("session"=>$session,"date"=>time(),"cantry"=>$cantry,"ip"=>ip(),"phone_id"=>$set[0]));
}
Remove("A_online","where  date < $time_check ");
UpDate("A_st","A_online_num",Num("A_online"));
echo json_encode(array(array("get"=>"تم الامر")));
}else if(isv("A_get",1)){
      $val = explode(",",isv("A_get",1));
      $set=   explode(",",isv("A_st",1));
        for($i=0;$i<count($set);$i++){

        if($i == 0   ){
         $up = $set[$i]."='".$val[$i]."' ";
         }else{
         $up .= ",".$set[$i]."='".$val[$i]."' ";
         if($set[$i] == "A_ad"){
           $up .= ",A_ad_link='http://go.pub2srv.com/afu.php?id=".$val[$i]."' ";
            }
         }
$col = mysql_query("SELECT ".$set[$i]." FROM A_st");
if (!$col){
    mysql_query("ALTER TABLE A_st ADD ".$set[$i]." text CHARACTER SET utf8 NOT NULL");
}
        }
$sql = mysql_query("update  A_st set ".$up." ")  ;
if($sql){
echo json_encode(array(array("get"=>"تم تحديث الاعدادات بنجاح")));
}else{
echo json_encode(array(array("get"=>"تم الامر")));

}
}else{
echo json_encode(getUser("A_st"));

}
}else if(isv("Mget",1)){
if(isv("Mget",1) != "true"){
?>
<iframe src="<?=isv("Mget",1)?>" frameborder="0" ></iframe>
 <?php
die();
}
$in = isv("in",1);
if($in){
/*
$where = "where type ='6'";
$user = getUser("quran"," $where order by id asc","link,text");
//echo json_encode($user);
for($i=0;$i<count($user);$i++){
  $str1 = substr($user[$i]["text"],strpos($user[$i]["text"],"(")+1);
  $str1 = substr($str1,1,2);
  $image = addslashes(file_get_contents(compress($user[$i]["link"],20)));
    if(Num("Qimg","where  page='".$str1."' ") < 1){
    SqlIn("Qimg",array("image"=>$image,"page"=>$str1));
   unlink($image);
    }
 sleep(1);
}
  */
  $url = "http://khayra-oumma.com/tajwid/OLD/width320/";
$sq = new SqlLite("Qimg.db");
$sq->connect();
$sq->CREATE("CREATE TABLE IF NOT EXISTS `Qimg` (id integer primary key, name text,page text,image BLOB)");
//$ret =$sq->insert("Qimg",array("page"=>1,"name"=>Sel("Qpages","where  page='1' ")->name));
//$S = $sq->select("Qimg","where page=10");
//$S = Selaa("Qimg","where page=10");
//print_r($S);
//header('Content-Type: image/png');
//echo $S['image'];
//die();
for($i=1;$i<=604;$i++){
  if($i > 99){
  $img = $url."page".$i.".png";
  $nimg = "page".$i.".png";
  }else if($i > 9){
  $img = $url."page0".$i.".png";
  $nimg ="page0".$i.".png";
  }else if($i < 10){
  $img = $url."page00".$i.".png";
  $nimg = "page00".$i.".png";
  }


    if(!Sel("Qimg","where  page='".$i."' ")){
    $imag = compress($img,100,$nimg,true);
    file_put_contents($nimg, compress_png($nimg,3));
    $image = addslashes(file_get_contents($imag));
   //SqlIn("Qimg",array("image"=>$image,"page"=>$i,"name"=>Sel("Qpages","where  page='".$i."' ")->name));
   SqlIn("Qimg",array("image"=>$image,"page"=>$i));
  //echo  $sq->insert("Qimg",array("image"=>$nimg,"page"=>$i));
   // echo  $sq->insertDoc("Qimg",$nimg);
    unlink("/".$nimg);
    }
// sleep(1);
}
  $compressed_png_content = shell_exec("find . -type f -iname \*.png -delete");
    /*
    if (!$compressed_png_content) {
        die("Conversion to compressed PNG failed. Is pngquant 1.8+ installed on the server?");
    } */

}else{
$user = getUser("Qimg"," where page > 400  order by page asc  ");
for($i=0;$i<count($user);$i++){
 $j = $user[$i];
 $newArrData[$i] =  $user[$i];
 $newArrData[$i]['image'] = base64_encode($user[$i]['image']);
}
echo json_encode($newArrData);
/*
foreach($user as $key=>$value){
    $newArrData[$key] =  $user[$key];
    $newArrData[$key]['image'] = base64_encode($user[$key]['image']);

} */


           }

}else{
if($_GET["get"]){
if(in_array($_GET["set"],explode(",",$_GET["get"]))){
echo "good";
}

}else{
$user = getUser("quran"," $where order by id asc limit 2",$g);
echo json_encode(array("data"=>$user));
      }
      }
?>