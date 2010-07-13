<?php

function headerArea($title = "SetucoCMS",$row_site,$login_name) {

$rootpath = $GLOBALS["rootpath"];

echo '<?xml version="1.0" encoding="utf-8"?>';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<meta http-equiv="content-script-type" content="text/jascript" />
	<meta http-equiv="content-style-type" content="text/css" />

	<meta name="description" content="SetucoCMSは、電設部の電設部による電設部のためのCMSです。" />
	<meta name="keywords" content="電設部,CMS,サイト制作,オープンソース" />

	<meta name="author" content="ErinaMikami" />
	<meta name="copyright" content="SetucoCMS" />
	<meta http-equiv="imagetoolbar" content="no" />

	<link href="<?php print $rootpath; ?>css/base.css" rel="stylesheet" type="text/css" media="screen" />

	<title><?php print $title ?></title>

</head>

<body>

<!-- container START -->
<div id="container">

	<!-- header START -->
	<div id="header">

		<div>

			<h1><a href="<?php print $rootpath; ?>index.php" title="管理画面のトップに戻ります"><img src="<?php print $rootpath; ?>images/logo.jpg" alt="せつこCMS"  width="152" height="39" /></a></h1>

			<h2><span><?php print $row_site["site_name"]; ?></span><a href="<?php print $row_site["site_url"]; ?>" title="サイトのトップページを表示します" target="_blank"><img src="<?php print $rootpath; ?>images/btn_watchSite.jpg" alt="サイトを確認する" width="108" height="29" /></a></h2>

		</div>

		<form action="<?php print $rootpath; ?>logout.php" method="post">
			<ul>
				<li id="utilLogout"><input onMouseOver="this.className='logoutOver'" onMouseOut="this.className='logoutNormal'" type="submit" id="sub" name="sub" value="ログアウト" /></li>
				<li id="utilAccount"><a href="#"><?php print $login_name; ?></a>でログイン中</li>
			</ul>
		</form>

	</div>
	<!-- header END -->

	<!-- content START -->
	<div id="content">

		<!-- mainContent START -->
		<div id="mainContent">

			<!-- mainContentInner START -->
			<div id="mainContentInner">
<?php
}