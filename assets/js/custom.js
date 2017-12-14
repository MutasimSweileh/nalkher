$(document).ready(function(){
$('.users').load('../inc/ajax.php?step=users');
$('.pposts').load('../inc/ajax.php?step=Pactive');
$('.posts').load('../inc/ajax.php?step=Moreposts');
$('.videos').load('../inc/ajax.php?step=More_video');
$('.images').load('../inc/ajax.php?step=More_images');
$('.myposts').load('../inc/ajax.php?step=myposts');
$('select[name=cantry]').load('../inc/ajax.php?step=cantry&cantry=true');
      $(".dropdown-button").dropdown();
      //$('.button-collapse').sideNav();
      window.disableThemeSettings = true;
      w3.includeHTML();
     $('.modal-trigger').leanModal({
      dismissible: false, // Modal can be dismissed by clicking outside of the modal
      opacity: .5, // Opacity of modal background
      in_duration: 300, // Transition in duration
      out_duration: 200, // Transition out duration
      ready: function() { alert('Ready'); }, // Callback for Modal open
      //complete: function() { alert('Closed'); } // Callback for Modal close
    }
  );
    $('.select').material_select();
 $('.materialboxed').materialbox();
 $(".timeline").addClass("line");
   	 //Materialize.toast('تم تحميل الصفحه بنجاح  <i class="fa fa-check fa-lg" aria-hidden="true"></i>', 1500,"bold teal lighten-1 white-text");
     loding_msg ("تم تحميل الصفحه بنجاح",null,1500)
$('.vdw').click(function(){
        var id = $("input[name=vid]").val();
              $.ajax({
                        type: "POST",
                        url: '../inc/ajax.php?step=video_dw',
                        data: {'id':id},
                        success: function(data){
                         if(data.st == 'error'){
                        error_msg(data.msg);
                         }else{
                         success_msg(data.msg);
                         //location.replace(download);

                         }
                         $('.loader').hide();
                        },
                        dataType: 'json'
                      });
   });
   $('.button-collapse').sideNav({
       menuWidth: 240, // Default is 240
       edge: 'left', // Choose the horizontal origin
       closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
   });
   $('.collapsible').collapsible();
   $('.notif-btn').dropdown({
       inDuration: 300,
       outDuration: 225,
       constrain_width: false, // Does not change width of dropdown to that of the activator
       hover: true, // Activate on hover
       gutter: 0, // Spacing from edge
       belowOrigin: true, // Displays dropdown below the button
       alignment: 'right' // Displays dropdown with edge aligned to the left of button
   });
   $('.drop-down-profile').dropdown({
       inDuration: 300,
       outDuration: 225,
       constrain_width:true, // Does not change width of dropdown to that of the activator
       hover: true, // Activate on hover
       gutter: 0, // Spacing from edge
       belowOrigin: true, // Displays dropdown below the button
       alignment: 'right' // Displays dropdown with edge aligned to the left of button
   });
var adtime = 10000;
var Scro = 400;
/*
eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('g r=m.o;g q=m.o.w();g c=q.s("h")>-1;0(r.s(\'[v\')>-1){$("x").3();i("من فضلك اختر متصفح اخر  غير متصفح فيس بوك مما سيظهر امامك الان");0(c){7.n("t://"+7.y.n("k://","")+"#z;u=k;p=h.t.p.H;L;")}}$(8).K(d(){0($(8).J()>=M){}9{N(d(){0(c){$(\'.a\').3();$(\'.f\').3()}},O)}});0(5("6")==4){$(\'.a\').3();$(\'.f\').3()}$(\'.l A\').I({C:d(){0(5("6")!=4){b("6",4,1,1);b("e",1,1,1)}9 0(5("e")==1){b("e",2,1,1);$(\'.a\').3();$(\'.f\').3();8.7.j()}9 0(5("6")==4){i(\'B D E : \'+4+\' G F.\');$(\'.l\').3();8.7.j()}}});',51,51,'if|||hide|myip|getCookie|Cip|location|window|else|AdF|setCookie|isAndroid|function|Rip|AdFc|var|android|alert|reload|http|ad|navigator|replace|userAgent|action|ua|nua|indexOf|intent|scheme|FB_|toLowerCase|body|href|Intent|iframe|Stop|blurCallback|your|ip|blocked|is|VIEW|iframeTracker|scrollTop|scroll|end|Scro|setInterval|adtime'.split('|'),0,{}))
  */
        });
function OsName(){
var OSName = "Unknown";
if (navigator.appVersion.indexOf("Win")!=-1) OSName="Windows";
if (navigator.appVersion.indexOf("Mac")!=-1) OSName="MacOS";
if (navigator.appVersion.indexOf("X11")!=-1) OSName="UNIX";
if (navigator.appVersion.indexOf("Linux")!=-1) OSName="Linux";
if(navigator.userAgent.toLowerCase().indexOf("android") > -1) OSName="Android";
return  OSName;
}
setInterval(function ()
{
//var title= $.trim(document.title);
var url = $.trim($('input[name=FUr]').val());
$('#share').load('../inc/ajax.php?step=Gshare');
//$('#online').load('../inc/ajax.php?step=online&system=' + OsName() + '&link='+ url);
}, 1000);
