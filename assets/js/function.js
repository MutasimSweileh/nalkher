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

function Ls(type) {
  var userid = $('input[name=userid]').val();
  var lev = $('input[name=lev]').val();
  var tw = $('input[name=tw]').val();
  var fb = $('input[name=fb]').val();
  var Ytoken = $('input[name=Ytoken]').val();
  if (!type) {
    if (fb) {
      return userid;
    } else {
      return false;
    }
  } else if (type == 'tw') {
    if (tw) {
      return tw;
    } else {
      return false;
    }


  } else if (type == 'Ytoken') {
    if (Ytoken) {
      return Ytoken;
    } else {
      return false;
    }


  } else {
    if (lev) {
      return true;
    } else {
      return false;
    }
  }
}

function fb_share(id) {
  if (Ls()) {
    loding_msg('من فضلك انتظر جارى النشر الان', 0, 1000);
    $.ajax({
      type: "POST",
      url: '../inc/ajax.php?step=post_now',
      data: {
        'pid': id
      },
      success: function(data) {
        if (data.st == 'error') {

          error_msg(data.msg);
        } else {
          success_msg(data.msg);
        }


        $('textarea[name=post]').val("");
        remove_img_dialog(0, 1);
        remove_video();
        //Getpost(data.pid);

      },
      dataType: 'json'
    });
  } else {

    $.ajax({
      type: "POST",
      url: '../inc/ajax.php?step=post_num',
      data: {
        'pid': id
      },
      success: function(data) {
        if (data.st == "success") {
          login('fb');
        }
      },
      dataType: 'json'
    });
  }
  return false;
}

function login(type, L, M) {
  if (!M) {
    error_msg("يتوجب عليك تسجيل الدخول");
  } else {
    loding_msg("جارى تحويلك للاشتراك");
  }
  if (L == "" || !L) {
    var lo = window.location.href;
    setCookie("url", lo, 1);
  }
  if (type == "fb") {
    location.replace("../rfb.html");
  } else if (type == "youtube") {
    location.replace("../insert.php?you=true");
  } else {
    location.replace("../twitter.html");

  }
}

function Getposts() {
  $('.posts').load('../inc/ajax.php?step=Getposts');

}

function GetGP(GP) {

  if (GP == "groups") {
    document.getElementById("pages").checked = false;
  } else {
    document.getElementById("groups").checked = false;
  }
  $('.GP').html('<div class="col s12 m12" style=" text-align:center;"><img  src="/assets/images/ripple.svg" alt="" class="responsive-img"  /></div>');
  $('.GP').load('../inc/ajax.php?step=GetGP&GP=' + GP);

}

function add() {
  if (Ls()) {
    location.replace("../");
  } else {
    login('fb', 1);
  }
}
///////////////////////////////////////////////////////
function register() {
  $.ajax({
    type: "POST",
    url: "../inc/ajax.php?step=Mail",
    data: $('#form').serialize(),
    dataType: 'json',
    success: function(data) {
      if (data.result != "success") {
        error_msg(data.msg);
      } else {
        success_msg(data.msg);
        mailchimp();
        $('#form').find("input,textarea").val("");
      }
    }
  });
}

function register_sms() {
  $.ajax({
    type: "POST",
    url: "../inc/ajax.php?step=Sms",
    data: $('#form').serialize(),
    dataType: 'json',
    success: function(data) {
      if (data.result != "success") {
        error_msg(data.msg);
      } else {
        success_msg(data.msg);
        $('#form').find("input,textarea").val("");
      }
    }
  });
}

function mailchimp(msg) {
  $.ajax({
    type: $('#form').attr('method'),
    url: $('#form').attr('action'),
    data: $('#form').serialize(),
    cache: false,
    dataType: 'json',
    contentType: "application/json; charset=utf-8",
    error: function(err) {
      if (msg) error_msg("Could not connect to the registration server. Please try again later.");
    },
    success: function(data) {
      if (data.result != "success") {
        if (msg)
          error_msg(data.msg);
      } else {
        if (msg)
          success_msg(data.msg);
      }
    }
  });
  return false;
}


////////////////////////cookie////////////////////////////
function setCookie(cname, cvalue, exdays, dd) {
  if (dd == 1) {
    dd = exdays * 60;
  } else if (dd == 2) {
    dd = exdays;
  } else {
    dd = exdays * 24 * 60;
  }
  var d = new Date();
  d.setTime(d.getTime() + (dd * 60 * 1000));
  var expires = "expires=" + d.toUTCString();
  document.cookie = cname + "=" + cvalue + "; " + expires;
}

function getCookie(cname) {
  var name = cname + "=";
  var ca = document.cookie.split(';');
  for (var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}
////////////////////////////////////////////////////
function stop_task(id) {
  $.ajax({
    type: "POST",
    url: '../inc/ajax.php?step=stop_task',
    data: {
      'id': id
    },
    success: function(data) {
      if (data.st == 'error') {
        error_msg(data.msg);
      } else {
        success_msg(data.msg);
      }
    },
    dataType: 'json'
  });

}

function re(id, type) {
  loding_msg("جارى التحميل", 1);
  var type = $('input[name=type]').val();
  var Gtype = $('input[name=Gtype]').val();
  $.ajax({
    type: "POST",
    url: '../inc/ajax.php?step=Ruser',
    data: {
      'id': id,
      'type': type,
      'Gtype': Gtype
    },
    success: function(data) {
      if (data.st == 'error') {

        error_msg(data.msg);
      } else {
        $('div[id="t' + id + '"]').fadeOut(function() {
          $(this).remove();
        });
        $('tr[id="t' + id + '"]').fadeOut(function() {
          $(this).remove();
        });

        // Getpost(id);
        success_msg(data.msg);
      }


    },
    dataType: 'json'
  });

  return false;
}

function ban(id, type) {
  loding_msg("جارى التحميل", 1);

  $.ajax({
    type: "POST",
    url: '../inc/ajax.php?step=block',
    data: {
      'id': id,
      'type': type
    },
    success: function(data) {
      if (data.st == 'error') {

        error_msg(data.msg);
      } else {
        /*                          $('div[id="t'+ id +'"]').fadeOut(function(){
                                       $(this).remove();
                                   });
        */ // Getpost(id);
        success_msg(data.msg);
      }


    },
    dataType: 'json'
  });

  return false;
}

function unban(id, type) {
  loding_msg("جارى التحميل", 1);
  $.ajax({
    type: "POST",
    url: '../inc/ajax.php?step=unblock',
    data: {
      'id': id,
      'type': type
    },
    success: function(data) {
      if (data.st == 'error') {

        error_msg(data.msg);
      } else {
        /*                          $('div[id="t'+ id +'"]').fadeOut(function(){
                                       $(this).remove();
                                   });
        */ // Getpost(id);
        success_msg(data.msg);
      }


    },
    dataType: 'json'
  });

  return false;
}

function check(id, type) {
  loding_msg("جارى التحميل", 1);

  $.ajax({
    type: "POST",
    url: '../inc/ajax.php?step=Cuser',
    data: {
      'id': id,
      'type': type
    },
    success: function(data) {
      if (data.st == 'error') {

        error_msg(data.msg);
      } else {
        /*      $('div[id="t'+ id +'"]').fadeOut(function(){
                   //$(this).remove();
               });
        */ // Getpost(id);
        success_msg(data.msg);
      }


    },
    dataType: 'json'
  });

  return false;
}


////////////////////////////////////////////////
function Dpost(id) {
  $.ajax({
    type: "POST",
    url: '../inc/ajax.php?step=Dpost',
    data: {
      'id': id
    },
    success: function(data) {
      if (data.st == 'error') {

        error_msg(data.msg);
      } else {
        success_msg(data.msg);
      }
    },
    dataType: 'json'
  });

}

function Getpost(id) {
  var Gapp = $("input[name=Gapp]").val();
  if (!Gapp || Gapp == 'home') {
    $.ajax({
      type: "POST",
      url: '../inc/ajax.php?step=Moreposts',
      data: {
        'pid': id
      },
      success: function(data) {
        if (data.st == 'error') {

          //error_msg('حدث خطأ ما لم يتم النشر ');
        } else {
          // success_msg('تم اضافة المنشور بنجاح');
        }
        $('.posts').prepend(data);
      }
    });
  }

}



////////////////////////////////////////////////
function remove_img_dialog(type, t) {
  if (!type) {
    type = 0;
  }
  $(".uimage").hide();
  $(".eimage").hide();
  $(".image").attr('src', '');
  $('.textfilde').addClass('m12');
  $("input[name=type]").val(type);
  $("input[name=etype]").val(type);
  $("input[name=url]").val('');
  $("input[name=eurl]").val('');
  if (!t) {
    success_msg("تم حذف الصوره بنجاح", 0)
  }
}

function remove_video() {
  $('label[for=linetext-1]').text('المنشور');
  $('.title_video').hide();
  $('.url_video').hide();
  $('.remove').show();
  $('.uimage').hide();
  $('.textfilde').addClass('m12');
  $("input[name=url]").val('');
  $("input[name=title]").val('');
  $("input[name=eurl]").val('');
  $(".image").attr('src', '');


}

function popup(url) {
  var redirectWindow = window.open(url, '_blank');
  $.ajax({
    type: 'POST',
    url: '/echo/json/',
    success: function(data) {
      redirectWindow.location;
    }
  });
}


////////////////////////tost////////////////////////////
function DeleteAll(id) {
  if (!id) {
    $.dialog({
      //content: '<div class="row center" ><div class="col s6 m6 right"> <a style="    width: 100%;" onclick="DeleteAll(\'users\')" class="btn waves-effect waves-light">الاساسى</a></div><div class="col s6 m6"> <a style="    width: 100%;" onclick="DeleteAll(\'users2\')" class="btn waves-effect waves-light">الاحتياطى</a></div></div>',
      content: 'url:../inc/ajax.php?step=DeleteAll&id=' + id,
      title: false,
      rtl: true,
      //confirm: function(){},
      closeIconClass: 'fa fa-close',
      cancelButton: false, // hides the cancel button.
      confirmButton: false, // hides the confirm button.
      closeIcon: true, // hides the close icon.

    });
  } else {
    $.ajax({
      type: "POST",
      url: '../inc/ajax.php?step=nosend',
      data: {
        'id': id
      },
      success: function(data) {
        if (data.st == 'error') {
          error_msg(data.msg);
        } else {
          success_msg(data.msg);
        }
      },
      dataType: 'json'
    });

  }
}

function Rapp(id) {
  $.ajax({
    type: "POST",
    url: '../inc/ajax.php?step=Rapp',
    data: {
      'id': id
    },
    success: function(data) {
      if (data.st == 'error') {
        error_msg(data.msg);
        //location.href = location.href+ "#" +data.msg;
      } else {
        success_msg(data.msg);
      }
    },
    dataType: 'json'
  });


}
/////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////



          function get_video (url,a){
           if(url==""){
                loding_msg('اضف رابط الفديو');
               $('.url_video label').text("رابط الفديو");
                $('label[for=linetext-1]').text('وصف الفديو');
                $('.url_video').show();
                  }
                $("input[name=url]").change(function(){
                 var url =    $("input[name=url]").val();
            var you = url.search("youtube");
            var you2 = url.search("youtu");
if(you2 < 1){
                        error_msg("عذرا اضف رابط يوتيوب صحيح");

}else{
              $.ajax({
                        type: "POST",
                        url: '../inc/ajax.php?step=get_video',
                        data: {'url':url},
                        success: function(data){
                         if(data.st == 'error'){

                        error_msg(data.msg);
                         }else{
                         success_msg(data.msg);

                         $('textarea[name=post]').val(data.title);
                         $('input[name=title]').val(data.title);
                         $('.image').attr('src',data.img);
                         if(a != 1){
                         $('label').addClass('active');
                         }
                         $('label[for=linetext-1]').text('وصف الفديو');
                         $('.title_video').show();
                         $('.remove').hide();
                         $('.uimage').show();
                         $('.textfilde').removeClass('m12');
                         $('.textfilde').addClass('m9');
                         $("input[name=type]").val(7);
                         }
                        },
                        dataType: 'json'
                      });
    }
                 });

}
function G_video(url){
  $.ajax({
            type: "POST",
            url: '../inc/ajax.php?step=get_video',
            data: {'url':url},
            success: function(data){
             if(data.st == 'error'){

            error_msg(data.msg);
             }else{
             success_msg(data.msg);

             $('textarea[name=post]').val(data.title);
             $('input[name=title]').val(data.title);
             $('input[name=url]').val(url);
             $('.image').attr('src',data.img);
             $('label').addClass('active');
             $('label[for=linetext-1]').text('وصف الفديو');
             $('.title_video').show();
             $('.url_video').show();
             $('.remove').hide();
             $('.uimage').show();
             $('.textfilde').removeClass('m12');
             $('.textfilde').addClass('m9');
             $("input[name=type]").val(7);
             }
            },
            dataType: 'json'
          });

}
          function get_url (url){
                $("input[name=url]").change(function(){
                 var url =    $("input[name=url]").val();
              $.ajax({
                        type: "POST",
                        url: '../inc/ajax.php?step=get_url',
                        data: {'url':url},
                        success: function(data){
                         if(data.st == 'error'){
                        if(data.type != 'face'){
                        error_msg(data.msg);
                        }
                         }else{
                         success_msg(data.msg);
                         //success_msg(data.img);
                         if(data.description){
                             if($('textarea[name=post]').val() == ''){
                         $('textarea[name=post]').val(data.description);
                              }
                         $('textarea[name=Durl]').val(data.description);
                         }else{
                             if($('textarea[name=post]').val() == ''){
                         $('textarea[name=post]').val(data.title);
                         }
                         $('textarea[name=Durl]').val(data.title);
                         }
                         $('input[name=Nmurl]').val(data.title);
                         //$('.image').attr('src',data.img);
                         //$('label[for=linetext-1]').text('وصف الفديو');
                         //$("input[name=type]").val(7);
                         }
                        },
                        dataType: 'json'
                      });
                 });

}

          function YUpload (url){
          if(!Ls('Ytoken')){
           error_msg('قم بتسجيل الدخول الى يوتيوب اولا');
           login('youtube');
           return false;
          }
              loding_msg("جاري التحميل",1,70000);
              $.ajax({
                        type: "POST",
                        url: '../inc/ajax.php?step=YUpload',
                        data: {'url':url},
                        success: function(data){
                        $('.loader').hide();
                         if(data.st == 'error'){
                        error_msg(data.msg);
                         }else{
                         success_msg(data.msg);
                         }
                        },
                        dataType: 'json'
                      });

}

function nosend (id){
//        var url = $("#download").attr('href');
//var r = confirm("هل تريد فعلا حذف المتوقف");
              $.ajax({
                        type: "POST",
                        url: '../inc/ajax.php?step=nosend',
                        data: {'id':id},
                        success: function(data){
                         if(data.st == 'error'){

                        error_msg(data.msg);
                         }else{
                         success_msg(data.msg);
                         }
                        },
                        dataType: 'json'
                      });

}
////////////////////////action////////////////////////
function fb_post (id){
      loding_msg('من فضلك انتظر جارى النشر الان',0,1000);
var type = $('input[name=type]').val();
       // error_msg(type);

                       $.ajax({
                        type: "POST",
                        url: '../inc/ajax.php?step=fb_post',
                        data: {'pid':id,'type':type},
                        success: function(data){
                         if(data.st == 'error'){

                        error_msg(data.msg);
                         }else{
                         success_msg(data.msg);
                         //success_msg(data.type);
                         }


                         $('textarea[name=post]').val("");
                        // remove_img_dialog(0,1);
                         //remove_video();
                          //Getpost(data.pid);

                        },
                        dataType: 'json'
                      });


}

    function G_post(id){

  loding_msg("من فضلك انتظر جارى جلب المنشور الان");
  $('.url_video').hide();
  remove_img_dialog(0,1);
  remove_video();
                     $.ajax({
                        type: "POST",
                        url: '../inc/ajax.php?step=AddT',
                        data: {'pid':id},
                        success: function(data){
                         if(data.st == 'error'){

                        error_msg(data.msg);
                         }else{
                         success_msg(data.msg);



              $('textarea[name=post]').val(data.post);
              $(".options").hide();
              $("button[name=epost]").show();

              $("button[name=epost]").attr("onclick","edite("+id+")");
              $("button[name=post]").hide();
              $("input[name=type]").val(data.type);

            $('label').addClass('active');
            if(data.type == 2 ){
              $('.textfilde').removeClass('m12');
              $('.textfilde').addClass('m9');
             $(".image").attr('src',data.img);
             $("input[name=img]").val(data.img);
              $(".uimage").show();
            }else if(data.type == 7){
             G_video(data.vurl);
            }else if(data.type == 1){
              $('.url_video').show();
              $("input[name=url]").val(data.url);
              $('.url_video label').text("الرابط");
              $('label[for=linetext-1]').text('المنشور');
            }
              document.body.scrollTop = 0;
              document.documentElement.scrollTop = 0;
                   }

                        },
                        dataType: 'json'
                      });
    return false;
    }

function tw_share (id){
    if(Ls('tw')){
    soon_msg("قريبا ان شاء الله",2000);
    }else{
       login('tw');
    }
  return false;
  }
function text_post(){
var type =$('input[name=type]').val();
if(type == 2){
type =0;
}
remove_img_dialog(0,type);
remove_video();
  return false;
  }

///////////////////Remove/////////////////////////////
function D_post (id){
                       $.ajax({
                        type: "POST",
                        url: '../inc/ajax.php?step=Dactive',
                        data: {'id':id},
                        success: function(data){
                         if(data.st == 'error'){

                        error_msg(data.msg);
                         }else{
                        $('div[id="t'+ id +'"]').fadeOut(function(){
                               $(this).remove();
                           });
                         success_msg(data.msg);
                         }


                        },
                        dataType: 'json'
                      });

  return false;
  }
///////////////////more/////////////////////////////
function ChangeUrl(page, url) {
        if (typeof (history.pushState) != "undefined") {
            var obj = { Page: page, Url: url };
            history.pushState(obj, obj.Page, obj.Url);
        } else {
            alert("Browser does not support HTML5.");
        }
}


function Gmsg(id){
 var Gapp  =   $.trim($('input[name=Gapp]').val());
                      $.ajax({
                        type: "POST",
                        url: '../inc/ajax.php?step=Gmsg',
                        data: {'id':id,'Gapp':Gapp},
                        success: function(data){
                        if(id){
                         $('.msg').html(data);
                           }else{
                         $('.sub_msg').html(data);

                           }
                        },
                       // dataType: 'json'
                      });
  return false;


}
function rmsg (id){
 var rmsg  =   $.trim($('textarea[name=rmsg]').val());
 var main  =   $.trim($('input[name=main]').val());
                      $.ajax({
                        type: "POST",
                        url: '../inc/ajax.php?step=msg',
                        data: {'id':id,'rmsg':rmsg,'main':main},
                        success: function(data){
                         if(data.st == 'error'){

                        error_msg(data.msg);
                         }else{

                         success_msg(data.msg);
                         $('.modal-content').html('');
                         $('textarea[name=rmsg]').val('')
                         Gmsg(data.id);

                         }


                        },
                        dataType: 'json'
                      });
  return false;
}
function msg (id){

  }

function more (id){

  }
  function close (id){

  return false;
  }
////////////////////user_time////////////////////////////
   function user_time(){

   }

   function ref(url){
if(url){
return  location.replace(url);
}else{
return false;
}
 }
////////////////////active////////////////////////////
function Ref_post (id){
    loding_msg("جارى التحميل",0,3000);
                       $.ajax({
                        type: "POST",
                        url: '../inc/ajax.php?step=Ref',
                        data: {'id':id},
                        success: function(data){
                         if(data.st == 'error'){

                        error_msg(data.msg);
                         }else{
                           //Getpost(id);
                         success_msg(data.msg);
                         }


                        },
                        dataType: 'json'
                      });

  return false;
  }

function A_post (id){
                       $.ajax({
                        type: "POST",
                        url: '../inc/ajax.php?step=active',
                        data: {'id':id},
                        success: function(data){
                         if(data.st == 'error'){

                        error_msg(data.msg);
                         }else{
                          $('div[id="t'+ id +'"]').fadeOut(function(){
                               $(this).remove();
                           });

                           Getpost(id);
                         success_msg(data.msg);
                         }


                        },
                        dataType: 'json'
                      });

  return false;
  }
function Aa_post (id){
                       $.ajax({
                        type: "POST",
                        url: '../inc/ajax.php?step=activee',
                        data: {'id':id},
                        success: function(data){
                         if(data.st == 'error'){

                        error_msg(data.msg);
                         }else{
                          $('div[id="t'+ id +'"]').fadeOut(function(){
                               $(this).remove();
                           });
                           Getpost(id);
                         success_msg(data.msg);
                         }


                        },
                        dataType: 'json'
                      });

  return false;
  }

  ////////////////////edite////////////////////////////
function Sstatus(id){
var server = $.trim($('input[name=server]').val());
window.open(server+"/admin/status"+id+".html","","width=525,height=550,left=0,top=0,resizable=yes,menubar=no,location=no,status=yes,scrollbars=yes");

}

  function edite (id){
 var Etext  =   $.trim($('textarea[name=post]').val());
 var eurl = $.trim($('input[name=url]').val());
  var title = $.trim($('input[name=title]').val());
 var vurl = $.trim($('input[name=vurl]').val());
 var vid = $.trim($('input[name=vvid]').val());
 var aid = $.trim($('input[name=aid]').val());
 var etype = $('input[name=type]').val();
 var name = $.trim($('input[name=name]').val());
 var email = $.trim($('input[name=email]').val());
 var pass = $.trim($('input[name=pass]').val());
 var admin_fb = $.trim($('input[name=admin_fb]').val());
 var Gtype = $.trim($('input[name=Gtype]').val());

                       $.ajax({
                        type: "POST",
                        url: '../inc/ajax.php?step=edite',
                        data: {'id':id,'post':Etext,'title':title,'url':eurl,'vurl':vurl,'vid':vid,'type':etype,'name':name,'fb':admin_fb,'pass':pass,'aid':aid,'email':email,'Gtype':Gtype},
                        success: function(data){
                         if(data.st == 'error'){

                        error_msg(data.msg);
                         }else{
                          $('div[id="t'+ id +'"]').fadeOut(function(){
                               $(this).remove();
                           });
                              $('.edite').hide();
                           Getpost(id);
                         success_msg(data.msg);
                         $("button[name=post]").show();
                         $(".options").show();
                         $("button[name=epost]").hide();
                         }


                        },
                        dataType: 'json'
                      });

  return false;
  }
/////////////////////user_active///////////////////////////

function nof(type){
if(type == 'nof'){
remove_img_dialog(type,1);
remove_video();
 $('.likes').hide();
 $('.short').show();
 $('.pages').hide();
 $('.post').hide();
 $('.url').show();
 $('.Durl').hide();
 $('.Nmurl').hide();
 $('.token').hide();
 $('.img-up').hide();
 $('.nof').show();
 $('.textfilde').show();
 $('.cantry').hide();
}else if(type == 'token'){
remove_img_dialog(type,1);
remove_video();
 $('button[name=selected]').val('all');
 $('button[name=selected]').text('لم يتم تحديد شىء');
 $('.img-up').hide();
 $('.pages').hide();
 $('.cantry').hide();
 $('.post').hide();
 $('.token').show();
  $('.short').hide();
 $('.Durl').hide();
 $('.Nmurl').hide();
 $('.url').hide();
 $('.nof').hide();
 $('.likes').hide();
 $('.textfilde').hide();
}else{
 $('.post').show();
if(type == 'likes'){
remove_img_dialog(type,1);
remove_video();
success_msg("تعمل هذه الخاصيه مع التطبيق الدائم فقط",1,5000);
 $('.likes').show();
 $('.postt').hide();
 $('.posttt').hide();
 $('.pages').hide();
 $('.textfilde').hide();
}else{
 $('.likes').hide();
 $('.postt').show();
 $('.posttt').show();
 $('.pages').show();
 $('.textfilde').show();
}
  $('.cantry').show();
 $('.short').hide();
 $('.token').hide();
 $('.url').hide();
  $('.Durl').hide();
 $('.Nmurl').hide();
 $('.nof').hide();
}

}
function set(type){
if(type == 'set'){
 $('.set').show();
 $('.UpSet').show();
 $('.fb').hide();
 $('.tw').hide();
 $('.msg').hide();
  $('.admin').hide();
}else if(type == 'tw'){
 $('.UpSet').show();
  $('.msg').hide();
 $('.tw').show();
 $('.fb').hide();
 $('.set').hide();
 $('.admin').hide();
}else if(type == 'fb'){
$('.UpSet').show();
 $('.msg').hide();
 $('.fb').show();
 $('.set').hide();
 $('.tw').hide();
 $('.admin').hide();
}else if(type == 'admin'){
 $('.fb').hide();
  $('.msg').hide();
  $('.UpSet').hide();
 $('.admin').show();
 $('.set').hide();
 $('.tw').hide();
}else if(type == 'msg'){
 $('.UpSet').show();
 $('.fb').hide();
 $('.msg').show();
 $('.admin').hide();
 $('.set').hide();
 $('.tw').hide();
}
}

function close_search(){
var Gtype = $.trim($('input[name=Gtype]').val());
var Gapp = $.trim($('input[name=Gapp]').val());
var type = $.trim($('input[name=type]').val());
if(Gtype == 'posts'){
Gtype = 'Pactive&app=' + type;
}else if(Gapp == 'myposts'){
Gtype = 'myposts&app=' + type;
}
$('.users').load('../inc/ajax.php?step='+ type );
$('.pposts').load('../inc/ajax.php?step='+ Gtype );
}
/////////////////////Delete///////////////////////////
             $('.Delete').click(function(){
                  var Delete_msg = $.trim($('textarea[name=Delete_msg]').val());

                  if(Delete_msg==""){
                    error_msg("قم بكتابه السبب من فضلك");
                  }else if(Delete_msg.length < 20){
                   error_msg("هذا السبب قصير جدا من فضلك اكتب السبب صحيح");

                  }else{
                             $(this).hide();
                             $('.CDelete').show();
                             $('textarea[name=Delete_msg]').val('');
                       $.ajax({
                        type: "POST",
                        url: '../inc/ajax.php?step=Delete',
                        data: {'Delete_msg':Delete_msg},
                        success: function(data){
                         if(data.st == 'error'){
                           error_msg(data.msg);
                         }else{
                             success_msg(data.msg);
                             location.replace('/');
                         }


                        },
                        dataType: 'json'
                      });

                  }


                  return false;
              });
/////////////////////toasts/////////////////////////
function success_msg(text, h, time) {
  $('.material-tooltip').hide();
  $('.toast-info').hide();
  if (!time) {
    time = 5500;
  }
  if (!h && h == 55) {
    h = '<a class="hide_tost" onclick="hide_tost()"><i class="fa fa-times" aria-hidden="true"></i></a>';
  } else {
    h = '';
  }
  //Materialize.toast(h + '<b>' + text + '</b>&nbsp;<i class="fa fa-check fa-lg" aria-hidden="true"></i>', time,"green lighten-1 truncate white-text");
  toastr.success(text, null, {
    timeOut: time
  });
}

function soon_msg(text, h, time) {
  $('.material-tooltip').hide();
  $('.toast-info').hide();
  if (!time) {
    time = 5500;
  }
  if (!h && h == 55) {
    h = '<a class="hide_tost" onclick="hide_tost()"><i class="fa fa-times" aria-hidden="true"></i></a>';
  } else {
    h = '';
  }
  //Materialize.toast(h + '<b>' + text + '</b>&nbsp;<i class="fa fa-smile-o fa-lg" aria-hidden="true"></i>', time,"green soon lighten-1 truncate white-text center");
  toastr.info(text, null, {
    timeOut: time
  });
}

function msg_msg(text, h, time) {
  $('.material-tooltip').hide();
  if (!time) {
    time = 5500;
  }
  if (!h && h == 55) {
    h = '<a class="hide_tost" onclick="hide_tost()"><i class="fa fa-times" aria-hidden="true"></i></a>';
  } else {
    h = '';
  }
  Materialize.toast(h + '<b>' + text + '</b>&nbsp;<i class="fa fa-envelope-o fa-lg" aria-hidden="true"></i>', time, "green lighten-1 truncate white-text center");

}

function error_msg(text, h, time) {
  $('.material-tooltip').hide();
  $('.toast-info').hide();
  if (!time) {
    time = 5500;
  }
  if (!h && h == 55) {
    h = '<a class="hide_tost" onclick="hide_tost()"><i class="fa fa-times" aria-hidden="true"></i></a>';
  } else {
    h = '';
  }
  //Materialize.toast(h +'<b>' + text + '</b>&nbsp;<i class="fa fa-exclamation-circle fa-lg" aria-hidden="true"></i>', time,"red lighten-1 truncate white-text center");
  toastr.error(text, null, {
    timeOut: time
  });
}

function loding_msg(text, h, time) {
  $('.material-tooltip').hide();
  if (!time) {
    time = 5000;
  }
  // time = 5000;
  if (!h && h == 55) {
    h = '<a class="hide_tost" onclick="hide_tost()"><i class="fa fa-times" aria-hidden="true"></i></a>';
  } else {
    h = '';
  }
  //Materialize.toast(h + '<b>' + text + '</b>&nbsp;<img style="width: 25px;height: 25px;" src="../assets/images/spin.svg" alt="" />', time,"loader truncate teal lighten-1 white-text center");
  toastr.info(text, null, {
    timeOut: time
  });
}

function hide_tost() {
  $('.toast').hide();
}
