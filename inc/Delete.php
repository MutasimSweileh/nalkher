<div class="container">
<div class="row">
<!--
        <?php if(Ls("Delete") and $St->rDelete == 1){ ?>
	   <div class="addpost col s12 m12 z-depth-1 white t-row hoverable" id="addpost">
          <div class="card no-shadow">

            <div class="card-content">
        <p class="center"><b>مهم :</b> تواجهك مشكله  فى التطبيق وترغب فى حلها سريعا من فضلك اتصل بنا على صفحتنا فى فيس بوك   <a href="https://www.facebook.com/Ned2.Al5er">من هنا</a></p>
                     <div class="input-field col s12 m12 textfilde"  >
                     <i class="fa fa-comment-o prefix right" aria-hidden="true"></i>
                <textarea id="linetext-1" minlength="20" pattern=".{20,}"  class="materialize-textarea right-align" name="Delete_msg" ></textarea>
                <label for="linetext-1" class="">اكتب سبب حذف الاشتراك</label>


              </div>
      <div class="clearfix"></div>
        <p class="center"><b>ملحوظه :</b> يمكنك تعديل وقت النشر الخاص بك من   <a href="/set.html">من هنا</a></p>
</div>
            <div class="card-action center">
                <div class="col s12 m6">

            <button name="post" class='Delete dropdown-button btn waves-effect waves-light red  left' href='#' data-activates='dropdown2'>حذف <i class="fa fa-times  right"></i></button>
            <button name="post" class='CDelete dropdown-button btn waves-effect waves-light red  left' href='#' style="display:none" data-activates='dropdown2'>حذف <i class="fa fa-times  right"></i></button>

            </div>
                  <div class="clearfix"></div>

            </div>
</div>
</div>
        <?php }else if($St->rDelete == 0){
        header("Location: /");
        }else{
            $_SESSION['get']="/Delete.html";
        header("Location:".$reUrl);

        }
        if(!defined('MyConst')) {
header("Location: ../");
}
         ?>
-->
        <?php if(!defined('MyConst')) {
header("Location: ../");
} if(Ls()){ ?>
<div class="z-depth-1 teal lighten-2 divider center " >
من فضلك قم بااختيار  الاجراء المناسب الذى تريده من الاسفل     
          </div>
<ul class="collapsible" data-collapsible="accordion" dir="rtl">
    <li id="time">
      <div class="collapsible-header"><i class="fa fa-history right" aria-hidden="true"></i>تغير وقت النشر وعدد المنشورات فى اليوم</div>
      <div class="collapsible-body">
      <div style="    margin: 5px;">
     حدد وقت النشر المفضل لديك : علما باان وقت النشر الحالى الخاص بك هو  كل  (<?=Ctime(Sel($appsql,' where user_id='.$userid)->time)?>) <br>
    <div class="col m10 right" style="    margin-bottom: 6px;" >
    <select class="browser-default" name="time">
      <option value="4"><?=Ctime(4)?></option>
      <option value="6"><?=Ctime(6)?></option>
      <option value="12"><?=Ctime(12)?></option>
      <option value="24"><?=Ctime(24)?></option>
    </select>
    </div>
    <div class="col m2 right" >
   <button name="post" style="width: 100%;
    margin-top: 6px;" class="dropdown-button btn waves-effect waves-light  left UpSetU" href="#" data-activates="dropdown2">تحديث<i class="fa fa-wrench  right"></i></button>
    </div>
    <br>
       <div class="clear"></div>
    </div>
    </div>
    </li>
    <li id="post">
      <div class="collapsible-header"><i class="fa fa-file-text-o right" aria-hidden="true"></i>تخصيص المنشورات ونوع المنشورات</div>
      <div class="collapsible-body">
            <div style="    margin: 5px;">
      نشر نصوص  وصور :<br>
    <div class="col m10 right" style="    margin-bottom: 6px;" >
    <select class="browser-default" name="ptext">
      <option value="1">مفتوح</option>
      <option value="0">مغلق</option>
    </select>
    </div>
    <div class="col m2 right" >
   <button name="post" style="width: 100%;
    margin-top: 6px;" class="dropdown-button btn waves-effect waves-light  left UpSetU" href="#" data-activates="dropdown2">تحديث<i class="fa fa-wrench  right"></i></button>
    </div>
    <br>
       <div class="clear"></div>
    </div>
            <div style="    margin: 5px;">
      نشر روابط :<br>
    <div class="col m10 right" style="    margin-bottom: 6px;" >
    <select class="browser-default" name="plink">
      <option value="0">مفتوح</option>
      <option value="1">مغلق</option>
    </select>
    </div>
    <div class="col m2 right" >
   <button name="post" style="width: 100%;
    margin-top: 6px;" class="dropdown-button btn waves-effect waves-light  left UpSetU" href="#" data-activates="dropdown2">تحديث<i class="fa fa-wrench  right"></i></button>
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
    <li  id="delete">
      <div class="collapsible-header"><i class="fa fa-pencil-square-o right" aria-hidden="true"></i>حذف الاشتراك نهائيا مع كتابه سبب الحذف لتصحيح الاخطاء ان وجدت</div>
      <div class="collapsible-body">
          <div class="input-field col s12 m12 textfilde"  >
                     <i class="fa fa-comment-o prefix right" aria-hidden="true"></i>
                <textarea id="linetext-1" minlength="20" pattern=".{20,}"  class="materialize-textarea right-align" name="Delete_msg" ></textarea>
                <label for="linetext-1" class="">اكتب سبب حذف الاشتراك</label>
              </div>

      <button name="post" class='Delete dropdown-button btn waves-effect waves-light red  left' href='#' data-activates='dropdown2'>حذف <i class="fa fa-times  right"></i></button>
      <button name="post" class='CDelete dropdown-button btn waves-effect waves-light red  left' href='#' style="display:none" data-activates='dropdown2'>حذف <i class="fa fa-times  right"></i></button>
    <div class="clear"></div>
     </div>
    </li>

  </ul>
<input type="hidden" name="utype" value="">
    <?php  }else { $_SESSION['get']="/set.html";  ?>

           <script type="text/javascript">
           location.replace("<?=$reUrl?>");
           </script>
    <?php } ?>
</div>
</div>