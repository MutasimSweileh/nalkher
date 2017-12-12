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
$st['name']="الاسم";
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
$json = Json("http://smspro.herokuapp.com/json.php?set=name,number,cantry&val=".isv("user").",".isv("number").",".isv("cantryy"));
die($json);
}

?>
<div class="social">
<div class="col s12 m12 quote">
                      <div class="card ">
                          <div class="card-content">
                              <h5 class="card-title left"><i class="fa fa-<?=$icon?>" aria-hidden="true"></i></h5>
                              <div>
                                  <p class="font19"><?=$St->description?></p>
                                  <p class="right">
                                  <a   class="btn-floating btn waves-effect waves-light  tooltipped" data-position="top" data-tooltip="فديو" href="#"><i class="material-icons">ondemand_video</i></a>
                                  </p>
                              </div>
                                <div class="clear" ></div>
                          </div>
                          <div class="clear" ></div>
                      </div>
                  </div>
                  </div>
 <div class="container">
 <div class="row">
 <form id="form" action="../sms.html" method="post">
	   <div class="addpost col s12 m12" style="">

	   <div class="addpost col s12 m12   " id="addpost">
          <div class="card no-shadow">
            <div class="card-content" style="padding: 10px;" >
 <div class="row">
 <div class="col s12 center bold" style="<?=$st['color']?>" >
      <div class="center lg title" style="<?=$st['color']?>" ><?=$st['title']?></div>
 </div>
 <div class="input-field col s12 ">
    <i class="material-icons prefix">account_circle</i>
     <input type="text"  name="user" class="form-control center " value="<?=Sion("user")?>" id="email" required>
          <label for="first_name" ><?=$st['name']?></label>
        </div>

        <div class="input-field col s12">
          <i class="material-icons prefix">location_on</i>
          <div>
           <label style="padding-bottom: 5px;">اختر الدولة</label>
           <select  dir="ltr" name="cantryy" class="browser-default">
             <?php  $ar = countre(); for($i=0;$i< count($ar);$i++){ ?>
             <option value="<?=$ar[$i]?>"><?=$ar[$i]?></option>
           <?php } ?>
         </div>
         </div>
        <div class="input-field col s12 ">
          <i class="material-icons prefix">phone</i>
          <input type="number"  name="number" dir="ltr" class="form-control center " value="" id="email" required>
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
