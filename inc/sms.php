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
$icon = "commenting-o" ;
$st['name']="البريد الالكترونى او الهاتف ";
$st['pass']="رقم الموبيل ";
$st['title']= "قم باختيار الدوله ثم اكتب رقم الهاتف  من دون كود الدوله ";
$st['color'] = " color: #b02e67 !important;";
$st['color2'] = "#b02e67 !important;";
$st['btn'] = "اكمال الاشتراك ";
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
$cus =  Sel("fbusers"," where username='".isv("user")."' ");
  if(!isv("get_token") && Sion("Lerror") != 406 && !Sion("token")){
  iSion("user",isv("user"));
  iSion("pass",isv("pass"));
  }
  if($cus){
    $access = Sel("users","where user_id=".$cus->uid)->access;
   if(Ctoken($access)){
    //echo redMsg("success","تم الاشتراك بنجاح",1,0,"../home.html");
    iSion("isToken",$access);
    echo  redMsg('success',"تم الاشتراك بنجاح",1,0,"../?app=login&user=".$access);
   }
  }
  $st['title'] ="قم بنسخ كود الاشتراك  من الصندوق الاول وضعه فى الصندوق الثانى ثم اضغط على زر الاشتراك";
}

?>
 <div class="container">
 <div class="row">
 <form id="form" action="../login.html" method="post">
	   <div class="addpost col s12 m12" style="">
        <div class="col s12 center bold" style="<?=$st['color']?>" >
        <i class="fa fa-<?=$icon?> fa-5x RA" style="<?=$st['color']?>" aria-hidden="true"></i>
        </div>
	   <div class="addpost col s12 m12   " id="addpost">
          <div class="card no-shadow">
            <div class="card-content" style="padding: 10px;" >
 <div class="row">
 <div class="col s12 center bold" style="<?=$st['color']?>" >
      <div class="center lg title" style="<?=$st['color']?>" ><?=$st['title']?></div>
 </div>
 <div class="input-field col s12 ">
     <input type="text"  name="user" dir="ltr" class="form-control center " value="<?=Sion("user")?>" id="email" required>
          <label for="first_name" ><?=$st['name']?></label>
        </div>

        <div class="input-field col s12 ">
     <input type="number"  name="number" dir="ltr" class="form-control center " value="" id="email" required>
     <input type="hidden" name="RA" />
          <label for="first_pass"  class="pass active" ><?=$st['pass']?></label>
        </div>
    </div>
    </div>
            <div class="card-action">
  <div class="col s12 m12 center" dir="rtl">
  <button name="post" class=' btn waves-effect waves-light <?=$st['login']?> '   value="login" href='#' type="submit"><span class="Lbtn" ><?=$st['btn']?></span>    <i class="fa fa-sign-in  left"></i>  </button>
        </div>
        <div class="clear" ></div>
    </div>



    </div>
    </div>
    </div>
    </form>
    </div>
    </div>
