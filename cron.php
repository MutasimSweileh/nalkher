<?php
include "inc.php";
$St =    getSet();
$access = $St->token;
$quran = "https://graph.facebook.com/374344912640676/feed?fields=message,id&limit=1&access_token=".$access;
 $rnd = rand(1,2);
if(isv("quran")){
if(last_share($rnd,$St->last_get_quran)){
$json = Json($quran)["data"];
if($json and $json[0]['id'] !=  $St->last_id_guran ){
$Sq= SqlIn('posts',array('active'=>1,'quran'=>1,'date'=>time(),'type'=>8,'text'=>$json[0]['message']));
if($Sq){
UpDate('settings','last_get_quran',time());
UpDate('settings','last_id_guran',$json[0]['id']);
}
 }else{
     UpDate('settings','last_get_quran',time());
    // rtoken();
 }
 }
//_getPost($St->last_url_quran);
//_getPhoto();


}
if(isv("post")  && $St->zapier == 0){
     $user_share = user_share();
    if(last_share($rnd,$St->last_share) or $user_share || isv("post") == "test"){
   $type = 8;
   if(!$user_share){
   $users = array(1426100954327128,1762976253974690);
   $post =  Sel('posts',"where  send='0' and active='1' and type='$type' order by id asc");
   UpDate('settings','last_share',time());
 }else{
if($user_share["PostTo"] == "pages"){
  $users = getUser("pages",$user_share["wr"]);
  }else  if($user_share["PostTo"] == "groups"){
  $users = getUser("groups",$user_share["wr"]);
  }else{
  $users = getUser("users","where user_id=".$user_share["user"]);

}

   $post =  Sel('posts',"where  id=".$user_share["id"]);
   UpDate("posts","Tsend",1,"where id=".$post->id);
 }
 UpDate("posts","send",1,"where id=".$post->id);
 UpDate("posts","msg",1,"where id=".$post->id);
$postTo  = $post->PostTo;
   if(!$post && !$user_share){
          UpDate("posts","send",0,"where type='$type' ");
          die();
       }
   $postb['message'] = html_entity_decode(stripslashes(str_replace('\n','
        ',$post->text)));
   $postb['message'] .="
  خدمة التنبيه بالرسائل القصيره ==> http://m.me/Ned2.Al5er";

        if ($post->type == 2 or $post->type== 5 or $post->type == 6){
           $postb['url'] = $post->url;
         }else if ($post->type == 1 or $post->type == 7 or $post->type == 4){
           $postb['link'] =$post->url;
           if($post->type == 7)
           $postb['link'] = Uvideo($post->vid);
          }


  for($i=0;$i<count($users);$i++){
           $userb= $users[$i];
           if(!$user_share){
           $postb['access_token'] =getPageM($userb);
         }else if($postTo == "pages"){
           $postb['access_token'] =getPage($userb['uid'],$userb['pid']);
           $userb = $userb['pid'];
         }else if($postTo == "groups"){
           $u= Sel("users",'where user_id='.$userb['uid']);
           $postb['access_token'] =$u->access;
         }else{
          $postb['access_token'] = $userb['access'];
          $userb = $userb['user_id'];
         }
           $ad =Tpost($post->type,$userb,$postb);
           if(!$ad['id']) {
           $e = $ad['error']['message'];
            //rtoken();
            if(!$user_share)
            NotToken();
            if(isv("msg"))
            echo $e."<br>";
            }else{
         if(isv("msg"))
          echo $ad['id'].'<br>';

            }

           }
       }
     if(last_share(24,$St->last_share_werd)){
   $users = array(1426100954327128,1762976253974690);
   //$users = array(1426100954327128);
   $post =  Sel('posts',"where  send='0' and active='1' and type='6' order by id asc");
   if(!$post){
          UpDate("posts","send",0,"where type='6' ");
          die();
       }
   $postb['url']  = $post->link;

   $postb['message']= "الورد اليومى
   ";
   $postb['message'] .= html_entity_decode(stripslashes(str_replace('\n','
        ',$post->text)));
   $postb['message'] .="
  خدمة التنبيه بالرسائل القصيره ==> http://m.me/Ned2.Al5er";
  UpDate("posts","send",1,"where id=".$post->id);
  UpDate("posts","msg",1,"where id=".$post->id);
  UpDate('share',"werd_id",$post->id);
  UpDate('settings','last_share_werd',time());
  $link =  Uimgur($post->link);
    if($link[0]){
    UpDate('posts',"link",$link[1]," where id=".$post->id);
    }
  for($i=0;$i<count($users);$i++){
           $userb= $users[$i];

         if($i != 0){
        $postb["tags"] = $users[0];
         }else{
         $postb["tags"] = $users[1];
         }

          $postb['access_token'] = getPageM($userb);

           $ad =Tpost($post->type,$userb,$postb);
           if(!$ad['id']) {
           $e = $ad['error']['message'];
          //echo $e."<br>";
             // rtoken();
             NotToken();
            }else{
          // echo $ad['id'];
          //Qurani.Nalkher/?ref=bookmarks
            UpDate('share',"fb_link","https://www.facebook.com/".$ad['id']);
            }

           }
       }

}

?>
