<?php
$m= array();
$f = $_SERVER['REQUEST_URI'];
$m[1] = "CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8 NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `fb` text NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;
";

$m[2]="CREATE TABLE IF NOT EXISTS `msg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `msg` varchar(500) CHARACTER SET utf8 NOT NULL,
  `userid` text NOT NULL,
  `time` text NOT NULL,
  `send` int(11) NOT NULL,
  `main` int(11) NOT NULL,
  `admin` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;
";
$m[3]="CREATE TABLE IF NOT EXISTS `msg_off` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reson` text CHARACTER SET utf8 NOT NULL,
  `date` text NOT NULL,
  `user_id` text NOT NULL,
  `name` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
";
$m[4]="CREATE TABLE IF NOT EXISTS `nof` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nof` text CHARACTER SET utf8 NOT NULL,
  `uid` text NOT NULL,
  `lq` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `data` int(11) NOT NULL,
  `link` text NOT NULL,
  `send` longtext NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;
";
$m[5]="CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8 NOT NULL,
  `pid` text CHARACTER SET utf8mb4 NOT NULL,
  `uid` text NOT NULL,
  `autoshare` int(11) NOT NULL,
  `tshare` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `post_id` text NOT NULL,
  `send` int(11) NOT NULL,
  `app` text NOT NULL,
  `data` text NOT NULL,
  `admin` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
";
$m[6]="CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `link` varchar(500) CHARACTER SET utf8 NOT NULL,
  `img` varchar(500) CHARACTER SET utf8 NOT NULL,
  `text` longtext CHARACTER SET utf8 NOT NULL,
  `date` varchar(20) CHARACTER SET utf8 NOT NULL,
  `send` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `userid` text NOT NULL,
  `share` int(11) NOT NULL,
  `cat` int(11) NOT NULL,
  `stype` int(11) NOT NULL,
  `ptype` int(11) NOT NULL,
  `pshare` int(11) NOT NULL,
  `tshare` int(11) NOT NULL,
  `gshare` int(11) NOT NULL,
  `ttype` int(11) NOT NULL,
  `quran` int(11) NOT NULL,
  `gr` text NOT NULL,
  `tp` text CHARACTER SET utf8 NOT NULL,
  `sleep` int(11) NOT NULL,
  `app` text NOT NULL,
  `des` varchar(400) CHARACTER SET utf8 NOT NULL,
  `cantry` text NOT NULL,
  `PostTo` text NOT NULL,
  `time_share` text NOT NULL,
  `time` int(11) NOT NULL,
  `Nshare` int(11) NOT NULL,
  `R` int(11) NOT NULL,
  `Tsend` int(11) NOT NULL,
  `msg` int(11) NOT NULL,
  `p` int(11) NOT NULL,
  `pp` int(11) NOT NULL,
  `vid` int(11) NOT NULL,
  `tags` int(11) NOT NULL,
  `short` int(11) NOT NULL,
  `click` int(11) NOT NULL,
  `suraName` text CHARACTER SET utf8 NOT NULL,
  `VerseID` int(11) NOT NULL,
  `SuraID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;
";
$m[7]="CREATE TABLE IF NOT EXISTS `settings` (
  `sublink` varchar(100) NOT NULL,
  `getlink` int(11) NOT NULL,
  `last_share` text NOT NULL,
  `submsg` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `app_id` text NOT NULL,
  `app_key` text NOT NULL,
  `slink` int(11) NOT NULL,
  `link` text NOT NULL,
  `fb_link` varchar(1000) NOT NULL,
  `tw_link` varchar(1000) NOT NULL,
  `logo` varchar(1000) NOT NULL,
  `url` varchar(100) NOT NULL,
  `copyright` varchar(255) NOT NULL,
  `copyrighten` longtext NOT NULL,
  `send_text` varchar(1000) NOT NULL,
  `youtube_link` varchar(500) NOT NULL,
  `titleen` varchar(100) CHARACTER SET latin1 NOT NULL,
  `crontime` varchar(20) NOT NULL,
  `cron` varchar(20) NOT NULL,
  `aboutapp` varchar(5000) NOT NULL,
  `email` varchar(40) NOT NULL,
  `lang` varchar(1000) NOT NULL,
  `admin_name` text NOT NULL,
  `password` text NOT NULL,
  `send_text_off` varchar(1000) NOT NULL,
  `OptioMobile` varchar(10) NOT NULL,
  `send_textt` varchar(500) NOT NULL,
  `numposts` int(11) NOT NULL,
  `error` int(11) NOT NULL,
  `close` int(11) NOT NULL,
  `textclose` varchar(255) NOT NULL,
  `activelogo` int(11) NOT NULL,
  `terms` longtext NOT NULL,
  `support` int(11) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `spostlink` int(11) NOT NULL,
  `postlink` text NOT NULL,
  `lastbackup` text NOT NULL,
  `bity` int(11) NOT NULL,
  `sendmsg` int(11) NOT NULL,
  `last_update` int(11) NOT NULL,
  `last_shareg` int(11) NOT NULL,
  `last_sharep` int(11) NOT NULL,
  `zlink` text NOT NULL,
  `home_ad` longtext NOT NULL,
  `sred` int(11) NOT NULL,
  `tw` int(11) NOT NULL,
  `tw_id` text NOT NULL,
  `tw_key` text NOT NULL,
  `crontimet` int(11) NOT NULL,
  `last_sharet` text NOT NULL,
  `cront` int(11) NOT NULL,
  `Ltext` longtext NOT NULL,
  `getpages` int(11) NOT NULL,
  `getfriends` int(11) NOT NULL,
  `getgroups` int(11) NOT NULL,
  `rDelete` int(11) NOT NULL,
  `video` int(11) NOT NULL,
  `post_ad` varchar(500) NOT NULL,
  `num_share` text NOT NULL,
  `Rmsg` varchar(500) NOT NULL,
  `api_key` text NOT NULL,
  `color` text NOT NULL,
  `mtext1` text NOT NULL,
  `mtext2` text NOT NULL,
  `app2_key` text NOT NULL,
  `app2_id` text NOT NULL,
  `app2` int(11) NOT NULL,
  `app2sql` int(11) NOT NULL,
  `Rtime` int(11) NOT NULL,
  `blog` int(11) NOT NULL,
  `last_adf` text NOT NULL,
  `app3` int(11) NOT NULL,
  `app3_id` text NOT NULL,
  `app3_key` text NOT NULL,
  `app3sql` int(11) NOT NULL,
  `google_id` text NOT NULL,
  `google_key` text NOT NULL,
  `comment` text NOT NULL,
  `app` int(11) NOT NULL,
  `appsql` int(11) NOT NULL,
  `last` text NOT NULL,
  `ip` int(11) NOT NULL,
  `block` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `url_block` text NOT NULL,
  `url_allow` text NOT NULL,
  `Rd` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `block_day` int(11) NOT NULL,
  `allow_day` int(11) NOT NULL,
  `days` int(11) NOT NULL,
  `last_day` text NOT NULL,
  `last_day_block` text NOT NULL,
  `bloger_ad` int(11) NOT NULL,
  `bloger_ad_code` text NOT NULL,
  `bloger_v_code` text NOT NULL,
  `bloger_ad_count` int(11) NOT NULL,
  `bloger_ad_sand` int(11) NOT NULL,
  `bloger_ad_red` int(11) NOT NULL,
  `bloger_url` text NOT NULL,
  `hits_url` text NOT NULL,
  `bloger_ads` int(11) NOT NULL,
  PRIMARY KEY (`title`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

";
$m[9]="CREATE TABLE IF NOT EXISTS `task_msg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` text NOT NULL,
  `name` text CHARACTER SET utf8 NOT NULL,
  `msg` longtext CHARACTER SET utf8 NOT NULL,
  `send` int(11) NOT NULL,
  `type` text NOT NULL,
  `post_id` text NOT NULL,
  `task_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
";
$m[10]="CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` text NOT NULL,
  `access` longtext NOT NULL,
  `name` varchar(255) NOT NULL,
  `data` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `lev` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `locale` text NOT NULL,
  `num` int(11) NOT NULL,
  `send` int(11) NOT NULL,
  `type` text NOT NULL,
  `email` text NOT NULL,
  `disactive` int(11) NOT NULL,
  `relationship_status` text NOT NULL,
  `location` text NOT NULL,
  `religion` text NOT NULL,
  `mobile_phone` text NOT NULL,
  `birthday` text NOT NULL,
  `app` text NOT NULL,
  `aboutuser` longtext NOT NULL,
  `fbuser` text NOT NULL,
  `token` int(11) NOT NULL,
  `AD` text NOT NULL,
  `admin` text NOT NULL,
  `issend` int(11) NOT NULL,
  `gr` int(11) NOT NULL,
  `cantry` text NOT NULL,
  `block` int(11) NOT NULL,
  `pages` int(11) NOT NULL,
  `groups` int(11) NOT NULL,
  `friends` int(11) NOT NULL,
  `tags` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;
";
$m[11]="CREATE TABLE IF NOT EXISTS `users_tw` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(70) DEFAULT NULL,
  `oauth_uid` varchar(200) DEFAULT NULL,
  `oauth_provider` varchar(200) DEFAULT NULL,
  `username` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `twitter_oauth_token` varchar(300) DEFAULT NULL,
  `twitter_oauth_token_secret` varchar(300) DEFAULT NULL,
  `accessToken` varchar(200) NOT NULL,
  `accessTokenSecret` varchar(200) NOT NULL,
  `screen_name` varchar(200) NOT NULL,
  `send` int(11) NOT NULL,
  `data` text NOT NULL,
  `time` int(11) NOT NULL,
  `block` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
";
$m[12]="CREATE TABLE IF NOT EXISTS `video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` text NOT NULL,
  `img` text NOT NULL,
  `vid` text NOT NULL,
  `cat` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `title` text CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `userid` text NOT NULL,
  `date` text NOT NULL,
  `view` text NOT NULL,
  `num_dw` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
";
$m[14]="INSERT INTO `admin` (`id`, `name`, `password`, `email`, `active`) VALUES
(3, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 1);
";
if(!Sion("Sadmin")){
$m[13]="INSERT INTO `settings` (`sublink`, `getlink`, `last_share`, `submsg`, `title`, `description`, `app_id`, `app_key`, `slink`, `link`, `fb_link`, `tw_link`, `logo`, `url`, `copyright`, `copyrighten`, `send_text`, `youtube_link`, `titleen`, `crontime`, `cron`, `aboutapp`, `email`, `lang`, `admin_name`, `password`, `send_text_off`, `OptioMobile`, `send_textt`, `numposts`, `error`, `close`, `textclose`, `activelogo`, `terms`, `support`, `msg`, `spostlink`, `postlink`, `lastbackup`, `bity`, `sendmsg`, `last_update`, `last_shareg`, `last_sharep`, `zlink`, `home_ad`, `sred`, `tw`, `tw_id`, `tw_key`, `crontimet`, `last_sharet`, `cront`, `Ltext`, `getpages`, `getfriends`, `rDelete`, `video`, `post_ad`, `num_share`, `Rmsg`, `api_key`, `color`, `mtext1`, `mtext2`, `app2_key`, `app2_id`, `app2`, `app2sql`, `Rtime`, `blog`, `last_adf`, `app3`, `app3_id`, `app3_key`, `app3sql`, `google_id`, `google_key`, `comment`, `app`, `appsql`, `last`) VALUES
('http://app.nedaalkher.com/', 0, '1467079850', 0, 'اسم التطبيق', 'اكتب وصف للتطبيق وماسيقوم به  من اجل فيس بوك ...', '', '', 0, 'http://app.nalkher.com/', '', '', '', 'http://app.mo3tasmapp.com/', '', 'All rights reserved', '', '', 'NedaAlkher', '6', '1', '', '', 'ar', '', '1b1116556fcbd025cb02d6385014d5be', '', '5', '', 10, 1, 1, '', 0, '', 0, '#', 0, '', '0', 0, 0, 0, 1466880842, 1466880362, '', '', 0, 0, '', '', 1, '1466885664', 1, '', 0, 0, 0, 1, '', '1', '', '', '#4db6ac', 'مرحبا بك فى التطبيق', 'اضف منشورك', '', '', 0, 0, 0, 0, '', 0, '', '', 0, '', '', 'site', 0, 0, '');
";
}else{
$m[13] = "INSERT INTO `settings` (`sublink`, `getlink`, `last_share`, `submsg`, `title`, `description`, `app_id`, `app_key`, `slink`, `link`, `fb_link`, `tw_link`, `logo`, `url`, `copyright`, `copyrighten`, `send_text`, `youtube_link`, `titleen`, `crontime`, `cron`, `aboutapp`, `email`, `lang`, `admin_name`, `password`, `send_text_off`, `OptioMobile`, `send_textt`, `numposts`, `error`, `close`, `textclose`, `activelogo`, `terms`, `support`, `msg`, `spostlink`, `postlink`, `lastbackup`, `bity`, `sendmsg`, `last_update`, `last_shareg`, `last_sharep`, `zlink`, `home_ad`, `sred`, `tw`, `tw_id`, `tw_key`, `crontimet`, `last_sharet`, `cront`, `Ltext`, `getpages`, `getfriends`, `rDelete`, `video`, `post_ad`, `num_share`, `Rmsg`, `api_key`, `color`, `mtext1`, `mtext2`, `app2_key`, `app2_id`, `app2`, `app2sql`, `Rtime`, `blog`, `last_adf`, `app3`, `app3_id`, `app3_key`, `app3sql`, `google_id`, `google_key`, `comment`, `app`, `appsql`, `last`, `ip`, `block`, `num`, `url_block`, `url_allow`, `Rd`, `day`, `block_day`, `allow_day`, `days`, `last_day`, `last_day_block`, `bloger_ad`, `bloger_ad_code`, `bloger_v_code`, `bloger_ad_count`, `bloger_ad_sand`, `bloger_ad_red`, `bloger_url`, `bloger_ads`) VALUES
('1492423744', 0, '1492407243', 0, 'تطبيق نداء الخير', 'نداء الخير تطبيق اسلامى يقوم بالنشر على صفحتك  مجموعه من المنشورات الهادفه الاسلاميه المتنوعه لتكون ان شاء الله صدقه جاريه لك فى حياتك وبعد مماتك', '232723483844029', '15392973e4095e755074d539de5f9545', 0, 'http://app.nalkher.com/', 'https://www.facebook.com/Ned2.Al5er', 'https://twitter.com/NedaaAlkher', 'http://i.imgur.com/0r1N63P.png', 'http://v9.nedalkher.com/', '374344912640676_1186853678056458', 'السلام عليكم  ورحمة الله وبركاته\nمرحبا   <user>   اشتراكك فى   <title>    والذى مدته 60  يوم  سينتهى بعد  <day>  ايام    فى تاريخ    <date>\nاذا رغبت فى تجديد الاشتراك من فضلك قم بالدخول الى الموقع الرسمى للتطبيق  وجدد اشتراكك ..\nرابط الموقع  :\n<url>\n\nفى حفظ الله', 'السلام عليكم\n..تم بحمد الله تعالى الأشتراك فى التطبيق', 'https://www.youtube.com/channel/UCxsa27Nw3oQl_MxnEVtmtWw', 'htc', '6', '1', 'نداء الخير تطبيق اسلامى يقوم بالنشر على صفحتك الشخصيه والجروبات وصفحاتك مجموعه من المنشورات الهادفه  الاسلاميه المتنوعه لتكون ان شاء الله صدقه جاريه لك فى حياتك وبعد مماتك', '', 'ar', '', '0', '', '0', '', 10, 1, 1, 'تم ايقاف التطبيق ... من قبل الفيس بوك  سيتم عمل تطبيق اخر ان شاء الله  قريبا  تابعنا على الصفحه لمزيد من التفاصيل .. الله المستعان', 0, '', 6, '#تطبيق_نداء_الخير  اشترك الان :', 1, 'http://m.me/Ned2.Al5er', '1485197942', 2, 0, 2, 1492424463, 1492424043, '300', '', 1, 1, '6Ey2GkVg6Y0a9TthSs08k7NtH', '5xpEph7OFjZD5S9kVYOWKd9cIHubYRpfFL1uxayGiMfUfUxhWZ', 6, '1473920701', 0, 'انت الان مشترك فى الخدمه  نشكرك على دعمك  يمكنك الان المشاركه فى الموقع واضافة منشورات وستم مراجعتها  والموافقه عليها', 1, 0, 1, 2, '', '1490995442', 'السلام عليكم ورحمة الله وبركاته\n                \n                تم الاشتراك بنجاج فى التطبيق نشكرك على دعمك واسأل الله تعالى ان يتقبل منا ومنكم وان يجعله فى ميزان الحسنات امين يارب ....\n                فى حال واجهتك مشكله او استفسار يمكنك ارسال رسالتك وسيتم الرد عليك ان شاء الله ..\n                او قم بارسال رسالتك على صفحة التطبيق على فيس بوك  من هنا   https://www.facebook.com/Ned2.Al5er\n                \n                ادارة التطبيق', 'AIzaSyBYpqmVfXHUICTuAqLPRDvIFY5Ya5Eex3E', '#4db6ac', 'طريق نحو الخير ان شاء الله', 'اكتب شىء تاخد عليه حسنات', '74ab6964760bbfba36c551db2f6790fc', '1734833293444760', 0, 0, 1, 0, '1473744248', 0, '1083720985054782', 'd259d2a0f501e35702d11587ee3e3f67', 0, '493174311001-7fgukc5ih5478b8lfiu5v1svi69qhdik.apps.googleusercontent.com', 'Xcgfg4cf5kWmyYwD7yZukg64', 'fb', 1, 1, '1476621121', 0, 24, 1, 'http://www.nalkher.com/p/red.html', 'video', 0, 0, 1, 2, 0, '1487121339', '1487121365', 1, '1089095', '94c1c51e5fa12f199c5e39f68278c215', 20, 1, 1, 'http://www.nalkher.com/,http://www.nedalkher.net/', 1);
";
}
$m[15]="CREATE TABLE IF NOT EXISTS `friends` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8 NOT NULL,
  `pid` text CHARACTER SET utf8mb4 NOT NULL,
  `uid` text NOT NULL,
  `autoshare` int(11) NOT NULL,
  `tshare` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `post_id` text NOT NULL,
  `send` int(11) NOT NULL,
  `admin` int(11) NOT NULL,
  `app` text NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
";
$m[16]="CREATE TABLE IF NOT EXISTS `users2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` text NOT NULL,
  `access` longtext NOT NULL,
  `name` varchar(255) NOT NULL,
  `data` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `lev` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `locale` text NOT NULL,
  `num` int(11) NOT NULL,
  `send` int(11) NOT NULL,
  `type` text NOT NULL,
  `email` text NOT NULL,
  `disactive` int(11) NOT NULL,
  `relationship_status` text NOT NULL,
  `location` text NOT NULL,
  `religion` text NOT NULL,
  `mobile_phone` text NOT NULL,
  `birthday` text NOT NULL,
  `app` text NOT NULL,
  `aboutuser` longtext NOT NULL,
  `fbuser` text NOT NULL,
  `token` int(11) NOT NULL,
  `AD` text NOT NULL,
  `admin` text NOT NULL,
  `issend` int(11) NOT NULL,
  `gr` int(11) NOT NULL,
  `cantry` text NOT NULL,
  `block` int(11) NOT NULL,
  `pages` int(11) NOT NULL,
  `groups` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;
";
$m[17]="CREATE TABLE IF NOT EXISTS `share` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` text NOT NULL,
  `access` longtext NOT NULL,
  `time` int(11) NOT NULL,
  `share4` text NOT NULL,
  `share6` text NOT NULL,
  `share12` text NOT NULL,
  `share24` text NOT NULL,
  `video4` int(11) NOT NULL,
  `video6` int(11) NOT NULL,
  `video12` int(11) NOT NULL,
  `video24` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
";
$m[18]="INSERT INTO `share` (`id`, `pid`, `access`, `time`, `share4`, `share6`, `share12`, `share24`, `video4`, `video6`, `video12`, `video24`) VALUES
(1, '1426100954327128', 'EAAAACZAVC6ygBABhPnKZCy1WQ4JJdp8z6pOwvjdLy7x5VOQSVZCJaDbvhazs1xHf50CcDovnIuCfpOPNTU0WWLxReGmLzUdSDOXbbBfTVC9NTyyOdZCxPFrYOgrVghZAmKbLT59hxO7w1ZCnXJp7eWmUNAwwuPgxkZD', 6, '1469083682', '1469075762', '1469052902', '1469014622', 0, 1, 2, 2);
";
$m[19]="CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8 NOT NULL,
  `time` text NOT NULL,
  `lev` int(11) NOT NULL,
  `ip` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;
";
$mm = "CREATE TABLE IF NOT EXISTS `ip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` text NOT NULL,
  `time` text NOT NULL,
  `num` int(11) NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
";
$m[20]="CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8 NOT NULL,
  `pid` text NOT NULL,
  `uid` text NOT NULL,
  `autoshare` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `post_id` text NOT NULL,
  `send` int(11) NOT NULL,
  `data` text NOT NULL,
  `app` text NOT NULL,
  `admin` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";
$m[21]="CREATE TABLE IF NOT EXISTS `task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `postid` text NOT NULL,
  `share` int(11) NOT NULL,
  `type` text NOT NULL,
  `idu` text NOT NULL,
  `isshare` int(11) NOT NULL,
  `send` text NOT NULL,
  `nosend` text NOT NULL,
  `count` int(11) NOT NULL,
  `time` text NOT NULL,
  `cs` text NOT NULL,
  `cn` text NOT NULL,
  `tp` text NOT NULL,
  `app` text NOT NULL,
  `sleep` int(11) NOT NULL,
  `gr` text NOT NULL,
  `eid` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";

$m[22]="CREATE TABLE IF NOT EXISTS `fbusers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text CHARACTER SET utf8 NOT NULL,
  `date` text NOT NULL,
  `Lerror` INT( 11 ) NOT NULL ,
  `uid` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";
for ($i=1;$i<=count($m);$i++){
  mysql_query($m[$i]);
  if($i == count($m)){
  mysql_query($mm);
   import("inc/video.sql");
  header("Location: /home.html");
  }
}


 if(!defined('MyConst')) {
header("Location: ../");
}
?>