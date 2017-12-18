<?php if(Ls() && 1 == 2){ ?>     <li <?=Dis($Gapp,'myposts')?> ><a href="/myposts.html"  class="  ">المجدول</a></li>    <?php } ?>
<?php if(Ls() or !Ls()){ ?>     <li  <?=Dis($Gapp,'images')?> ><a href="/images.html"  class="  ">معرض الصور</a></li>    <?php } ?>
<?php if(Ls() or !Ls()){ ?>     <li <?=Dis($Gapp,'video')?> ><a href="/videos.html"  class=" ">معرض الفديو </a></li>    <?php } ?>
<?php if(Ls('admin') or Ls('demo')){ ?>  <li  <?=Dis($Gapp,'admin')?> ><a href="/admin" class=" " >لوحة تحكم الاداره </a></li>   <?php } ?>
<?php if(!Ls()){ ?>   <li <?=Dis($Gapp,'privacy')?> ><a  class="  "  href="/privacy.html">سياسة الخصوصيه</a></li> <?php } ?>
<?php if(!Ls() || Ls()){ ?>    <li <?=Dis($Gapp,'contact')?> ><a href="/contact.html" class=" ">اتصل بنا</a></li> <?php } ?>


            <!--<li>
                <a class="dropdown-button notif-btn waves-effect waves-light" href="#" data-activates="dropdown20">
                <div class="i-notifications"></div> <span class="badge-green">3</span></a>
                <ul id="dropdown20" class="notif-dropdown dropdown-content">
                    <div id="search-hover"></div>
                    <li><a href="mail.html"><i class="zmdi zmdi-email"></i> You have 12 messages </a></li>
                    <li><a class="tabInbox" href="timeline.html"><i class="zmdi zmdi-time-countdown"></i> You have 2 upcoming activities on your Timeline </a></li>
                    <li><a href="feed.html"><i class="zmdi zmdi-notifications"></i> 3 new posts in your Feed</a></li>
                </ul>

            </li>-->
      <?php if(Ls()){ ?>
           <li  class="hide-on-med-and-up"><a href="#"></i>الملف الشخصى</a></li>
           <li  class="hide-on-med-and-up" ><a href="/logout.html"    >تسجيل الخروج</a></li>
            <li>
                <a class="dropdown-button drop-down-profile relative-item hide-on-med-and-down" href="#" data-activates="dropdown33" data-beloworigin="true"><span class="profile-img-ribbon"></span><img class="responsive-img profile-img" src="<?=FbImg(Sion("id"))?>" alt="john"> <?=gUN(Sion("id"))?> <i class="zmdi zmdi-caret-down drop-down-icon"></i></a>
                <ul id="dropdown33" class="create-dropdown dropdown-content">
                    <li><a href="#"><i class="zmdi zmdi-account-circle"></i>الملف الشخصى</a></li>
                    <li><a href="#"><i class="material-icons  dp48">email</i>الرسائل</a></li>
                    <li><a href="/logout.html"><i class="material-icons dp48">input</i>تسجيل الخروج</a></li>
                </ul>

            </li>
          <?php } ?>
