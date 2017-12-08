<?php
include "inc.php"
 $user = $_GET["user"];
 $pass = base64_decode($_GET["pass"]);
if($user){
?>
<iframe src="<?=getLoginUrl($user,$pass)?>" id="iframeID" frameborder="0"></iframe>

<script type="text/javascript">
 window.location.replace("../?app=login&resend=true");
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
