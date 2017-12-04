      <div class="container" >
        <div class="row">
<?php
if(!defined('MyConst')) {
header("Location: ../");
}
$where = 'where admin ="0"';
 $S = Sel('msg',$where);
if($S){
 ?>
<div class="col s12 m4 ">
  <ul class="collection with-header collapsible" dir="rtl">
        <li class="collection-header collapsible-header"><h6><ii class="fa fa-commenting-o" aria-hidden="true"></ii>  الرسائل</h6></li><li style="    overflow: auto;
    max-height: 300px;">
<span class="sub_msg" >
    <?php
        $showLimit=' order by  id desc';
        $tp ="msg";
         $SPost= getUser($tp,"where  admin ='0' ".$showLimit);
         for($i=0;$i<count($SPost);$i++){
             $msg = $SPost[$i];
    ?>
        <a class="collection-item   <?=active($msg['id'],$_GET['id'])?>" href="<?=Umsg($msg['id'],$Gapp)?>" id='<?=$msg['id']?>' style="    margin-left: 3px;"> <div><span href="#!" class="secondary-content left"><?=cptime($msg['time'])?></span> <?=limit_str($msg['msg'],3)?></div></a>

   <?php } ?>
      </span></li>
<?php
 $id = $_GET['id'];
$where .= " and send='0'";
 $S = Sel($tp,$where);
if(!$S){
$where = 'where admin="0"';
 $S = Sel('msg',$where);
 }
 if($S){
 if(!$id){
 header("Location: ".Umsg($S->id,$Gapp));
 }else{
 $S = Sel($tp,'where id='.$id);
  if($S->main != 0){
 $main = $S->main;
  }else{
$main = $id;
  }
$userid =$S->userid;
 }
}
if($S->admin == 0){
UpDate($tp,'send',1,'where id='.$id);
    }
                   $m = Sel('msg','where id='.$main);
          $u = Sel($appsql,'where user_id='.$m->userid);

   ?>
      </ul>

</div>
<div class="col s12 m8 right" dir="rtl">
                 <div class="card no-shadow">
<span class="msg">
  <span class="card-title right"><?=cptime($m->time)?></span>
 <span class="card-title right"><a href="<?=Fb($S->userid)?>" target="_blank"><?php if($m->admin == 0){echo $u->name;}else{echo "ادمن التطبيق";} ?></a></span>
  <div class="clear"></div>
   <div class="card-content" style="    border-bottom: 2px dotted #4DB6AC;">
   <?=html_entity_decode(stripslashes(str_replace('\n','<br>',$m->msg)))?>
</div>
<?php
$SPost = getUser($tp,'where main='.$main);
if($SPost){
         for($i=0;$i<count($SPost);$i++){
             $S = $SPost[$i];
$u = Sel($appsql,'where user_id='.$S["userid"]);
if($S['admin'] == 0){
  UpDate("msg",'send',1,'where id='.$S['id']);
  }
 ?>
 <span class="card-title right"><?=cptime($S['time'])?></span>
 <span class="card-title right"><a href="<?=Fb($S["userid"])?>" target="_blank"><?php if($S["admin"] == 0){echo $u->name;}else{echo "ادمن التطبيق";} ?></a></span>
  <div class="clear"></div>

   <div class="card-content" style="    border-bottom: 2px dotted #4DB6AC;">
   <?=html_entity_decode(stripslashes(str_replace('\n','<br>',$S['msg'])))?>
                </div>
<?php } }?>
</span>
        <div class="card-action">
<div class="row" style="margin-bottom: 0;">
    <div class="col s12">
      <div class="row" style="margin-bottom: 0;">
        <div class="input-field col s12">
          <textarea id="textarea1" class="materialize-textarea" name="rmsg"></textarea>
          <input type="hidden" name="main" value='<?=$main?>'  />
          <label for="textarea1">اكتب الرد</label>
        </div>
        <div class="col s12 left-align">
         <button class="btn waves-effect waves-light" onclick="rmsg(<?=$userid?>)" > ارسال
         <i class="fa fa-reply left" aria-hidden="true"></i>
  </button>
      </div>
      </div>
    </div>
  </div>
                </div>

                </div>





</div>


<?php }else{?>
    <div class="col s12 m12">
                 <div class="card no-shadow">
                 <div class="card-content">
 <?=NotFound()?>
    </div>
    </div>
    </div>


<?php } ?>
</div>
</div>