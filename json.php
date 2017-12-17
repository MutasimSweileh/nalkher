<?php
include"inc.php";
if(isv("set")){
$convert_to_array = explode(',',isv("set"));
$convert_to_array2 = explode(',',isv("val"));
for($i=0; $i < count($convert_to_array ); $i++){
    $key_value = explode(',', $convert_to_array [$i]);
    $key_value2 = explode(',', $convert_to_array2[$i]);
    $end_array[$key_value [0]] = $key_value2 [0];
}
$msg = "خطأ فى قاعدة البيانات ";
$code = "sql_error";
if(Num(isv("table"),"where $convert_to_array[0]='".$convert_to_array2[0]."'")){
$Sql = false;
if(isv("up")){
$Sql =  UpDate(isv("table"),$end_array,null,"where $convert_to_array[0]='".$convert_to_array2[0]."'");
}else{
  $msg = "البيانات مسجله  بالفعل ";
  $code = "sql_agin";
}
}else{
$Sql =  SqlIn(isv("table"),$end_array);
}
if($Sql){
  echo json_encode(array('success' =>true,"code"=>$code,"msg"=>"تم الحفظ بنجاح "));
}else{
    echo json_encode(array('success' =>false,"code"=>$code,"msg"=>$msg));
}
}else if (isv("get")) {
  $convert_to_array = explode(',',isv("val"));
  echo json_encode(getUser(isv("table"),"where $convert_to_array[0]='".$convert_to_array2[1]."'"));
}
?>
