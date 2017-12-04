      <div class="container" >
        <div class="row">
<?php
if(!defined('MyConst')) {
header("Location: ../");
}
$where = 'where userid="'.$userid.'"';
 $S = Sel('msg',$where);
if($S){
 ?>
<div class="col s12 m4 ">
                 <div class="card no-shadow">
                 <div class="card-content center">
         <button class="btn waves-effect waves-light" onclick="msg(<?=userid?>,1)" > رساله جديده<i class="fa fa-send left" aria-hidden="true"></i> </button>

                 </div>
                 </div>
  <ul class="collection with-header collapsible" dir="rtl">
        <li class="collection-header collapsible-header"><h6><ii class="fa fa-commenting-o" aria-hidden="true"></ii>  الرسائل</h6></li><li style="    overflow: auto;
    max-height: 300px;">
<span class="sub_msg" >
    <?php
        $showLimit=12;
        $tp ="msg";

 $Ss = Sel($tp,'where id='.$_GET['id']);
 if($Ss->main != 0){
 $main = $Ss->main;
  }else{
$main = $_GET['id'];
  }
         $SPost= getUser($tp,"where  main='0' and userid='".userid."'  LIMIT ".$showLimit);
         for($i=0;$i<count($SPost);$i++){
             $msg = $SPost[$i];
    ?>
        <a class="collection-item   <?=active($msg['id'],$main)?>" href="<?=Umsg($msg['id'])?>" id='<?=$msg['id']?>' style="    margin-left: 3px;"> <div><span href="#!" class="secondary-content left"><?=cptime($msg['time'])?></span> <?=limit_str($msg['msg'],3)?></div></a>

   <?php } ?>
      </span></li>
<?php
 $id = isset($_GET['id']);
$where .= " and send='0' and  admin='1'";
 $S = Sel($tp,$where);
if(!$S){
$where = 'where userid="'.$userid.'"';
 $S = Sel('msg',$where);
 }
 if($S){
 if(!$id){
 header("Location: ".Umsg($S->id));
 }else{
 $S = Sel($tp,'where id='.$_GET['id']);
 if($S->main != 0){
 $main = $S->main;
  }else{
$main = $_GET['id'];
  }
 }
}
if($S->admin == 1){
UpDate($tp,'send',1,'where id='.$_GET['id']);
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
<?=html_entity_decode(stripslashes(str_replace('\n','<br>',$m->msg)));?></div>
<?php
$SPost = getUser($tp,'where main='.$main);
if($SPost){
         for($i=0;$i<count($SPost);$i++){
             $S = $SPost[$i];
$u = Sel($appsql,'where user_id='.$S["userid"]);
if($S['admin'] == 1){
  UpDate("msg",'send',1,'where id='.$S['id']);
  }
 ?>
 <span class="card-title right"><?=cptime($S['time'])?></span>
 <span class="card-title right"><a href="<?=Fb($S["userid"])?>" target="_blank"><?php if($S["admin"] == 0){echo $u->name;}else{echo "ادمن التطبيق";} ?></a></span>
  <div class="clear"></div>

   <div class="card-content" style="    border-bottom: 2px dotted #4DB6AC;">
           <?=html_entity_decode(stripslashes(str_replace('\n','<br>',$m->msg)));?>
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
         <button class="btn waves-effect waves-light" onclick="rmsg(<?=userid?>)" > ارسال
         <i class="fa fa-reply left" aria-hidden="true"></i>
  </button>
      </div>
      </div>
    </div>
  </div>
                </div>

                </div>





</div>


<?php }else{ ?>

    <div class="col s12 m4">
      <ul class="collection with-header collapsible" dir="rtl">
        <li class="collection-header collapsible-header"><h6><ii class="fa fa-commenting-o" aria-hidden="true"></ii>  الرسائل</h6></li>
       <?=NotFound()?>
       </ul>
    </div>
    <div class="col s12 m8">
                 <div class="card no-shadow">
                 <div class="card-content">

      <div class="row" style="margin-bottom: 0;">
        <div class="input-field col s12">
          <textarea id="textarea1" class="materialize-textarea" name="msg"></textarea>
          <input type="hidden" name="uid" value='<?=$userid?>'  />
          <input type="hidden" name="Nmsg" value='1'  />
          <label for="textarea1">اكتب الرساله</label>
        </div>
        <div class="col s12 left-align">
         <button class="btn waves-effect waves-light" onclick="msg(<?=userid?>)" > ارسال
         <i class="fa fa-reply left" aria-hidden="true"></i>
  </button>
      </div>
      </div>
    </div>
    </div>
    </div>
<?php } ?>
</div>
</div>