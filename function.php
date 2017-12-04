<?php
function isv($is='',$a=false){
 if(isset($_POST[$is]) and !$a){
  return $_POST[$is];
}else if(isset($_GET[$is])){
  return $_GET[$is];
}
return false;
}

?>
