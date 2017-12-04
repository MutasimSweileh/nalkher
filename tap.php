<?php
include "inc/head.php";
include "src/google.php";
include "inc/gapi.php";
require_once( "src/facebook.php" );

echo json_encode(array(
'fb'=>"http://ap.nedalkher.com",
'tw'=>'',
'tap'=>'',
));


?>