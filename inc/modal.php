 <div id="modal2" class="modal">
    <div class="modal-content">
      <div style="    direction: rtl;     margin-bottom: 0px; "  class="row  right-align">
        <div class="col m12  s12  center-align">
        السلام عليكم ورحمة الله وبركاته
</div>
    <div class="col m12  s12 right"  style="text-align: center;" >
     حدد وقت النشر المفضل لديك : علما باان وقت النشر الحالى الخاص بك هو  (<?=Ctime(Sel($appsql,' where user_id='.$userid)->time)?>) <br>
    <select class="browser-default" name="time1">
      <option value="4"><?=Ctime(4)?></option>
      <option value="6"><?=Ctime(6)?></option>
      <option value="12"><?=Ctime(12)?></option>
      <option value="24"><?=Ctime(24)?></option>
    </select>
    </div>
 <div class="col m12 s12 right" >
   <button name="post" style="width: 100%;
    " class="btn waves-effect waves-light  modal-close left UpSetU" href="#" data-activates="dropdown2">تحديث<i class="fa fa-wrench  right"></i></button>
    </div>
    <br>
       <div class="clear"></div>
        <div class="col m12  s12  center-align" style="margin-top: 8px;">
       ملحوظه : يمكنك تخصيص المزيد من الاعدادات <a href="/set.html">من هنا</a>
</div>

    </div>

    </div>
<!--
    <div class="modal-footer">
      <a href="#" class=" left modal-action modal-close waves-effect waves-green btn-flat">موافق</a>
    </div>
    -->
  </div>
<!------------------------------------>

 <div id="modal3" class="modal">
    <div class="modal-content">
      <div style="    direction: rtl;     margin-bottom: 0px; "  class="row  right-align">
        <div class="col m12  s12  center-align">
       انضم الى صفحتنا على فيس بوك
</div>
        <div class="col m12  s12  center-align">
<div class="fb-page"  data-href="<?=$St->fb_link?>" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="<?=$St->fb_link?>" class="fb-xfbml-parse-ignore"><a href="<?=$St->fb_link?>"><?=$St->title?></a></blockquote></div>
   </div>
   </div>
    </div>
    <div class="modal-footer">
      <a href="#" class=" left modal-action modal-close waves-effect waves-green btn-flat">تم الامر</a>
    </div>
  </div>

<!------------------------------------>

      <!-- Modal Structure -->
  <div id="modal1" class="modal ">
    <div class="modal-content center-align">
    <!--  <h4>Modal Header</h4>     -->
		<div class="container white-text">
<div class='row'>
 <div class="col  s12 m12   center-align">
<h4>    <i class="fa fa-exclamation-triangle fa-5x" style=" color: #ffab40;" aria-hidden="true"></i> </h4>
    </div>
 <div class="col  s12 m12   center-align">
<h6 style=" color: #328078;">نأسف ان نخبرك انك محظور  لايمكنك استخدام الخدمه      </h6>
    </div>
    </div>
    </div>

    </div>
    <div class="modal-footer">
      <a onclick="close();" class="left modal-action modal-close waves-effect waves-red btn-flat">اغلاق</a>
      <a onclick="edite()" id="edite" class=" left modal-action modal-close waves-effect waves-green btn-flat" style="display:none">تعديل</a>
      <a onclick="msg()" id="msg" class=" left modal-action modal-close waves-effect waves-green btn-flat" style="display:none">ارسال</a>
      <a  id="Del" class="Delete  left modal-action modal-close waves-effect waves-red btn-flat" style="display:none">حذف الاشتراك</a>
    </div>
  </div>
