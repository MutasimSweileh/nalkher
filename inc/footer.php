<?php if (!$nofooter) {
    ?>
  </div>
<div class="clear"></div>

<?php if ($Gapp != "login"  || $Gapp == "login") {
        ?>
</main>


<div class="page-footer foot4 col offset-s1 s11 m12" style="font-weight: bold;">
      <div class="containerr">
        <div class="row user">
           <div class="col s12 m6 center-align">
         <div class="col s12 m12 center-align">
        <h6 class="white-text bold">ـــــ   اخر المشتركين ـــــ</h6>
              </div>
             <?php  $post = getUser("users", " order by rand() limit 5 ");
        for ($i = 0;$i<count($post);$i++) {
            $p = $post[$i]; ?>

              <div class="col  s4 m2   center-align">
               <a href="<?=Fb($p["user_id"])?>" target="_blank"><img src="<?=FbImg($p["user_id"])?>" width="60" height="60" class="circle hoverable responsive-img z-depth-1 tooltipped" alt="" data-position="top" data-tooltip="<?=gUN($p["user_id"])?>"></a>
              </div>
             <?php
        } ?>
                   </div>
            <div class="col s12 m6 center-align">
          <div class="col s12 m12 center-align">
        <h6 class="white-text bold">ــــ احصائيات  ــــ</h6>
              </div>
                <div class="col  s3 m3   center-align">
                   <i class="fa fa-clipboard fa-lg white-text tooltipped" alt="" data-position="top" data-tooltip="منشورات نصيه" aria-hidden="true" data-tooltip-id="b58b5197-2043-141e-5e04-95358e675b7c"></i> <p style="    color: #9A0519;"><?=Num("posts")?></p>
                  </div>
                <div class="col  s3 m3   center-align">
                   <i class="fa fa-youtube-play fa-lg white-text tooltipped" alt="" data-position="top" data-tooltip="فديو" aria-hidden="true" data-tooltip-id="1ea95868-f70e-88a2-0ec6-5a34f1d2aa84"></i> <p style="    color: #9A0519;"><?=Num("video")?></p>
                  </div>

                 <div class="col  s3 m3   center-align">
                   <i class="fa fa-picture-o fa-lg white-text tooltipped" alt="" data-position="top" data-tooltip="صور" aria-hidden="true" data-tooltip-id="9b8f330b-3930-f9e9-3b86-c88a76f9d675"></i> <p style="    color: #9A0519;"><?=Num("posts", "where type='6' ")?></p>
                  </div>
      <div class="col  s3 m3   center-align">
                   <i class="fa  fa-calendar fa-lg white-text tooltipped" alt="" data-position="top" data-tooltip="مجدول" aria-hidden="true" data-tooltip-id="121320e6-f3a3-0ac9-0984-a15caffa3f6d"></i> <p style="    color: #9A0519;"><?=Num("posts", "where send='0' and active='1'")?></p>
                  </div>
               <div class="col  s2 2   center-align" style="display:none">
                   <i class="fa fa-clock-o fa-lg white-text tooltipped" alt="" data-position="top" data-tooltip="وقت السيرفر" aria-hidden="true" data-tooltip-id="fc47d7dd-6235-f8d1-354a-21fa7cfae040"></i><p style="    color: #9A0519;"> 1:05 PM</p>
                  </div>
                  </div>

      </div>
      </div>

<div class="footer-copyright  copy">
		<div class="container " style="">
<div class="row">
<div class="col  s12 m12   center-align">
    <a title="Privacy" class="" href="/privacy.html">سياسة الخصوصيه</a>  /  <a title="Contact" href="/contact.html" class="">اتصل بنا</a>
  </div>
 <div class="col  s12 m12   center-align">
<span class=""><pp class="">تطبيق نداء الخير</pp> © 2015&nbsp;جميع الحقوق محفوظه   ❖  تصميم وبرمجة : <a href=""  data-tooltip="المبرمج" class="tooltipped bold" >معتصم محمد</a></span>
<p></p>
<div id="online" style="display:none">
</div>
</div>

            </div>
      </div>
      </div>
    </div>

                    </div>
<?php
    }
    if (!$id) {
        ?>
<p  class="YD YDD" id="8Jlz89sNHEQ" style="display: none" format="mp4">رفع الفديو على يوتيوب</p>
<?php
    } ?>
<button  style="display:none" class="button ctrl-c">Copy Code</button>
<span></span>
<input type="hidden"  name="userid" value="<?=Sion('sid')?>"/>
<input type="hidden"  name="fb" value="<?=sion('sname')?>"/>
<input type="hidden"  name="Gapp" value="<?=$Gapp?>"/>
<input type="hidden"  name="Gtype" value="<?=$Gtype?>"/>
<input type="hidden"  name="lev" value="<?=Ls('admin')?>"/>
<input type="hidden"  name="tw" value="<?=Sion('name_tw')?>"/>
<input type="hidden"  name="server" value="<?=$St->url?>"/>
<input type="hidden"  name="FUr" value="<?=$FUr?>"/>
<input type="hidden"  name="utitle" value="<?=base64_encode($title)?>"/>
<input type="hidden"  name="Ytoken" value="<?php if (Fcol('google_id')[1]) {
        echo base64_encode(Sion('Ytoken'));
    } else {
        echo 1;
    } ?>"/>
<div class="dropzone" style="display: none;"></div>
<?php
} ?>
<script type="text/javascript" data-cfasync="<?=isand()?>" src="<?=$St->url?>/assets/js/jquery.min.js"></script>
<script type="text/javascript" data-cfasync="<?=isand()?>" src="<?=$St->url?>/assets/js/materialize.js"></script>
<script type="text/javascript" data-cfasync="<?=isand()?>" src="<?=$St->url?>/assets/js/sweetalert.min.js"></script>
<script type="text/javascript" data-cfasync="<?=isand()?>"  src="<?=$St->url?>/assets/js/toastr.min.js"></script>
<script type="text/javascript" data-cfasync="<?=isand()?>"  src="<?=$St->url?>/assets/js/mara.min.js"></script>
<script type="text/javascript"  data-cfasync="<?=isand()?>" src="<?=$St->url?>/assets/js/youtube.js"></script>
<script type="text/javascript"  data-cfasync="<?=isand()?>" src="<?=$St->url?>/assets/js/imgur.min.js"></script>
<script type="text/javascript" data-cfasync="<?=isand()?>"  src="<?=$St->url?>/assets/js/Chart.min.js"></script>
<script type="text/javascript" data-cfasync="<?=isand()?>"  src="<?=$St->url?>/assets/js/jquery.fancybox.min.js"></script>
<script type="text/javascript"  data-cfasync="<?=isand()?>" src="<?=$St->url?>/assets/js/datepicker.js"></script>
<script type="text/javascript"  data-cfasync="<?=isand()?>" src="<?=$St->url?>/assets/js/datepicker.en.js"></script>
<script type="text/javascript"  data-cfasync="<?=isand()?>"  src="<?=$St->url?>/assets/js/jquery-confirm.js"></script>
<script type="text/javascript"  data-cfasync="<?=isand()?>" src="<?=$St->url?>/assets/js/w3.js"></script>
<script type="text/javascript" data-cfasync="<?=isand()?>"  src="<?=$St->url?>/assets/js/custom.js"></script>
<script type="text/javascript" data-cfasync="<?=isand()?>"  src="<?=$St->url?>/assets/js/ajax.js"></script>
<?php if (isv("user", 1)) {
        ?>
<script type="text/javascript">
goR(null,null,"groups",null,"<?=isv('user', 1)?>");
</script>
<?php
    }   ?>
<script type="text/javascript">
<?php if (Sion("type") == "error") {
        ?>
         error_msg("<?=Sion("msg")?>");
         <?php  $_SESSION['type']=""; ?>
         <?php
    } elseif (Sion("type") == "success") {
        ?>
         success_msg("<?=Sion("msg")?>");
         <?php  $_SESSION['type']=""; ?>
         <?php
    } ?>

</script>
<?php
mysqli_close($DBcon);
?>
