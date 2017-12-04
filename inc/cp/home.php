    <div class="container" style="    direction: rtl;">
<div class='row'>
<?php
if(isset($_POST['post'])){
$url ="http://mohtasmbelah.com/user.php?app=".$app['id'];
$red= readURL($url);
if($red){
      echo redMsg('success','تم تجديد الاشتراك بنجاح',1,0,'/admin');
}
}
$Dlink=$app['update']['Dlink'];
if($St->support < $app['update']['update'] and $app['update']['Dupdate'] == 1 and strpos($PUr,"$Dlink") and $app['update']['type'] == "fb" or $St->support < $app['update']['update'] and $app['update']['Dupdate'] == 1 and $app['update']['Dlink'] == "" and $app['update']['type'] == "fb" ){
echo Amsg($app['update']['msg'],'cyan darken-1',$app['update']['link']) ;
}
$Dlink=$app['Supdate']['Dlink'];
if($St->last_update < $app['Supdate']['update'] and $app['Supdate']['Dupdate'] == 1 and strpos($PUr,"$Dlink") and $app['Supdate']['type'] == "fb"  or $St->last_update < $app['Supdate']['update'] and $app['Supdate']['Dupdate'] == 1 and  $app['Supdate']['Dlink'] == "" and $app['Supdate']['type'] == "fb"){
echo Amsg($app['Supdate']['msg'],'cyan darken-1',$app['Supdate']['link']) ;
}
?>
 <div class="col s12 m12 z-depth-1 white" id="addpost">
          <div class="card no-shadow">

            <div class="card-content">
<form action="" method="post">
						<table class="table striped" style="width:100%;text-align: center">
<?php if($app['reg'] != 0){ ?>
							<tr>
								<td style="border-left: 2px solid #bdbdbd;" >
                                بدايه الاشتراك <br><?=$app['date']?>
                                </td>
								<td>
                                نهايه الاشتراك  <br><?=$app['edate']?>
        						</td>

                            </tr>

                              <tr>
								<td colspan="2"><hr /></td>
							</tr>
                              <tr>
                                 <?php if($app['end'] == 1){ ?>
								<td  >
                                المتبقيه
                                </td>
								<td>
                                <?php if($app['days'] != 0){ ?>
                                <?=$app['days']?> يوم
                                <?php }else { ?>
                                <?=$app['hours']?> ساعه

                                <?php } ?>
        						</td>
                                <?php }else{?>
                                <td colspan="2"><?php if($app['update']['paypal'] == 1){
                                    echo $app['pdays'];  include "payf.php"; }else{
                                    if($app['update']['submsg'] == 0){
                                    echo $app['days'];
                                      }else{
                                    ?>
                                <span class='red-text' style='    font-weight: bold;    display: block;' >    عملينا العزيز انتهت فترة الاشتراك الخاصه بك  ونظرا لان المبرمج غير موجود  يمكنك تجديد الاشتراك بنفسك بعد دفع قيمة الاشتراك وارسال رقم الفاتوره للمبرمج وهو سيتحقق منها عندما يكون متواجد  اذا كنت مستعد اضغط على زر تجديد الاشتراك
                                                 </span>
             <button name="post" type="submit" value="<?=$app['id']?>" class="btn waves-effect waves-light blue"> تجديد الاشتراك</button>
                                     <?php
                                      }

                                        } ?></td>
                                  <?php } ?>

                            </tr>


                              <tr>
								<td colspan="2"><hr /></td>
							</tr>
<?php }  ?>

							<tr>
                            <td>عدد المشتركين</td>
								<td >
                                <?php if(Ls('admin')){ echo Num('users');}else { echo "<div class='red-text'>غير مصرح لك بالاطلاع على العدد</div>"; }?>
                                </td>
                            </tr>

                              <tr>
								<td colspan="2"><hr /></td>
							</tr>

							<tr>
								<td style="border-left: 2px solid #bdbdbd;" >مشتركين اليوم
                                <br>
                                <?php
                                $user=0;
                                $d=strtotime("today");
                                $S= getUser($appsql,' where send="1"  order by id desc limit 10000');
                                if($S){
                                 for($i=0;$i < count($S);$i++){
                                  $T = $S[$i];
                                if(date("Y-m-d",$T['data']) == date("Y-m-d",$d)){
                                 $user +=1;
                                }
                                }
                                }else{$user = 0;}
                              if($user != ''){
                             echo $user;
                                 }else{
                               echo 0;
                                 }
                                ?>
                                </td>
								<td> مشتركين امس
                                <br>
                                <?php
                                $userr = 0;
                                $d=strtotime("yesterday");
                                //$d=strtotime("2 June 2016");
                                $S= getUser($appsql,' where send="1" order by id desc limit 10000');
                                if($S){
                                 for($i=0;$i < count($S);$i++){
                                  $T = $S[$i];
                                if(date("Y-m-d",$T['data']) == date("Y-m-d",$d)){
                                 $userr +=1;
                                }
                                }
                                }else{$userr = 0;}
                              if($userr != ''){
                             echo $userr;
                                 }else{
                               echo 0;
                                 }
                                ?>
								</td>
							</tr>
                            <?php if(Ftable('user_online') > 0 and  1 == 2){  ?>
                              <tr>
								<td colspan="2"><hr /></td>
							</tr>
							<tr>
								<td >المتواجدين الان</td>
								<td>
                                <aaa id="online"><?=Num('user_online')?> </aaa>
								</td>
							</tr>
                            <?php } ?>

                            <?php if($St->rDelete == 1){  ?>
                              <tr>
								<td colspan="2"><hr /></td>
							</tr>
							<tr>
								<td >من قاموا بحذف الاشتراك</td>
								<td>
                                <?php if(Ls('admin')){ echo Num($appsql,'where disactive="1"');}else { echo "<div class='red-text'>غير مصرح لك بالاطلاع على العدد</div>"; }?>
								</td>
							</tr>
                            <?php } ?>
                            <tr>
								<td colspan="2"><hr /></td>
							</tr>
							<tr>
								<td >انتهت فترة الاشتراك</td>
								<td>
                                <?php if(Ls('admin')){ echo Num($appsql,'where disactive="2"');}else { echo "<div class='red-text'>غير مصرح لك بالاطلاع على العدد</div>"; }?>
								</td>
							</tr>
                              <tr>
								<td colspan="2"><hr /></td>
							</tr>
                            <?php if($St->tw == 1){ ?>

							<tr>
								<td ><?=lang($lg,'users_tw')?></td>
								<td>
                                <?php if(Ls('admin')){ echo Num('users_tw');}else { echo "<div class='red-text'>غير مصرح لك بالاطلاع على العدد</div>"; }?>
								</td>
							</tr>
							<tr>
								<td colspan="2"><hr /></td>
							</tr>
                            <?php } ?>
							<tr>
								<td >عمليات دخول لوحة الاداره</td>
								<td>
                                (
                                <?php
                                if(isset($_SESSION['desin'])){
                                echo Num('login');
                               }else{
                                echo Num('login','where lev !="55"');

                               }
                              ?>
                              )
                                <a href="/admin/cp_login.html">عرض العمليات</a>
								</td>
							</tr>
							<tr>
								<td colspan="2"><hr /></td>
							</tr>
							<tr>
								<td ><?=lang($lg,'msg')?></td>
								<td>
                                <?=Num('msg','where send="0" and admin="0"')?>
								</td>
							</tr>
							<tr>
								<td colspan="2"><hr /></td>
							</tr>

                            <tr>
								<td style="border-left: 2px solid #bdbdbd;" ><?=lang($lg,'posts')?>

                                <?=Num('posts')?>
                                	</td>
                                	<td>
                                <?=lang($lg,'time_post')?>

                                <?=Num('posts','where send="0"')?>
								</td>
							</tr>

							<tr>
								<td colspan="2"><hr /></td>
							</tr>

							<tr>
<?php
if($St->app == 1){
    ?>
								<td style="border-left: 2px solid #bdbdbd;" >
                                <div class="input-field">

									 <input type='text' class='form-control updateOnChange' value="<?=$St->url?>/red.php" name='app_id'/>
                                <label for="first_name" class="active"><?=lang($lg,'red_link')?></label>
                                </div>
								</td>
<?php } ?>

								<td colspan="2">
                                <div class="input-field">
									 <input type='text' id="first_name" class='form-control updateOnChange' value="wget <?=$St->url?>/cron.php >/dev/null 2>&1" name='app_id'/>
                                <label for="first_name" class="active"><?=lang($lg,'cron_link')?></label>
                                </div>
                                </td>

							</tr>
							<tr>
								<td colspan="2"><hr /></td>
							</tr>

							<tr>
								<td ><?=lang($lg,'backup')?></td>
								<td>
									<a class='backup'>من هنا</a>
								</td>
							</tr>
							<tr>
								<td colspan="2"><hr /></td>
							</tr>


						</table>
</form>
</div>
</div>
</div>
</div>

</div>

