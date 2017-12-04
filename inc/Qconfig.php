<?php
$localhost="localhost";
$UserDb="root";    /// ÇÓã ãÓÊÎÏã ÇáÞÇÚÏå
$PassDb="mohtasm10A"; ///  ÇáÈÇÓæÑÏ
$NameDb="qurani_nedaalkher_net";  /// ÇÓã ÇáÞÇÚÏå
/************************************************/
@mysql_connect($localhost,$UserDb,$PassDb);
@mysql_select_db($NameDb);

@mysql_query("set character_set_server='utf8'");
mysql_query("SET NAMES 'utf8'");
date_default_timezone_set("Africa/Cairo");
define('MyConst', TRUE);
define('inc', TRUE);

?>