<?php
if($Gapp == 'post'){
    if(isset($_GET['pid']) and is_numeric($_GET['pid'])){
     $Iv=0;
$id = (int)$_GET['pid'];

        $p = Selaa('posts','where id='.$id);
         $tutorial_id = $p["id"];
       $Su =Selaa($appsql,' where user_id='.$p['userid']);
        $view = '';
         $Nshare = $p["Nshare"];
}else{
 $p['id'] ="";
 $id="";
}
}else{
    if(isset($_GET['vid']) and is_numeric($_GET['vid'])){
       $Iv=1;
$id = $_GET['vid'];

        $p = Selaa('video','where id='.$id);
        $vid = $p["id"];
        $lv = $p["link"];
        $S =Selaa('posts','where vid='.$vid);
        if(!$S and Ls('admin')){
      $S = Sel('video','where id='.$id);
     $i= array(
     "text"=>$S->title,
     "link"=>Uvideo($S->id),
     "type"=>7,
     "vid"=>$S->id,
     "userid"=>$_SESSION['id'],
     "send"=>0,
     "date"=>time(),
     "active"=>$S->active,
     );
      $Sql = SqlIn('posts',$i);
      if($Sql){
       $R = Uvideo($id);
      header("Location: ".$R);
       }
        }
        $p['text'] = $p['description'];
        $p['userid'] = $S["userid"];
        $p['active'] = $S["active"];
        $p['time'] = $S["time"];
        $p['Tsend'] = $S["Tsend"];
        $p['time_share'] = $S["time_share"];
        $Nshare = $S["Nshare"];
        $view = $p['view'] + 1;
        UpDate('video','view',$view,'where id='.$vid);
        UpDate('posts','click',$S['click'] + 1,'where vid='.$vid);
 $Su =Selaa($appsql,' where user_id='.$p['userid']);
      $p['type']="";
}else{
 $p['id'] ="";
 $id="";
}
}
if($p['id']){
 if($Iv){ $p["id"] = $S['id'];}
    if(empty($Su['name'])){$Su['name']= $St->title;}
?>

<div class="row">
<div class="main col m12 s12 " >
<div class="card no-shadow">
<div class="card-content" style="position: relative;  <?php if($Iv){  ?>  padding: 0;  <?php } ?> ">
<?php if($Iv or $p['type'] == 2 or $p['type'] == 5){ ?>
<div class="card-title truncate"><?=html_entity_decode(stripslashes(str_replace('\n','<br>',$p['text'])));?></div>
<?php } ?>
<div class="clearfix"></div>
<?php if(!last_share($app['Atime'][0],$St->last_adf,$app['Atime'][1]) and !empty($St->post_ad) or $app['Adf'] == 0 and !empty($St->post_ad) ){ ?>
<div class="ad center">
 <center>
       <?php
      //echo substr($St->home_ad,strpos($St->home_ad,'<script'),strlen($St->home_ad));
 //       echo $St->post_ad;
       ?>
        </center>
</div>
<?php } ?>


            <?php  if($p['type']  == 2){
           $l=  $p['link'];

            ?>

               <div class="center post-img" style=" position: relative;"><img src="<?=$p['link']?>"  class=" responsive-img z-depth-1" alt=""></div>
                <?php } ?>
                 <?php  if($Gapp  == 'video'){?>

               <div class="center">
                <div class="center post-img post-img-video"  style="display:none; position: relative;"> <a> <img src="<?=$p['img']?>" style="width: 70%;" class=" responsive-img z-depth-1" alt=""></a></div>
               <div class="center Fvideo " >  <?=Fvideo($p['vid'],0,$p['img'])?>
 <?php if(!empty($St->admin_name) and $app['adf'] == 1 and  1 == 2){ ?> <a class="waves-effect waves-light btn  direct" target="_blank"  href="<?=$St->admin_name?>" style="      margin: -6px 0px 1px;
    border-radius: 0;  width: 100%;"><i class="fa fa-download right" aria-hidden="true"></i><i class="fa fa-download left" aria-hidden="true"></i><i class="fa fa-download" aria-hidden="true"></i></a> <?php } ?>
                </div>
                </div>
                <?php } if(!$Iv and $p['type'] != 2 and $p['type'] != 5){ ?>

                <div class="textLin">
            <p> <?=html_entity_decode(stripslashes(str_replace('\n','<br>',$p['text'])));?>  </p>
                </div>

               <?php } if($p['type']  == 1 or $p['type']  == 4){ ?>

          <div>   <a href="<?=$p['link']?>" target="_blank" class="truncate left-align" > <?=$p['link']?> </a> </div>

                <?php } ?>

<?php if(!empty($St->post_ad)){  ?>
<div class="ad center">
 <center>
 <?php      echo $St->post_ad;     ?>

        </center>
</div>
<?php  } ?>
<div class="clearfix"></div>
</div>
            <div class="card-action center" style="border:0;padding:10;">
             <div class="post-action center col s12 m12 waves-effect waves-light">
             <div class="info-post col s12 m7  bold">
<i class="fa fa-clock-o" aria-hidden="true"></i> <?=cptime($p['date'])?>  ❖ <i class="fa fa-pencil-square-o" aria-hidden="true"></i> <a  style="    margin: 0px;    display: inline-block;" href="<?=Fb($p['userid'])?>"  class=""><?=limit_str($Su['name'],3)?> </a>
<?php
if($view){
?>
 ❖ <i class="fa fa-eye" aria-hidden="true"></i> <?=$view?>

 <?php } ?>
 <?php
if($Nshare){
?>
 ❖ <i class="fa fa-share-alt-square" aria-hidden="true"></i> <?=$Nshare?>

 <?php }
if($p['num_dw']){
?>
<!-- ❖ <i aria-hidden="true" class="fa fa-cloud-download"></i> <?=$p['num_dw']?>             --->

 <?php } ?>
         </div>
<div class="col s12 m5">
                             <a class="tooltipped " onclick="fb_share(<?=$p['id']?>);"  data-position="bottom" data-delay="50" data-tooltip="نشر على فيس بوك"><i class="fa fa-facebook-square fa-lg " aria-hidden="true"></i></a>
                <a class="tooltipped" onclick="tw_share(<?=$p['id']?>);" data-position="bottom" data-delay="50" data-tooltip="نشر على تويتر"><i class="fa fa-twitter-square fa-lg" aria-hidden="true"></i></a>
<!--                <a class="tooltipped" onclick="add_time(<?=$p['id']?>);" data-tooltip="النشر لاحقا" data-tooltip-id="ed472c81-cc4c-1ce6-956d-2ac9b8acd67b"><i class="fa fa-calendar-plus-o  fa-lg" aria-hidden="true"></i></a>
-->                         <?php if(Ls('admin') and  $p['active'] == 0 ){ ?>    <a  class="tooltipped" onclick="A_post(<?=$p['id']?>);" data-tooltip="الموافقه على المنشور" data-tooltip-id="ed472c81-cc4c-1ce6-956d-2ac9b8acd67b"><i class="fa fa-check-circle-o fa-lg" aria-hidden="true"></i></a>     <?php  } ?>
                         <?php if(Ls('admin') and  $p['active'] == 0 ){ ?>    <a  class="tooltipped" onclick="Aa_post(<?=$p['id']?>);" data-tooltip="الموافقه على المنشور" data-tooltip-id="ed472c81-cc4c-1ce6-956d-2ac9b8acd67b"><i class="fa fa-check-circle fa-lg" aria-hidden="true"></i></a>     <?php  } ?>
            <?php if(Ls('admin') or $p['userid'] == $userid){ ?>    <a  class="tooltipped" onclick="E_post(<?=$p['id']?>);" data-tooltip="تعديل المنشور" data-tooltip-id="ed472c81-cc4c-1ce6-956d-2ac9b8acd67b"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>     <?php  } ?>
            <?php if(Ls('admin') or $p['userid'] == $userid){ ?>    <a  class="tooltipped" onclick="re(<?=$p['id']?>);" data-tooltip="حذف  المنشور" data-tooltip-id="ed472c81-cc4c-1ce6-956d-2ac9b8acd67b"><i class="fa fa-times fa-lg" aria-hidden="true"></i></a>     <?php  } ?>
            <?php if($p['time'] == 1 and 1 ==2){ ?>    <a  class="tooltipped" onclick="" data-tooltip="<?=date('g:i A', $p['time_share'])?>" data-tooltip-id="ed472c81-cc4c-1ce6-956d-2ac9b8acd67b"><i class="fa fa-clock-o fa-lg" aria-hidden="true"></i></a>     <?php  } ?>
            <?php if(Ls('admin')){ ?>    <a  class="tooltipped" onclick="fb_post(<?=$p['id']?>)" data-tooltip="نشر الان" data-tooltip-id="ed472c81-cc4c-1ce6-956d-2ac9b8acd67b"><i class="fa fa-send fa-lg" aria-hidden="true"></i></a>     <?php  } ?>
            <?php if(Ls('admin') and $p['cat'] and Fcol('google_id')[1] and $vid){ ?>    <a  class="tooltipped YD" id="<?=$p['vid']?>" format="mp4" data-tooltip="نشر الان" data-tooltip-id="ed472c81-cc4c-1ce6-956d-2ac9b8acd67b"><i class="fa fa-youtube fa-lg" aria-hidden="true"></i></a>     <?php  } ?>
           <a  class="tooltipped" onclick="add()" data-tooltip="اضافه" data-tooltip-id="ed472c81-cc4c-1ce6-956d-2ac9b8acd67b"><i class="fa  fa-plus-circle fa-lg" aria-hidden="true"></i></a>
            <?php if($vid){ if(strpos($lv,"video")){ $lv = '/'.$lv; }else{  $lv = '//www.youtubeinmp3.com/fetch/?video='.$lv; }  ?>
            <a  class="tooltipped  YD" data-download-count="true" id="<?=$p['vid']?>" type="dw" format="mp4" data-tooltip="تحميل الفديو" style='text-decoration:none;color: #F44336;'>
         <i aria-hidden="true" class="fa fa-cloud-download fa-lg"></i>
</a>
<input  name="vid" type="hidden" value="<?=$vid?>" />
<input  name="vdw" class="vdw" type="hidden" value="<?=$lv?>" />
              <?php  } ?>

            </div>

            </div>
            <div class="clear"></div>
            </div>

</div>
<div class="nx card no-shadow center" style="    padding: 10px;">
<div class="col m4 s5 " >
<?=nx($Gapp,$id,1)?>
</div>
<div class="col m4 s2" >
<?=home_nx($Gapp)?>
</div>

<div class="col m4 s5 " >
<?=nx($Gapp,$id)?>
</div>
 <div class="clear"></div>
</div>

<div class="card no-shadow" style="    padding: 10px;">
<?php if($St->comment == "site"){  ?>
<div class="card-title">التعليقات</div>
<?php  } ?>
<div class="card-content">
<?php if(!Ls()){ ?>
<a href="" onclick="login('fb',0,1); return false;"  class="btn waves-effect waves-light blue darken-4" ><i class="fa fa-facebook  right"></i> قم بالتسجيل من خلال الفيس بوك</a>
<?php }else{ if(Ftable('comment') and $St->comment == "site"){ ?>
<div class="commentt col m12">
                                    <div class="col  m2 s4 right center">
                					    <a href=""><img width="43" height="43"  src="<?=FbImg(Sion('id'),'normal')?>" class="circle img-responsive"></a>
                                    </div>
                                    <div class="col s8 m10 ">
										<textarea class="form-control CommentBox" name="comment" id="<?=$id?>"  ></textarea>
                                        <input type="hidden" name="Cuid" value="<?=Sion('id')?>" />
                                    </div>
                                </div>
<?php } } if(Ftable('comment') and  $St->comment == "site"){ ?>
<div class="CommentsList">
<?php $com= getUser('comment',' where pid='.$id); if($com){ for($i=0;$i<count($com);$i++){
 $v = $com[$i];
?>
<div class="comment col m12">
                                    <div class="col m2 s4 right center ">
                					    <a href="<?=Fb($v['uid'])?>"><img width="43" height="43" src="<?=FbImg($v['uid'],'normal')?>" class=" circle img-responsive "></a>
                                    </div>
                                    <div class="col m10 s8 ">
										<div class="who">
                                        	<a  style="    display: inline-block;" href="<?=Fb($v['uid'])?>"><?=$v['uname']?></a>
                                            <span style="    font-size: 80%;" > - <?=cptime($v['date'])?></span>
                                        </div>
                                        <div class="txt">
										<?=$v['comment']?>
                                        </div>
                                        <!--
                                        <div class="options">
                                        	<a href="">أعجبني</a>
                                            <div class="dot">•</div>
                                        	<a href="">رد</a>
                                        </div>
                                        -->
                                    </div>
                                </div><!-- /comment --> <!-- /comment -->
<?php }  } ?>

</div>
<?php }else if(Ls()){ ?>
<div class="fb-comments" data-href="<?=Lurl($Gapp,$id)?>" data-width="100%" data-numposts="5"></div>
<?php }  ?>
</div>
 <div class="clear"></div>
</div>

<!---main---->
</div>




</div>

<?php } else if($Gapp == "video" and !$id){   ?>

             <?php  if(Sion('not')){
               echo Amsg('لايوجد الفديو او تم حذفه من قبل الاداره','red');
             } ?>
      <div class="row videos">
       <div class="col s12 m12 upload-image" style="text-align:center;">
       <p>من فضلك انتظر جارى التحميل     </p>
                    <img src="<?=$St->url?>/assets/images/bigloader.gif" alt="" class="responsive-img">
              </div>
</div>

     <div class="clearfix"></div>

<?php }else{
if($Gapp == 'post'){
header("Location: ../");
}else{
    $_SESSION['not'] = true;
header("Location: ../videos.html");

}
} ?>