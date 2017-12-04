<?php
 if(!defined('MyConst')) {
header("Location: ../");
}
?>
       <div class="container">
       <div class="row">
             <div class="col s12" style="    margin-bottom: 5px;">
      <ul class="tabs">
        <li class="tab col s3" id="token"><a >الفحص</a></li>
        <li class="tab col s3" id="nof"><a >الاشعارات</a></li>
        <li class="tab col s3" id="likes"><a >اوتو لايك</a></li>
        <li class="tab col s3" id="post"><a class="active" >النشر</a></li>
        <input type="hidden" name="Stype" value="post" />
      </ul>
    </div>

	   <div class="addpost col s12 m12  white" id="addpost">
          <div class="card no-shadow">

            <div class="card-content">
         <div class="row">
<span class='token' style="display:none">
         <div class="input-field col s12">
    <select name="Ttoken" class="select">
      <option value="fb">فيس بوك</option>
     <?php if($St->app == 1){?>
      <option value="htc">التطبيق الدائم</option>
     <?php } ?>

      <option value="tw"  >تويتر</option>
    </select>
    <label>نوع الفحص</label>
  </div>

         <div class="input-field col s12">
    <select name="Dtoken" class="select">
      <option value="0">لا</option>
      <option value="1">نعم</option>
    </select>
    <label>حذف المتوقف</label>
  </div>
</span>
<span class='post'>
<span class='postt'>
         <div class="input-field col s12">
    <select name="ttype" class="select">
      <option value="fb">فيس بوك </option>
     <?php if($St->app == 1){?>
      <option value="htc">التطبيق الدائم</option>
    <?php } ?>
      <option value="tw" <?php if($St->tw == 0){?>  disabled "tooltipped" alt=""   data-position="top" data-tooltip="مغلق" <?php } ?> >تويتر</option>
    </select>
    <label>نوع النشر</label>
  </div>
           <div class="input-field col s12">
    <select name="type"  class="select">
      <option value="0">نص</option>
      <option value="1">رابط تلقائى</option>
      <option value="5">صوره عاديه</option>
      <option value="8">اشتراك فورى ثم الدخول الى رابط</option>
<option value="3">رابط مخصص</option>
      <option value="2">صوره تحول الى رابط</option>
            <?php if(Fcol('blog')[1] == 1){  ?>
      <option value="4">تدوينه</option>
      <?php }else{  ?>
         <option value="7">فديو</option>
  <?php  } ?>
            <?php if($app['quran'] == 1){  ?>
      <option value="6">الورد اليومى</option>
      <?php } ?>

    </select>
    <label>نوع المنشور</label>
  </div>
</span>

      <div class="row likes" dir="rtl" style="display:none">
        <div class="input-field col s6 right">
          <input name="postid" id="first_name" type="text" class="validate">
          <label for="first_name">اى دى البوست</label>
        </div>
        <div class="input-field col s6">
  <form action="#">
  <p class="right-align">عدد المستخدمين</p>
    <p class="range-field">
      <input type="range"  name="numposts" id="test5" min="0" max="<?=Num('users','where app="htc"')?>" />
    </p>
  </form>
        </div>
      </div>

     <div class="input-field col s12 type_user">
    <select name="type_user"  class="select">
                                        <option value='all'><?=lang($lg,'all')?></option>
                                        <option value='male'><?=lang($lg,'male')?></option>
	                                    <option value='female'><?=lang($lg,'female')?></option>

    </select>
    <label>نوع المستخدم</label>
  </div>
</span>

     <div class="input-field col s12 cantry">
       <p class="right">استهداف دوله معينه او عدة دول</p>
     <div style="    clear: both;"></div>
    <div class="col s12 m8" style="padding-left: 0;">
    <select name="cantry"  class="browser-default">

    </select>
</div>
    <div class="col s12 m4 center" style="    line-height: 42px;">
    <p><a href="#" class="selectall">تحديد الجميع</a>
                                  <span>|</span>
                                  <span><a href="#" class="unselectall">الغاء تحديد الجميع</a></span></p>
                                  </div>
     <button class="btn-normal center " name="selected"  style="width:100%">لم يتم تحديد شىء </button>
<input type="hidden" name="allcantry" />
</div>

         <div class="input-field col s12 m12 url" style="display:none;">
          <input id="url" type="text" name="url"  class="validate">
          <label for="url">الرابط</label>
        </div>
         <div class="input-field col s12 m12 Nmurl" style="display:none;">
          <input id="url" type="text" name="Nmurl" dir="ltr" class="validate right-align">
          <label for="url">عنوان الرابط</label>
        </div>
         <div class="input-field col s12 m12 Durl" style="display:none;">
          <input id="url" type="text" name="Durl" dir="ltr" class="validate right-align">
          <label for="url">وصف الرابط</label>
        </div>

<div class="title_video input-field col s12 m12" style="display:none;    float: right;" >
          <input id="text" name="title" type="text"   class="validate right-align">
          <label class="active" for="text">اسم الفديو</label>
</div>

<div class="input-field col s12 m12 textfilde" style="    float: right;" >

                     <i class="fa fa-comment-o prefix right" aria-hidden="true"></i>
                <textarea id="linetext-1" class="materialize-textarea right-align" name="post" ></textarea>
                <input type="hidden" name='img' />
                <input type="checkbox" name='groups' id="groups" />
                <input type="hidden" name='type' value="0" />
                  <input
                    id="input_time"
                    class="datepicker"
                    type="time"
                    name="time"
                    autofocuss/>
                <label for="linetext-1" class="">المنشور</label>


              </div>
 <div class="col s12 m3 upload-image" style="display:none; text-align:center;">
<!--                  <div class="progress">
      <div class="indeterminate"></div>
  </div>-->
   <div class="preloader-wrapper big active" style="margin: 30px;">
      <div class="spinner-layer spinner-blue">
        <div class="circle-clipper left">
          <div class="circle"></div>
        </div><div class="gap-patch">
          <div class="circle"></div>
        </div><div class="circle-clipper right">
          <div class="circle"></div>
        </div>
      </div>

      <div class="spinner-layer spinner-red">
        <div class="circle-clipper left">
          <div class="circle"></div>
        </div><div class="gap-patch">
          <div class="circle"></div>
        </div><div class="circle-clipper right">
          <div class="circle"></div>
        </div>
      </div>

      <div class="spinner-layer spinner-yellow">
        <div class="circle-clipper left">
          <div class="circle"></div>
        </div><div class="gap-patch">
          <div class="circle"></div>
        </div><div class="circle-clipper right">
          <div class="circle"></div>
        </div>
      </div>

      <div class="spinner-layer spinner-green">
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
  <div class="col s12 m3 uimage" style="display:none">
 <div class="tpimg">
  <img  src="" alt="" class=" image responsive-img" />
<a href="#" onclick="javascript:remove_img_dialog()" class="remove" style="position: absolute;
    margin-left: -17px; margin-top: -4px;
">
<div class="west remove_account_container red waves-effect waves-light white-text text-lighten-3" original-title="Remove Social Account"><i class="fa fa-times" aria-hidden="true"></i></div>
 </a>
  </div>

  </div>



  </div>
            </div>

            <div class="card-action center">
             <?php if(empty($St->api_key)){
              $dss ='disabled="disabled"';
              $dssm ="قم بااضافه مفتاح جوجل فى الاعدادات لكى يعمل هذا الخيار";
             }else{
              $dssm="يتم اختصار الرابط تلقائى من جوجل العدد الكلى مقسوما على 100";
              $dss ="";
             }
             ?>
        <div class="col s12 m3 right  tooltipped " data-position="bottom" data-delay="50" data-tooltip="<?=$dssm?>"  style="display:none"><span style="line-height: 36px;">
      <input type="checkbox" id="short" name="short" <?=$dss?> />
      <label for="short">اختصار الرابط تلقائى</label>
    </span>
    </div>
<!--
        <div class="col s12 m3 right post tooltipped tag option" style="display: none"  data-position="bottom" data-delay="50" data-tooltip="عمل تاج لااصدقاء المستخدم حسب api"><span style="line-height: 36px;">
      <input type="checkbox" id="tags" name="tags"   />
      <label for="tags">تفعيل الاشاره للاصدقاء</label>
    </span>
    </div>
-->
      <input type="hidden" id="tags" name="tags"   />

     <?php if(Fcol('google_key')[1]){  ?>
        <div style="display:none" id="YD" class="col s12 m3 right  tooltipped" data-position="bottom" data-delay="50" data-tooltip="رفع على يوتيوب"><span style="line-height: 36px;">
      <input type="checkbox" id="Yd" name="Yd"   />
      <label for="Yd">رفع الفديو</label>
    </span>
    </div>
  <?php }else{ ?>
            <div style="display:none"  class="col s12 m3 right tooltipped" data-position="bottom" data-delay="50" data-tooltip="رفع على يوتيوب"><span style="line-height: 36px;">
      <input type="checkbox" id="Yd" name="Yd"   />
      <label for="Yd">رفع الفديو</label>
    </span>
    </div>

<?php  } ?>
              <div class="date col s4 m2 right img-up" style="display:none;"><a href="#" class="btn-flat tooltipped black-text right upload-click" data-position="bottom" data-tooltip="صوره" data-tooltip-id="ed472c81-cc4c-1ce6-956d-2ac9b8acd67b"><i class="fa fa-picture-o right" aria-hidden="true"></i> <span class="">اضافة صوره</span></a>
              </div>
              <div class="col s12 m12 upload-image" style="display:none; text-align:center;">
                    <img  src="<?=$St->url?>/assets/images/bigloader.gif" alt="" class="responsive-img"  />
              </div>
              <div class="col s6  m2 right pages">
       <div class="switch left"  style="    height: 36px;
    line-height: 36px;">
    <label>
      <input type="checkbox" id="pages"  name="pages">
      <span class="lever"></span>
          الصفحات
    </label>
  </div>
  </div>
              <div class="col s6 m2">
  <button name="post" style="width:100%" class='dropdown-button btn waves-effect waves-light  left post posttt' href='#' data-activates='dropdown2'><i class="mdi-navigation-arrow-drop-down left "></i> نشر <i class="fa fa-facebook  right"></i></button>
<button  class='dropdown-button btn waves-effect waves-light  left token' style="display:none" href='#' id="token_now"  >فحص <i class="fa fa-search  right"></i></button>
<button  class='dropdown-button btn waves-effect waves-light  left nof' style="display:none" href='#' id="nof_now"  >ارسال <i class="fa fa-bell-o  right"></i></button>
<button class="btn waves-effect waves-light teal lighten-2  left likes" style="display:none"  type="submit" name="action">ارسال<i class="fa fa-thumbs-o-up  right"></i></button>
  <!-- Dropdown Structure -->
  <ul id='dropdown2' class='dropdown-content linkLine right-align'>
    <li><a href="#" id="post_now"  >نشر الان</a></li>
    <li ><a href="#" id="post_time" >النشر لاحقا</a></li>

  </ul>
              </div>
            </div>
          </div>
        </div>
<div class="col  s12 m12  teal lighten-2 divider center" dir="rtl" style="     min-height: auto;     line-height: 33px;  margin-top: 10px;">
           <div class="col  s6 m6 right bold">
           <i class="fa fa-tasks" aria-hidden="true"></i>
                العمليات  <?php if(Num('task')){ echo ' / '.Num('task'); } ?>

               </div>
           <div class="col  s6 m6  bold" style="    line-height: 30px;">
                <?php if(Num('task','where share ="1"')){ ?>
              <a class="btn " style="background-color: #F44336 !important;" onclick="re('','<?$Gtype?>')">حذف المكتمله</a>
               <?php }?>
               </div>

          </div>
   <div class="col s12" >
      <ul class="tabs">
        <li class="tab col s3" id="tshare"><a >العمليات المجدوله</a></li>
        <li class="tab col s3" id="nshare"><a class="active" >العمليات الفوريه</a></li>
        <input type="hidden" name="Gshare" value="nshare" />
      </ul>
    </div>

			<div id="share"  >
 </div>
			<div class="gshare"  >

<?php
         $tp ='task';
         $showLimit= 8 - Num($tp,'where share ="0" ');
         $where = 'where share !="0" and type !="tfb" and type !="ttw"';
        $SPost= getUser($tp," $where ORDER BY id DESC LIMIT ".$showLimit);

                            if($SPost){
                           for($i=0;$i<count($SPost);$i++){
                               $Sb = $SPost[$i];
                               $tutorial_id = $Sb["id"];
                            $S= Sel('posts','where id='.$Sb['postid']);
                            $Snum= Num('task','where id <'.$Sb['id']);
                             $count = $Sb['count'];
                           if(!empty($Sb['send'])) {$send= $Sb['send'];}else{$send=0;}
                           if(!empty($Sb['nosend'])) {$nsend= $Sb['nosend'];}else{$nsend=0;}
                           if($Sb['type'] !='nof'){  $idp =$Sb['id']; }else {$idp =$Sb['id'];}
                          $lbtn ='window.open('.$St->url.'/admin/status.php?id='.$idp.',"","width=525,height=550,left=0,top=0,resizable=yes,menubar=no,location=no,status=yes,scrollbars=yes")';
                           ?>

			<div class="col s12 m3 right" id="t<?=$Sb['id']?>" style="direction: rtl;">


    <ul class="collection with-header">
     <li class="collection-item text-right"><?=cptime($Sb['time'])?></li>
                                                <li class="collection-item center "><?=lang($lg,'ttype_post')?> : <?=lang($lg,$Sb['type'])?></li>
                                                <li class="collection-item center truncate <?php if($Sb['type'] =='token' or $Sb['type'] =='nof' or $Sb['type'] =='delete'){ ?> tdes <?php } ?>"><?=lang($lg,'type_post')?> : <?=Ginfo($lg,$S->type)?></li>
                                                <li class="collection-item center "><?=lang($lg,'count')?> : <?=$count?></li>
                                                <li class="collection-item center "><?=lang($lg,'success')?> : <span class="green-text"><?=$send?></span></li>
                                                <li class="collection-item center "><?=lang($lg,'error')?> : <span class="red-text"><?=$nsend?></span></li>
                                               <li class="collection-item center truncate"><?=Sshare($lg,$Sb['share'])?>  <?php if($S->type == 2 or $S->type == 7 or $S->type == 8){ ?> / النقرات : <?=$S->click?>  <?php  } if($Sb['type']=='tfb' and $St->cron == 0 and !empty($Sb['tp'])){echo" / الوقت :".$Sb['tp'];  }  ?></li>
                                                <li class="collection-item center">


                                                      <a  class="waves-effect waves-light  tooltipped" data-position="bottom" data-delay="50" data-tooltip="حذف" onclick="re(<?=$Sb['id']?>,'<?=$Gtype?>')" id="<?=$Sb['id']?>" ><i class="fa fa-times fa-lg" aria-hidden="true"></i></a>
        <?php if($Sb['type'] !='token' and $Sb['type'] !='nof' and $Sb['type'] !='tw' and $Sb['type'] !='delete'){ ?>
              <a  class="waves-effect waves-light tooltipped" data-position="bottom" data-delay="50" data-tooltip="تعديل" onclick="E_post(<?=$Sb['postid']?>,'<?=$Gtype?>')" id="<?=$Sb['id']?>" ><i class="fa fa-eye fa-lg" aria-hidden="true"></i></a>
              <a  class="waves-effect waves-light  tooltipped" data-position="bottom" data-delay="50" data-tooltip="حذف  من صفحات المستخدمين" onclick="Dpost(<?=$Sb['id']?>,'<?=$Gtype?>')" id="<?=$Sb['id']?>" ><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></a>
                                                 <?php }
                                                 if(Num('task_msg','where post_id='.$idp)){
                                                      ?>

                                                <a  class="waves-effect waves-light tooltipped" data-position="bottom" data-delay="50" data-tooltip="الاحصائيه" onclick="Sstatus(<?=$idp?>)" id="<?=$Sb['id']?>" ><i class="fa fa-line-chart fa-lg" aria-hidden="true"></i></a>
                                                                 <?php  }   ?>
                                                  <?php if($Sb['share'] == 0 or $Sb['share'] == 4){ ?>
                                                  <a  class="waves-effect waves-light tooltipped" data-position="bottom" data-delay="50" data-tooltip="متابعه النشر" onclick="Ref_post(<?=$Sb['id']?>)" id="<?=$Sb['id']?>" ><i class="fa fa-refresh fa-lg" aria-hidden="true"></i></a>
                                                <?php  }   ?>
                                                 </li>
                                              </ul>


      </div>
<?php } echo more($tutorial_id,$Snum,4); }else if(Num($tp," where share='0' ORDER BY id DESC ") > 1 and  1 == 2){  ?>

       <div class="col s12 m12 upload-image" style="text-align:center;">
       <p>من فضلك انتظر جارى التحميل     </p>
                    <img src="<?=$St->url?>/assets/images/bigloader.gif" alt="" class="responsive-img">
              </div>


<?php }?>


 </div>
 </div>
  </div>