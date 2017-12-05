<?php
include "inc.php";
$id = $_GET['pid'];
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

    <meta name="description" content="<?=$St->description?>">
    <meta name="author" content="<?=$St->title?>">
    <meta property="og:description" content="<?=$St->description?>" />
    <meta content='<?=$St->fb_link?>' property='article:author'/>
    <meta content='<?=$St->fb_link?>' property='article:publisher'/>
    <meta content='<?=$St->title?>' property='og:site_name'/>
     <?php
    if(!empty($St->logo)){ ?>
    <meta property="og:image" content="<?=$St->logo?>"/>
    <link rel="shortcut icon" href="<?=$St->logo?>" />
    <link rel="image_src" href='<?=$St->logo?>' />
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
</head>
<body class=" boxed-layout horizontal-navigation">
