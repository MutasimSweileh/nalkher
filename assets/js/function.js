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

   }
});
});
