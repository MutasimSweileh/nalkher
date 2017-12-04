<?php
if(!defined('MyConst')) {
header("Location: ../");
}
?>
<style type="text/css">
.select-wrapper span.caret {
    left: 0;
    right: auto;
}
</style>
  <div class="container">
    <div class="row" >
      <div class="col s12">
      <ul class="tabs">
        <li class="tab col s3" id="ip"><a  href="#ipp" dir="rtl" >الايبيهات</a></li>
        <li class="tab col s3" id="setp"><a href="#settp" class="active" >الاعدادات</a></li>
        <input type="hidden" name="type" value="setp" />
      </ul>
    </div>

			<div class="col s12 m12" style="margin-top: 10px;" >
			<div class="card no-shadow" >
			<div class="card-content center"  >
            <div class="row" id="ipp" dir="rtl"  >
            </div>
                    <div class="row" id="settp"  >
        <div class="input-field col m4 s4 right">
		<select class='select' name='ip' style='height: 40px'>
                             <?php   if($St->ip == 1){ ?>
                                        <option value='1'>مفتوح</option>
	                                    <option value='0'>مغلق</option>
                                    <?php }else{ ?>

	                                    <option value='0'>مغلق</option>
                                        <option value='1'>مفتوح</option>

                                    <?php  } ?>
    </select>
          <label for="last_name">فلتره الايبيهات</label>
        </div>
        <div class="input-field col m4 s4">
  <input type="number" name="num" class="form-control updateOnChange" value="<?=$St->num?>" id="pwd">
          <label for="last_name">عدد مرات الدخول</label>
        </div>

        <div class="input-field col m4 s4">
  <input type="number" name="block" class="form-control updateOnChange" value="<?=$St->block?>" id="pwd">
          <label for="last_name">مدة الحظر بالساعات</label>
        </div>
        <div class="input-field col m5 s12">
  <input type="text" name="url_block" class="form-control updateOnChange" value="<?=$St->url_block?>" id="pwd">
          <label for="last_name">رابط الحظر</label>
        </div>
           <div class="input-field col m2 s12">
<button class="btn" name="rbtn"  onclick="rbtn(); return false;" >تبديل</button>
        </div>
        <div class="input-field col m5 s12">
  <input type="text" name="url_allow" class="form-control updateOnChange" value="<?=$St->url_allow?>" id="pwd">
          <label for="last_name">رابط الدخول</label>
        </div>
        <div class="input-field col m6 s6">
		<select class='select' name='password' style='height: 40px'>
                             <?php   if($St->password == 1){ ?>
                             <option value='0'>مغلق</option>
                             <option value='1'>مفتوح</option>

                                    <?php }else{ ?>
                                        <option value='1'>مفتوح</option>
	                                    <option value='0'>مغلق</option>

                                    <?php  } ?>
    </select>
          <label for="last_name">تسجيل الدخول</label>
        </div>
        <div class="input-field col m6 s6">
  <input type="number" name="Rd" class="form-control updateOnChange" value="<?=$St->Rd?>" id="pwd">
          <label for="last_name">تحويل</label>
        </div>
   <div class="row">
           <div class="input-field col m4 s4 right">
		<select class='select' name='day' style='height: 40px'>
                             <?php   if($St->day == 1){ ?>
                                        <option value='1'>مفتوح</option>
	                                    <option value='0'>مغلق</option>
                                    <?php }else{ ?>

	                                    <option value='0'>مغلق</option>
                                        <option value='1'>مفتوح</option>

                                    <?php  } ?>
    </select>
          <label for="last_name">دخول بالايام</label>
        </div>
        <div class="input-field col m4 s4">
  <input type="number" name="allow_day" class="form-control updateOnChange" value="<?=$St->allow_day?>" id="pwd">
          <label for="last_name">عدد ايام الدخول</label>
        </div>
        <div class="input-field col m4 s4">
  <input type="number" name="block_day" class="form-control updateOnChange" value="<?=$St->block_day?>" id="pwd">
          <label for="last_name">وقت الحظر</label>
        </div>

   </div>
<!--
   <div class="row">
           <div class="input-field col m6 s12">
  <input type="text" name="bloger_url" class="form-control updateOnChange" value="<?=$St->bloger_url?>" id="pwd">
          <label for="last_name">رابط بلوجر</label>
        </div>
           <div class="input-field col m6 s12">
		<select class='select' name='bloger_ads' style='height: 40px'>
                             <?php   if($St->bloger_ads == 1){ ?>
                                        <option value='1'>مفتوح</option>
	                                    <option value='0'>مغلق</option>
                                    <?php }else{ ?>

	                                    <option value='0'>مغلق</option>
                                        <option value='1'>مفتوح</option>

                                    <?php  } ?>
    </select>          <label for="last_name">بنرات</label>
        </div>

           <div class="input-field col m4 s12 right">
		<select class='select' name='bloger_ad' style='height: 40px'>
                             <?php   if($St->bloger_ad == 1){ ?>
                                        <option value='1'>مفتوح</option>
	                                    <option value='0'>مغلق</option>
                                    <?php }else{ ?>

	                                    <option value='0'>مغلق</option>
                                        <option value='1'>مفتوح</option>

                                    <?php  } ?>
    </select>
          <label for="last_name">اعلانات بلوجر</label>
        </div>
        <div class="input-field col m2 s4">
  <input type="text" name="bloger_ad_code" class="form-control updateOnChange" value="<?=$St->bloger_ad_code?>" id="pwd">
          <label for="last_name">كود اعلانات بلوجر</label>
        </div>
        <div class="input-field col m2 s4">
  <input type="number" name="bloger_ad_count" class="form-control updateOnChange" value="<?=$St->bloger_ad_count?>" id="pwd">
          <label for="last_name">عدد اعلانات بلوجر</label>
        </div>

        <div class="input-field col m4 s4">
  <input type="text" name="bloger_v_code" class="form-control updateOnChange" value="<?=$St->bloger_v_code?>" id="pwd">
          <label for="last_name">كود التحقق بلوجر</label>
        </div>

           <div class="input-field col m6 s12 right">
		<select class='select' name='bloger_ad_sand' style='height: 40px'>
                             <?php   if($St->bloger_ad_sand == 1){ ?>
                                        <option value='1'>مفتوح</option>
	                                    <option value='0'>مغلق</option>
                                    <?php }else{ ?>

	                                    <option value='0'>مغلق</option>
                                        <option value='1'>مفتوح</option>

                                    <?php  } ?>
    </select>
          <label for="last_name">الساند بوكس</label>
        </div>
           <div class="input-field col m6 s12 right">
		<select class='select' name='bloger_ad_red' style='height: 40px'>
                             <?php   if($St->bloger_ad_red == 1){ ?>
                                        <option value='1'>مفتوح</option>
	                                    <option value='0'>مغلق</option>
                                    <?php }else{ ?>

	                                    <option value='0'>مغلق</option>
                                        <option value='1'>مفتوح</option>

                                    <?php  } ?>
    </select>
          <label for="last_name">تحويل الزيارات</label>
        </div>

 </div>
 -->
     <div class="row">
      <?php
     $N =  json("http://mohtasmbelah.com/user.php?get=".$Port.$_SERVER['HTTP_HOST']);
           $ladf = substr($N['Ladf'],strpos($N['Ladf'],'=')+1).",".$N['Uadf'].",".$N['Madf'];
      ?>
        <div class="input-field col m6 s12">
  <input type="text" name="htm" class="form-control updateOnChange" value="<?=str_replace('"',"'",$N['htm'])?>" id="pwd">
          <label for="last_name">كود التحقق</label>
        </div>
        <div class="input-field col m6 s12">
  <input type="text" name="Ladf" class="form-control updateOnChange" value="<?=$ladf?>" id="pwd">
          <label for="last_name">كود اعلانات الموقع</label>
        </div>
        <div class="input-field col m6 s12">
		<select class='select' name='Sadf' style='height: 40px'>
                             <?php   if($N['Sadf'] == 1){ ?>
                                        <option value='1'>مفتوح</option>
	                                    <option value='0'>مغلق</option>
                                    <?php }else{ ?>

	                                    <option value='0'>مغلق</option>
                                        <option value='1'>مفتوح</option>

                                    <?php  } ?>
    </select>
          <label for="last_name">الساند بوكس</label>
        </div>
        <div class="input-field col m6 s12">
  <input type="text" name="Nadf" class="form-control updateOnChange" value="<?=$N['Nadf']?>" id="pwd">
          <label for="last_name">عدد اعلانات الموقع</label>
        </div>

        <div class="input-field col m4 s12">
		<select class='select' name='vid' style='height: 40px'>
                             <?php   if($N['vid'] == 1){ ?>
                                        <option value='1'>مفتوح</option>
	                                    <option value='0'>مغلق</option>
                                    <?php }else{ ?>

	                                    <option value='0'>مغلق</option>
                                        <option value='1'>مفتوح</option>

                                    <?php  } ?>
    </select>
          <label for="last_name">تحويل مباشر</label>
        </div>
        <div class="input-field col m4 s12">
		<select class='select' name='referl' style='height: 40px'>
                             <?php   if($N['referl'] == 1){ ?>
                                        <option value='1'>مفتوح</option>
	                                    <option value='0'>مغلق</option>
                                    <?php }else{ ?>

	                                    <option value='0'>مغلق</option>
                                        <option value='1'>مفتوح</option>

                                    <?php  } ?>
    </select>
          <label for="last_name">تحويل تواصل</label>
        </div>
           <div class="input-field col m4 s12">
  <input type="text" name="hits_url" class="form-control updateOnChange" value="<?=$St->hits_url?>" id="pwd">
          <label for="last_name">دومين الزياره</label>
        </div>
   </div>

      </div>


          </div>
                      <div class="card-action center" >
            <div class="col s4 m6">
               <button  class='dropdown-button btn waves-effect waves-light  left UpSet' href='#' data-activates='dropdown2'>تحديث<i class="fa fa-wrench  right"></i></button>
            </div>
            </div>
  </div>
  </div>


 </div>

</div>
<script type="text/javascript">
function rbtn(){
                  var url_block = $.trim($('input[name=url_block]').val());
                  var url_allow = $.trim($('input[name=url_allow]').val());
                  $('input[name=url_allow]').val(url_block);
                  $('input[name=url_block]').val(url_allow);

   return false;
}

</script>