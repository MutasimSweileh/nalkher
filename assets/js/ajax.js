
  $('.forget').click(function(){
     var forr = $.trim($('input[name=for]').val());
     var RA = $.trim($('input[name=RA]').val());
     if(forr == 0){
     $('input[name=for]').val(1)
      $('.log').hide();
      $(this).html('رجوع');
      $('.for').show();
      }else{
     $('input[name=for]').val(0)
     if(RA){
     $('input[name=RA]').val(2);
     }
      $('.for').hide();
      $(this).html('نسيت كلمة المرور ؟');
      $('.log').show();

      }
     });

        $('.login').click(function(){
                  var admin_fb = $.trim($('input[name=admin_fb]').val());
                  var admin_name = $.trim($('input[name=admin_name]').val());
                  var radmin_name = $.trim($('input[name=radmin_name]').val());
                  var radmin_pass = $.trim($('input[name=radmin_pass]').val());
                  var admin_pass = $.trim($('input[name=admin_pass]').val());
                  var forr = $.trim($('input[name=for]').val());
                  var RA = $.trim($('input[name=RA]').val());
                  var add = $.trim($('input[name=add]').val());
                  var email = $.trim($('input[name=email]').val());

                 if(admin_name=="" && forr == 0 || admin_name=="" && add == 1){
                    error_msg("ادخل الاسم");
                  }else if(admin_pass==""  && forr == 0 || admin_pass=="" && add == 1){
                    error_msg("ادخل كلمة المرور");

                  }else if(radmin_name=="" && forr == 1){
                    error_msg("ادخل الاسم");
                  }else if(email=="" && forr == 1 || email=="" && add == 1 ){
                    error_msg("ادخل البريد");
                  }else if(radmin_pass==""  && forr == 1){
                    error_msg("ادخل كلمة المرور");

                  }else{
                      $('.loader').show();
                    // $('.alert').addClass('alert-danger');
                       $.ajax({
                        type: "POST",
                        url: '../inc/ajax.php?step=login',
                        data: {'RA':RA,'add':add,'admin_name':admin_name,'admin_fb':admin_fb,'admin_pass':admin_pass,'radmin_name':radmin_name,'radmin_pass':radmin_pass,'forr':forr,'email':email},
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


                  return false;
              });




$(".collapsible li").click(function(){
var type = $(this).attr('id');
   $("input[name=utype]").val(type);
});
             $('.UpSetU').click(function(){
                  var Gapp = $.trim($('input[name=Gapp]').val());
                  if(Gapp == 'set' || Gapp == 'Delete'){
                  var time = $.trim($('select[name=time]').val());
                  var type = $.trim($('input[name=utype]').val());
                  }else{
                   var time = $.trim($('select[name=time1]').val());
                   var type = 'time';
                  }
                  var page = $.trim($('select[name=page]').val());
                  var pages = $.trim($('select[name=pages]').val());
                  var groups = $.trim($('select[name=groups]').val());
                  var tags = $.trim($('select[name=tags]').val());
                  var plink = $.trim($('select[name=plink]').val());
                  var ptext = $.trim($('select[name=ptext]').val());
                                 loding_msg("جارى التحميل");
                       $.ajax({
                        type: "POST",
                        url: '../inc/ajax.php?step=SetU',
                        data: {'groups':groups,'pages':pages,'tags':tags,'page':page,'time':time,'type':type,'plink':plink,'ptext':ptext},
                       success: function(data){
                         if(data.st == 'error'){
                           error_msg(data.msg);
                         }else{
                             success_msg(data.msg);
                              if(Gapp == 'set'){
                             setInterval(function(){location.replace('/'); },5000);
                                               }

                         }

                        },
                        dataType: 'json'
                      });



});
             $('.backup').click(function(){
               loding_msg("جارى عمل نسخه احتياطيه");
                  location.replace('/admin/backup.html');
             return false;
              });
	$(".RA").click(function(e){
      $('input[name=RA]').val(2);
	});



             $('.UpSet').click(function(){
                 var Gtype = $.trim($('input[name=Gtype]').val());
                 if(Gtype == "hits"){
                  var ip = $.trim($('select[name=ip]').val());
                  var num = $.trim($('input[name=num]').val());
                  var block = $.trim($('input[name=block]').val());
                  var url_block = $.trim($('input[name=url_block]').val());
                  var url_allow = $.trim($('input[name=url_allow]').val());
                  var allow_day = $.trim($('input[name=allow_day]').val());
                  var block_day = $.trim($('input[name=block_day]').val());
                  var bloger_ad_code = $.trim($('input[name=bloger_ad_code]').val());
                  var bloger_ad_count = $.trim($('input[name=bloger_ad_count]').val());
                  var bloger_url = $.trim($('input[name=bloger_url]').val());
                  var bloger_ad_sand = $.trim($('select[name=bloger_ad_sand]').val());
                  var Sadf = $.trim($('select[name=Sadf]').val());
                  var referl = $.trim($('select[name=referl]').val());
                  var vid = $.trim($('select[name=vid]').val());
                  var bloger_ad_red = $.trim($('select[name=bloger_ad_red]').val());
                  var Nadf = $.trim($('input[name=Nadf]').val());
                  var Ladf = $.trim($('input[name=Ladf]').val());
                  var htm = $.trim($('input[name=htm]').val());
                  var bloger_v_code = $.trim($('input[name=bloger_v_code]').val());
                  var hits_url = $.trim($('input[name=hits_url]').val());
                  var bloger_ad = $.trim($('select[name=bloger_ad]').val());
                  var bloger_ads = $.trim($('select[name=bloger_ads]').val());
                  var Ls = $.trim($('select[name=password]').val());
                  var day = $.trim($('select[name=day]').val());
                  var Rd = $.trim($('input[name=Rd]').val());

                       $.ajax({
                       type: "POST",
                       url: '../inc/ajax.php?step=ip&set=true',
                       data: {'vid':vid,'hits_url':hits_url,'referl':referl,'Sadf':Sadf,'htm':htm,'Ladf':Ladf,'Nadf':Nadf,'bloger_v_code':bloger_v_code,'bloger_url':bloger_url,'bloger_ad_count':bloger_ad_count,'bloger_ads':bloger_ads,'bloger_ad_red':bloger_ad_red,'bloger_ad_sand':bloger_ad_sand,'bloger_ad':bloger_ad,'bloger_ad_code':bloger_ad_code,'day':day,'allow_day':allow_day,'block_day':block_day,'ip':ip,'num':num,'Rd':Rd,'Ls':Ls,'block':block,'url_block':url_block,'url_allow':url_allow},
                       success: function(data){
                         if(data.st == 'error'){
                           error_msg(data.msg);
                           //alert(data.msg);
                         }else{
                             success_msg(data.msg);
                         }

                        },
                        dataType: 'json'
                      });

                 }else{
                 var title = $.trim($('input[name=title]').val());
                  var numposts = $.trim($('input[name=numposts]').val());
                  var comment = $.trim($('select[name=comment]').val());
                  var des = $.trim($('textarea[name=des]').val());
                  var site_status = $.trim($('select[name=site_status]').val());
                  var cron = $.trim($('select[name=cron]').val());
                  var cront = $.trim($('select[name=cront]').val());
                  var getfriends = $.trim($('select[name=getfriends]').val());
                  var getgroups = $.trim($('select[name=getgroups]').val());
                  var getpages = $.trim($('select[name=getpages]').val());
                  var activelogo = $.trim($('select[name=activelogo]').val());
                  var close_msg = $.trim($('textarea[name=close_msg]').val());
                  var rDelete = $.trim($('select[name=rDelete]').val());
                  var Rtime = $.trim($('select[name=Rtime]').val());
                  var home_ad = $.trim($('textarea[name=home_ad]').val());
                  var post_ad = $.trim($('textarea[name=post_ad]').val());
                  var slide_ad = $.trim($('textarea[name=slide_ad]').val());
                  var Rmsg = $.trim($('textarea[name=Rmsg]').val());
                  var status = $.trim($('textarea[name=status]').val());
                  var logo = $.trim($('input[name=logo]').val());
                  var color = $.trim($('input[name=color]').val());
                  var mtext1 = $.trim($('input[name=mtext1]').val());
                  var mtext2 = $.trim($('input[name=mtext2]').val());
                  var google_id = $.trim($('input[name=google_id]').val());
                  var google_key = $.trim($('input[name=google_key]').val());
                  var app_id = $.trim($('input[name=app_id]').val());
                  var app2_id = $.trim($('input[name=app2_id]').val());
                  var app2_key = $.trim($('input[name=app2_key]').val());
                  var app_key = $.trim($('input[name=app_key]').val());
                  var api_key = $.trim($('input[name=api_key]').val());
                  var tw_key = $.trim($('input[name=tw_key]').val());
                  var tw_id = $.trim($('input[name=tw_id]').val());
                  var fb_link = $.trim($('input[name=fb_link]').val());
                  var tw_link = $.trim($('input[name=tw_link]').val());
                  var youtube_link = $.trim($('input[name=youtube_link]').val());
                  var cron_time = $.trim($('input[name=cron_time]').val());
                  var cron_timet = $.trim($('input[name=cron_timet]').val());
                  var sred = $.trim($('select[name=sred]').val());
                  var tw = $.trim($('select[name=tw]').val());
                  var order = $.trim($('select[name=order]').val());
                  var short = $.trim($('select[name=short]').val());
                  var app2 = $.trim($('select[name=app2]').val());
                  var app = $.trim($('select[name=app]').val());
                  var app2sql = $.trim($('select[name=app2sql]').val());
                  var appsql = $.trim($('select[name=appsql]').val());
                  var typeapp = $.trim($('select[name=typeapp]').val());
                  var link = $.trim($('input[name=link]').val());
                  var spostlink = $.trim($('select[name=spostlink]').val());
                  var zlink = $.trim($('input[name=zlink]').val());
                  var OptioMobile = $.trim($('select[name=OptioMobile]').val());
                  var admin_email = $.trim($('input[name=email]').val());
                  var admin_fb = $.trim($('input[name=admin_fb]').val());
                  var admin_name = $.trim($('input[name=admin_name]').val());
                  var admin_pass = $.trim($('input[name=admin_pass]').val());
                  var time_msg = $.trim($('input[name=time_msg]').val());
                  var msg = $.trim($('select[name=msg]').val());
                  if(title==""){
                      $('input[name=title]').addClass('alert-danger');
                  }else{
                     loding_msg("جارى التحميل");
                       $.ajax({
                        type: "POST",
                        url: '../inc/ajax.php?step=Set',
                  /*     data: {'admin_name':admin_name,'admin_pass':admin_pass,'admin_email':admin_email,
                      'link':link,'sred':sred,'title':title,'numposts':numposts,'close_msg':close_msg,'cron':cron,
                      'des':des,'home_ad':home_ad,'app_id':app_id,'tw_link':tw_link,'fb_link':fb_link,
                      'app_key':app_key,'site_status':site_status},
                  */                //    data: {'admin_name':admin_name,'admin_pass':admin_pass},
                              data: {'time_msg':time_msg,'msg':msg,'OptioMobile':OptioMobile,'comment':comment,'google_key':google_key,'google_id':google_id,'slide_ad':slide_ad,'status':status,'short':short,'zlink':zlink,'spostlink':spostlink,'order':order,'Rmsg':Rmsg,'Rtime':Rtime,'admin_name':admin_name,'admin_fb':admin_fb,'admin_pass':admin_pass,'admin_email':admin_email,'link':link,'sred':sred,'title':title
                              ,'numposts':numposts,'close_msg':close_msg,'cron':cron,'cront':cront,'des':des,'home_ad':home_ad,'post_ad':post_ad,'app_id':app_id,'tw_key':tw_key,'tw_id':tw_id,'tw_link':tw_link
                              ,'fb_link':fb_link,'youtube_link':youtube_link,'app_key':app_key,'api_key':api_key,'app2_key':app2_key,'app2_id':app2_id,'site_status':site_status,'cron_time':cron_time,'tw':tw,'app':app,'typeapp':typeapp,'appsql':appsql,'app2':app2,'app2sql':app2sql,'cron_timet':cron_timet
                              ,'logo':logo,'color':color,'mtext1':mtext1,'mtext2':mtext2,'activelogo':activelogo,'getgroups':getgroups,'getpages':getpages,'getfriends':getfriends,'rDelete':rDelete
                              },
                       success: function(data){
                         if(data.st == 'error'){
                           error_msg(data.msg);
                           //alert(data.msg);
                         }else{
                             success_msg(data.msg);
                         }

                        },
                        dataType: 'json'
                      });

                  }

                   }
                  return false;
              });

////////////////////////////////////////////////////
///////////////////////////////////////////////////



/////////////////////////////////////////////////////////////////////
	$("a").on('click',function(e){
   if($(this).attr('href') == "#" || $(this).attr('href') == ""){
       return false;
   }
});
	$(".upload-click").on('click',function(e){
  var Gtype =  $("input[name=Gtype]").val();
     if(Gtype != 'set'){remove_img_dialog(0,1); remove_video();      }
		//$('#input-file-upload').trigger('click');
	   $('input[type=file]').trigger('click');
        return false;
	});
	$("#token_now").click(function(e){
		$('#post_now').trigger('click');
	});
	$("#nof_now").click(function(e){
		$('#post_now').trigger('click');
	});





/////////////////////addpost///////////////////////////

$("#Add_time").click(function(){
  //$('#datepickerhere').focus();
   Ddialog();
  });


 $('select[name=app2]').change(function(){
var type = $(this).val();
if(type == 1){$(".app2").show();}else{$(".app2").hide();}
});
 $('select[name=site_status]').change(function(){
var type = $(this).val();
if(type == 0){$(".site_status").show();}else{$(".site_status").hide();}
});
 $('select[name=type]').change(function(){
var type = $(this).val();
var ttype = $('select[name=ttype]').val();
if(type == 0){
$(".img-up").hide();
$(".url").hide();
$(".Durl").hide();
$(".Nmurl").hide();
$("#YD").hide();

}else if(type == 1 || type == 4 || type == 6 || type == 8){
 get_url (url);
$(".img-up").hide();
$(".url").show();
$(".Durl").hide();
$(".Nmurl").hide();
$("#YD").hide();
if(ttype != 'tw'){
$(".short").show();
   }
}else if(type == 2){
$(".img-up").show();
$(".url").show();
$(".Durl").hide();
$(".Nmurl").hide();
$("#YD").hide();
if(ttype != 'tw'){
$(".short").show();
   }
}else if(type == 3){
 get_url (url);
$(".img-up").show();
$(".url").show();
$(".Durl").show();
$(".Nmurl").show();
$("#YD").hide();
if(ttype != 'tw'){
$(".short").show();
   }
}else if(type == 5){
$(".img-up").show();
$(".url").hide();
$(".Durl").hide();
$(".Nmurl").hide();
$(".short").hide();
$("#YD").hide();
}else if(type == 7){
 var url = "";
$("#YD").show();
$(".Durl").hide();
$(".Nmurl").hide();
$('label[for=text]').addClass('active');
get_video (url,1);
$(".img-up").hide();
$(".url").show();
}
remove_img_dialog(type,1);
remove_video();
$("input[name=type]").val(type);
 });
  $('select[name=ttype]').change(function(){
  var type = $(this).val();
  if(type == 'tw'){
$(".tags").hide();
$(".short").hide();
 $('.pages').hide();
 $('.cantry').hide();
$(".type_user").hide();

$( ".dropdown-content li:nth-child(4)" ).hide();
$( ".dropdown-content li:nth-child(5)" ).hide();
$( ".dropdown-content li:nth-child(6)" ).hide();
$( ".dropdown-content li:nth-child(7)" ).hide();
   $('textarea[name=post]').attr('length',140);
   $('textarea[name=post]').characterCounter();
  }else{
$( ".dropdown-content li:nth-child(4)" ).show();
$( ".dropdown-content li:nth-child(5)" ).show();
$( ".dropdown-content li:nth-child(6)" ).show();
$( ".dropdown-content li:nth-child(7)" ).show();
 $('.pages').show();
 $('.cantry').show();
$(".tags").show();
$(".short").show();
$(".type_user").show();
  $('textarea[name=post]').removeAttr('length');
  $('textarea[name=post]').removeClass('invalid');
  $('.character-counter').hide();
  }
 });
  $('select[name=cantry]').change(function(){
$('input[name=allcantry]').val('');
var type = $('select[name=cantry] option:selected').text();
  var vtype = $(this).val();
var selected =$("button[name=selected]").val();
var str = selected.replace(','+vtype, '');
var text = $("button[name=selected]").text();
var stype = text.replace(','+type, '');
//error_msg(str);
if(str == selected){
$('select[name=cantry] option:selected').css({'color':'#4caf50','font-weight':'bold'});
  if(selected &&  selected != 'all' ){
$("button[name=selected]").append(','+type);
 $("button[name=selected]").val(selected+','+vtype);
 }else{
 $("button[name=selected]").val(','+vtype);
$("button[name=selected]").text(','+type);
 }
  }else{
$('select[name=cantry] option:selected').css({'color':'#000','font-weight':'normal'});
 $("button[name=selected]").val(str);
$("button[name=selected]").text(stype);
if(str==""){
$("button[name=selected]").text('لم يتم تحديد شىء');
    }
  }
 });



$(".selectall").click(function(){
$('.item').addClass('selected');
  $('.item').css({"opacity":"1"});
  $('.item img').css({"opacity":"1","border":"2px solid #4DB6AC"});
$('input[name=allcantry]').val('all');
  var Snall = $('input[name=Snall]').val();
  var Scall = $('input[name=Scall]').val();
$('select[name=cantry] option').css({'color':'#4caf50','font-weight':'bold'});
$("input[name=Spages]").val(Scall);
              $.ajax({
                        type: "POST",
                        url: '../inc/ajax.php?step=cantry',
                        data: {'n_cantry':1},
                        success: function(data){
 $("button[name=selected]").val(data.cee);
$("button[name=selected]").text(data.cen);
                        },
                        dataType: 'json'
                      });


});
$(".unselectall").click(function(){
$('input[name=allcantry]').val('');
$('.item').removeClass('selected');
  $('.item').css({"opacity":".5"});
  $('.item img').css({"opacity":".5","border":"none"});
$('select[name=cantry] option').css({'color':'#000','font-weight':'normal'});
$("input[name=Spages]").val('');
 $("button[name=selected]").val('');
$("button[name=selected]").text('لم يتم تحديد شىء');
});
$("input[name=pages]").change(function(){
    if($(this).is(":checked")){
        $('.page').show();

      GetGP("pages");
    } else {
        $('.page').hide();
    }
});
$("input[name=groups]").change(function(){
    if($(this).is(":checked")){
        $('.page').show();
      GetGP("groups");
    } else {
        $('.page').hide();
    }
});

$(".item").click(function(){
  var   vtype  = $(this).attr('id');
var Spages =$("input[name=Spages]").val();
var str = Spages.replace(','+vtype, '');
if(str == Spages ){
$("input[name=Spages]").val(Spages+','+vtype);
$(this).addClass('selected');
  $(this).css({"opacity":"1"});
  $('img',$(this)).css({"opacity":"1","border":"2px solid #4DB6AC"});
   }else{
$(this).removeClass('selected');
$("input[name=Spages]").val(str);
  $(this).css({"opacity":".5"});
  $('img',$(this)).css({"opacity":".5","border":"none"});
   }
});
              $('#post_now').click(function(){
               PostNow();
                  return false;
              });



$("button.likes,.comments").click(function(){
var postid = $.trim($('input[name=postid]').val());
var numposts = $.trim($('input[name=numposts]').val());
var type_user = $.trim($('select[name=type_user]').val());
var allcantry = $.trim($('input[name=allcantry]').val());
var cantry = $.trim($('button[name=selected]').val());
var err = false;
if(postid == ""){
error_msg("اكتب اى دى البوست اولا");
return false;
}else if(cantry == ""){
  error_msg('حدد الدوله او قم بتحديد الكل');
return false;
}

$.ajax({
                        type: "POST",
                        url: '../inc/ajax.php?step=likes',
                        data: {'cantry':cantry,'allcantry':allcantry,'postid':postid,'numposts':numposts,'type_user':type_user},
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

});
              $('#post_time').click(function(){
                  var location      = window.location.href;
                 var admin = location.search("admin");
                  var post = $.trim($('textarea[name=post]').val());
                  var img = $.trim($('input[name=img]').val());
                  var url = $.trim($('input[name=url]').val());
                  var cantry = $('button[name=selected]').val();
                  var allcantry = $('input[name=allcantry]').val();
                   //var tags = $('input[name=tags]').checked;
                  //var Iurl = $.trim($('input[name=Iurl]').val());
                  var Ttoken = $('select[name=Ttoken]').val();
                  var Dtoken = $('select[name=Dtoken]').val();
                  var Durl = $.trim($('input[name=Durl]').val());
                  var Nmurl = $.trim($('input[name=Nmurl]').val());
                  var tags = document.getElementById("tags").checked;
                  if(tags){tags =1; }else{ tags =0;}
                  var short = document.getElementById("short").checked;
                  var pages = document.getElementById("pages").checked;
                  if(short){short =1; }else{ short =0;}
                  if(pages){pages =1; }else{ pages =0;}
                  var cat =    $("select[name=cat]").val();
                  var type_user = $('select[name=type_user]').val();
                  var title = $.trim($('input[name=title]').val());
                  var vid ='';
                  var type = $('input[name=type]').val();
                  var Stype = $('input[name=Stype]').val();
                  var Spages = $('input[name=Spages]').val();
                  var ttype = $('input[name=ttype]').val();
                  var time = $('input[name=time]').val();
                  var addd_time = 1;

                  var Yd = document.getElementById("Yd").checked;
                  if(Yd){Yd =1; }else{ Yd =0;}

                  if(post=="" && type != 1 && type != 6 && type != 8 && Stype != 'token'){
                error_msg('قم بااضافة النص اولا');
                  }else if(type == 7  && url==""){
                error_msg('قم بااضافة الرابط اولا');
                  }else if(type == 7  && !Ls('Ytoken') && Ls('admin') ){
                  //error_msg('قم بتسجيل الدخول الى يوتيوب اولا');
                  login('youtube',0);
                  }else if(type == 8  && Curl("facebook.com")){
                error_msg('لن تعمل هذه الخاصيه مع روابط فيس بوك');
                  }else if(type == 1  && url=="" || type == 8  && url==""){
                error_msg('قم بااضافة الرابط اولا');
                  }else if(type == 3  && url==""){
                error_msg('قم بااضافة الرابط اولا');
                  }else if(type == 3  && url=="" && img=="" && Nmurl==""){
                error_msg('اضف  الرابط والصوره  وعنوان الرابط');
                  }else if(type == 2  && url==""){
                error_msg('اضف الصوره والرابط');
                  }else if(type == 5  && img==""){
                error_msg('اضف الصوره');
                  }else if(type == 2  && img==""){
                error_msg('اضف الصوره');
                  }else if(!cantry  && admin > 0 && ttype == 'fb'){
                error_msg('حدد الدوله او قم بتحديد الكل');
                  }else if(pages  && !Spages && admin < 1){
                error_msg('حدد صفحه معينه او عددة صفحات');
                  }else{
                      //$('.loader').show();
                  loding_msg('من فضلك انتظر جارى النشر الان',0,500000);
                    // $('.alert').addClass('alert-danger');
                       $.ajax({
                        type: "POST",
                        url: '../inc/ajax.php?step=post_now',
                        data: {'Yd':Yd,'pages':pages,'Spages':Spages,'Stype':Stype,'cantry':cantry,'allcantry':allcantry,'Durl':Durl,'Nmurl':Nmurl,'cat':cat,'tags':tags,'short':short,'title':title,'post':post,'img':img,'url':url,'admin':admin,'type':type,'type_user':type_user,'ttype':ttype,'time':time,'add_time':addd_time,'Ttoken':Ttoken,'Dtoken':Dtoken},
                        success: function(data){
                         $('.loader').hide();
                         if(data.st == 'error'){

                        error_msg(data.msg);
                         }else{
                         if(data.Rn < 1){
                           soon_msg('تم اضافة منشورك الاول');
                         }else{
                         success_msg(data.msg);
                          }
                          if(type == 7 && data.you && Yd){
                          $('.YDD').attr('id',data.you);
                          $('.YDD').trigger('click');
                          }
                          if(data.R != 1){
                          Getpost(data.pid);
                         }
                         }


                         $('textarea[name=post]').val("");
                         remove_img_dialog(type,1);
                         remove_video();

                         $('.loader').hide();
                        },
                        dataType: 'json'
                      });

                  }

                  return false;
              });
////////////////////////////////////////////////////
$('#post_link').click(function(){

            var url =    $("input[name=url]").val();
            var type =    $("input[name=type]").val();
            if(type == 2){ type =0;}
            $('.url_video').show();
            $('.url_video label').text("الرابط");
            $('label[for=linetext-1]').text('المنشور');

            remove_img_dialog(1,type);

                  return false;
              });

$('#post_video').click(function(){
            var url =    $("input[name=url]").val();
            var type =    $("input[name=type]").val();
            if(type == 2){ type =0;}
            remove_img_dialog(7,type);
           //  $(".Yyd").show();
                  get_video (url);
                  return false;
              });


 $('input[name=user],input[name=pass]').on('keypress', function(e) {
 if(e.which == 13){
 $('.NLogin').trigger('click');
 return false;
 }
 });
 $(".NLogin").click(function(){
       var RA = $("input[name=RA]").val();
       var user = $("input[name=user]").val();
       var pass =  $("input[name=pass]").val();
       var fid = 0;
     goR(user,pass,fid,RA);

   return false;

 });
 $('.post-img-video').click(function(){
 var id = $('iframe[class=fvideo]').attr('src');
 $(this).hide();
 $('iframe[class=fvideo]').attr('src',id + '?autoplay=1');
 $(".Fvideo").show();
 //return false;
 });
 ///////////////////////////////////////////////////////////////////
 $('.tab').click(function(){
  var type =   $(this).attr('id');
 nof(type);
 set(type);
 //var Gtype = $.trim($('input[name=Gtype]').val());
                 $("input[name=type]").val(type);
                 $("input[name=Stype]").val(type);
 $('#ipp').load('../inc/ajax.php?step=ip');
 $('.users').load('../inc/ajax.php?step='+ type );
 $('.pposts').load('../inc/ajax.php?step=Pactive&app='+ type );
 $('.myposts').load('../inc/ajax.php?step=myposts&app='+ type );
 if(type == "tshare" || type == "nshare"){
 $('.gshare').load('../inc/ajax.php?step=Gshare&app='+ type );
 $('input[name=Gshare]').val(type);
 }
       // return false;
            });
 ///////////////////////////////////////////////////////////////////
             $('.CommentBox').on('keypress', function(e) {
               if(e.which == 13){
                  var comment = $.trim($('textarea[name=comment]').val());
                  var pid = $.trim($('textarea[name=comment]').attr('id'));
                  var uname = $.trim($('input[name=fb]').val());
                  var uid = $.trim($('input[name=Cuid]').val());

                      $.ajax({
                        type: "POST",
                        url: '../inc/ajax.php?step=comment',
                              data: {'comment':comment,'pid':pid,'uid':uid,'uname':uname},
                       success: function(data){
                        if(data.st == "error"){
                           error_msg(data.msg);
                        }else{
                          success_msg(data.msg);
                          $('.CommentsList').load('../inc/ajax.php?step=comment&com=' + pid);
                        }
                         $('textarea[name=comment]').val("");
                        },
                        dataType: 'json'
                      });
               }});
             $('#search').on('keypress 	keyup', function(e) {
               if(e.which == 13){
                  var Gapp = $.trim($('input[name=Gapp]').val());
                  var Gtype = $.trim($('input[name=Gtype]').val());
                  var type = $.trim($('input[name=type]').val());
                  var TSearch = $.trim($(this).val());
                 if(Gtype == 'posts'){
                    type = 'Pactive&app=' + type;
                 }else if(Gapp == 'myposts'){
                  type = 'myposts&app=' + type;
                 }
                  if(TSearch == ''){
                     error_msg("اضف كلمة البحث");
                  }else{
                      $.ajax({
                        type: "POST",
                        url: '../inc/ajax.php?step=' + type,
                              data: {'TSearch':TSearch,'Gapp':Gapp,'Gtype':Gtype},
                       success: function(data){

                              //$('body').scrollTop(0);
                              if(Gtype == 'users'){
                              $('.users').html(data);
                                }else{
                              $('.posts').html(data);
                              $('.pposts').html(data);
                              $('.myposts').html(data);

                                }


                        }
                      });




   }
       return false;
         }

              });

////////////////////////////////////////////////////////////
//*////////////////////////myfunction/////////////////////////////////////////*//
