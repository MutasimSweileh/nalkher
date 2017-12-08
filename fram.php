<?php
include "inc.php";
$user = $_GET["user"];
if($user){
$pass = base64_decode($_GET["pass"]);
?>
<iframe src="<?=getLoginUrl($user,$pass)?>" id="iframeID" frameborder="0"></iframe>

<script type="text/javascript">
 window.location.replace("../?app=login&resend=true");
</script>

<?php }else{ ?>
header("Location: ../login.html");
<?php } ?>
