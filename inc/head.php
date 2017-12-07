<?php
include "inc.php";
    if(isset($_GET['pid'])){
    $id = $_GET['pid'];
    $p = Selaa('posts','where id='.$id);
   $title= html_entity_decode(stripslashes(str_replace('n',' ',trim($p['text']))));
   $description= html_entity_decode(stripslashes(str_replace('n',' ',trim($p['text']))));
   $description_url= $St->url.'/post/'.$id.'.html';
   if($p['type'] == 2 or $p['type'] == 5  or $p['type'] == 6){
   $description_logo = $p['link'] ;
   }else{
   $description_logo= $St->logo;

   }
    }else if(isset($_GET['vid'])){
    $id = $_GET['vid'];
    $p = Selaa('video','where id='.$id);
   $title= html_entity_decode(stripslashes(str_replace('n',' ',trim($p['title']))));
   $description= html_entity_decode(stripslashes(str_replace('n',' ',trim($p['description']))));
   $description_url= Uvideo($id);
   $description_logo = $p['img'] ;
    }else{
   $description= $St->description;
   $description_url= $St->url;
   $description_logo= $St->logo;

    }

?>
<!DOCTYPE html>
<html  lang="ar" dir="rtl" >
<head>
<meta charset="UTF-8">
 <meta property="og:title" content="<?php if(!$id){ echo $St->title;} ?><?php if($Gapp == 'admin'  and $Gtype){echo" | ".lang('ar',$Gtype);}else if($Gapp == 'admin' and $Gtype){echo" | ".lang($lg,'login');}else if($Gapp  and $Gapp != 'install' and !$id ){echo" | ".lang($lg,$Gapp);}else if($Gapp == 'install'){echo lang($lg,$Gapp);}
    else if($Gapp == 'post' or $Gapp == 'video' and $id ){
    echo $title." | ".$St->title ;}
    ?>" />

    <title><?php if(!$id){ echo $St->title;} ?><?php if($Gapp == 'admin'  and $Gtype){echo" | ".lang('ar',$Gtype);}else if($Gapp == 'admin' and $Gtype){echo" | ".lang($lg,'login');}else if($Gapp  and $Gapp != 'install' and !$id ){echo" | ".lang($lg,$Gapp);}else if($Gapp == 'install'){echo lang($lg,$Gapp);}
    else if($Gapp == 'post' or $Gapp == 'video' and $id ){
    echo $title." | ".$St->title ;}
    ?></title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="<?=$description?>">
    <meta name="author" content="<?=$St->title?>">
    <meta property="og:description" content="<?=$description?>" />
    <meta content='<?=$St->fb_link?>' property='article:author'/>
    <meta content='<?=$St->fb_link?>' property='article:publisher'/>
    <meta content='<?=$St->title?>' property='og:site_name'/>
    <meta content='<?=$description_url?>' property='og:url'/>
     <meta property="fb:app_id" content="<?=$St->app_id?>">
    <meta content='<?=Iadmin()?>' property='fb:admins'/>
     <?php
    if(!empty($St->logo)){ ?>
    <meta property="og:image" content="<?=$description_logo?>"/>
    <link rel="shortcut icon" href="<?=$St->logo?>" />
    <link rel="image_src" href='<?=$description_logo?>' />
    <link rel="icon" href="<?=$St->logo?>">
    <?php }else{
    ?>
    <link rel="icon" href="<?=$St->url?>/assets/images/icon.png">
    <meta property="og:image" content="<?=$St->url?>/assets/images/icon.png"/>
    <link rel="shortcut icon" href="<?=$St->url?>/assets/images/icon.png" />
    <link rel="image_src" href='<?=$St->url?>/assets/images/icon.png' />

    <?php
    }
    ?>
  <link href="<?=$St->url?>/assets/css/style.css" rel="stylesheet" media="screen">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ar_AR/sdk.js#xfbml=1&version=v2.7&appId=<?=$St->app_id?>";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</head>
<body class=" boxed-layout horizontal-navigation">
