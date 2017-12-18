<div  class="wrapper vertical-sidebar" id="full-page">
<main id="content" >
<header id="header">
    <div class="navbar navbar-fixed">
      <ul id="nav-mobile" class="side-nav" style="transform: translateX(-100%);">
       <?php  include "inc/nav.php"; ?>
      </ul>
        <nav>
            <a href="#" data-activates="nav-mobile" class="button-collapse full waves-effect waves-light"><i class="material-icons">menu</i></a>
<?php if(isand(true) || 1 == 1){ ?>
            <a href="../"  class="full waves-effect waves-light"><i class="material-icons">home</i></a>
<?php } ?>
            <div class="nav-wrapper">
            <div class="logo-icon">
            <img  class=" logo-icon responsive-img z-depth-1" src="<?=$St->logo?>" alt="<?=$St->title?>">
            </div>
                <ul class="left">
                    <li>
                        <a href="/" class="brand-logor logo-text">
                        <?php
                        if(isand(true)){
                      echo  lang($lg,$Gapp);
                      }else{
                        echo $St->title;
                      }

                        ?>

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
