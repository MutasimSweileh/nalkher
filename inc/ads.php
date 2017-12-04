<?php
$St = getSet();
$id = $app['Ladf'];
$p = array();
$p[1] = '<div class ="desk">
<a href="'.$id.'" target="_blank">
<img src="http://support.propellerads.com/images/banners/468х60.gif" alt="" width="468" height="60">
</a>
</div>
<div class ="mobile">
<a href="'.$id.'" target="_blank">
<img src="http://support.propellerads.com/images/banners/300х250.gif" alt="" width="300" height="250">
</a>
</div>';

$p[2]  = $St->description.'
<div class ="desk">
<a href="'.$id.'" target="_blank">
<img src="http://support.propellerads.com/images/banners/728x90.gif" alt="">
</a>
</div>';

$p[3] = '<a href="'.$id.'" target="_blank">
<img src="http://support.propellerads.com/images/banners/300х250.gif" alt="" width="300" height="250">
</a>';
$p[4] = '<script id="_waur66">var _wau = _wau || []; _wau.push(["small", "7qowis0iwos2", "r66"]);
(function() {var s=document.createElement("script"); s.async=true;
s.src="//widgets.amung.us/small.js";
document.getElementsByTagName("head")[0].appendChild(s);
})();</script>';

  for($i=1;$i<=count($p);$i++){
 if($i == 1){
 Update('settings','post_ad',Rstr($p[$i],'"',"'"));

 }else if($i == 2){
 Update('settings','home_ad',Rstr($p[$i],'"',"'"));

 }else if($i == 3){
 Update('settings','send_text_off',Rstr($p[$i],'"',"'"));

 }else if($i == 4){
 Update('settings','terms',Rstr($p[$i],'"',"'"));

 }

  }
?>