<?php

include("../common/lib.php");

notLogin();
notPost("index.php");

$goal_span = htmlspecialchars($_POST["goal_span"],ENT_QUOTES,"UTF-8");
$goal_month = htmlspecialchars($_POST["goal_month"],ENT_QUOTES,"UTF-8");
$table = "goal";

$value = "goal_span='{$goal_span}',";
$value .= "goal_month='{$goal_month}'";

$rule = "";

$result = update($table,$value,$rule);

if(isset($result)){
    $_SESSION["message"] = "<p>目標設定を変更しました。</p>";
} else {
    $_SESSION["message"] = "<p>目標設定の変更に失敗しました。</p>";
}

url_get("index.php");

?>