<?php
@ob_start();
@session_start();
$lg='ar';
//ini_set('display_errors',1);
include "inc/config.php";
include "inc/lang.php";
include "inc/function.php";
include_once 'src/facebook.php';
require_once('src/oauth/twitteroauth.php');
require_once 'src/API/src/Google/Client.php';
require_once 'src/API/src/Google/Service/YouTube.php';
include 'inc/gapi.php';
$St=getSet();
date_default_timezone_set("Africa/Cairo");
//mysqli_query($DBcon, "SET NAMES 'utf8'");
//mysqli_query($DBcon, "set character_set_server='utf8'");
define("userid", "Nuser");
if (Sion("id")) {
    define("userid", Sion("id"));
}
$Gapp = isv("app");
$Gtype = isv("type");
