<?php

notLogin("../login.php");

echo <<<Head

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja">

<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="content-style-type" content="text/css" />
    <meta http-equiv="content-script-type" content="text/javascript" />

    <meta name="author" content="{$admin_name}" />
    <meta name="copyright" content="{$site_name}" />
    <meta name="generator" content="LegendCMS" />
    <meta http-equiv="imagetoolbar" content="no" />

    <meta name="description" content="{$site_description}" />
    <meta name="keywords" content="{$site_keyword}" />

    <link rel="start" href="{$site_url}" title="このブログのトップページ" />
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />

    <!-- lightBox -->
    <link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
    <script src="js/prototype.js" type="text/javascript"></script>
    <script src="js/scriptaculous.js?load=effects,builder" type="text/javascript"></script>
    <script src="js/lightbox.js" type="text/javascript"></script>
    <!-- / lightBox -->

    <script src="js/smoothscrol.js" type="text/javascript"></script>

    <title>{$site_name}</title>

</head>


Head;

?>