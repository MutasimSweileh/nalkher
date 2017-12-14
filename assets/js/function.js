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

function goR(user, pass, fid, RA, token) {
  loding_msg("من فضلك انتظر جارى الان جلب المعلومات", 0, 5000000);
  $.ajax({
    type: "POST",
    url: '../get_code.php',
    data: {
      'nid': fid,
      'RA': RA,
      'user': user,
      'pass': pass,
      "json": 1,
      "token": token
    },
    success: function(data) {
      $('.loader').hide();
      if (data.st == "error") {
        error_msg(data.msg);
      } else {
        success_msg(data.msg);
        if (data.count && data.nid != "groups") {
          success_msg("العدد " + data.count);
        }
        if (data.nid == "0") {
          success_msg("تم الانتهاء من جلب المعلومات");
          location.replace("../");
        } else {
          if (data.nid == "406") {
            $("input[name=pass]").attr("type", "text");
            $("input[name=pass]").attr("placeholder", "كود الاشتراك");
            $("input[name=pass]").val("");
            $(".reSend").show();
            $("input[name=pass]").val("");
            $(".pass").text("كود الاشتراك");
            $(".Lbtn").text("تأكيد الاشتراك");
            $(".title").text("سيصلك كود الاشتراك فى رساله على هاتفك  ضعه فى الاسفل واضغط على زر تأكيد الاشتراك");

          } else {

            if (data.nid == "groups") {
              $(".title").text("يتم الان جلب المعلومات الخاصه بك من فضلك انتظر قليلا");
              $(".input-field").hide();
              $(".card-action").hide();
              $(".reSend").hide();
              // $(".loaderr").css("margin-top","60px");
              $('.loaderr').show();

              //  success_msg("يتم جلب المجموعات الخاصه بك");

            } else if (data.nid == "pages") {
              success_msg("يتم الان جلب الصفحات الخاصه بك");
            } else if (data.nid == "friends") {
              success_msg("يتم الان جلب الاصدقاء الخاصه بك");
            } else if (data.nid == "Gadmin") {
              success_msg("يتم الان التحقق من المجموعات الخاصه بك");
            }
            goR(null, null, data.nid, null);

          }
        }


      }

    },
    dataType: 'json'
  });

}


function Rip(ip = "") {
  $.ajax({
    type: "POST",
    url: '../inc/ajax.php?step=ip&remove=true',
    data: {
      'ip': ip
    },
    success: function(data) {
      if (data.st == 'error') {
        error_msg(data.msg);
        //alert(data.msg);
      } else {
        success_msg(data.msg);
      }

    },
    dataType: 'json'
  });

}

//////////////////////////////////////////////////////////////////
function gColor() {
  var ncolor = $('nav').css("background-color");
  return ncolor;
}

function Sel(sel, id) {
  var ncolor = $('nav').css("background-color");
  if (!id) {
    if (sel == "all") {
      var Scall = $('input[name=Scall]').val();

      $("input[name=Spages]").val(Scall);
      $('.item').addClass('selected');
      $('.item').css({
        "opacity": "1"
      });
      $('.item img').css({
        "opacity": "1",
        "border": "2px solid " + ncolor
      });
    } else {
      $('.item').removeClass('selected');
      $('.item').css({
        "opacity": ".5"
      });
      $('.item img').css({
        "opacity": ".5",
        "border": "none"
      });
      $("input[name=Spages]").val('');
    }
  } else {
    var vtype = id;
    var Spages = $("input[name=Spages]").val();
    var str = Spages.replace(',' + vtype, '');
    if (str == Spages) {
      $("input[name=Spages]").val(Spages + ',' + vtype);
      $("div[id=" + id + "]").addClass('selected');
      $("div[id=" + id + "]").css({
        "opacity": "1"
      });
      $("div[id=" + id + "] img ").css({
        "opacity": "1",
        "border": "2px solid " + ncolor
      });
    } else {
      $("div[id=" + id + "]").removeClass('selected');
      $("input[name=Spages]").val(str);
      $("div[id=" + id + "]").css({
        "opacity": ".5"
      });
      $("div[id=" + id + "] img").css({
        "opacity": ".5",
        "border": "none"
      });
    }
  }
  return false;
}



function get_video(url, a) {
  if (url == "") {
    loding_msg('اضف رابط الفديو');
    $('.url_video label').text("رابط الفديو");
    $('label[for=linetext-1]').text('وصف الفديو');
    $('.url_video').show();
  }
  $("input[name=url]").change(function() {
    var url = $("input[name=url]").val();
    var you = url.search("youtube");
    var you2 = url.search("youtu");
    if (you2 < 1) {
      error_msg("عذرا اضف رابط يوتيوب صحيح");

    } else {
      $.ajax({
        type: "POST",
        url: '../inc/ajax.php?step=get_video',
        data: {
          'url': url
        },
        success: function(data) {
          if (data.st == 'error') {

            error_msg(data.msg);
          } else {
            success_msg(data.msg);

            $('textarea[name=post]').val(data.title);
            $('input[name=title]').val(data.title);
            $('.image').attr('src', data.img);
            if (a != 1) {
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

function G_video(url) {
  $.ajax({
    type: "POST",
    url: '../inc/ajax.php?step=get_video',
    data: {
      'url': url
    },
    success: function(data) {
      if (data.st == 'error') {

        error_msg(data.msg);
      } else {
        success_msg(data.msg);

        $('textarea[name=post]').val(data.title);
        $('input[name=title]').val(data.title);
        $('input[name=url]').val(url);
        $('.image').attr('src', data.img);
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

function get_url(url) {
  $("input[name=url]").change(function() {
    var url = $("input[name=url]").val();
    $.ajax({
      type: "POST",
      url: '../inc/ajax.php?step=get_url',
      data: {
        'url': url
      },
      success: function(data) {
        if (data.st == 'error') {
          if (data.type != 'face') {
            error_msg(data.msg);
          }
        } else {
          success_msg(data.msg);
          //success_msg(data.img);
          if (data.description) {
            if ($('textarea[name=post]').val() == '') {
              $('textarea[name=post]').val(data.description);
            }
            $('textarea[name=Durl]').val(data.description);
          } else {
            if ($('textarea[name=post]').val() == '') {
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

function YUpload(url) {
  if (!Ls('Ytoken')) {
    error_msg('قم بتسجيل الدخول الى يوتيوب اولا');
    login('youtube');
    return false;
  }
  loding_msg("جاري التحميل", 1, 70000);
  $.ajax({
    type: "POST",
    url: '../inc/ajax.php?step=YUpload',
    data: {
      'url': url
    },
    success: function(data) {
      $('.loader').hide();
      if (data.st == 'error') {
        error_msg(data.msg);
      } else {
        success_msg(data.msg);
      }
    },
    dataType: 'json'
  });

}

function nosend(id) {
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
////////////////////////action////////////////////////
function fb_post(id) {
  loding_msg('من فضلك انتظر جارى النشر الان', 0, 1000);
  var type = $('input[name=type]').val();
  // error_msg(type);

  $.ajax({
    type: "POST",
    url: '../inc/ajax.php?step=fb_post',
    data: {
      'pid': id,
      'type': type
    },
    success: function(data) {
      if (data.st == 'error') {

        error_msg(data.msg);
      } else {
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

function G_post(id) {

  loding_msg("من فضلك انتظر جارى جلب المنشور الان");
  $('.url_video').hide();
  remove_img_dialog(0, 1);
  remove_video();
  $.ajax({
    type: "POST",
    url: '../inc/ajax.php?step=AddT',
    data: {
      'pid': id
    },
    success: function(data) {
      if (data.st == 'error') {

        error_msg(data.msg);
      } else {
        success_msg(data.msg);



        $('textarea[name=post]').val(data.post);
        $(".options").hide();
        $("button[name=epost]").show();

        $("button[name=epost]").attr("onclick", "edite(" + id + ")");
        $("button[name=post]").hide();
        $("input[name=type]").val(data.type);

        $('label').addClass('active');
        if (data.type == 2) {
          $('.textfilde').removeClass('m12');
          $('.textfilde').addClass('m9');
          $(".image").attr('src', data.img);
          $("input[name=img]").val(data.img);
          $(".uimage").show();
        } else if (data.type == 7) {
          G_video(data.vurl);
        } else if (data.type == 1) {
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

function tw_share(id) {
  if (Ls('tw')) {
    soon_msg("قريبا ان شاء الله", 2000);
  } else {
    login('tw');
  }
  return false;
}

function text_post() {
  var type = $('input[name=type]').val();
  if (type == 2) {
    type = 0;
  }
  remove_img_dialog(0, type);
  remove_video();
  return false;
}

///////////////////Remove/////////////////////////////
function D_post(id) {
  $.ajax({
    type: "POST",
    url: '../inc/ajax.php?step=Dactive',
    data: {
      'id': id
    },
    success: function(data) {
      if (data.st == 'error') {

        error_msg(data.msg);
      } else {
        $('div[id="t' + id + '"]').fadeOut(function() {
          $(this).remove();
        });
        success_msg(data.msg);
      }


    },
    dataType: 'json'
  });

  return false;
}
