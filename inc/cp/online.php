    <div class="containe" style="    direction: rtl;">
 <div class="col s12 m12 z-depth-1 white" id="addpost">
          <div class="card no-shadow" style="min-height: 500px;">
          <div class="card-title"  style="
    font-size: 20px;
    float: right;
    width: 100%;
"> <span > المتواجدين الان : <aaa id="online"><?=Num('user_online')?> </aaa></span>
<img class="left" width="30" src="../assets/images/ripple.svg" >
</div>
            <div class="card-content online">
 <?=loding('جارى التحميل من فضلك انتظر')?>
</div>
</div>
</div>
</div>
<script type="text/javascript" src="<?=$St->url?>/assets/js/jquery.min.js"></script>
<script type="text/javascript">
setInterval(function ()
{
$('#online').load('../inc/ajax.php?step=uonline&count=true');
$('.online').load('../inc/ajax.php?step=uonline&online=true');
}, 1000);
</script>