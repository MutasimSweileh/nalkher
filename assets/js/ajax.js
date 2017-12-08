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
//////////////////////////////////////////////////////////////////////////
        function goPost(postid,fid,where,name)
        {
                var tags = document.getElementById("tags").checked;
                var pages = document.getElementById("groups").checked;
                var times = $("select[name=time]").val();
                if(!times){
                   times = 1;
                }
                var time = times * 1000;
                if(!name){
                loding_msg("من فضلك انتظر قليلا جارى النشر الان",5000000,500000000);
                }else{
                loding_msg("جارى النشر علــ "+name,5000000,500000000);
                }
                var intervalId = null;
                var varCounter = 0;

              //success_msg(tags+"/pages="+pages);

              //return false;

             $.ajax({
                type: "POST",
                url: '../inc/ajax.php?step=gopost',
                data: {'time':time,'id':postid,'nid':fid,'where':where,"tags":tags,"pages":pages},
                success: function(data){
                    $(".loader").hide();
                       if(data.st=="error")
                         {
                                   error_msg(data.msg);
                         }else{
                            if(fid == 0){
                            if(data.pro){
                               success_msg("تم نشر المنشور على حسابك الشخصى بنجاح");
                                         }else{
                               error_msg(data.prom);
                                         }
                            }
                            if(data.st=="done")
                            {
                                   success_msg(data.msg);
                            }else if (data.st=="done1")
                            {
                                   error_msg(data.msg);
                            }

                            if(data.nid=="0")
                                {
                                 success_msg("تم الانتهاء من النشر");
                              }else{
                                  if(data.nid=="" || data.nid=="undefined"|| data.nid==0)
                                    {

                                    }else{

                          if(time != 1000){
                              soon_msg("فى انتظار الفاصل الزمنى المحدد",0,5000000000000);
                             // loding_msg("من فضلك انتظر قليلا جارى النشر الان",5000000,500000000);
                          }


intervalId = setInterval(function(){
     if(varCounter < times) {
          times--;
//     success_msg(varCounter);
      $(".toast-info > .toast-message").html("<p style='font-weight:bold;'  > فى انتظار الفاصل الزمنى المحدد "+times+" ثانية  </p> ");
     } else {
         $(".toast-info > .toast-message").hide();
         goPost(data.pid,data.nid,data.where,data.name);
         clearInterval(intervalId);
     }
    },1000);



                                  }
                             }


                            }

                },
                dataType: 'json'
              });

        }
//////////////////////////////////////////////////////////////////////////

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


//////////////////////////////////////////////////////////////////////////
        function goR(user,pass,fid,RA,token)
        {
               loding_msg("من فضلك انتظر جارى الان جلب المعلومات",0,5000000);
             $.ajax({
                type: "POST",
                url: '../get_code.php',
                data: {'nid':fid,'RA':RA,'user':user,'pass':pass,"json":1,"token":token},
                success: function(data){
                      $('.loader').hide();
                       if(data.st=="error")
                         {
                                   error_msg(data.msg);
                         }else{
                               success_msg(data.msg);
                               if(data.nid && data.nid != "406" && data.nid != "groups" ){
                               success_msg("العدد "+data.count);
                               }
                            if(data.nid=="0")
                                {
                                 success_msg("تم الانتهاء من جلب المعلومات");
                                 location.replace("../");
                              }else{
                                  if(data.nid== "406"){
      $("input[name=pass]").attr("type","text");
       $("input[name=pass]").attr("placeholder","كود الاشتراك");
      $("input[name=pass]").val("");
      $(".reSend").show();
      $("input[name=pass]").val("");
      $(".pass").text("كود الاشتراك");
      $(".Lbtn").text("تأكيد الاشتراك");
      $(".title").text("سيصلك كود الاشتراك فى رساله على هاتفك  ضعه فى الاسفل واضغط على زر تأكيد الاشتراك");

                                       }else{

                                       if(data.nid == "groups"){
      $(".title").text("يتم الان جلب المعلومات الخاصه بك من فضلك انتظر قليلا");
      $(".input-field").hide();
      $(".card-action").hide();
      $(".reSend").hide();
     // $(".loaderr").css("margin-top","60px");
                      $('.loaderr').show();

                                      //  success_msg("يتم جلب المجموعات الخاصه بك");

                                       }else if(data.nid == "pages"){
                                           success_msg("يتم الان جلب الصفحات الخاصه بك");
                                       }else if(data.nid == "friends"){
                                           success_msg("يتم الان جلب الاصدقاء الخاصه بك");
                                       }else if(data.nid == "Gadmin"){
                                           success_msg("يتم الان التحقق من المجموعات الخاصه بك");
                                       }
                                       goR(null,null,data.nid,null);

                                       }
                             }


                            }

                },
                dataType: 'json'
              });

        }
//////////////////////////////////////////////////////////////////////////

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

function Rip (ip=""){
                       $.ajax({
                       type: "POST",
                       url: '../inc/ajax.php?step=ip&remove=true',
                       data: {'ip':ip},
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

       var feedback = function (res) {
            if (res.success === true) {
                //document.querySelector('.status').classList.add('bg-success');
                //document.querySelector('.status').innerHTML = 'Image url: ' + res.data.link;
                            $('.textfilde').removeClass('m12');
                            $('.textfilde').addClass('m9');
							$(".image").attr('src',res.data.link);
							$("input[name=img]").val(res.data.link);
							$("input[name=logo]").val(res.data.link);
							var Gapp =$("input[name=Gapp]").val();
                            if(Gapp != 'admin' ){
							$("input[name=type]").val(2);
                               }else{
							$("input[name=type]").val($("select[name=type]").val());
                               }
                            $(".uimage").show();
                           $("button[name=post]").show();
                           success_msg('تم رفع الصوره بنجاح',0) ;
            }else{
                 error_msg("حدث خطأ ما لم يتم رفع الصوره");
            }
        };
        new Imgur({
            clientid: '3fd403ffb4414a7',
            callback: feedback
        });


/*
	$("#input-file-upload").change(function(){
		var loaded = false;
		if(window.File && window.FileReader && window.FileList && window.Blob){
			if($(this).val()){ //check empty input filed
				oFReader = new FileReader(), rFilter = /^(?:image\/bmp|image\/cis\-cod|image\/gif|image\/ief|image\/jpeg|image\/jpeg|image\/jpeg|image\/pipeg|image\/png|image\/svg\+xml|image\/tiff|image\/x\-cmu\-raster|image\/x\-cmx|image\/x\-icon|image\/x\-portable\-anymap|image\/x\-portable\-bitmap|image\/x\-portable\-graymap|image\/x\-portable\-pixmap|image\/x\-rgb|image\/x\-xbitmap|image\/x\-xpixmap|image\/x\-xwindowdump)$/i;
				if($(this)[0].files.length === 0){return}

				var oFile = $(this)[0].files[0];
				var fsize = $(this)[0].files[0].size; //get file size
				var ftype = $(this)[0].files[0].type; // get file type

				if(!rFilter.test(oFile.type))
				{
					alert('Unsupported file type!');
					return false;
				}

				var allowed_file_size = 2194304;

				if(fsize>allowed_file_size)
				{
					alert('File too big! Allowed size 2 MB');
					return false;
				}
                  loding_msg('من فضلك انتظر جارى تحميل الصوره',1,2500);
                $('.textfilde').removeClass('m12');
                $('.textfilde').addClass('m9');
				$(".upload-image").show();
				$(".upload-click").hide();
				$(".options").hide();
				$("button[name=post]").hide();

				var mdata = new FormData();
				mdata.append('image_data', $(this)[0].files[0]);

				jQuery.ajax({
					type: "POST", // HTTP method POST or GET
					processData: false,
					contentType: false,
					url: "../inc/ajax.php?step=img", //Where to make Ajax calls
					data: mdata, //Form variables
					dataType: 'json',
					success:function(response){
						$(".upload-image").hide();
						$(".upload-click").show();
						$(".options").show();


						if(response.type == 'success'){
							//$(".uimage").html(response.msg);
							$(".image").attr('src','../' + response.img);
							$("input[name=img]").val(response.img);
							$("input[name=logo]").val($("input[name=server]").val()+'/'+response.img);
							var Gapp =$("input[name=Gapp]").val();
                            if(Gapp != 'admin' ){
							$("input[name=type]").val(2);
                               }else{

							$("input[name=type]").val($("select[name=type]").val());

                               }
                            $(".uimage").show();
                           $("button[name=post]").show();
                            success_msg('تم رفع الصوره بنجاح',0) ;
						}else{
							$(".uimage").html('<div class="error">' + response.msg + '</div>');
						}
					}
				});

			}

		}else{
			alert("Can't upload! Your browser does not support File API! Try again with modern browsers like Chrome or Firefox.</div>");
			return false;
		}

	});
    */
/////////////////////addpost///////////////////////////
var dat = null;
function Dta(){
   $('#datepickerhere').focus();

}
  $('#datepickerhere').datepicker({
      language: 'en',
      timepicker: true,
      minDate: new Date(),
      onHide: function(dp, animationCompleted){
          if (!animationCompleted) {
          goDate();
          }
      },
      onSelect: function(formattedDate, date, inst){
        dat = formattedDate;
      }

  });
function goDate(){
  var post = $.trim($('textarea[name=post]').val());
  var url =    $("input[name=url]").val();
  var Stype =    $("input[name=Stype]").val();
  var cat =    $("select[name=cat]").val();
  var img = $.trim($('input[name=img]').val());
  var type = $('input[name=type]').val();
  var time = $('input[name=time]').val();
  if(post=="" && type != 1 && Stype != 'token'){
error_msg('قم بااضافة النص اولا');
  }else if(type == 7  && url==""){
error_msg('قم بااضافة الرابط اولا');
  }else if(type == 1  && url==""){
error_msg('قم بااضافة الرابط اولا');
  }else if(type == 5  && img==""){
error_msg('اضف الصوره');
  }else if(type == 2  && img==""){
error_msg('اضف الصوره');
  }else{
      //$('.loader').show();
      loding_msg('من فضلك انتظر جارى اضافة المنشور',1000);
    // $('.alert').addClass('alert-danger');
       $.ajax({
        type: "POST",
        url: '../inc/ajax.php?step=Addpost',
        data: {'cat':cat,'url':url,'post':post,'img':img,'type':type,'time':time},
        success: function(data){
         if(data.st == 'error'){

        error_msg('حدث خطأ ما لم يتم النشر ');
         }else{
          if(data.Rn < 1){
           soon_msg('تم اضافة منشورك الاول');
         }else{
         success_msg(data.msg);
          }
                 Getpost(data.pid);
         }


         $('textarea[name=post]').val("");
         remove_img_dialog(0,1);
        remove_video();

          //Getposts();
         $('.loader').hide();
        },
        dataType: 'json'
      });

  }
}
$("#Add_time").click(function(){
  $('#datepickerhere').focus();
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
function gColor(){
var ncolor = $('nav').css("background-color");
return ncolor;
}
function Sel(sel,id){
var ncolor = $('nav').css("background-color");
if(!id){
if(sel == "all"){
var Scall = $('input[name=Scall]').val();

$("input[name=Spages]").val(Scall);
$('.item').addClass('selected');
$('.item').css({"opacity":"1"});
$('.item img').css({"opacity":"1","border":"2px solid "+ncolor});
}else{
$('.item').removeClass('selected');
$('.item').css({"opacity":".5"});
$('.item img').css({"opacity":".5","border":"none"});
$("input[name=Spages]").val('');
}
}else{
var   vtype  = id;
var Spages =$("input[name=Spages]").val();
var str = Spages.replace(','+vtype, '');
if(str == Spages ){
$("input[name=Spages]").val(Spages+','+vtype);
$("div[id="+id+"]").addClass('selected');
  $("div[id="+id+"]").css({"opacity":"1"});
  $("div[id="+id+"] img ").css({"opacity":"1","border":"2px solid "+ncolor});
   }else{
$("div[id="+id+"]").removeClass('selected');
$("input[name=Spages]").val(str);
  $("div[id="+id+"]").css({"opacity":".5"});
  $("div[id="+id+"] img").css({"opacity":".5","border":"none"});
   }
}
 return false;
}


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
                 var location      = window.location.href;
                 var admin = location.search("admin");
                  var post = $.trim($('textarea[name=post]').val());
                  var img = $.trim($('input[name=img]').val());
                  var url = $.trim($('input[name=url]').val());
                  var allcantry = $('input[name=allcantry]').val();
                  var cantry = $('button[name=selected]').val();
                  var cat =    $("select[name=cat]").val();
                  var title = $.trim($('input[name=title]').val());
                  var vid = '';
                  var Durl = $.trim($('input[name=Durl]').val());
                  var Nmurl = $.trim($('input[name=Nmurl]').val());
                  var type = $('input[name=type]').val();
                  var Stype = $('input[name=Stype]').val();
                  var Spages = $('input[name=Spages]').val();
                  var Ttoken = $('select[name=Ttoken]').val();
                  var Dtoken = $('select[name=Dtoken]').val();
                  var ttype = $('select[name=ttype]').val();
                  var tags = document.getElementById("tags").checked;
                //  var UY = document.getElementById("UY").checked;
                  if(tags){tags =1; }else{ tags =0;}
                  var short = document.getElementById("short").checked;
                  var pages = document.getElementById("pages").checked;
                  var groups = document.getElementById("groups").checked;
                  if(short){short =1; }else{ short =0;}
                  if(pages){ pages ="pages"; }else if(groups){ pages ="groups"; }else{ pages =0;}

                  var type_user = $('select[name=type_user]').val();
                  var time = $('input[name=time]').val();
                  var Yd = document.getElementById("Yd").checked;
                  if(Yd){Yd =1; }else{ Yd =0;}
                     if(post=="" && type != 1 && type != 6 && type != 8 && Stype != 'token'){
                error_msg('قم بااضافة النص اولا');
                  }else if(type == 7  && !Ls('Ytoken') && Ls('admin') && Yd ){
                //error_msg('قم بتسجيل الدخول الى يوتيوب اولا');
                  login('youtube');
                  }else if(type == 8  && Curl("facebook.com")){
                error_msg('لن تعمل هذه الخاصيه مع روابط فيس بوك');
                  }else if(type == 7  && url==""){
                error_msg('قم بااضافة الرابط اولا');
                  }else if(type == 1  && url=="" || type == 8  && url=="" ){
                error_msg('قم بااضافة الرابط اولا');
                  }else if(type == 3  && url=="" && img=="" && Nmurl==""){
                error_msg('اضف  الرابط والصوره  وعنوان الرابط');
                  }else if(type == 3  && url==""){
                error_msg('قم بااضافة الرابط اولا');
                  }else if(type == 2  && url=="" && admin > 0){
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
                    // $('.alert').addClass('alert-danger');
                  var ajaxTime= new Date().getTime();
                  loding_msg('من فضلك انتظر جارى النشر الان',0,500000);
                      $.ajax({
                        type: "POST",
                        url: '../inc/ajax.php?step=post_now',
                        data: {'Yd':Yd,'pages':pages,'Spages':Spages,'cantry':cantry,'allcantry':allcantry,'Durl':Durl,'Nmurl':Nmurl,'cat':cat,'tags':tags,'short':short,'title':title,'post':post,'img':img,'url':url,'admin':admin,'type':type,'Ttoken':Ttoken,'Dtoken':Dtoken,'Stype':Stype,'type_user':type_user,'ttype':ttype,'time':time},
                        success: function(data){
                         $('.loader').hide();
                         if(data.st == 'error'){

                        error_msg(data.msg);
                         }else{
                         if(data.Rn < 1){
                           soon_msg('تم اضافة منشورك الاول');
                         success_msg(data.msg);
                         }else{
                         success_msg(data.msg);
                          }
                         if(pages){
                             goPost(data.id,0,data.where,data.name);
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

                        },
                        dataType: 'json'
                      }).done(function () {
                   var totalTime = new Date().getTime()-ajaxTime;
                  });

                  }


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
function Curl (url=""){
var you2 = url.search(url);
if(you2 < 1){
return false;
}
return true;
 }
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
    function add_time (id){
      loding_msg('من فضلك انتظر جارى النشر الان',0,1000);
                       $.ajax({
                        type: "POST",
                        url: '../inc/ajax.php?step=AddT',
                        data: {'pid':id},
                        success: function(data){
                         if(data.st == 'error'){

                        error_msg(data.msg);
                         }else{
                         success_msg(data.msg);
                         }


                         $('textarea[name=post]').val(data.post);
if(data.type == 2){
                    $('.textfilde').removeClass('m12');
                    $('.textfilde').addClass('m9');
							$(".image").attr('src',data.img);
							$("input[name=img]").val(data.img);
							$("input[name=type]").val(2);
                            $(".uimage").show();
 }
		$('#Add_time').trigger('click');
        // soon_msg('قم بااختيار الوقت المناسب');
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
$('.post-img-video').click(function(){
var id = $('iframe[class=fvideo]').attr('src');
$(this).hide();
$('iframe[class=fvideo]').attr('src',id + '?autoplay=1');
$(".Fvideo").show();
//return false;
});

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
 var Etext  =   $.trim($('textarea[name=Etext]').val());
 var eurl = $.trim($('input[name=eurl]').val());
 var vurl = $.trim($('input[name=vurl]').val());
 var vid = $.trim($('input[name=vvid]').val());
 var aid = $.trim($('input[name=aid]').val());
 var etype = $('input[name=etype]').val();
 var name = $.trim($('input[name=name]').val());
 var email = $.trim($('input[name=eemail]').val());
 var pass = $.trim($('input[name=pass]').val());
 var admin_fb = $.trim($('input[name=eadmin_fb]').val());
 var Gtype = $.trim($('input[name=Gtype]').val());

                       $.ajax({
                        type: "POST",
                        url: '../inc/ajax.php?step=edite',
                        data: {'id':id,'post':Etext,'url':eurl,'vurl':vurl,'vid':vid,'type':etype,'name':name,'fb':admin_fb,'pass':pass,'aid':aid,'email':email,'Gtype':Gtype},
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
                         }


                        },
                        dataType: 'json'
                      });

  return false;
  }
/////////////////////user_active///////////////////////////
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
/////////////////////See_more///////////////////////////
         $(document).on('click','.show_more',function(){
        var ID = $(this).attr('id');
        var Gapp = $("input[name=Gapp]").val();
        var Gtype = $("input[name=Gtype]").val();
        var type = $("input[name=type]").val();
        var app = $("input[name=Gshare]").val();
        if(Gapp != 'admin'){
             if(Gapp == 'myposts'){
         Gapp ='myposts&app='+ type;
         }else  if(Gapp != "home" && Gapp ){
          Gapp ='More_' + Gapp;
        }else{
          Gapp ="Moreposts";
        }
        }else{
         if(Gtype == 'posts'){
         Gapp ='Pactive&app='+ type;
         }else if(Gtype == 'share'){
         Gapp ='Gshare';
         }else{
          Gapp = type;
         }
        }
        var ajax_url='../inc/ajax.php?step=' + Gapp;
      //$(this).addClass("btn-floating");
        $('.icon_more').hide();
        $('.loding').show();
        $.ajax({
            type:'POST',
            url:ajax_url,
            data:{'id':ID,'Gapp':Gapp,'Gtype':Gtype,'type':type,'app':app},
            success:function(html){
                $('#show_more_main'+ID).remove();
                $('.java').remove();
                $('.users').append(html);
                $('.gshare').append(html);
                $('.posts').append(html);
                $('.images').append(html);
                $('.videos').append(html);
                $('.myposts').append(html);
                $('.pposts').append(html);
                   //$('.GoTask').html("<script src='../assets/task.js'></script>");
            }
        });
    });

////////////////////remove/////////////////////////////
function stop_task (id){
                       $.ajax({
                        type: "POST",
                        url: '../inc/ajax.php?step=stop_task',
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
function re (id,type){
loding_msg("جارى التحميل",1);
var type =$('input[name=type]').val();
var Gtype =$('input[name=Gtype]').val();
                       $.ajax({
                        type: "POST",
                        url: '../inc/ajax.php?step=Ruser',
                        data: {'id':id,'type':type,'Gtype':Gtype},
                        success: function(data){
                         if(data.st == 'error'){

                        error_msg(data.msg);
                         }else{
                          $('div[id="t'+ id +'"]').fadeOut(function(){
                               $(this).remove();
                           });
                          $('tr[id="t'+ id +'"]').fadeOut(function(){
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
function ban(id,type){
loding_msg("جارى التحميل",1);

                       $.ajax({
                        type: "POST",
                        url: '../inc/ajax.php?step=block',
                        data: {'id':id,'type':type},
                        success: function(data){
                         if(data.st == 'error'){

                        error_msg(data.msg);
                         }else{
/*                          $('div[id="t'+ id +'"]').fadeOut(function(){
                               $(this).remove();
                           });
*/                          // Getpost(id);
                         success_msg(data.msg);
                         }


                        },
                        dataType: 'json'
                      });

  return false;
  }
function unban(id,type){
loding_msg("جارى التحميل",1);
                 $.ajax({
                        type: "POST",
                        url: '../inc/ajax.php?step=unblock',
                        data: {'id':id,'type':type},
                        success: function(data){
                         if(data.st == 'error'){

                        error_msg(data.msg);
                         }else{
/*                          $('div[id="t'+ id +'"]').fadeOut(function(){
                               $(this).remove();
                           });
*/                          // Getpost(id);
                         success_msg(data.msg);
                         }


                        },
                        dataType: 'json'
                      });

  return false;
  }

function check (id,type){
loding_msg("جارى التحميل",1);

                       $.ajax({
                        type: "POST",
                        url: '../inc/ajax.php?step=Cuser',
                        data: {'id':id,'type':type},
                        success: function(data){
                         if(data.st == 'error'){

                        error_msg(data.msg);
                         }else{
                    /*      $('div[id="t'+ id +'"]').fadeOut(function(){
                               //$(this).remove();
                           });
                    */      // Getpost(id);
                         success_msg(data.msg);
                         }


                        },
                        dataType: 'json'
                      });

  return false;
  }


////////////////////////////////////////////////
function Dpost(id){
                       $.ajax({
                        type: "POST",
                        url: '../inc/ajax.php?step=Dpost',
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
function Getpost(id){
        var Gapp = $("input[name=Gapp]").val();
if(!Gapp || Gapp =='home' ){
                       $.ajax({
                        type: "POST",
                        url: '../inc/ajax.php?step=Moreposts',
                        data: {'pid':id},
                        success: function(data){
                         if(data.st == 'error'){

                        //error_msg('حدث خطأ ما لم يتم النشر ');
                         }else{
                        // success_msg('تم اضافة المنشور بنجاح');
                         }
                          $('.posts').prepend(data);
                        }
                      });
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
function add(){
if(Ls()){
 location.replace("../");
}else{
login('fb',1);
}
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
////////////////////////////////////////////////
////////////////////////////////////////////////
function remove_img_dialog(type,t){
    if(!type){
        type = 0;
        }
			   $(".uimage").hide();
			   $(".eimage").hide();
               $(".image").attr('src','');
              $('.textfilde').addClass('m12');
              $("input[name=type]").val(type);
              $("input[name=etype]").val(type);
              $("input[name=url]").val('');
              $("input[name=eurl]").val('');
                  if(!t){
              success_msg("تم حذف الصوره بنجاح",0)
              }
}
function remove_video(){
                         $('label[for=linetext-1]').text('المنشور');
                         $('.title_video').hide();
                         $('.url_video').hide();
                         $('.remove').show();
                         $('.uimage').hide();
                         $('.textfilde').addClass('m12');
                         $("input[name=url]").val('');
                         $("input[name=title]").val('');
                         $("input[name=eurl]").val('');
                         $(".image").attr('src','');


}

function  Rframe(url,t=30000,f=".pupad"){
var links = [url];
var i = 0;
var renew = setInterval(function(){
    $(f).attr('src',links[i]);
    if((links.length -1) == i){
        i = 0;
    }
    else i++;
},t);
 }

function popup(url){
    var redirectWindow = window.open(url, '_blank');
    $.ajax({
        type: 'POST',
        url: '/echo/json/',
        success: function (data) {
            redirectWindow.location;
        }
    });
}
////////////////////////cookie////////////////////////////
function setCookie(cname, cvalue, exdays,dd) {
    if(dd == 1){
    dd = exdays*60;
    }else if(dd == 2){
    dd = exdays;
    }else{
    dd = exdays*24*60;
    }
    var d = new Date();
    d.setTime(d.getTime() + (dd*60*1000));
    var expires = "expires="+d.toUTCString();
   document.cookie = cname + "=" + cvalue + "; " + expires;
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
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
////////////////////////tost////////////////////////////
function DeleteAll(id){
if(!id){
   $.dialog({
    //content: '<div class="row center" ><div class="col s6 m6 right"> <a style="    width: 100%;" onclick="DeleteAll(\'users\')" class="btn waves-effect waves-light">الاساسى</a></div><div class="col s6 m6"> <a style="    width: 100%;" onclick="DeleteAll(\'users2\')" class="btn waves-effect waves-light">الاحتياطى</a></div></div>',
    content:'url:../inc/ajax.php?step=DeleteAll&id='+id,
    title: false,
    rtl: true,
    //confirm: function(){},
    closeIconClass: 'fa fa-close',
    cancelButton: false, // hides the cancel button.
    confirmButton: false, // hides the confirm button.
    closeIcon: true, // hides the close icon.

});
}else{
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
}
function  Rapp(id){
                $.ajax({
                        type: "POST",
                        url: '../inc/ajax.php?step=Rapp',
                        data: {'id':id},
                        success: function(data){
                         if(data.st == 'error'){
                        error_msg(data.msg);
                        //location.href = location.href+ "#" +data.msg;
                         }else{
                       success_msg(data.msg);
                         }
                        },
                        dataType: 'json'
                      });


}

function success_msg (text,h,time){
  $('.material-tooltip').hide();
  $('.toast-info').hide();
     if(!time){
        time = 5500;
    }
    if(!h && h == 55){
        h = '<a class="hide_tost" onclick="hide_tost()"><i class="fa fa-times" aria-hidden="true"></i></a>';
    }else{
      h='';
    }
//Materialize.toast(h + '<b>' + text + '</b>&nbsp;<i class="fa fa-check fa-lg" aria-hidden="true"></i>', time,"green lighten-1 truncate white-text");
toastr.success(text,null,{timeOut:time});
}
function soon_msg (text,h,time){
$('.material-tooltip').hide();
$('.toast-info').hide();
   if(!time){
        time = 5500;
    }
    if(!h && h == 55){
        h = '<a class="hide_tost" onclick="hide_tost()"><i class="fa fa-times" aria-hidden="true"></i></a>';
    }else{
      h='';
    }
//Materialize.toast(h + '<b>' + text + '</b>&nbsp;<i class="fa fa-smile-o fa-lg" aria-hidden="true"></i>', time,"green soon lighten-1 truncate white-text center");
toastr.info(text,null,{timeOut:time});
}
function msg_msg (text,h,time){
   $('.material-tooltip').hide();
     if(!time){
        time = 5500;
    }
    if(!h && h == 55){
        h = '<a class="hide_tost" onclick="hide_tost()"><i class="fa fa-times" aria-hidden="true"></i></a>';
    }else{
      h='';
    }
Materialize.toast(h + '<b>' + text + '</b>&nbsp;<i class="fa fa-envelope-o fa-lg" aria-hidden="true"></i>', time,"green lighten-1 truncate white-text center");

}

function error_msg (text,h,time){
    $('.material-tooltip').hide();
    $('.toast-info').hide();
    if(!time){
        time = 5500;
    }
    if(!h && h == 55){
        h = '<a class="hide_tost" onclick="hide_tost()"><i class="fa fa-times" aria-hidden="true"></i></a>';
    }else{
      h='';
    }
//Materialize.toast(h +'<b>' + text + '</b>&nbsp;<i class="fa fa-exclamation-circle fa-lg" aria-hidden="true"></i>', time,"red lighten-1 truncate white-text center");
toastr.error(text,null,{timeOut:time});
}
function loding_msg (text,h,time){
    $('.material-tooltip').hide();
     if(!time){
        time = 5000;
    }
   // time = 5000;
   if(!h && h == 55){
        h = '<a class="hide_tost" onclick="hide_tost()"><i class="fa fa-times" aria-hidden="true"></i></a>';
    }else{
      h='';
    }
//Materialize.toast(h + '<b>' + text + '</b>&nbsp;<img style="width: 25px;height: 25px;" src="../assets/images/spin.svg" alt="" />', time,"loader truncate teal lighten-1 white-text center");
toastr.info(text,null,{timeOut:time});
}

function hide_tost (){
	$('.toast').hide();
    }
///////////////////////////////////////////
function toda (){
       $('.tooltipped').tooltip({delay:0});
}
///////////////////ref////////////////////////
