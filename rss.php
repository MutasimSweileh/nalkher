<?php
//header("Content-Type: application/rss+xml; charset=UTF-8");
include "inc.php";
$St= getSet();
?>
<!--<?xml version="1.0" encoding="utf-8"?> -->
<rss xmlns:a10="http://www.w3.org/2005/Atom" version="2.0">
<channel xmlns:media="http://www.w3.org/1999/02/22-rdf-syntax-ns#">
<title><?=$St->title?></title>
<link><?=$St->url?></link>
<description><?=$St->description?></description>
<language>ar-EG</language>
<image><url><?=$St->logo?></url><title><?=$St->title?></title><link><?=$St->url?></link></image>
<?php
$orderby = "order by rand()";
$date = time();
$rand= rand(1,9999999999999);
$gtype = isv("type",1);
$Werd = isv("werd",1);
if($gtype == "d"){
UpDate('share',"quran_msg",null);
}
if (TimeShare($gtype)){
if($St->blog == 1){$blog =4;}else{$blog =7;}
$blog =0;
$po = 'posts';
if($gtype == "quran"){
if(!$Werd){
$blog =8;
}else{
$blog =6;
$orderby = "order by id asc";
}
$po = "posts";
}else if($gtype == "video"){
$blog =7;
}

$Nvideo =  Num($po,"where  msg='0' and active='1' and type='".$blog."'   ");
$post =  Sel($po,"where  msg='0' and active='1' and type='".$blog."'   ".$orderby);
if($Nvideo  < 1){  if($St->Rtime == 1  and Num($po,'where msg="0" and active="1" and type="'.$blog.'"') < 1 ){   UpDate($po,'msg',0,'where send="1" and type="'.$blog.'"');  } }
if(!$Werd){
if($gtype == "quran"){
UpDate('share',"quran_msg",time());
UpDate('share',"quran_id",$post->id);
}else if($gtype == "video"){
UpDate('share',"share_video",time());
UpDate('share',"video_id",$post->id);
}else{
UpDate('share',"share_msg",time());
UpDate('share',"video_msg",$post->id);

}
}else{
    UpDate('share',"werd_msg",time());
    UpDate('share',"werd_id",$post->id);

}
UpDate($po,"msg",1,' where id='.$post->id);
}

$s = Sel("share");
if($gtype == "quran"){
if(!$Werd){
$post =  Sel('posts',"where  id=".$s->quran_id);
}else{
$post =  Sel('posts',"where  id=".$s->werd_id);
}
}else if($gtype == "video"){
$post =  Sel('posts',"where  id=".$s->video_id);

}else{
$post =  Sel('posts',"where  id=".$s->video_msg);
}
$p = Selaa('video','where id='.$post->vid);

/* $msg =  Rstr($post->text,'r','');        */
 /*$postb['message'] = Rstr(Rstr($msg,'nedalkhe','nedalkher'),'quani','qurani'); */
 if($Werd){
 $postb['message']= "الورد اليومى
   ";
      }
   $postb['message'] .= html_entity_decode(stripslashes(str_replace('\n','
        ',$post->text)));
   $postb['message'] .="
  خدمة التنبيه بالرسائل القصيره ==> http://m.me/Ned2.Al5er";
if($gtype != "video"){
	/*
   $postb['message'] .="
       #".str_replace(" ",'_',$St->title)." اشترك الان => ".$St->url; */
$app = "http://play.google.com/store/apps/details?id=com.mo3tasm.quran";
$app = "https://goo.gl/E3A9Vu";
$title="الورد القرآني";
  /* $postb['message'] .="

       #".str_replace(" ",'_',$title)." اشترك الان => ".$app;*/
                      }
 ?>
         <item>
<?php if($gtype != "video"){
  ?>
         <link><?=$post->link?></link>
<?php }else{ ?>
         <link><?=Uvideo($post->vid)?></link>
 <?php   } ?>
         <a10:author><a10:name>Mohtasm Mohamed</a10:name></a10:author>
 <?php if($gtype){ ?>
         <title><?=$St->title?></title>
<?php }else{ ?>
         <title><?=html_entity_decode(stripslashes(str_replace('\n','
        ',$postb['message'])))?></title>
 <?php  } ?>
   <description>
         <?=html_entity_decode(stripslashes(str_replace('\n','
        ',$postb['message'])))?>
         </description>
         '<pubDate><?=date("D, d M Y H:i:s O",$post->date)?></pubDate>
         <image><?=$p['img']?></image>
         <buttom>
         <text></text>
         <link></link>
         </buttom>

         </item>
 <?php ?>
 </channel>
 </rss>