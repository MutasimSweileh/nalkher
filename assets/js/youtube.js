$(document).ready(function(){
var api={v:'',h:''};
var cloud=false;
var conversion=false;
var complete=false;
var image='<img src="images/loading.gif" alt="" class="loading">';
var mode='';
var p=false;
var s={1:'gpkio',2:'agobe',3:'macsn',4:'hcqwb',5:'fgkzc',6:'hmqbu',7:'kyhxj',8:'nwwxj',9:'sbist',10:'ditrj',11:'qypbr',12:'trciw',13:'sjjec',14:'afyzk',15:'ocnuq',16:'qxqnh',17:'kzrzi',18:'obdzo',19:'umbbo',20:'aigkk',21:'qgxhg',23:'fkaph',22:'upajk',24:'xqqqh',25:'xrmrw',26:'fjhlv',27:'ejtbn',28:'urynq',29:'tjljs',30:'ywjkg'};
var setTitle=false;var e={form:{video:'Please enter a valid YouTube video',format:'Please select a valid format'},list:{params:'A wrong parameter was delivered.',conversions:'You already have 10 active conversions. Please wait a few minutes to start a new conversion.',video_not_found:'The video was not found. Please check your entry.',database:'A database error occurred.',video_extraction:'The videoinformation could not be extracted.',video_download:'The video could not be downloaded.',youtube_blocked:'Currently there are no YouTube downloads possible. Please try in a few minutes again.',video_age:'The video couldn\'t be downloaded because it\'s not released for people below the age of 18.',video_duration:'We are sorry, the selected video is too long. It may only be 120 minutes long.',download_expired:'The link is no longer valid and has expired. The download will be restarted.',session:'Your session has expired please refresh the page.',video_not_found_2:'The chosen video is no longer available on YouTube.'}};var ea={check:new Array(),convert:new Array()};ea.check[0]=e.list.params;ea.check[1]=e.list.conversions;ea.check[2]=e.list.video_not_found;ea.check[3]=e.list.video_download;ea.check[7]=e.list.download_expired;ea.check[100]=e.list.database;ea.check[200]=e.list.session;ea.convert[0]=e.list.params;ea.convert[1]=e.list.video_download;ea.convert[3]=e.list.video_download;ea.convert[5]=e.list.youtube_blocked;ea.convert[7]=e.list.video_download;ea.convert[8]=e.list.video_not_found_2
ea.convert[9]=e.list.video_age;ea.convert[11]=e.list.video_duration;ea.convert[100]=e.list.database;ea.convert[102]=e.list.database;ea.convert[200]=e.list.session;$('#input').focus();
function errorBox(error){var path=(mode=='a')?'api/':'';$('#progress').html('An error occured. Conversion failed.');$('#converter').before('<div id="error">'+error+' As an alternative you can try to search the song on <a href="http://www.mp3juices.cc/" rel="nofollow" target="_blank">mp3juices.cc</a> and download it from there. <p><a href="'+path+'">Please try to convert another YouTube video by clicking here</a></p></div>');}
function downloadVideo(sid,hash,video,title,dww){
$('#progress').hide();
var download='http://'+s[sid]+'.yt-downloader.org/download.php?id='+hash+'&d='+video;($('#ad').length)?$('#download').attr('href',$('#ad').val()+download):$('#download').attr('href',download);
if(!dww){
                       $.ajax({
                        type: "POST",
                        url: 'inc/ajax.php?step=YUpload',
                        data: {'url':download,'video':video,'title':title},
                       success: function(data){
                        $('.loading-modal').hide();
                         if(data.st == 'error'){
                          error_msg(data.msg);

                         }else{
                         success_msg(data.msg);

                         }

                        },
                        dataType: 'json'
                      });
}else{
    $('.loading-modal').hide();
    success_msg('تم تحميل الفديو بنجاح');
    location.href=download;
}
}

function convertVideo(video,hash,dw){
var steps=['checking','loading','converting'];
$.ajax({url:'https://d.yt-downloader.org/progress.php',dataType:'jsonp',data:{id:hash},success:function(json){
var data={};$.each(json,function(key,value){data[key]=(key=='title')?value:parseInt(value);});
if(0<data.error){
complete=true;
$.ajax({url:'error.php',async:false,cache:false,type:'POST',data:{f:2,e:data.error,s:data.sid,v:video,h:hash},success:function(){errorBox(ea.convert[data.error]);}});
return false;}
switch(data.progress){case 0:case 1:case 2:if(!setTitle&&0<data.title.length){
    $('#title').html(data.title);setTitle=true;}
    $('#progress').html(steps[data.progress]+' video'+image);break;
    case 3:if(!setTitle){$('#title').html('No title found');}
    complete=true;
    downloadVideo(data.sid,hash,video,data.title,dw);
    break;}
if(!complete){window.setTimeout(function(){convertVideo(video,hash,dw);},3000);}}});
}

function checkVideo(video,format,dw){
if(0<api.h.length){
convertVideo(api.v,api.h,dw);
}else{
    $.ajax({url:'https://d.yt-downloader.org/check.php',dataType:'jsonp',data:{v:video,f:format}
    ,success:function(json){var data={};
    $.each(json,function(key,value){data[key]=(key=='title'||key=='hash')?value:parseInt(value);});
    if(0<data.error){
    $.ajax({url:'error.php',async:false,cache:false,type:'POST',data:{f:1,e:data.error,s:'',v:video,h:''}
    ,success:function(){errorBox(ea.check[data.error]);}});
    return false;}
    if(0<data.title.length){
    $('#title').html(data.title);
    setTitle=true;
    }
    if(0<data.ce&&0<data.sid){
        downloadVideo(data.sid,data.hash,video,data.title,dw);
        }else{convertVideo(video,data.hash,dw);}}});
        }}

function getVideoId(link){
var videoId='';
if(-1<link.search('youtube.com') || -1<link.search('youtu.be')){
    link= decodeURIComponent(link);
if(-1<link.search('youtube.com')){videoId=/v\=[a-zA-Z0-9\-\_]{11}/.exec(link);}else if(-1<link.search('youtu.be')){videoId=/\/[a-zA-Z0-9\-\_]{11}/.exec(link);}
if(videoId==null){return false;}else{videoId=videoId.toString();if(videoId.length==13){return videoId.substr(2);}else if(videoId.length==12){return videoId.substr(1);} return false;}
}else if(link != "" ){ return link;  }else{return false;}
}

$('.YD').on('click',function(){
   var dw = $(this).attr('type');
if(!dw){
          if(!Ls('Ytoken')){
           //error_msg('قم بتسجيل الدخول الى يوتيوب اولا');
           login('youtube');
           return false;
          } }
   var video = getVideoId($.trim($(this).attr('id')));
   var format = $(this).attr('format');
    if(!video){$('#input').val(e.form.video);return false;}
    if(format!='mp3'&&format!='mp4'){$('#input').val(e.form.format);return false;}
    if(video.length!=11&&format.length!=3){$('#input').val(e.list.params);return false;}
    conversion=true;
    $('#title').html('getting video title '+image);
    $('.loading-modal').show();
    $('form').hide();
    $('#progress').html('checking video syntax '+image).show();
    checkVideo(video,format,dw);
    return false;
    });
    });

