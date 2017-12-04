<?php
@ob_start();
@session_start();
include 'inc/head.php';
include 'src/facebook.php';
if(isv("r",1)){
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.otohits.net/me");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Content-Type: application/json",
  "Authorization: otoapi 7790b045-a19e-4cd1-b59f-9ac963f04a34 "
));

$response = curl_exec($ch);
curl_close($ch);

var_dump($response);
die();
}
$config = array();
$app2= isset($_GET['app2']);
$app3= isset($_GET['app3']);
if(!isv('red',1) and !isv('delete',1) and !Sion('Delete')){
adf($app['end'],2);
if($St->app2sql == 1 and  !$app3  or $app2){
$config['appId'] = $St->app2_id;
$config['secret'] = $St->app2_key;
$appsql="users2";
//$reUrl = $facebook->getLoginUrl($params);
    }else if($St->app3sql == 1 and  !$app2  or $app3){
$config['appId'] = $St->app3_id;
$config['secret'] = $St->app3_key;
$appsql="users3";
//$reUrl = $facebook->getLoginUrl($params);
    }else{
$config['appId'] = $St->app_id;
$config['secret'] = $St->app_key;
$appsql="users";
    }$config['fileUpload'] = true; // optional
$facebook = new Facebook($config);
if($app2){$reUrl = $facebook->getLoginUrl($params2);}else if($app3){$reUrl = $facebook->getLoginUrl($params3);}else{$reUrl = $facebook->getLoginUrl($params);}
if(isset($_GET['link']) and $_GET['link'] != ''){
$_SESSION['get']= $_GET['link'];
}
?>
<meta http-equiv="Refresh" content="0; URL=<?=$reUrl;?>">
<div class="container">
<div class="row" >
<?=loding("ãä ÝÖáß ÇäÊÙÑ ÌÇÑì ÊÍæíáß ááÇÔÊÑÇß");?>
</div>
<div class="center ad" style="opacity: 0;">
	   <div class="center ad">
 <?php if($app['Adf'] == 1){ echo  $St->send_text_off; echo  $St->send_text_off; } ?>
       </div>
    <?php if(!empty($St->admin_name) and $app['adf'] == 1){ for($i=0;$i<$app['pub'][0];$i++){ ?>
       <iframe  class="pupad" src="<?=$St->admin_name?>" <?=$sandbox?>></iframe>

    <?php } } ?>
</div>
</div>
<?php  }else if(isv('red',1)) {?>
<meta http-equiv="Refresh" content="0; URL=<?=$St->admin_name?>">
<div class="center ad" style="opacity: 1;">
    <?php  if(!empty($St->admin_name) and $app['adf'] == 1){ for($i=0;$i<$app['pub'][3];$i++){  ?>
       <iframe  class="pupad" src="<?=$St->admin_name?>" ></iframe>

<?php } } ?>
</div>
<?php }else{
$reUrl ="/Delete.html"

?>
<?=loding("ãä ÝÖáß Þã ÈÊÓÌíá ÇáÏÎæá ÇæáÇ");?>

<meta http-equiv="Refresh" content="0; URL=<?=$reUrl;?>">
<div class="center ad" style="opacity: 0;">
 <?php if($app['Adf'] == 1){ echo  $St->send_text_off; echo  $St->send_text_off;  } ?>
    <?php if(!empty($St->admin_name) and $app['adf'] == 1){ for($i=0;$i<$app['pub'][0];$i++){ ?>
       <iframe  class="pupad" src="<?=$St->admin_name?>" <?=$sandbox?>></iframe>

<?php } } ?>
</div>
<?php }?>