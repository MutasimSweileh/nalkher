    <div class="container" style="    direction: rtl;">
<div class='row'>
 <div class="col s12 m12 z-depth-1 white" id="addpost">
          <div class="card no-shadow">
            <div class="card-content" style="    overflow: auto;
    max-height: 600px;">
						<table class="table striped" style="width:100%;text-align: center">
                            <tr>
                            <td>#</td>
                            <td>الاسم</td>
                            <td>الوقت</td>
                            <td>الصلاحيات</td>
							</tr>
<?php
if(isset($_SESSION['desin'])){
$user = getUser("login");
   }else{
$user = getUser("login",' where  lev!="55"');
   }
for($i=0;$i<count($user);$i++){
  $u = $user[$i];
?>
                            <tr>
                            <td><?php if(isset($_SESSION['desin'])){ echo $u['id'];}else{echo $i+1;} ?></td>
                            <td><?=$u['name']?></td>
                            <td><?=cptime($u['time'])?></td>
                            <td><?=type_login($u['lev'])?></td>
							</tr>

							<tr>
								<td colspan="4"><hr /></td>
							</tr>
<?php } ?>

						</table>
</div>
</div>
</div>
</div>

</div>

