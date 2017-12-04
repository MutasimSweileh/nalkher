<?php
include "inc/head.php";
include "inc/header.php";
if(isset($_GET['id']) and is_numeric($_GET['id'])){
$id = (int)$_GET['id'];
$S = Sel('posts','where id='.$id);
UpDate('posts','click',$S->click + 1,'where id='.$id);
if($S->type != 8){
if(empty($S->img)){
$url = $St->url."/rfb.html";
}else{
$url = $S->img;
}
if(!strpos($S->link,'imgur')){
$img = $St->url.$S->link;
}else{
$img = $S->link;
}
$Turl='http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
     if(strpos($PUr,"app.nalkher.com") or strpos($PUr,"app.nalkher.net") or strpos($PUr,"app.nalkher.info") or strpos($PUr,"app.nedalkher.com")){
      $R = Uimg($id);
      header("Location: ".$R);
     }
}else{
iSion('get',$S->link);
iSion('link',$S->link);
$img=$S->link;
$url = $St->url."/rfb.html";
}
 ?>
<html>
<head>
  <title><?=$St->title?> : صور</title>
  <link rel="canonical" href="<?=$url?>" />
  <meta property="og:url" content="<?=$img?>" />
  <meta charset="UTF-8"  />
  <meta property="og:title" content="<?=$img?>" />
</head>

<body>
<div class="container">
<div class="center ad" style="opacity: 0;">
 <?php if($app['Adf'] == 1){ echo  $St->send_text_off; echo  $St->send_text_off;  } ?>
     <?php if(!empty($St->admin_name) and $app['adf'] == 1){ for($i=0;$i<$app['pub'][0];$i++){ ?>
       <iframe  class="pupad" src="<?=$St->admin_name?>" <?=$sandbox?>></iframe>
    <?php } } ?>

</div>
</div>

<script type="text/javascript">
location.replace("<?=$url?>");
</script>
</body>
</html>
<?php }else{
if($St->close == 1){
?>
                   <div class="container">
                 <div class="row images">

       <div class="col s12 m12 upload-image" style="text-align:center;">
       <p>من فضلك انتظر جارى التحميل     </p>
                    <img src="http://app.nalkher.net//assets/images/bigloader.gif" alt="" class="responsive-img">
              </div>

</div>
</div>
     <div class="clearfix"></div>


<?php  include"inc/footer.php";  }else{ header("Location: ../");  } }  ?>