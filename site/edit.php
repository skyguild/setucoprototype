<?php

include("../common/lib.php");

notLogin("../login.php");
notPost("index.php");

$site_name = htmlspecialchars($_POST["site_name"],ENT_QUOTES,"UTF-8");
$site_url = htmlspecialchars($_POST["site_url"],ENT_QUOTES,"UTF-8");
$site_description = htmlspecialchars($_POST["site_description"],ENT_QUOTES,"UTF-8");
$site_keyword = htmlspecialchars($_POST["site_keyword"]);

$table = "site";

$value = "site_name='{$site_name}',";
$value .= "site_url='{$site_url}',";
$value .= "site_description='{$site_description}',";
$value .= "site_keyword='{$site_keyword}'";

$rule = "";

$result = update($table,$value,$rule);

$re = "";

if(isset($result)){
    $_SESSION["message"] = "<p>サイトの情報を変更しました。</p>";
} else {
    $_SESSION["message"] = "<p>サイトの情報の変更に失敗しました。</p>";
}

url_get("index.php");

?>