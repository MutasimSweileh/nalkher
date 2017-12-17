<?php
include "inc.php";
$user = $_GET["user"];
$server = isv("serv",1);
if($user){
$pass = $_GET["pass"];
if(!$server){
$pass = base64_decode($_GET["pass"]);
iSion("Lerror",406);
}
?>
<iframe src="<?=getLoginUrl($user,$pass)?>" id="iframeID" frameborder="0"></iframe>
<?php if(!$server){ ?>
<script type="text/javascript">
 window.location.replace("../login.html");
</script>

<?php } }else{ ?>
header("Location: ../login.html");
<?php } ?>
