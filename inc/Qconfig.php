<?php
$localhost="localhost";
$UserDb="root";    /// ��� ������ �������
$PassDb="mohtasm10A"; ///  ��������
$NameDb="qurani_nedaalkher_net";  /// ��� �������
/************************************************/
@mysql_connect($localhost,$UserDb,$PassDb);
@mysql_select_db($NameDb);

@mysql_query("set character_set_server='utf8'");
mysql_query("SET NAMES 'utf8'");
date_default_timezone_set("Africa/Cairo");
define('MyConst', TRUE);
define('inc', TRUE);

?>