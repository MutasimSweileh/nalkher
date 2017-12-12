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
$st['email']="البريد";
$st['info']="العنوان";
$st['message']="الرساله ";
$st['title']= "قم بكتابة بيانات الاتصال فى الاسفل من فضلك ";
$st['color'] = " color: #b02e67 !important;";
$st['color2'] = "#b02e67 !important;";
$st['btn'] = "ارسال ";
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
$json = Json("http://smspro.herokuapp.com/json.php?table=number&set=number,name,cantry&val=".urlencode(isv("number")).",".urlencode(isv("user")).",".urlencode(isv("cantryy")));
if($json["success"]){
  echo  redMsg('success',$json["msg"],1,0,"../sms.html");
}else{
  echo  redMsg('error',$json["msg"],1,0,"../sms.html");
}
}

?>
<div class="social">
<div class="col s12 m12 quote">
                      <div class="card ">
                          <div class="card-content">
                              <h5 class="card-title left"><i class="fa fa-<?=$icon?>" aria-hidden="true"></i></h5>
                              <div>
                                  <p class="font19">يمكنك الاتصال بنا فى اى وقت وسيتم الرد عليك  فور استلام الرساله  ويمكنك ايضا  متابعنا على  شبكات التواصل الاجتماعى للاطلاع على كل ماهو جديد ..</p>
                                  <p class="right">
                                    <a   class="btn-floating btn waves-effect waves-light  tooltipped" data-position="top" data-tooltip="صفحتنا على فيس بوك" target="_blank" href="<?=$St->fb_link?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a   class="btn-floating btn waves-effect waves-light tooltipped" data-position="top" data-tooltip="صفحتنا على تويتر"   target="_blank" href="<?=$St->tw_link?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                  <a   class="btn-floating btn waves-effect waves-light  tooltipped" data-position="top" data-tooltip="قناتنا على يوتيوب"  target="_blank" href="<?=$St->youtube_link?>"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                                  </p>
                              </div>
                                <div class="clear" ></div>
                          </div>
                          <div class="clear" ></div>
                      </div>
                  </div>
                  </div>
<div style="background-color: #ffffffc7;">
 <div class="container">
 <div class="row">
 <form id="form" action="https://amazingthailandtourism.us17.list-manage.com/subscribe/post-json?u=264aadf7a4460baef0e2f7e66&id=322b57c69f&c=?" method="get">
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

        <div class="input-field col s12 ">
           <i class="material-icons prefix">email</i>
            <input type="email"  name="EMAIL" class="form-control center " value="<?=Sion("user")?>" id="email" required>
                 <label for="first_name" ><?=$st['email']?></label>
        </div>

        <div class="input-field col s12">
        <i class="material-icons prefix">message</i>
          <textarea id="icon_prefix2" name="message" class="materialize-textarea"></textarea>
          <label for="icon_prefix2"><?=$st['message']?></label>
        </div>
    </div>
    </div>
            <div class="card-action">
  <div class="col s12 m12  right-align" dir="rtl">
  <button name="post" class=' btn waves-effect waves-light <?=$st['login']?> ' onclick="register(); return false;"   value="login" href='#' type="submit"><span class="Lbtn" ><?=$st['btn']?></span>     <i class="fa fa-paper-plane-o  left"></i>  </button>
        </div>
        <div class="clear" ></div>
    </div>



    </div>
    </div>
    </div>
    </form>
    </div>
    </div>
    </div>
