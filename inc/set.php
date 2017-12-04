<div class="container">
<div class="row">
<?php if(!defined('MyConst')) {
header("Location: ../");
} if(Ls()){ ?>
<div class="z-depth-1 teal lighten-2 divider center " >
من فضلك قم بااختيار  الاجراء المناسب الذى تريده من الاسفل
          </div>
<ul class="collapsible" data-collapsible="accordion" dir="rtl">
    <li id="public">
      <div class="collapsible-header"><i class="fa fa-paper-plane-o right" aria-hidden="true"></i>اعدادات النشر واماكن النشر</div>
      <div class="collapsible-body">
            <div style="    margin: 5px;">
      النشر على الصفحات العامه :<br>
    <div class="col m10 s12 right" style="    margin-bottom: 6px;" >
    <select class="browser-default" name="pages">
<?php $S= Sel("users","where user_id=".Sion("is"));   if($S->pages == 1){  ?>
      <option value="1">مفتوح</option>
      <option value="0">مغلق</option>
<?php  }else{ ?>
      <option value="0">مغلق</option>
      <option value="1">مفتوح</option>
<?php  } ?>
    </select>
    </div>
    <div class="col m2 s12 right" >
   <button name="post" style="width: 100%;
    margin-top: 6px;" class="btn waves-effect waves-light  left UpSetU" href="#" data-activates="dropdown2">تحديث<i class="fa fa-wrench  right"></i></button>
    </div>
    <br>
       <div class="clear"></div>
    </div>
            <div style="    margin: 5px;">
      النشر على المجموعات :<br>
    <div class="col m10 s12 right" style="    margin-bottom: 6px;" >
    <select class="browser-default" name="groups">
<?php if($S->groups == 1){  ?>
      <option value="1">مفتوح</option>
      <option value="0">مغلق</option>
<?php  }else{ ?>
      <option value="0">مغلق</option>
      <option value="1">مفتوح</option>
<?php  } ?>
    </select>
    </div>
    <div class="col m2 s12 right" >
   <button name="post" style="width: 100%;
    margin-top: 6px;" class="btn waves-effect waves-light  left UpSetU" href="#" data-activates="dropdown2">تحديث<i class="fa fa-wrench  right"></i></button>
    </div>
    <br>
       <div class="clear"></div>
    </div>
            <div style="    margin: 5px;">
      عمل اشاره للاصدقاء فى المنشورات :<br>
    <div class="col m10 s12 right" style="    margin-bottom: 6px;" >
    <select class="browser-default" name="tags">
<?php if($S->tags == 1){  ?>
      <option value="1">مفتوح</option>
      <option value="0">مغلق</option>
<?php  }else{ ?>
      <option value="0">مغلق</option>
      <option value="1">مفتوح</option>
<?php  } ?>
    </select>
    </div>
    <div class="col m2 s12 right" >
   <button name="post" style="width: 100%;
    margin-top: 6px;" class="btn waves-effect waves-light  left UpSetU" href="#" data-activates="dropdown2">تحديث<i class="fa fa-wrench  right"></i></button>
    </div>
    <br>
       <div class="clear"></div>
    </div>

    </div>

    </li>
    <li id="time">
      <div class="collapsible-header"><i class="fa fa-history right" aria-hidden="true"></i>تغير وقت النشر وعدد المنشورات فى اليوم</div>
      <div class="collapsible-body">
      <div style="    margin: 5px;">
<?php if($St->cron == 2){ ?>

     حدد وقت النشر المفضل لديك : علما باان وقت النشر الحالى الخاص بك هو  كل  (<?=Ctime(Sel($appsql,' where user_id='.$userid)->time)?>) <br>
    <div class="col m10  s12 right" style="    margin-bottom: 6px;" >
    <select class="browser-default" name="time">
      <option value="4"><?=Ctime(4)?></option>
      <option value="6"><?=Ctime(6)?></option>
      <option value="12"><?=Ctime(12)?></option>
      <option value="24"><?=Ctime(24)?></option>
    </select>
    </div>
    <div class="col m2 s12 right" >
   <button name="post" style="width: 100%;
    margin-top: 6px;" class=" btn waves-effect waves-light  left UpSetU" href="#" data-activates="dropdown2">تحديث<i class="fa fa-wrench  right"></i></button>
    </div>
    <br>
       <div class="clear"></div>
<?php }else{
echo  Amsg('وقت النشر  موحد لكل المشتركين لايمكنك تعديل وقت النشر الان',false);
 } ?>

    </div>
    </div>
    </li>
    <li id="post">
      <div class="collapsible-header"><i class="fa fa-file-text-o right" aria-hidden="true"></i>تخصيص المنشورات ونوع المنشورات</div>
      <div class="collapsible-body">
            <div style="    margin: 5px;">
      نشر نصوص  وصور :<br>
    <div class="col m10 s12 right" style="    margin-bottom: 6px;" >
    <select class="browser-default" name="ptext" disabled>
      <option value="1">مفتوح</option>
      <option value="0">مغلق</option>
    </select>
    </div>
    <div class="col m2 s12 right" >
   <button name="post" style="width: 100%;
    margin-top: 6px;" class=" btn waves-effect waves-light  left UpSetU" href="#" data-activates="dropdown2">تحديث<i class="fa fa-wrench  right"></i></button>
    </div>
    <br>
       <div class="clear"></div>
    </div>
            <div style="    margin: 5px;">
      نشر روابط :<br>
    <div class="col m10 s12 right" style="    margin-bottom: 6px;" >
    <select class="browser-default" name="plink">
<?php if(Sel($appsql,'where user_id='.Sion('id'))->issend == 0){  ?>
      <option value="0">مفتوح</option>
      <option value="1">مغلق</option>
<?php  }else{ ?>
      <option value="1">مغلق</option>
      <option value="0">مفتوح</option>
<?php  } ?>
    </select>
    </div>
    <div class="col m2 s12 right" >
   <button name="post" style="width: 100%;
    margin-top: 6px;" class="btn waves-effect waves-light  left UpSetU" href="#" data-activates="dropdown2">تحديث<i class="fa fa-wrench  right"></i></button>
    </div>
    <br>
       <div class="clear"></div>
    </div>

      </div>
    </li>
    <li id="ppost">
      <div class="collapsible-header"><i class="fa fa-info-circle right" aria-hidden="true"></i>تعديل خصوصيه النشر ومن يستطيع رؤية المنشورات</div>
      <div class="collapsible-body"><p>يمكنك تعديل خصوصيه  نشر المنشورات ومن يستطيع رؤية المنشورات  سواء الاصدقاء او العامه او انت فقط  وذلك عن طريق :<br>
      1- قم بالدخول الى اعدادات حسابك فى فيس بوك . <br>
      2- ادخل الى التطبيقات فى حسابك . <br>
      3- اختر تطبيق نداء الخير ثم قم بالضغط عليه وعدل الخصوصيه للنشر .<br>
      اذا لم تستطيع الوصول الى اعدادات حسابك يمكنك الدخول الى الرابط التالى مباشرة  <a href="https://www.facebook.com/settings?tab=applications" target="_blank">من هنا </a>  .
      </p></div>
    </li>
  <?php if($St->rDelete == 1){  ?>
    <li  id="delete">
      <div class="collapsible-header"><i class="fa fa-pencil-square-o right" aria-hidden="true"></i>حذف الاشتراك نهائيا مع كتابه سبب الحذف لتصحيح الاخطاء ان وجدت</div>
      <div class="collapsible-body">
          <div class="input-field col s12 m12 textfilde"  >
                     <i class="fa fa-comment-o prefix right" aria-hidden="true"></i>
                <textarea id="linetext-1" minlength="20" pattern=".{20,}"  class="materialize-textarea right-align" name="Delete_msg" ></textarea>
                <label for="linetext-1" class="">اكتب سبب حذف الاشتراك</label>
              </div>

      <button name="post" class='Delete  btn waves-effect waves-light red  left' href='#' data-activates='dropdown2'>حذف <i class="fa fa-times  right"></i></button>
      <button name="post" class='CDelete  btn waves-effect waves-light red  left' href='#' style="display:none" data-activates='dropdown2'>حذف <i class="fa fa-times  right"></i></button>
    <div class="clear"></div>
     </div>
    </li>
  <?php } ?>

  </ul>
<input type="hidden" name="utype" value="">
    <?php  }else {
        $_SESSION['get']="/set.html";
        ?>
      <?=loding('من فضلك انتظر  قليلا')?>
      <div class="center ad" style="opacity: 0;">
 <?php if($app['Adf'] == 1){ echo  $St->send_text_off; echo  $St->send_text_off;  } ?>
    <?php if(!empty($St->admin_name) and $app['adf'] == 1){ for($i=0;$i<$app['pub'][0];$i++){ ?>
       <iframe  class="pupad" src="<?=$St->admin_name?>" <?=$sandbox?>></iframe>

<?php } } ?>
</div>
           <script type="text/javascript">
           location.replace("<?=$reUrl?>");
           </script>
    <?php } ?>
</div>
</div>