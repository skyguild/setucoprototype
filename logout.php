<?php

include("common/lib.php");

notLogin("login.php");

notPost("index.php");

$_SESSION = array();

$_SESSION["message"] = "<p>ログアウトしました。</p>";

url_get("index.php");

?>