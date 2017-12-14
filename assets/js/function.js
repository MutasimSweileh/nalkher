$(document).on('click', '.show_more', function() {
  var ID = $(this).attr('id');
  var Gapp = $("input[name=Gapp]").val();
  var Gtype = $("input[name=Gtype]").val();
  var type = $("input[name=type]").val();
  var app = $("input[name=Gshare]").val();
  if (Gapp != 'admin') {
    if (Gapp == 'myposts') {
      Gapp = 'myposts&app=' + type;
    } else if (Gapp != "home" && Gapp) {
      Gapp = 'More_' + Gapp;
    } else {
      Gapp = "Moreposts";
    }
  } else {
    if (Gtype == 'posts') {
      Gapp = 'Pactive&app=' + type;
    } else if (Gtype == 'share') {
      Gapp = 'Gshare';
    } else {
      Gapp = type;
    }
  }
  var ajax_url = '../inc/ajax.php?step=' + Gapp;
  //$(this).addClass("btn-floating");
  $('.icon_more').hide();
  $('.loding').show();
  $.ajax({
    type: 'POST',
    url: ajax_url,
    data: {
      'id': ID,
      'Gapp': Gapp,
      'Gtype': Gtype,
      'type': type,
      'app': app
    },
    success: function(html) {
      $('#show_more_main' + ID).remove();
      $('.java').remove();
      $('.users').append(html);
      $('.gshare').append(html);
      $('.posts').append(html);
      $('.images').append(html);
      $('.videos').append(html);
      $('.myposts').append(html);
      $('.pposts').append(html);

    }
  });
});
function Ls(type){
var userid = $('input[name=userid]').val();
var lev = $('input[name=lev]').val();
var tw = $('input[name=tw]').val();
var fb = $('input[name=fb]').val();
var Ytoken = $('input[name=Ytoken]').val();
if(!type){
if(fb){
 return userid;
}else{
   return false;
}
}else if(type == 'tw'){
if(tw){
 return tw;
}else{
   return false;
}


}else if(type == 'Ytoken'){
if(Ytoken){
 return Ytoken;
}else{
   return false;
}


}else{
if(lev){
 return true;
}else{
   return false;
}
}
}
function fb_share (id){
    if(Ls()){
      loding_msg('من فضلك انتظر جارى النشر الان',0,1000);
                       $.ajax({
                        type: "POST",
                        url: '../inc/ajax.php?step=post_now',
                        data: {'pid':id},
                        success: function(data){
                         if(data.st == 'error'){

                        error_msg(data.msg);
                         }else{
                         success_msg(data.msg);
                         }


                         $('textarea[name=post]').val("");
                         remove_img_dialog(0,1);
                         remove_video();
                          //Getpost(data.pid);

                        },
                        dataType: 'json'
                      });
                      }else{

                       $.ajax({
                        type: "POST",
                        url: '../inc/ajax.php?step=post_num',
                        data: {'pid':id},
                        success: function(data){
                          if(data.st == "success"){
                          login('fb');
                          }
                        },
                        dataType: 'json'
                      });
                      }
  return false;
}
function login(type,L,M){
    if(!M){
error_msg("يتوجب عليك تسجيل الدخول") ;
}else{
loding_msg("جارى تحويلك للاشتراك");
}
if(L=="" || !L){
var lo = window.location.href;
setCookie("url",lo,1);
}
if(type == "fb"){
 location.replace("../rfb.html");
}else if(type == "youtube"){
 location.replace("../insert.php?you=true");
}else{
 location.replace("../twitter.html");

}
}
function Getposts(){
$('.posts').load('../inc/ajax.php?step=Getposts');

}
function GetGP(GP){

if(GP == "groups"){
 document.getElementById("pages").checked= false;
}else{
 document.getElementById("groups").checked = false;
}
$('.GP').html('<div class="col s12 m12" style=" text-align:center;"><img  src="/assets/images/ripple.svg" alt="" class="responsive-img"  /></div>');
$('.GP').load('../inc/ajax.php?step=GetGP&GP='+GP);

}

function add(){
if(Ls()){
 location.replace("../");
}else{
login('fb',1);
}
}
