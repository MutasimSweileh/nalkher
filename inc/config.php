<?php
$localhost="localhost";
$UserDb="id3740887_root";    /// ÇÓã ãÓÊÎÏã ÇáÞÇÚÏå
$PassDb="mohtasm10@@"; ///  ÇáÈÇÓæÑÏ
$NameDb="id3740887_app";  /// ÇÓã ÇáÞÇÚÏå
/************************************************/
@mysql_connect($localhost,$UserDb,$PassDb)or die('<div style="text-align: center;font-size: 21px;"><p style="font-weight:bold;color:red;">Error</p><br>'.mysql_error()."</div>");
@mysql_select_db($NameDb);
@mysql_query("set character_set_server='utf8'");
mysql_query("SET NAMES 'utf8'");
date_default_timezone_set("Africa/Cairo");

?>
