<?php
include "inc/head.php";
?>
<div class="container">
<div class="row">
<?php if(!Ls()){  ?>
<div class="col m12 s12 center">
مرحبا  بك  قم بالضغط  على زر تسجيل الدخول فى الاسفل ليتم الاشتراك
</div>
<div class="col m12 s12 center" style="margin: 10px;">
<a href="https://goo.gl/usZEik" target="_blank" class="btn">تسجيل الدخول<i class="fa fa-facebook right" aria-hidden="true"></i></a>
</div>
<div class="col m12 s12 center" style="    margin-top: 30px;">
تصميم وبرمجة : <a href="https://www.facebook.com/mohtasm.sawilh" target="_blank">معتصم محمد</a>
</div>
<?php }else{ ?>
<div class="col m12 s12 center">
تم تسجيل الدخول بنجاح نشكرك على دعمك
<?=Sion('sname')?>
</div>
<div class="col m12 s12 center" style="margin: 10px;">
<a href="/logout.html" target="_blank" class="btn red" style="    background-color: #F44336 !important;">تسجيل الخروج<i class="fa fa-sign-out right" aria-hidden="true"></i></a>
</div>
<div class="col m12 s12 center" style="    margin-top: 30px;">
تصميم وبرمجة : <a target="_blank" href="https://www.facebook.com/mohtasm.sawilh">معتصم محمد</a>
</div>

<?php } ?>
</div>
</div>