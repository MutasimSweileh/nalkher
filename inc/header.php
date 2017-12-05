<div  class="wrapper vertical-sidebar" id="full-page">
<main id="content" >
<header id="header">
    <div class="navbar">
        <nav>
            <a href="#" data-activates="nav-mobile" class="button-collapse top-nav full waves-effect waves-light"><i class="material-icons">menu</i></a>
            <div class="nav-wrapper">
            <div class="logo-icon">
            <img  class=" logo-icon responsive-img z-depth-1" src="<?=$St->logo?>" alt="<?=$St->title?>">
            </div>
                <ul class="left">
                    <li>
                        <a href="/" class="brand-logor logo-text">
                        <?=$St->title?>
                        </a>
                    </li>
                </ul>

         <ul class="right hide-on-med-and-down" >
        <?php if(Ls()){ ?>     <li <?=Dis($Gapp,'myposts')?> ><a href="/myposts.html"  class="  right-align">المجدول</a></li>    <?php } ?>
        <?php if(Ls() or !Ls()){ ?>     <li  <?=Dis($Gapp,'images')?> ><a href="/images.html"  class="  right-align">معرض الصور</a></li>    <?php } ?>
        <?php if(Ls() or !Ls()){ ?>     <li <?=Dis($Gapp,'video')?> ><a href="/videos.html"  class=" right-align">معرض الفديو </a></li>    <?php } ?>
        <?php if(Ls('admin') or Ls('demo')){ ?>  <li  <?=Dis($Gapp,'admin')?> ><a href="/admin" class=" right-align" >لوحة تحكم الاداره </a></li>   <?php } ?>
       <?php if(!Ls()){ ?>   <li <?=Dis($Gapp,'privacy')?> ><a  class="  right-align"  href="/privacy.html">سياسة الخصوصيه</a></li> <?php } ?>
       <?php if(!Ls()){ ?>    <li <?=Dis($Gapp,'contact')?> ><a href="/contact.html" class=" right-align">اتصل بنا</a></li> <?php } ?>


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
                    <li>
                        <a class="dropdown-button drop-down-profile relative-item" href="#" data-activates="dropdown33" data-beloworigin="true"><span class="profile-img-ribbon"></span><img class="responsive-img profile-img" src="<?=FbImg(Sion("id"))?>" alt="john"> <?=gUN(Sion("id"))?> <i class="zmdi zmdi-caret-down drop-down-icon"></i></a>
                        <ul id="dropdown33" class="create-dropdown dropdown-content">
                            <li><a href="profile.html"><i class="zmdi zmdi-account-circle"></i>الملف الشخصى</a></li>
                            <li><a href="calendar.html"><i class="material-icons  dp48">email</i>الرسائل</a></li>
                            <li><a href="/logout.html"><i class="material-icons dp48">input</i>تسجيل الخروج</a></li>
                        </ul>

                    </li>
                  <?php } ?>
                </ul>
            </div>
        </nav>
    </div>
</header>
  <div id="page-content">
