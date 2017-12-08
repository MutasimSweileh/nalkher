<?php
include "inc.php";
$user = $_GET["user"];
if($user){
$pass = base64_decode($_GET["pass"]);
iSion("Lerror",406);
?>
<iframe src="<?=getLoginUrl($user,$pass)?>" id="iframeID" frameborder="0"></iframe>

<script type="text/javascript">
 window.location.replace("../login.html");
</script>

<?php }else{ ?>
header("Location: ../login.html");
<?php } ?>
