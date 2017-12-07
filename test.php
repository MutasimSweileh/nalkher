<?php
include "inc.php";

<?php  $post = getUser("posts"," order by id desc limit ".$St->numposts);
for($i = 0;$i<count($post);$i++){
    $p = $post[$i];






  ?>
