<div  class="wrapper vertical-sidebar" id="full-page">
<main id="content" >
<header id="header">
    <div class="navbar navbar-fixed">
      <ul id="nav-mobile" class="side-nav" style="transform: translateX(-100%);">
       <?php  include "inc/nav.php"; ?>
      </ul>
        <nav>
            <a href="#" data-activates="nav-mobile" class="button-collapse top-nav full waves-effect waves-light"><i class="material-icons">menu</i></a>

            <div class="nav-wrapper">
            <div class="logo-icon">
            <img  class=" logo-icon responsive-img z-depth-1" src="<?=$St->logo?>" alt="<?=$St->title?>">
            </div>
                <ul class="left">
                    <li>
                        <a href="/" class="brand-logor logo-text">
                        <?=lang('ar',$Gapp)?>

                        </a>
                    </li>
                </ul>

         <ul class="right hide-on-med-and-down" >
          <?php  include "inc/nav.php"; ?>
         </ul>

            </div>
        </nav>
    </div>
</header>
  <div id="page-content">
