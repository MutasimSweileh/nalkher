<?php
include "inc.php";

 $post = getUser("posts"," order by id desc limit 5 ");
 $text = "";
for($i = 0;$i<count($post);$i++){
    $p = $post[$i];
    if($text == $p["text"]){
    Remove("post","where id=".$p["id"]);
    echo $p["id"]."</br>";
   }
  $text = $p["text"];

}




  ?>
