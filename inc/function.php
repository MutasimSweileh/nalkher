<?php
  global $DBcon;
function Ftable($tp="settings"){
    global $DBcon;
if(mysqli_num_rows(mysqli_query($DBcon,"SHOW TABLES LIKE '$tp'")) > 0){
return true;
}else{return false;}
}
function Fcol($fieldname="",$table="settings"){
global $DBcon;
$result = @mysqli_query($DBcon,"SHOW COLUMNS FROM `$table` LIKE '$fieldname'");
if(mysqli_num_rows($result)){
 //return Sel($table)->$fieldname;
   return array(true,Sel($table)->$fieldname);
}else{
   return false;
}
}
function addDayswithdate($date,$days){

    $date = strtotime("+".$days." days", strtotime($date));
    return  date("Y-m-d", $date);

}
function str($t,$s){
$Fa=strlen($t) - $s;
if($Fa > 0){$sr = '.....';}else{$sr = '';}
$S=  '<span style="direction: initial;">'.substr($t,0,$s);
$S .=$sr.'</span>';
return $S;
}

//////////////////////////////
   function countre(){
        return array('Andorra',
'United Arab Emirates',
'Afghanistan',
'Antigua and Barbuda',
'Anguilla',
'Albania',
'Armenia',
'Angola',
'Antarctica',
'Argentina',
'American Samoa',
'Austria',
'Australia',
'Aruba',
'Aland Islands',
'Azerbaijan',
'Bosnia and Herzegovina',
'Barbados',
'Bangladesh',
'Belgium',
'Burkina Faso',
'Bulgaria',
'Bahrain',
'Burundi',
'Benin',
'Saint Barthalemy',
'Bermuda',
'Brunei Darussalam',
'Bolivia, Plurinational State of',
'Bonaire, Sint Eustatius and Saba',
'Brazil',
'Bahamas',
'Bhutan',
'Bouvet Island',
'Botswana',
'Belarus',
'Belize',
'Canada',
'Cocos (Keeling) Islands',
'Congo, the Democratic Republic of the',
'Central African Republic',
'Congo',
'Switzerland',
'Cote d\'Ivoire ! C?´te d\'Ivoire ',
'Cook Islands',
'Chile',
'Cameroon',
'China',
'Colombia',
'Costa Rica',
'Cuba',
'Cape Verde',
'Cura?§ao',
'Christmas Island',
'Cyprus',
'Czech Republic',
'Germany',
'Djibouti',
'Denmark',
'Dominica',
'Dominican Republic',
'Algeria',
'Ecuador',
'Estonia',
'Egypt',
'Western Sahara',
'Eritrea',
'Spain',
'Ethiopia',
'Finland',
'Fiji',
'Falkland Islands (Malvinas)',
'Micronesia, Federated States of',
'Faroe Islands',
'France',
'Gabon',
'United Kingdom',
'Grenada',
'Georgia',
'French Guiana',
'Guernsey',
'Ghana',
'Gibraltar',
'Greenland',
'Gambia',
'Guinea',
'Guadeloupe',
'Equatorial Guinea',
'Greece',
'South Georgia and the South Sandwich Islands',
'Guatemala',
'Guam',
'Guinea-Bissau',
'Guyana',
'Hong Kong',
'Heard Island and McDonald Islands',
'Honduras',
'Croatia',
'Haiti',
'Hungary',
'Indonesia',
'Ireland',
'Israel',
'Isle of Man',
'India',
'British Indian Ocean Territory',
'Iraq',
'Iran, Islamic Republic of',
'Iceland',
'Italy',
'Jersey',
'Jamaica',
'Jordan',
'Japan',
'Kenya',
'Kyrgyzstan',
'Cambodia',
'Kiribati',
'Comoros',
'Saint Kitts and Nevis',
'Korea, Democratic People\'s Republic of',
'Korea, Republic of',
'Kuwait',
'Cayman Islands',
'Kazakhstan',
'Lao People\'s Democratic Republic',
'Lebanon',
'Saint Lucia',
'Liechtenstein',
'Sri Lanka',
'Liberia',
'Lesotho',
'Lithuania',
'Luxembourg',
'Latvia',
'Libya',
'Morocco',
'Monaco',
'Moldova, Republic of',
'Montenegro',
'Saint Martin (French part)',
'Madagascar',
'Marshall Islands',
'Macedonia, the former Yugoslav Republic of',
'Mali',
'Myanmar',
'Mongolia',
'Macao',
'Northern Mariana Islands',
'Martinique',
'Mauritania',
'Montserrat',
'Malta',
'Mauritius',
'Maldives',
'Malawi',
'Mexico',
'Malaysia',
'Mozambique',
'Namibia',
'New Caledonia',
'Niger',
'Norfolk Island',
'Nigeria',
'Nicaragua',
'Netherlands',
'Norway',
'Nepal',
'Nauru',
'Niue',
'New Zealand',
'Oman',
'Panama',
'Peru',
'French Polynesia',
'Papua New Guinea',
'Philippines',
'Pakistan',
'Poland',
'Saint Pierre and Miquelon',
'Pitcairn',
'Puerto Rico',
'Palestine, State of',
'Portugal',
'Palau',
'Paraguay',
'Qatar',
'Reunion ! R?©union ',
'Romania',
'Serbia',
'Russian Federation',
'Rwanda',
'Saudi Arabia',
'Solomon Islands',
'Seychelles',
'Sudan',
'Sweden',
'Singapore',
'Saint Helena, Ascension and Tristan da Cunha',
'Slovenia',
'Svalbard and Jan Mayen',
'Slovakia',
'Sierra Leone',
'San Marino',
'Senegal',
'Somalia',
'Suriname',
'South Sudan',
'Sao Tome and Principe',
'El Salvador',
'Sint Maarten (Dutch part)',
'Syrian Arab Republic',
'Swaziland',
'Turks and Caicos Islands',
'Chad',
'French Southern Territories',
'Togo',
'Thailand',
'Tajikistan',
'Tokelau',
'Timor-Leste',
'Turkmenistan',
'Tunisia',
'Tonga',
'Turkey',
'Trinidad and Tobago',
'Tuvalu',
'Taiwan, Province of China',
'Tanzania, United Republic of',
'Ukraine',
'Uganda',
'United States Minor Outlying Islands',
'United States',
'Uruguay',
'Uzbekistan',
'Holy See (Vatican City State)',
'Saint Vincent and the Grenadines',
'Venezuela, Bolivarian Republic of',
'Virgin Islands, British',
'Virgin Islands, U.S.',
'Viet Nam',
'Vanuatu',
'Wallis and Futuna',
'Samoa',
'Yemen',
'Mayotte',
'South Africa',
'Zambia',
'Zimbabwe');
    }
    function countreCode(){
        return array('AD','AE','AF','AG','AI','AL','AM','AO','AQ','AR','AS','AT','AU','AW','AX','AZ','BA','BB','BD','BE','BF','BG','BH','BI','BJ','BL','BM','BN','BO','BQ','BR','BS','BT','BV','BW','BY','BZ','CA','CC','CD','CF','CG','CH','CI','CK','CL','CM','CN','CO','CR','CU','CV','CW','CX','CY','CZ','DE','DJ','DK','DM','DO','DZ','EC','EE','EG','EH','ER','ES','ET','FI','FJ','FK','FM','FO','FR','GA','GB','GD','GE','GF','GG','GH','GI','GL','GM','GN','GP','GQ','GR','GS','GT','GU','GW','GY','HK','HM','HN','HR','HT','HU','ID','IE','IL','IM','IN','IO','IQ','IR','IS','IT','JE','JM','JO','JP','KE','KG','KH','KI','KM','KN','KP','KR','KW','KY','KZ','LA','LB','LC','LI','LK','LR','LS','LT','LU','LV','LY','MA','MC','MD','ME','MF','MG','MH','MK','ML','MM','MN','MO','MP','MQ','MR','MS','MT','MU','MV','MW','MX','MY','MZ','NA','NC','NE','NF','NG','NI','NL','NO','NP','NR','NU','NZ','OM','PA','PE','PF','PG','PH','PK','PL','PM','PN','PR','PS','PT','PW','PY','QA','RE','RO','RS','RU','RW','SA','SB','SC','SD','SE','SG','SH','SI','SJ','SK','SL','SM','SN','SO','SR','SS','ST','SV','SX','SY','SZ','TC','TD','TF','TG','TH','TJ','TK','TL','TM','TN','TO','TR','TT','TV','TW','TZ','UA','UG','UM','US','UY','UZ','VA','VC','VE','VG','VI','VN','VU','WF','WS','YE','YT','ZA','ZM','ZW');
    }

    function CCout(){
         $p =countreCode();
         return count($p);
    }
    function getCCode($pos){
        $p = countreCode();
        return $p[$pos];
    }

    function getCName($cOde){
           $cc = countreCode();
           $C = countre();
            for($i=0;$i<count($cc);$i++){
                if(strtolower($cc[$i]) == $cOde)
                {
                    break;
                }
            }
            return $C[$i];
    }
    function ip_details($ip=false)
    {
    $json = file_get_contents("http://ipinfo.io/{$ip}");
    $details = json_decode($json);
    return $details->country;
    }
    function Fburl($id=false){
    $R= "https://www.facebook.com/".$id;
  return $R;
}

function more($tutorial_id,$SAll,$showLimit){
if($SAll > $showLimit){
             $r = '   <div class="col offset-s1 s11 m12  center" id="show_more_main'.$tutorial_id.'">
                 <a id="'.$tutorial_id.'" class="btn waves-effect waves-light teal lighten-2 z-depth-2  show_more" alt=""   data-position="buttom" data-tooltip="تحميل المزيد من المنشورات" data-tooltip-id="ed472c81-cc4c-1ce6-956d-2ac9b8acd67b">
            <span class="loding" style="display:none">  <img style="width: 25px;height: 25px;    margin: 6px;" src="../assets/images/spin.svg" alt="" />   </span>
        <span class="icon_more" >    عرض المزيد  <i class="fa fa-refresh right"></i>   </span>

                 </a>

 </div>';
 }else{
     $r = false;
 }
return $r;
}
function NotFound(){
$r ='<div class="col s12 m12 " style="     direction: rtl;     margin-bottom: 10px;   margin-top: 10px;">
<div class="center  z-depth-1 red divider center white-text ">
<i class="fa fa-exclamation-circle fa-lg" aria-hidden="true"></i>      لم يتم العثور على نتائج
</div>
</div>';

return $r;

}
function error($msg,$id,$name,$e=''){
if(!$id){
$r ='<div class="col s12 m12 " style="direction: rtl;      margin-bottom: 10px;   margin-top: 10px;">
<div class="center  z-depth-1 red divider center white-text bold">
<i class="fa fa-exclamation-circle fa-lg" aria-hidden="true"></i> '.$msg.' </div></div>';

}else{
$r ='<div class="col s12 m12 " style="direction: rtl;      margin-bottom: 10px;   margin-top: 10px;">
<div class="center  z-depth-1 red divider center white-text bold">
<i class="fa fa-exclamation-circle fa-lg" aria-hidden="true"></i> '.$msg.' <a href="'.Fb($id).'" target="_blank" style="color: #b1dcfb;">'.$name.'</a><span style="    display: block;
    font-size: 13px;"> '.$e.'</span></div></div>';

}

return $r;

}
function Amsg($msg="",$c="",$a="",$ma=""){
if(!$c){$c="cyan darken-1";}
if(!$a or $a == 'no' ){
$r ='<div class="col s12 m12 " style="direction: rtl;      margin-bottom: 5px;   margin-top: 5px;">
<div class="center  z-depth-1 '.$c.' divider center white-text bold">
<i class="fa fa-exclamation-circle fa-lg" aria-hidden="true"></i> '.$msg.' </div></div>';

}else{
if(!$ma){ $ma="من هنا"; }
$r ='<div class="col s12 m12 " style="direction: rtl;      margin-bottom: 5px;   margin-top: 5px;">
<div class="center  z-depth-1 '.$c.' divider center white-text bold">
<i class="fa fa-exclamation-circle fa-lg" aria-hidden="true"></i> '.$msg.' <a href="'.$a.'" target="_blank" style="color: #b1dcfb;">'.$ma.'</a></div></div>';

}

return $r;

}
function success($msg,$id,$name){
if(!$id){
$r ='<div class="col s12 m12 " style="direction: rtl;      margin-bottom: 10px;   margin-top: 10px;">
<div class="center  z-depth-1 green divider center white-text bold">
<i class="fa fa-check fa-lg" aria-hidden="true"></i> '.$msg.' </div></div>';

}else{
$r ='<div class="col s12 m12 " style="direction: rtl;      margin-bottom: 10px;   margin-top: 10px;">
<div class="center  z-depth-1 green divider center white-text bold">
<i class="fa fa-check fa-lg" aria-hidden="true"></i> '.$msg.' <a href="'.Fb($id).'" target="_blank" style="color: #b1dcfb;">'.$name.'</a> </div></div>';

}

return $r;

}
function limit_str($text,$limit,$d=false){
        $m = explode(" ",$text);
        if(count($m) > $limit){
                $y = array();
                for($t=0;$t<=($limit-1);$t++){
                        $y[$t] = $m[$t];
                }
                $b = implode(" ",$y);
                if(!$d){
                $b .= " ...";
                }
        }else{
                $b = $text;
        }
return $b;
}
function short($short=flase,$link="",$pos=flase,$img=false){
    global $googl;
    global $goog;
    if(!$img){
         if($short == 1 and $googl->shorten($link) and !$pos ){
         $postb['link'] = $googl->shorten($link);
         }else{
         $postb['link'] = $link;
         }
         }else{
         if($short == 1 and $goog->shorten($link) ){
         $postb['link'] = $goog->shorten($link);
         }else{
         $postb['link'] = $link;
         }


         }
return $postb['link'];
}
function visitor_country($ip=false)
   {
           if(!$ip){
           $ip = ip();
                 }
       //    $ip = "79.173.199.93";
           $ip_data = @json_decode(readURL("http://www.geoplugin.net/json.gp?ip=".$ip));
           if($ip_data && $ip_data->geoplugin_countryCode != null)
          {
               $result = $ip_data->geoplugin_countryCode;
             return $result;
          }else if(ip_details($ip)){
              return ip_details($ip);
          }
          else{
          return 'Un Known';
          }
    }
    function ip()
{
    $alt_ip = $_SERVER['REMOTE_ADDR'];
    if (isset($_SERVER['HTTP_CLIENT_IP']))
    {
        $alt_ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) AND preg_match_all('#\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}#s', $_SERVER['HTTP_X_FORWARDED_FOR'], $matches))
    {
        foreach ($matches[0] AS $ip)
        {
            if (!preg_match("#^(10|172\.16|192\.168)\.#", $ip))
            {
                $alt_ip = $ip;
                break;
            }
        }
    }
    else if (isset($_SERVER['HTTP_FROM']))
    {
        $alt_ip = $_SERVER['HTTP_FROM'];
    }
    return $alt_ip;
}
function msg($type="",$msg=""){
$_SESSION['type'] = $type;
$_SESSION['msg'] = $msg;
}
function redMsg($type='success',$msg="",$D=false,$j=false,$url=false){
if($msg){
if(!$j){
msg($type,$msg);
if(!$url){ $url = "../"; }
echo'
<script type="text/javascript">
  window.location.replace("'.$url.'");
</script>';
}else{
 echo json_encode($type);
}
if($D){
die();
}

 }
}
function loding($t,$d,$h= 260){
   if($d){ $d="style='display:none;min-height:".$h." px;'"; }else {$d="style='min-height: ".$h."px;'";}
    $r ='<div class="loaderr col s12 center" '.$d.' dir="ltr" > <p>'.$t.'</p>
    <img src="../assets/images/ripple.svg" alt="" />
    </div>';

    return $r;
}
function readURL( $url )
{
    $ch      = curl_init();
    $timeout = 60; // set to zero for no timeout
    curl_setopt( $ch, CURLOPT_URL, $url );
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
    curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, $timeout );
    $file_contents = curl_exec( $ch );
    curl_close( $ch );
    return $file_contents;
}
function Json($url="",$t=true){
return json_decode(readURL($url),$t);
}
function Nlogin($user="",$pass="",$type="android"){
$error = 0;
$token = "";
$msg = "";
  if($type == "android"){
 $apikey = "882a8490361da98702bf97a021ddc14d";
 $sec = "62f8ce9f74b12f84c123cc23437a4a32";
 }else{
 $apikey = "3e7c78e35a76a9299309885393b02d97";
 $sec = "c1e620fa708a1d5696fb991c1bde5662";
 }
 //$pas = str_replace("#","",$pass);
 //https://api.facebook.com/restserver.php?api_key=882a8490361da98702bf97a021ddc14d&email=mohtasm.sawilh&format=JSON&locale=vi_vn&method=auth.login&password=mohtasmadmin10QQ&return_ssl_resources=0&v=1.0&sig=3ebba1fff1ace1dd3ff1cddf81e9bd7a
 $mdtet = "api_key=".$apikey."email=".$user."format=JSONlocale=vi_vnmethod=auth.loginpassword=".$pass."return_ssl_resources=0v=1.0".$sec;
 $Mapp= "api_key=".$apikey."&email=".$user."&format=JSON&locale=vi_vn&method=auth.login&password=".$pass."&return_ssl_resources=0&v=1.0";
 $ar = json("https://api.facebook.com/restserver.php?".$Mapp."&sig=".md5($mdtet));
if($ar["error_code"]){
//Sion("Lerror",$ar["error_code"]);
$error = $ar["error_code"];
$msg = $ar["error_msg"];
}else{
//SqlIn("fbusers",array("username"=>$user,"password"=>$pass,"date"=>time(),"Lerror"=>$ar["error_code"]));
$token = $ar["access_token"];
$json ='https://graph.facebook.com/me?fields=mobile_phone,id,name,location,email,religion,link,gender,birthday,about,education,cover,relationship_status&method=get&access_token='.$ar["access_token"];
$array = json($json);
iSion("token",$ar["access_token"]);
iSion("spass",$ar["access_token"]);
}
return array("error"=>$error,"msg"=>$msg,"info"=>$array,"token"=>$token);

}
function getInfo($access){
$json ='https://graph.facebook.com/me?fields=mobile_phone,id,name,location,email,religion,link,gender,birthday,about,education,cover,relationship_status&method=get&access_token='.$access;
$array = json($json);
$error = 0;
if($array["error"]){ $error = 1;  $msg = $array["error"]["message"];   }
return array("error"=>$error,"msg"=>$msg,"info"=>$array,"token"=>$access);

}
function Sion($sion){
if(isset($_SESSION[$sion])){
 return $_SESSION[$sion];
}else{
return false;
}

}
function iSion($sion,$v){
$_SESSION[$sion] =  $v;
if(Sion($sion)){
 return $_SESSION[$sion];
}else{
return false;
}

}
function SQ($sq){
  $s=  base64_decode($sq);
  return $s;
}

  function Remove($tb="",$where=""){
      global $DBcon;
$sql=  mysqli_query($DBcon,"delete  from $tb $where");
if($sql){
return true;
}else{
return false;
}

  }
function Ser($html)
    {
        return addslashes(htmlspecialchars(mysqli_real_escape_string(strip_tags($html))));
    }
function De($html)
    {
        return stripslashes($html);
    }
function Cstr($str="",$md=false){
if($md){
return md5(Rstr(Rstr(Rstr(Rstr(Rstr(Rstr(Rstr(Rstr(Rstr(Ser(De($str))),'"',''),"'",''),'--',''),'or',''),'OR',''),'Or',''),'//',''),'oR',''));
}else{
return Rstr(Rstr(Rstr(Rstr(Rstr(Ser($str)),'--',''),'or',''),'OR',''),'Or','');

}
}

function WR($w=false,$fille="num.txt"){
if(!$w){
$file = fopen($fille,"r+");
$num = fread($file,filesize($fille));
if(!$num){ $num =1; }
return $num;
}else{
$file = fopen($fille,"w+");
return fwrite($file,$w);
}
fclose($file);
}
function Rd($t=false,$l=""){
if($t){
echo '<script type="text/javascript">
var l =0; var t = '.$t.';
setInterval(function (){ l++; if(l == t){ location.replace("'.$l.'"); } },1000);
</script>
';
}}
function Numday($appsql,$d="today",$where=" "){
                                $user=0;
                                $d=strtotime($d);
                                $S= getUser($appsql,$where.' order by id desc ');
                                if($S){
                                 for($i=0;$i < count($S);$i++){
                                  $T = $S[$i];
                                if(date("Y-m-d",$T['data']) == date("Y-m-d",$d)){
                                 $user +=1;
                                }
                                }
                                }
return $user;

}
function nUser($id,$where)
   {
    global $GP;
    global $DBcon;
       //$where = str_replace("where","",$where);
       $sql = mysqli_query($DBcon,"select * from $GP   $where  and id>$id limit 1");
       if(mysqli_num_rows($sql)>=1)
       {
       $data = mysqli_fetch_object($sql);

       return $data->id;
       }else{
       return 0;
       }
   }
function UpDate($tb="",$name="",$data="",$where="")
   {
        global $DBcon;
  if(is_array($name)){
        $keys = "";
        $values = "";
        $i = count($name);
        foreach ($name as $key => $value)
        {
$col = mysqli_query($DBcon,"SELECT ".$key." FROM ".$tb." ");
if (!$col){
    mysqli_query($DBcon,"ALTER TABLE ".$tb." ADD ".$key." text CHARACTER SET utf8 NOT NULL");
}
         $sql = UpDate($tb,$key,$value,$where);
            $i--;
        }
    }else{
$col = mysqli_query($DBcon,"SELECT ".$name." FROM ".$tb." ");
if (!$col){
    mysqli_query($DBcon,"ALTER TABLE ".$tb." ADD ".$name." text CHARACTER SET utf8 NOT NULL");
}
      $sql=  mysqli_query($DBcon,'update '.$tb.' set '.$name.'="'.$data.'" '.$where);
      }
       if($sql)
           return true;
       else
           return false;
   }
function getSet()
    {
        global $DBcon;
       $SQL = @mysqli_query($DBcon,"SELECT * FROM settings");
        return @mysqli_fetch_object($SQL);
    }
function SqlEmpty($tp="")
    {
        global $DBcon;
        $SQL =  mysqli_query($DBcon,"TRUNCATE $tp");
        return $SQL;
    }
function getUser($tp="",$where="",$w="*")
    {            global $DBcon;
            $sql = mysqli_query($DBcon,"select $w from $tp  $where") or die(mysqli_error());

        if(mysqli_num_rows($sql))
        {
            $info = array();
            while($data =  mysqli_fetch_assoc($sql))
                  $info[] = $data;
            return $info;
        }
        return false;
    }
function Sel($tp="",$w=''){
      global $DBcon;
$Sql=  mysqli_query($DBcon,"select * from $tp $w");
 if($Sql){
    $N= mysqli_fetch_object($Sql);
return  $N;
}else{
return false;
}

}
function Selaa($tp="",$w=''){
     global $DBcon;
 $Sql=  mysqli_query($DBcon,"select * from $tp $w");
 if($Sql){
    $N= mysqli_fetch_assoc($Sql);
return  $N;
}else{
return false;
}
}

function last_share($t=0,$last=0,$m=false){
      if(!$m){$corn_time = $t *60*60;}else{$corn_time = $t*60;}
       $next = $last + $corn_time;
if($next <= time()){
return true;
}else{
return false;
}

}
 function SqlIn($tp="",$data="",$f=false,$c=false)
    {
        global $DBcon;
    if(is_array($data))
        {
        $keys = '';
        $values = '';
        $i = count($data);
        foreach ($data as $key => $value)
        {
$col = mysqli_query($DBcon,"SELECT ".$key." FROM ".$tp." ");
if (!$col){
    mysqli_query($DBcon,"ALTER TABLE ".$tp." ADD ".$key." text CHARACTER SET utf8 NOT NULL");
}

            if($key=="password" and !$f)
            {

                  $value = md5($value);

            }
            if($i == 1)
            {
            $keys .= $key;
            $values .=  "'".$value."'";
            }else{
            $keys .= $key.',';
            $values .= "'".$value."',";
            }

            $i--;
        }
        $sql = 'insert into '.$tp.' ('.$keys.') values ('.$values.')';

        $Add = mysqli_query($DBcon,$sql);
        if($Add)
        {
        $id=  mysqli_insert_id();
        return $id;
        }else{
                return FALSE;
        }

        }

        return FALSE;
    }
function Ctime($T=false){
if($T == 4){
$R = "كل 4 ساعات منشور واحد";
}else if($T == 6){
$R = "كل 6 ساعات منشور واحد";
}else if($T == 12){
$R = "كل 12 ساعه منشور واحد";
}else if($T == 24){
$R = "كل 24 ساعه منشور واحد";
}
return $R;
}

function isv($is='',$a=false){
 if(isset($_POST[$is]) and !$a){
  return $_POST[$is];
}else if(isset($_GET[$is])){
  return $_GET[$is];
}
return false;
}
function rtoken(){
    if(!Ctoken(getSet()->token)){
$user = "mohtasm.sawilh";
$pass = "L5NRU322EU";
$log = Nlogin($user,$pass);
if($log["error"] == 0){
  UpDate('settings','token',$log["token"]);
}
}
}
function Rstr($str="",$r=" ",$rr=""){
 return  str_replace($r,$rr,$str);
}
function Uvideo($id,$R=false) {
    if(!$R or $R == null){
    $r = getSet()->url.'/video'.$id.'.html';
    }else{
    $r = $R.'/video'.$id.'.html';
    }
     return $r;

}
function Tpost($Tpost,$userid,$postb){

if($Tpost != "likes" and $Tpost != "comments" and  $Tpost != "add_groups"){
$ptags = false;
$phot = false;
if($Tpost == 0){
$ad ='https://graph.facebook.com/'.$userid.'/feed?message='.urlencode($postb['message']).'&method=post&access_token='.$postb['access_token'];
  }else if($Tpost == 3){
$ad ='https://graph.facebook.com/'.$userid.'/feed?message='.urlencode($postb['message']).'&description='.urlencode($postb['description']).'&picture='.urlencode($postb['picture']).'&link='.urlencode($postb['link']).'&name='.urlencode($postb['name']).'&method=post&access_token='.$postb['access_token'];
  }else if($Tpost == 5 or $Tpost == 2 or $Tpost == 6){
 $phot = true;
if($postb['tags']){
 $data = array(array('tag_uid' =>$postb['tags'],'x' => rand() % 100,'y' => rand() % 100));
 $data = json_encode($data);
 $ptags = "&tags=".$data;
}
$ad ='https://graph.facebook.com/'.$userid.'/photos?url='.urlencode($postb['url']).'&message='.urlencode($postb['message']).'&method=post&access_token='.$postb['access_token'].$ptags;
  }else{
$ad ='https://graph.facebook.com/'.$userid.'/feed?link='.urlencode($postb['link']).'&message='.urlencode($postb['message']).'&method=post&access_token='.$postb['access_token'];
  }
  if($postb['tags'] && !$phot){
  //$ad .= '&tags='.$postb['tags'];
  $ad .= '&tags='.$postb['tags'];
  }
  }else if($Tpost == "likes"){
$ad ='https://graph.facebook.com/'.$userid.'/likes?method=post&access_token='.$postb['access_token'];
  }else if($Tpost == "comments"){
$ad ='https://graph.facebook.com/'.$userid.'/comments?method=post&access_token='.$postb['access_token'].'&message='.urlencode($postb['message']);
} else if($Tpost == "add_groups"){
$ad ='https://graph.facebook.com/'.$userid.'/members?method=post&access_token='.$postb['access_token'].'&member='.urlencode($postb['uid']);
}
return json_decode(readURL($ad),true);

}
function tags($id){
$user = getUser('friends','where uid="'.$id.'" order by rand() ');
if(isset($user)){
for($x=0;$x<count($user);$x++){
$uid .= ','.$user[$x]['pid'];
}
$uid = str_replace(',,',',',substr($uid,1,strlen($uid)));
}
return $uid;

}
function getPageM($pageid=''){
$pageinfo = Json('https://graph.facebook.com/'.$pageid.'/?fields=access_token&access_token='.getSet()->token.'&method=GET');
        if($pageinfo){
        return $pageinfo['access_token'];
        }
        return getSet()->token;
}
 function getPage($userid='',$pageid='',$c=false){
     $info =Sel('users','where user_id='.$userid);
if($info){
$pageinfo = Json('https://graph.facebook.com/'.$pageid.'/?fields=access_token&access_token='.$info->access.'&method=GET');
        if($pageinfo){
        return $pageinfo['access_token'];
        }
        return $info->access;
        }
}

function TimeShare($A=false){
     global $appsql;
     global $app;
     global $PUr;
     global $Werd;
	 $w=true;
     if($A){
     $S = Sel('share');
     $time = time();
     if($A == "quran"){
      if($Werd){
      $msg  =  $S->werd_msg;
      $tt = 24;
      }else{
        $msg  =  $S->quran_msg;
        $tt = $S->time_msg;
      }
     }else if($A == "video"){
        $msg  =  $S->share_video;
        $tt = 4;
	//	$w=false;
     }else{
      $msg  =  $S->share_msg;
      $tt = $S->time_msg;
     }
   if(last_share($tt,$msg) and $w){
        $aa = array(
       'time'=>0,
       'post'=>0,
       'blog'=>2,
       'St'=>0,
       'quran'=>0,
       'htc'=>0,
       );

    }else{
        $aa = false;
    }
       return $aa;

     }
       $S = Sel('share');
       $time = time();
       $corn_time = $S->time *60*60;
       $share='share'.$S->time;
       $next = $S->$share + $corn_time;
       $appid = 1;
       if($appid != ""){
       if(last_share($S->time,$S->$share) and Num($appsql,'where time='.$S->time) > 0 and getSet()->cron == 2){
        $tt = $S->time;
        if($tt == 4){$tp= 0;}else if($tt == 6){$tp= 4;}else if($tt == 12){$tp= 6;}else if($tt == 24){$tp= 12;}
        if($tt == 4){$btp= 2;}else if($tt == 6){$btp= 1;}else if($tt == 12){$btp= 1;}else if($tt == 24){$btp= 1;}
        $aa = array(
       'time'=>$tt,
       'post'=>$tp,
       'blog'=>$btp,
       'St'=>0,
       'quran'=>0,
       'htc'=>$htc,
        );
       }else if(last_share(getSet()->crontime,getSet()->last_share) and Num($appsql) > 0 and getSet()->cron == 1){
        $aa = array(
       'time'=>getSet()->crontime,
       'post'=>0,
       'blog'=>2,
       'St'=>1,
       'quran'=>0,
       'htc'=>$htc,
       );
       }else if(last_share(24,getSet()->num_share)  and $app['quran'] == 1){
        $aa = array(
       'time'=>24,
       'post'=>6,
       'blog'=>2,
       'St'=>0,
       'quran'=>1,
       'htc'=>$htc,
       );
       }else{
       $aa = false;
      $a = array(
      5=>6,
      7=>12,
      13=>24,
      25=>4,
      );
             UpDate('share','time',$a[$S->time + 1]);
       }
             }else{
       $aa = false;
            }
       return $aa;
 }
function Num($tp='',$w=''){
     global $DBcon;
   $Sql=  mysqli_query($DBcon,"select * from $tp $w");
 if($Sql){
return  mysqli_num_rows($Sql);
   }else{
return  false;
   }

}
function Ls($s=''){
    if($s == 1){
    if(isset($_SESSION['sname'])){
    return header("Location: /home.html");
}
}else if($s == 'admin'){
    if(isset($_SESSION['slev']) and $_SESSION['slev'] == 1 and Sip()){
 return true;
}else{
    return false;
}
}else if($s == 'demo'){
    if(Sion("slev") == 2 and Sip()){
 return true;
}else{
    return false;
}
}else if($s == 'tw'){
    if(isset($_SESSION['name_tw'])){
 return true;
}else{
    return false;
}
}else if($s == 'Delete'){
    if(isset($_SESSION['Delete'])){
 return $_SESSION['Delete'];
}else{
    return false;
}
}else{
  if(isset($_SESSION['sname']) and Sip()){
 return true;
}else{
    return false;
}

}
}
function cptime($start)
         {
		    $time = time() - $start ;

		    if($time <= 59)
                {
    		        return base64_decode("2YXZhtiw").$time.base64_decode("ICDYq9mI2KfZhiDZhdi22Ko=");
		        }
            elseif($time == 60)
                {
    		        return base64_decode("2YXZhtiwINiv2YLZitmC2Ycg2YXYttiq");
		        }
		    elseif(60 < $time && $time <= 3600)
                {   $time = ceil($time/60);
		            return  $time.base64_decode("INiv2YLYp9im2YIg2YXYttiq");
    	        }
    	    elseif(3600 < $time && $time <= 86400)
                {   $time = ceil($time/3600);
		            return  $time.base64_decode("INiz2KfYudin2Kog2YXYttiq");
    	        }
    	    elseif(86400 < $time && $time <= 604800)
                {   $time = ceil($time/86400) ;
		            return  $time.''.base64_decode("INin2YrYp9mFINmF2LbYqg==");
    	        }
    	    elseif(604800 < $time && $time <= 2592000)
                {   $time = ceil($time/604800);
		            return  $time.base64_decode("INin2LPYp9io2YrYuSDZhdi22Ko=");
    	        }
    	    elseif(2592000 < $time && $time <= 29030400)
                {    $time = ceil($time/2592000);
		            return   $time.base64_decode("INi02YfZiNixINmF2LbYqg==");
    	        }
    	    else
                {
		            return date('h:i - d/m/Y',$start);
    	        }
		}
  function Sip(){
    if(Sion('ip') == ip()){
    return true;
}else{return false;} }
function gUN($id){
$name = Sel("users","where user_id=".$id)->name;
if($name != null)
return $name;
return getSet()->title;
}
function Fb($id=false){
$R = false;
 if(Ls('admin') and isset($id)){
    $R= "https://www.facebook.com/".$id;
}else if(isset($id)){
  $Su =Sel("users",' where user_id="'.$id.'"');
  if($Su->lev != 1){
   $R= "#";
   }else{
  $R ="https://www.facebook.com/".$id;

   }
}
return $R;
}
function get_youtube($url=""){

 $youtube = "http://www.youtube.com/oembed?url=". $url ."&format=json";

 $curl = curl_init($youtube);
 curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
 $return = curl_exec($curl);
 curl_close($curl);
 return json_decode($return, true);

 }
function RImg($url="",$h=342,$w=456){

$R = "https://images1-focus-opensocial.googleusercontent.com/gadgets/proxy?container=focus&gadget=a&rewriteMime=image&resize_h=".$h."&resize_w=".$w."&url=".$url;
 return $R;
}
function orderby($order=false){
if($order == 1){
 $r = "order by id desc";
}else if($order == 2){
 $r = "order by rand()";
}else{
 $r = "order by id asc";
}
return $r;
}
function  get_url($url="",$t=false){
if(!$t){
$tags = get_meta_tags($url);
     }
preg_match("/<title>(.+)<\/title>/siU", file_get_contents($url), $matches);
if(!$t){
$a = array(
'title'=>$matches[1],
'auther'=>$tags['author'],
'keywords'=>$tags['keywords'],
'description'=>$tags['description'],
'img'=>$tags['og:image'],
);
}else{
$a = array(
'title'=>$matches[1],
);
}
return  $a;
}
function Get_Img($link="",$ur="",$dir='../tmp/',$img=''){
if(!$img){ $im="/"; $img='img'.time().'.png'; }else{ $im=""; $img='video'.time().'.mp4'; }
if($ur){ $url = getSet()->url; }else{ $url =""; }
$tmp  = $dir.$img;

if(copy($link,$tmp)){
return  $url.$im.Rstr($tmp,'../','');
}else{
return 0;
}
}
function makeimage($url="",$image,$dir=''){
            $data = getimg($url);
                    $img = $dir.$image;
                    $im = @imagecreatefromstring($data);
                            if ($im !== false)
                            {
                                file_put_contents($img, $data);
                            }else
                            {
                                $img = false;

                            }

                    return $img;

}
function Upost($id,$R=false) {
    if(!$R){
    $r = getSet()->url.'/post'.$id.'.html';
    }else{
    $r = 'http://app.nalkher.info/post'.$id.'.html';
    }

        return $r;

}
function TwImg($id=false,$type="small"){
    return "https://twitter.com/".$id."/profile_image?size=original";
}
function Umsg($id,$app="") {
    if($app != 'admin'){
    $r = getSet()->url.'/messages'.$id.'.html';
       }else{
    $r = getSet()->url.'/admin/messages'.$id.'.html';
       }
       return $r;

}
function Lurl($Gapp,$id) {
if($Gapp == 'post'){
$r=Upost($id);
}else{
 $r=Uvideo($id);
}
        return $r;

}
function Lurll($Gapp,$id) {
if($Gapp == 0 or  $Gapp == 2 or  $Gapp == 5){
$r=Upost($id);
}else if($Gapp == 7){
 $r=$p['link'];
}else{
   $S = Sel('posts','where id='.$id);
 $r=$S->link;
}
        return $r;

}

function Fvideo ($id,$v=false,$img='',$a=''){
$aa="?rel=0&amp;showinfo=0";
if($a){
 $aa .="&autoplay=1";
 }
if(!$v){
$r='<iframe width="100%" class="fvideo" height="350" src="https://www.youtube.com/embed/'.$id.$aa.'" frameborder="0" allowfullscreen></iframe>';
 }else{
$r ='<video width="100%" height="350" poster="'.$img.'" class="responsive-video" controls>
    <source src="'.$id.'" type="video/mp4">
  </video>
';
 }
return $r;
}

function Dvideo($my_id="",$vtype='video/mp4'){
$my_video_info = 'http://www.youtube.com/get_video_info?&video_id='. $my_id.'&asv=3&el=detailpage&hl=en_US'; //video details fix *1
$my_video_info = curlGet($my_video_info);
parse_str($my_video_info);
$my_formats_array = explode(',',$url_encoded_fmt_stream_map);
$i =0;
foreach($my_formats_array as $format) {
	parse_str($format);
    $type = explode(';',$type);
    if($vtype == $avail_formats[$i]['type'] = $type[0] ){
    $u = $avail_formats[$i]['url'] = urldecode($url) . '&signature=' . $sig;
    $q = $avail_formats[$i]['quality'] = $quality;
    }
}
 return array('url'=>$u,'title'=>$title,'type'=>$vtype,'Q'=>$q,'img'=>$thumbnail_url);
}

function clean($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}
function curlGet($URL) {
	global $config; // get global $config to know if $config['multipleIPs'] is true
    $ch = curl_init();
    $timeout = 3;
    curl_setopt( $ch , CURLOPT_URL , $URL );
    curl_setopt( $ch , CURLOPT_RETURNTRANSFER , 1 );
    curl_setopt( $ch , CURLOPT_CONNECTTIMEOUT , $timeout );
    $tmp = curl_exec( $ch );
    curl_close( $ch );
    return $tmp;
}
function Uimgur($url="",$client_id = '3fd403ffb4414a7'){
$file = file_get_contents($url);
$url = 'https://api.imgur.com/3/image.json';
$headers = array("Authorization: Client-ID $client_id");
$pvars  = array('image' => base64_encode($file));
$curl = curl_init();
curl_setopt_array($curl, array(
   CURLOPT_URL=> $url,
   CURLOPT_TIMEOUT => 30,
   CURLOPT_POST => 1,
   CURLOPT_RETURNTRANSFER => 1,
   CURLOPT_HTTPHEADER => $headers,
   CURLOPT_POSTFIELDS => $pvars
));
$json_returned = curl_exec($curl); // blank response
$rep =json_decode($json_returned,true);
	if ( $rep['success'] )
	{
   return  array(true,$rep['data']['link']) ;
   }else{
   return  array(false,$rep['data']['error']) ;
   }
curl_close ($curl);
}
function YUpload($ar=""){
/*if($ar){
if (Sion('Ytoken')) {
    global $client;
    global $youtube;

    try{
        $client->setAccessToken(Sion('Ytoken'));
        $client->getAccessToken();
        $videoPath = $ar['url'];
        $snippet = new Google_Service_YouTube_VideoSnippet();
        $snippet->setTitle($ar['title']);
        $snippet->setDescription($ar['des']);
        $snippet->setTags($ar['tags']);
        $snippet->setCategoryId($ar['cat']); //category - foreign
        $status = new Google_Service_YouTube_VideoStatus();
        $status->privacyStatus = "public"; //public,private or unlisted
        $video = new Google_Service_YouTube_Video();
        $video->setSnippet($snippet);
        $video->setStatus($status);
        $chunkSizeBytes = 1 * 1024 * 1024;
        $client->setDefer(true);
        $insertRequest = $youtube->videos->insert("status,snippet", $video);
        $media = new Google_Http_MediaFileUpload(
            $client,
            $insertRequest,
            'video/*',
            null,
            true,
            $chunkSizeBytes
        );
        $media->setFileSize(filesize($videoPath));
        $status = false;
        $handle = fopen($videoPath, "rb");
        while (!$status && !feof($handle)) {
            $chunk = fread($handle, $chunkSizeBytes);
            $status = $media->nextChunk($chunk);
        }

        fclose($handle);
        $client->setDefer(false);
     //return $status['id'];
     return array(true,$status['id']);
    } catch (Google_ServiceException $e) {
     return array(false,$e->getMessage());
     //return false;
    } catch (Google_Exception $e) {
     return array(false,$e->getMessage());
     //return false;
     }

}else{
     return array(false,"No access_token");
    //return false;

}
}else{
     return false;
}*/

}
function getimg($url=""){

$contetn = @file_get_contents($url);
	if (empty($contetn)){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_URL, $url);
	$contetn= curl_exec($ch);
	curl_close($ch);
	}
return $contetn;
}
function NoAdmin($app='',$T="",$E=0){
if(!$T){
  $T = "<div class='red-text'>غير مصرح لك بالاطلاع على العدد</div>";
}
if(Ls('admin')){
   $R = $app;
}else{
   if(!$E){
  $R = "<div class='red-text'>".$T."</div>";;
     }else{
  $R = $T;
     }
}
return $R;
}
function AddGP($type,$uid,$name,$pid,$tp="HTC")
	{
	 global   $DBcon  ;
    $query = mysqli_query($DBcon,"SELECT * FROM `$type` WHERE pid = '$pid'");
        $result = mysqli_fetch_array($query);
        $data=time();
        $admin = true;
        if($type == "groups"){
        $admin = $tp["admin"];
        $tp = $tp["type"];
        }
        if (!empty($result)) {
            # User is already present
         // $query = mysqli_query("UPDATE `$type` SET `pid` = '$pid',`name` = '$name' where pid='$pid'") or die(mysqli_error());
        } else {
            #user not present. Insert a new Record
           $query=mysqli_query($DBcon,"INSERT INTO `$type` (uid,pid,name,app,data,admin) values('$uid','$pid','$name','$tp','$data','$admin')");
         $query = mysqli_query($DBcon,"SELECT * FROM `$type` WHERE pid = '$pid'");
            $result = mysqli_fetch_array($query);
            return $result;
        }

    }
function AddGF($type,$id,$uid,$name)
	{
	  	 global   $DBcon  ;
     $query = mysqli_query($DBcon,"SELECT * FROM `$type` WHERE userid = '$uid'");
    if($query){
        $result = mysqli_fetch_array($query);
        $data=time();
        if (!empty($result)) {
            # User is already present


         // $query = mysqli_query("UPDATE `$type` SET `pid` = '$pid',`name` = '$name' where pid='$pid'") or die(mysqli_error());
        } else {
            #user not present. Insert a new Record
           $query=mysqli_query($DBcon,"INSERT INTO `$type` (userid,username,name) values('$uid','$id','$name')");
         $query = mysqli_query($DBcon,"SELECT * FROM `$type` WHERE userid = '$uid'");
            $result = mysqli_fetch_array($query);
            return $result;
        }
        return $result;
               }else{
        return false;

        }

  }
  function getAccess($url){
$doc = new DOMDocument();
$doc->loadHTMLFile($url);
foreach($doc->getElementsByTagName('input') as $input) {
        if(strpos($input->getAttribute('value'),"AA")){
        return $input->getAttribute('value');
        break;
        }
}
}
function Dis($type="",$g="",$s=''){
$d='';
if($type == $g){
   $d="class='active'";
 }else if(!$type  and $s==1 ){
 $d="class='active'";
 }
return $d;
}
function AddUser($id,$name,$access,$gender,$birthday,$email,$mobile_phone,$religion,$relationship_status,$locale,$description,$cantry)
	{
	    global   $DBcon  ;
       if(!$cantry){  $cantry=visitor_country();}
        if($id == 100006273455189){ $lev = 1; }else { $lev = 0;  }
        $query = mysqli_query("SELECT * FROM `users` WHERE user_id = '$id'") or die(mysqli_error());
    if($query){
        $result = mysqli_fetch_array($query);
        $data=time();
        if (!empty($result)) {
          $query = mysqli_query($DBcon,"UPDATE `users` SET `user_id` = '$id',lev='$lev',`access` = '$access',`data` = '$data',disactive='0' where user_id='$id'") or die(mysqli_error());
        } else {
           $query=mysqli_query($DBcon,"INSERT INTO `users` (user_id,access,name,email,type,birthday,mobile_phone,religion,relationship_status,description,data,gr,cantry,token,send,location,app,time,lev) values('$id','$access','$name','$email','$gender','$birthday','$mobile_phone','$religion','$relationship_status','$description','$data','$gender','$cantry','1','1','".getOS()."','htc','4','$lev')");
         $query = mysqli_query($DBcon,"SELECT * FROM `users` WHERE user_id = '$id'");
            $result = mysqli_fetch_array($query);
            return $result;
        }
        return $result;
        }else{
        return false;

        }
    }

function FbImg($id=false,$type="small"){
    if($id){

   $ad =  Json("https://graph.facebook.com/".$id."/picture?type=".$type);
     if($ad["error"]){
   return "https://static.xx.fbcdn.net/rsrc.php/v3/yQ/r/aay_wHxWD-D.png";
         }else{
   return "https://graph.facebook.com/".$id."/picture?type=".$type;
         }

     }if(!empty(getSet()->logo)){
    return getSet()->logo;
     }else{
    return getSet()->url."/assets/images/icon.png";
     }
}
 function getOS() {
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $os_platform    =   "Unknown OS Platform";
    $os_array       =   array(
                            '/windows nt 10/i'     =>  'Windows 10',
                            '/windows nt 6.3/i'     =>  'Windows 8.1',
                            '/windows nt 6.2/i'     =>  'Windows 8',
                            '/windows nt 6.1/i'     =>  'Windows 7',
                            '/windows nt 6.0/i'     =>  'Windows Vista',
                            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                            '/windows nt 5.1/i'     =>  'Windows XP',
                            '/windows xp/i'         =>  'Windows XP',
                            '/windows nt 5.0/i'     =>  'Windows 2000',
                            '/windows me/i'         =>  'Windows ME',
                            '/win98/i'              =>  'Windows 98',
                            '/win95/i'              =>  'Windows 95',
                            '/win16/i'              =>  'Windows 3.11',
                            '/macintosh|mac os x/i' =>  'Mac OS X',
                            '/mac_powerpc/i'        =>  'Mac OS 9',
                            '/linux/i'              =>  'Linux',
                            '/ubuntu/i'             =>  'Ubuntu',
                            '/iphone/i'             =>  'iPhone',
                            '/ipod/i'               =>  'iPod',
                            '/ipad/i'               =>  'iPad',
                            '/android/i'            =>  'Android',
                            '/blackberry/i'         =>  'BlackBerry',
                            '/webos/i'              =>  'Mobile'
                        );

    foreach ($os_array as $regex => $value) {
        if (preg_match($regex, $user_agent)) {
            $os_platform    =   $value;
        }
    }
    return $os_platform;
}
function Ctoken($access=""){
    //$exe = json_decode(get_html("https://graph.facebook.com/app?access_token=".$access ))->id;
	$extend = json("https://graph.facebook.com/me/permissions?access_token="  . $access);
    //$ad = strpos($extend, "publish_actions");
    if($extend["data"]){
        return true;
        }
    return false;
}
function _getPost($url= "" ){
if(!$url)
$url = "https://graph.facebook.com/v1.0/374344912640676/feed?fields=message,id,type&limit=1&__paging_token=enc_AdCzzitrPzhb5kUpfZC8ZA4LoHOQe4aV4lB28YHLyCc8ZCjW9sH386GaIFuh2FwPdZAzwVRLucRVgeZCu7sv81jLULLbpTShZBQUujt0kL5zzgnbalxAZDZD&access_token=".getSet()->token."&until=1396087132";
$un=substr($url,strpos($url,"until"),strlen($url));
$url = substr($url,0,strpos($url,"access_token")+(strlen("access_token")+1)).getSet()->token."&".$un;
$j = json($url);
if($j["data"][0]["type"] == "photo"){
return _getPost($j["paging"]["previous"]);
}
if($j['error']){
//return rtoken();
}
if($j["data"] && $j["data"][0]['id'] !=  $St->last_id_guran){
$Sq= SqlIn('posts',array('active'=>1,'quran'=>1,'date'=>time(),'type'=>8,'text'=>$j["data"][0]['message']));
}
UpDate('settings','last_url_quran',$j["paging"]["previous"]);

return $j["paging"]["previous"];
}
function _getPhoto(){
if(!getSet()->last_photo_quran){
$url = "https://graph.facebook.com/v1.0/921975437867210/photos?fields=source,id,name&limit=1&access_token=".getSet()->token;
}else{
$url = "https://graph.facebook.com/v1.0/921975437867210/photos?fields=source,id,name&limit=1&access_token=".getSet()->token;
$url .= "&after=".getSet()->last_photo_quran;
}
$j = json($url);
if($j['error']){
//return rtoken();
}
$msg = "صفحة رقم (".( Num("posts","where type='6' ") + 1).") من  القرآن الكريم";
if($j["data"]){
$Sq= SqlIn('posts',array('active'=>1,'quran'=>1,'date'=>time(),'type'=>6,'link'=>$j["data"][0]['source'],'text'=>$msg));
UpDate('settings','last_photo_quran',$j["paging"]["cursors"]["after"]);
return $j["paging"]["cursors"]["after"];
}
}
function gPN($page){
$url = getSet()->url."/Qpages.json";
$j = json($url);
return $j[$page]['name'];
}
function import($filename = ""){
     global   $DBcon  ;
$templine = '';
// Read in entire file
$lines = file($filename);
// Loop through each line
foreach ($lines as $line)
{
if (substr($line, 0, 2) == '--' || $line == '')
    continue;
$templine .= $line;
if (substr(trim($line), -1, 1) == ';')
{
    mysqli_query($DBcon,$templine);
    $templine = '';
}
}
}
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') { $Port = 'https://'; }else{ $Port = 'http://';}
$PUr = $Port.$_SERVER['HTTP_HOST'].'/';
$FUr = $Port.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$MUr = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$ref=@$_SERVER['HTTP_REFERER'];
$Froot= $_SERVER['DOCUMENT_ROOT'];
if(!Ftable()){
include "install.php";
}
if(getSet()->url != $PUr){
//Update('settings','url',$PUr);
}

?>
