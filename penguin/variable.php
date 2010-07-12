<?php

include("../common/lib.php");

//サイトのデータ
$result_site = call_data("*","site","");
$row_site = mysql_fetch_array($result_site);

//サイトのid
$site_id  = $row_site["site_id"];

//サイトのタイトル
$site_name = $row_site["site_name"];

//サイトのURL
$site_url  = $row_site["site_url"];

//サイトの説明
$site_description  = $row_site["site_description"];

//サイトのキーワード
$site_keyword  = $row_site["site_keyword"];

//サイトの開設日
$site_date = $row_site["site_date"];


//管理者アカウントのデータ
$result_user = call_data("user_name","user"," WHERE user_id='1'");
$row_user = mysql_fetch_array($result_user);

//管理者アカウント名
$admin_name = $row_user[0];


?>