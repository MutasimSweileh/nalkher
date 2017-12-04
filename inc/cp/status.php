<?php
if(!defined('MyConst')) {
header("Location: ../");
}
if(isset($_GET['id']) and is_numeric($_GET['id'])){
$id = $_GET['id'];
$task = getUser('task_msg','where post_id="'.$id.'" order by id desc');
      $T = Sel('task','where id='.$id);
if($task){
      ?>
      <div id="statuss">
      <?php
          if($T->share != 0){
        ?>
           <div class="col  s12 m12  teal lighten-2 divider center">تم الانتهاء من النشر</div>
    <div class="col s12">
      <ul class="tabs">
        <li class="tab col s3" id="send"><a >تم النشر</a></li>
        <li class="tab col s3" id="nosend"><a  >فشل النشر</a></li>
        <li class="tab col s3" id="all"><a class="active" >الكل</a></li>
      </ul>
    </div>
 <?php
}
?>
    <div id="status">
<?php
   for ($i=0;$i<count($task);$i++){
        $S = $task[$i];
       if($S['send'] == 1){
        echo success('تم النشر عند ',$S['user_id'],$S['name']);
       }else{
        echo error('لم يتم النشر عند ',$S['user_id'],$S['name'],$S['msg']);
       }
      }
   ?>

   </div>
   </div>
   <?php

 }else{
  echo '<script>
            window.close();
            window.opener.location.reload();
            </script>
';
}
}else{
  echo '<script>
            window.close();
            window.opener.location.reload();
            </script>
';
}
?>
<script type="text/javascript" src="<?=$St->url?>/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?=$St->url?>/assets/js/materialize.min.js"></script>
<script type="text/javascript">
$('ul.tabs').tabs();
$('.tab').on('click',function(){
var id =  $(this).attr('id');
   $('#status').load('../inc/ajax.php?step=status&g=' + id +'&get=<?=$id?>');
});
</script>
<?php
          if($T->share == 0){
?>
<script type="text/javascript">
setInterval(function ()
{
$('#status').load('../inc/ajax.php?step=status&get=<?=$id?>');

}, 1000);
</script>
<?php
}
?>