<?php
 if(!defined('MyConst')) {
header("Location: ../");
}
?>
<div class="container">
<div class="row">
             <div class="col s12" style="    margin-bottom: 5px;">
      <ul class="tabs">
        <li class="tab col s3" id="admin"><a >الادمن</a></li>
        <li class="tab col s3" id="tw"><a >تويتر</a></li>
        
        <li class="tab col s3" id="msg"><a >الرسائل</a></li>
       
        <li class="tab col s3" id="fb"><a >فيس بوك</a></li>
        <li class="tab col s3" id="set"><a class="active" >عام</a></li>
        <input type="hidden" name="Stype" value="set" />
      </ul>
    </div>

	   <div class="addpost col s12 m12  z-depth-1 white" id="addpost">
          <div class="card no-shadow">
            <div class="card-content">
<div  class="msg">
      <div class="row">
        <div class="input-field col s6 right">
									<select class='form-control updateOnChange select' name='msg' style='height: 40px'>
                             <?php $Sh= Sel("share");   if($Sh->msg == 1){ ?>
                                        <option value='1'>مفتوح</option>
	                                    <option value='0'><?=lang($lg,'close')?></option>
                                    <?php }else{ ?>

	                                    <option value='0'><?=lang($lg,'close')?></option>
                                        <option value='1'>مفتوح</option>

                                    <?php  } ?>
	                                </select>
    <label>تفعيل النشر المجدول</label>
        </div>
        <div class="input-field col s6  right">
   	 	 <input type='number' class='form-control updateOnChange' value="<?=$Sh->time_msg?>" name='time_msg'/>
          <label for="last_name">وقت النشر المجدول</label>
        </div>
      </div>
</div>
<div class="set">
 <div class="row">
    <div class="col s12">
      <div class="row">
        <div class="input-field col s6 right">
     <input type="text" name='title' class="form-control right-align" dir="rtl" value="<?=$St->title?>" id="email">
          <label for="first_name">اسم الموقع</label>
        </div>

        <div class="input-field col s3">
  <input type="number" name="numposts" class="form-control updateOnChange" value="<?=$St->numposts?>" id="pwd">
          <label for="last_name">عدد المنشورات فى الرئيسيه</label>
        </div>

        <div class="input-field col s3">
									<select class='select' name='comment' style='height: 40px'>
                             <?php   if($St->comment == 'fb'){ ?>
                                        <option value='fb'>فيس بوك</option>
	                                    <option value='site'>الموقع</option>
                                    <?php }else{ ?>

	                                    <option value='site'>الموقع</option>
                                        <option value='fb'>فيس بوك</option>

                                    <?php  } ?>
    </select>
          <label for="last_name">صندوق التعليقات</label>
        </div>

      </div>
      <div class="row">
        <div class="input-field col s12">
                <textarea id="textarea1" class="materialize-textarea" name='des'><?=$St->description?></textarea>
          <label for="textarea1">وصف الموقع</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s2 right" style="    height: 3rem;    text-align: center;
    padding: 8px 6px 0px 21px;">
 <input type='color' class='form-control updateOnChange'  value="<?php if(!empty($St->color)){echo $St->color;}else{echo "#4db6ac";} ?>" name='color' style="    width: 100%;
    height: 100%;" />
          <label for="first_name" class="active">اللون الرئيسى</label>
        </div>
        <div class="input-field col s5">
   	 <input type='text' class='form-control updateOnChange right-align' dir="rtl" value="<?=$St->mtext2?>" name='mtext2'/>
          <label for="last_name">النص الكتابى</label>
        </div>
        <div class="input-field col s5">
   	 <input type='text' class='form-control updateOnChange right-align' dir="rtl"  value="<?=$St->mtext1?>" name='mtext1'/>
          <label for="last_name">النص الرئيسيى</label>
        </div>

      </div>
      <div class="row">
        <div class="input-field col s6">
     <div class="col s10 right" style="    padding-left: 0;">
 <input type='text' class='form-control updateOnChange'  value="<?=$St->logo?>" name='logo' />
          <label for="first_name">رابط الشعار</label>
     </div>
     <div class="col s2" style="    padding-left: 0;">
          <button class="btn upload-click" style="height: 3rem;">رفع</button>
          <button class="btn upload-image" style="height: 3rem;display:none"><img style="width: 25px;height: 44px;    " src="../assets/images/spin.svg" alt="" /></button>
     </div>
        </div>
        <div class="input-field col s6">
   	 <input type='text' class='form-control updateOnChange' value="<?=$St->youtube_link?>" name='youtube_link'/>
          <label for="last_name">رابط يوتيوب</label>
        </div>
      </div

      <?php if(Fcol('google_id')){  ?>
            <div class="row">
        <div class="input-field col s12 m6 right">
   <input type='text' class='form-control updateOnChange' value="<?=NoAdmin($St->google_id,'************',1)?>" name='google_id'/>
          <label for="first_name">اى دى تطبيق جوجل</label>
        </div>
        <div class="input-field col s12 m6">
 	 <input type='text' class='form-control updateOnChange' value="<?=NoAdmin($St->google_key,'************',1)?>" name='google_key'/>
          <label for="last_name">مفتاح تطبيق جوجل </label>
        </div>
    <?php  }  ?>
      <div class="row">
         <div class="input-field col s6">
   	 <input type='text' class='form-control updateOnChange' value="<?=NoAdmin($St->api_key,'************',1)?>" name='api_key'/>

       <label>مفتاح جوجل  لاختصار الروابط</label>
</div>
         <div class="input-field col s6">
									<select class='select' name='site_status' style='height: 40px'>
                             <?php   if($St->close == 1){ ?>
                                        <option value='1'><?=lang($lg,'open')?></option>
	                                    <option value='0'><?=lang($lg,'close')?></option>
                                    <?php }else{ ?>

	                                    <option value='0'><?=lang($lg,'close')?></option>
                                        <option value='1'><?=lang($lg,'open')?></option>

                                    <?php  } ?>
    </select>
    <label>حالة الموقع</label>
  </div>
  </div>
      <div class="row site_status" <?php if($St->close == 1){ echo 'style="display:none"';} ?> >
        <div class="input-field col s12">
                <textarea id="textarea1" class="materialize-textarea" name='close_msg'><?=$St->textclose?></textarea>
          <label for="textarea1">رسالة الاغلاق</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12 m6">
                <textarea id="textarea1" class="materialize-textarea left-align" dir="ltr" style="    direction: ltr;" name='status'><?=$St->terms?></textarea>
          <label for="textarea1">كود احصائيات الموقع</label>
        </div>
        <div class="input-field col s12 m6">
                <textarea id="textarea1" class="materialize-textarea left-align" style="    direction: ltr;" name='home_ad'><?=$St->home_ad?></textarea>
          <label for="textarea1">اعلان الصفحه الرئيسيه</label>
        </div>

      </div>
      <div class="row">
        <div class="input-field col s12 m6">
                <textarea id="textarea1" class="materialize-textarea left-align" style="    direction: ltr;"  name='post_ad'><?=$St->post_ad?></textarea>
          <label for="textarea1">اعلان المنشورات</label>
        </div>
        <div class="input-field col s12 m6">
                <textarea id="textarea1" class="materialize-textarea left-align" style="    direction: ltr;"  name='slide_ad'><?=$St->send_text_off?></textarea>
          <label for="textarea1">اعلان القائمه الجانبيه داخل المنشورات</label>
        </div>

      </div>

    </div>
  </div>

</div>
<!---set---->
<div class="fb" style="display: none">
 <div class="row">
    <form class="col s12">
<!--
     <div class="row">
        <div class="input-field col s12 m12 right">
									<select class='form-control updateOnChange select' name='OptioMobile' style='height: 40px'>
                             <?php   if($St->OptioMobile == 1){ ?>
                                        <option value='1'><?=lang($lg,'open')?></option>
	                                    <option value='0'><?=lang($lg,'close')?></option>
                                    <?php }else{ ?>

	                                    <option value='0'><?=lang($lg,'close')?></option>
                                        <option value='1'><?=lang($lg,'open')?></option>

                                    <?php  } ?>
	                                </select>
    <label>استخدام التطبيق الخام</label>
        </div>
        </div>
      <div class="row">
        <div class="input-field col s6 right">
   <input type='text' class='form-control updateOnChange' value="<?=NoAdmin($St->app_id,'************',1)?>" name='app_id'/>
          <label for="first_name">اى دى التطبيق</label>
        </div>
        <div class="input-field col s6">
 	 <input type='text' class='form-control updateOnChange' value="<?=NoAdmin($St->app_key,'************',1)?>" name='app_key'/>
          <label for="last_name">مفتاح التطبيق</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6 right">
									<select class='form-control updateOnChange select' name='app2' style='height: 40px'>
                             <?php   if($St->app2 == 1){ ?>
                                        <option value='1'><?=lang($lg,'open')?></option>
	                                    <option value='0'><?=lang($lg,'close')?></option>
                                    <?php }else{ ?>

	                                    <option value='0'><?=lang($lg,'close')?></option>
                                        <option value='1'><?=lang($lg,'open')?></option>

                                    <?php  } ?>
	                                </select>
    <label>التطبيق الاحتياطى</label>
        </div>
        <div class="input-field col s6 right">
									<select class='form-control updateOnChange select' name='app2sql' style='height: 40px'>
                             <?php   if($St->app2sql == 1){ ?>
                                        <option value='1'><?=lang($lg,'open')?></option>
	                                    <option value='0'><?=lang($lg,'close')?></option>
                                    <?php }else{ ?>

	                                    <option value='0'><?=lang($lg,'close')?></option>
                                        <option value='1'><?=lang($lg,'open')?></option>

                                    <?php  } ?>
	                                </select>
    <label>استخدام قاعدة بيانات التطبيق الاحتياطى</label>
        </div>

</div>
      <div class="row app2" <?php if($St->app2 == 0){ echo 'style="display:none"';} ?>>
        <div class="input-field col s6 right">
   <input type='text' class='form-control updateOnChange' value="<?=NoAdmin($St->app2_id,'************',1)?>" name='app2_id'/>
          <label for="first_name">اى دى التطبيق الاحتياطى</label>
        </div>
        <div class="input-field col s6">
 	 <input type='text' class='form-control updateOnChange' value="<?=NoAdmin($St->app2_key,'************',1)?>" name='app2_key'/>
          <label for="last_name">مفتاح التطبيق الاحتياطى</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12 m4 right">
									<select class='form-control updateOnChange select' name='app' style='height: 40px'>
                             <?php   if($St->app == 1){ ?>
                                        <option value='1'><?=lang($lg,'open')?></option>
	                                    <option value='0'><?=lang($lg,'close')?></option>
                                    <?php }else{ ?>

	                                    <option value='0'><?=lang($lg,'close')?></option>
                                        <option value='1'><?=lang($lg,'open')?></option>

                                    <?php  } ?>
	                                </select>
    <label>التطبيق الدائم</label>
        </div>
        <div class="input-field col s12 m4 right">
									<select class='form-control updateOnChange select left-text'  name='typeapp' style='text-align: left;height: 40px'>
                             <?php   if($St->titleen == "htc"){ ?>
                                        <option value='htc'>HTC</option>
	                                    <option value='iphoto'>Iphoto</option>
                                    <?php }else{ ?>

	                                    <option value='iphoto'>Iphoto</option>
                                        <option value='htc'>HTC</option>

                                    <?php  } ?>
	                                </select>
    <label>نوع التطبيق الدائم</label>
        </div>

        <div class="input-field col s12 m4 right">
									<select class='form-control updateOnChange select' name='appsql' style='height: 40px'>
                             <?php   if($St->appsql == 1){ ?>
                                        <option value='1'><?=lang($lg,'open')?></option>
	                                    <option value='0'><?=lang($lg,'close')?></option>
                                    <?php }else{ ?>

	                                    <option value='0'><?=lang($lg,'close')?></option>
                                        <option value='1'><?=lang($lg,'open')?></option>

                                    <?php  } ?>
	                                </select>
    <label>استخدام قاعدة بيانات التطبيق الدائم</label>
        </div>

        </div>
 -->
      <div class="row">
        <div class="input-field col s6 right">
									<select class='form-control updateOnChange select' name='cron' style='height: 40px'>
                             <?php if($St->cron == 1){ ?>
                                        <option value='1'>حسب الوقت المحدد</option>
                                        <option value='2'>حسب اختيار المستخدم</option>
	                                    <option value='0'><?=lang($lg,'close')?></option>
                                    <?php }else if($St->cron == 2){ ?>
                                        <option value='2'>حسب اختيار المستخدم</option>
                                        <option value='1'>حسب الوقت المحدد</option>
	                                    <option value='0'><?=lang($lg,'close')?></option>
                                    <?php }else{ ?>

	                                    <option value='0'><?=lang($lg,'close')?></option>
                                        <option value='1'>حسب الوقت المحدد</option>
                                        <option value='2'>حسب اختيار المستخدم</option>

                                    <?php  } ?>
	                                </select>
    <label>تفعيل النشر المجدول</label>
        </div>
        <div class="input-field col s6 right">
									<select class='form-control updateOnChange select' name='order' style='height: 40px'>
                             <?php   if($St->bity == 1){ ?>
                                        <option value='1'>الاحدث</option>
	                                    <option value='0'>الاقدم</option>
	                                    <option value='2'>عشوائى</option>
                                    <?php }else if($St->bity == 2){ ?>
	                                    <option value='2'>عشوائى</option>
                                        <option value='1'>الاحدث</option>
	                                    <option value='0'>الاقدم</option>
                                    <?php }else{ ?>
	                                    <option value='0'>الاقدم</option>
                                        <option value='1'>الاحدث</option>
	                                    <option value='2'>عشوائى</option>

                                    <?php  } ?>
	                                </select>
    <label>نشر المنشورات بترتيب</label>
        </div>
        <div class="input-field col s6">
									<select class='form-control updateOnChange select' name='Rtime' style='height: 40px'>
                             <?php   if($St->Rtime == 1){ ?>
                                        <option value='1'><?=lang($lg,'open')?></option>
	                                    <option value='0'><?=lang($lg,'close')?></option>
                                    <?php }else{ ?>

	                                    <option value='0'><?=lang($lg,'close')?></option>
                                        <option value='1'><?=lang($lg,'open')?></option>

                                    <?php  } ?>
	                                </select>
    <label>اعادة نشر المنشورات بشكل تلقائى</label>
        </div>

        <div class="input-field col s6  right">
   	 	 <input type='number' class='form-control updateOnChange' value="<?=$St->crontime?>" name='cron_time'/>
          <label for="last_name">وقت النشر المجدول</label>
        </div>
      </div>
      <div class="row">
       <?php
            if(empty($St->api_key)){
              $dss ='disabled="disabled"';
              $dssm ="قم بااضافه مفتاح جوجل فى الاعدادات لكى يعمل هذا الخيار";
              $tool="tooltipped";
            }
       ?>
        <div class="input-field col s4 right <?=$tool?>" data-position="bottom" data-delay="50" data-tooltip="<?=$dssm?>">
									<select class='form-control updateOnChange select '  <?=$dss?> name='short' style='height: 40px'>
                             <?php   if($St->activelogo == 1){ ?>
                                        <option value='1'><?=lang($lg,'open')?></option>
	                                    <option value='0'><?=lang($lg,'close')?></option>
                                    <?php }else{ ?>

	                                    <option value='0'><?=lang($lg,'close')?></option>
                                        <option value='1'><?=lang($lg,'open')?></option>

                                    <?php  } ?>
	                                </select>
    <label>اختصار الرابط</label>
        </div>
        <div class="input-field col s4 right">
									<select class='form-control updateOnChange select' name='spostlink' style='height: 40px'>
                             <?php   if($St->spostlink == 1){ ?>
                                        <option value='1'><?=lang($lg,'open')?></option>
	                                    <option value='0'><?=lang($lg,'close')?></option>
                                    <?php }else{ ?>

	                                    <option value='0'><?=lang($lg,'close')?></option>
                                        <option value='1'><?=lang($lg,'open')?></option>

                                    <?php  } ?>
	                                </select>
    <label>نشر رابط التطبيق اسفل المنشور</label>
        </div>
        <div class="input-field col s4">
   	 		 <input type='number' class='form-control updateOnChange' value="<?=$St->zlink?>" name='zlink'/>
          <label for="last_name">عندما يزيد حروف  المنشور عن</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s6 right">
									<select class='form-control updateOnChange select' name='sred' style='height: 40px'>
                             <?php   if($St->sred == 1){ ?>
                                        <option value='1'><?=lang($lg,'open')?></option>
	                                    <option value='0'><?=lang($lg,'close')?></option>
                                    <?php }else{ ?>

	                                    <option value='0'><?=lang($lg,'close')?></option>
                                        <option value='1'><?=lang($lg,'open')?></option>

                                    <?php  } ?>
	                                </select>
    <label>تحويل المشترك بعد الاشتراك</label>
        </div>
        <div class="input-field col s6">
   	 		 <input type='text' class='form-control updateOnChange' value="<?=$St->postlink?>" name='link'/>
          <label for="last_name">رابط التحويل</label>
        </div>
      </div>
<div class="row">
        <div class="input-field col s6 right">
   	 	   	 <input type='text' class='form-control updateOnChange' value="<?=$St->fb_link?>" name='fb_link'/>
          <label for="last_name">رابط صفحة الفيس بوك</label>
        </div>
     <div class="input-field col s6 ">
									<select class='form-control updateOnChange select' name='rDelete' style='height: 40px'>
                             <?php   if($St->rDelete == 1){ ?>
                                        <option value='1'><?=lang($lg,'open')?></option>
	                                    <option value='0'><?=lang($lg,'close')?></option>
                                    <?php }else{ ?>

	                                    <option value='0'><?=lang($lg,'close')?></option>
                                        <option value='1'><?=lang($lg,'open')?></option>

                                    <?php  } ?>
	                                </select>
    <label>زر حذف الاشتراك</label>
        </div>

      </div>
      <div class="row">
     <div class="input-field col s4 ">
									<select class='form-control updateOnChange select' name='getpages' style='height: 40px'>
                             <?php   if($St->getpages == 1){ ?>
                                        <option value='1'><?=lang($lg,'open')?></option>
	                                    <option value='0'><?=lang($lg,'close')?></option>
                                    <?php }else{ ?>

	                                    <option value='0'><?=lang($lg,'close')?></option>
                                        <option value='1'><?=lang($lg,'open')?></option>

                                    <?php  } ?>
	                                </select>
    <label>جلب صفحات المستخدم</label>
        </div>

     <div class="input-field col s4 ">
									<select class='form-control updateOnChange select' name='getgroups' style='height: 40px'>
                             <?php   if($St->getgroups == 1){ ?>
                                        <option value='1'><?=lang($lg,'open')?></option>
	                                    <option value='0'><?=lang($lg,'close')?></option>
                                    <?php }else{ ?>

	                                    <option value='0'><?=lang($lg,'close')?></option>
                                        <option value='1'><?=lang($lg,'open')?></option>

                                    <?php  } ?>
	                                </select>
    <label>جلب مجموعات المستخدم</label>
        </div>

     <div class="input-field col s4 ">
									<select class='form-control updateOnChange select' name='getfriends' style='height: 40px'>
                             <?php   if($St->getfriends == 1){ ?>
                                        <option value='1'><?=lang($lg,'open')?></option>
	                                    <option value='0'><?=lang($lg,'close')?></option>
                                    <?php }else{ ?>

	                                    <option value='0'><?=lang($lg,'close')?></option>
                                        <option value='1'><?=lang($lg,'open')?></option>

                                    <?php  } ?>
	                                </select>
    <label>جلب اصدقاء المستخدم</label>
        </div>

      </div>
      <div class="row">
        <div class="input-field col s12">
                <textarea id="textarea1" class="materialize-textarea" name='Rmsg'><?=html_entity_decode(stripslashes(str_replace('\n','
                ',$St->Rmsg)))?></textarea>
          <label for="textarea1">رسالة الاشتراك داخل الموقع</label>
        </div>
      </div>

    </form>
  </div>

</div>
<!---fb---->
<div class="tw" style="display: none">
 <div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s12 right">
									<select class='form-control updateOnChange select' name='tw' style='height: 40px'>
                             <?php   if($St->tw == 1){ ?>
                                        <option value='1'><?=lang($lg,'open')?></option>
	                                    <option value='0'><?=lang($lg,'close')?></option>
                                    <?php }else{ ?>

	                                    <option value='0'><?=lang($lg,'close')?></option>
                                        <option value='1'><?=lang($lg,'open')?></option>

                                    <?php  } ?>
	                                </select>
    <label>تفعيل اشتراك تويتر</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6 right">
   <input type='text' class='form-control updateOnChange' value="<?=$St->tw_id?>" name='tw_id'/>
          <label for="first_name">اى دى التطبيق</label>
        </div>
        <div class="input-field col s6">
 	 <input type='text' class='form-control updateOnChange' value="<?=$St->tw_key?>" name='tw_key'/>
          <label for="last_name">مفتاح التطبيق</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6 right">
									<select class='form-control updateOnChange select' name='cront' style='height: 40px'>
                             <?php   if($St->cront == 1){ ?>
                                        <option value='1'><?=lang($lg,'open')?></option>
	                                    <option value='0'><?=lang($lg,'close')?></option>
                                    <?php }else{ ?>

	                                    <option value='0'><?=lang($lg,'close')?></option>
                                        <option value='1'><?=lang($lg,'open')?></option>

                                    <?php  } ?>
	                                </select>
    <label>تفعيل النشر المجدول</label>
        </div>
        <div class="input-field col s6">
   	 	 <input type='number' class='form-control updateOnChange' value="<?=$St->crontimet?>" name='cron_timet'/>
          <label for="last_name">وقت النشر المجدول</label>
        </div>
      </div>
<div class="row">
        <div class="input-field col s12">
   	 	   	 <input type='text' class='form-control updateOnChange' value="<?=$St->tw_link?>" name='tw_link'/>
          <label for="last_name">رابط حساب تويتر</label>
        </div>
      </div>

    </form>
  </div>

</div>
<!---tw---->
<div class="admin" style="display: none">
 <div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s6 right">
    <input type='text' class='form-control updateOnChange'  name='admin_name' />
          <label for="first_name">اسم المدير</label>
        </div>
        <div class="input-field col s6">
 	 <input type='password' class='form-control updateOnChange' name='admin_pass' />
          <label for="last_name">الباسورد</label>
        </div>
      </div>
<div class="row">
        <div class="input-field col s6">
   	 	   	   <input type='email' class='form-control updateOnChange' value="" name='email' />
          <label for="last_name">البريد الالكترونى</label>
        </div>
        <div class="input-field col s6">
   	 	   	   <input type='url' class='form-control updateOnChange' value="" name='admin_fb' />
          <label for="last_name">حساب فيس بوك</label>
        </div>

      </div>

    </form>
  </div>

</div>
<!---admin---->

</div>
            <div class="card-action center">
                              <div class="col s4 m6">
<!-- Dropdown Trigger -->


  <button  class='dropdown-button btn waves-effect waves-light  left UpSet' href='#' data-activates='dropdown2'>تحديث<i class="fa fa-wrench  right"></i></button>
  <button  class='dropdown-button btn waves-effect waves-light  left login admin' style="display:none" href='#' data-activates='dropdown2'>اضافة ادمن<i class="fa fa-user-plus  right"></i></button>
    <input type="hidden" name="add" value="1" />
            </div>
            </div>
</div>
</div>
  <div class="addpost col s12 m12 z-depth-1 white admin" id="addpost" style="display:none"  dir="rtl">
          <div class="card no-shadow">

            <div class="card-content">
						<table class="table striped" style="width:100%;text-align: center">
                         <thead>
                        <tr>
								<td>اسم الادمن</td>
								<td>البريد</td>
								<td>خيارات</td>
							</tr>
                             </thead>

<?php
$users = getUser("admin"," order by id asc ");
if($users){
 for($i=0;$i<count($users);$i++){
      $Sb =$users[$i];
?>
                        <tr id="t<?=$Sb['id']?>" >
								<td ><?=$Sb['name']?></td>
								<td style="    direction: inherit;" ><?php if(Ls('admin')){echo $Sb['email'];}else{echo str($Sb['email'],6);} ?></td>
								<td >
                                <a  class="tooltipped" onclick="re(<?=$Sb['id']?>,'<?=$Gtype?>')"  data-tooltip=" حذف" id="<?=$Sb['id']?>" ><i class="fa fa-times " aria-hidden="true"></i></a>
                                <a class="tooltipped" onclick="E_post(<?=$Sb['id']?>);" data-tooltip="تعديل" ><i class="fa fa-pencil-square-o " aria-hidden="true"></i></a>
                                </td>
							</tr>
                            <?php } }?>
</table>
</div>
</div>
</div>
</div>
</div>

