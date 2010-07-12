<?php

include("../../common/lib.php");

notLogin("../../login.php");

$page_id = $_POST["page_id"];

//画像アップロードの処理
if(isset($_POST['up'])){

    //$month = date(Y/m);

    //サイトのURLを取得
    $row_site = site_data();
    $site_url = $row_site["site_url"];
    
    //なんかFILEが送られないよ！
    //var_dump($_FILES["up_img"]);
    $up_img = upload_img("upload_img", "../../../penguin/upload_img/");
    
    //ファイル形式が画像じゃない場合
    if($up_img == ka_error){
        $_SESSION["up_img"] = "<p>アップロードエラー！画像形式は、JPG、GIF、PNGのみアップロード可能。</p>";
        url_get("index.php?page_id={$page_id}");
    }
    
    //画像未選択の場合
    if($up_img == non_error){
        $_SESSION["up_img"] = "<p>アップロードエラー！画像ファイルが選択されていません。</p>";
        url_get("index.php?page_id={$page_id}");
    }
    
    $_SESSION["up_img"] = "<p class='nonF'>アップロード完了しました。<br />ファイルのパス：<input type='text' value='{$site_url}/upload_img/{$up_img}' onclick='this.focus();this.select()' readonly='' size='70'></p>";
    
    url_get("index.php?page_id={$page_id}");

}

//ポストされてなかったら、各編集画面へ戻す
if(!isset($_POST["sub0"]) && !isset($_POST["sub1"])){
    url_get("index.php?page_id={$page_id}");
}

//未入力の項目にエラーで返す
$m = "";

if ($_POST["page_title"] == ""){
    $m .= "<p>タイトルを入力して下さい。</p>";
}
if ($_POST["page_text"] == ""){
    $m .= "<p>本文を入力して下さい。</p>";
}

if($m != ""){
    $_SESSION["message"] = $m;
    url_get("index.php?page_id={$page_id}");
}

//送られてきたページのデータを入れてく
$table = "page";

$page_title = $_POST["page_title"];
$value = "page_title='{$page_title}'";

if($_POST["cat_id"] != ""){
    $cat_id = $_POST["cat_id"];
    $value .= ",cat_id='{$cat_id}'";
} else {
    $value .= ",cat_id='0'";
}    

$page_text = $_POST["page_text"];
$value .= ",page_text='{$page_text}'";

if($_POST["page_next"] != ""){
    $page_next = $_POST["page_next"];
    $value .= ",page_next='{$page_next}'";
}

$retu .= ",page_date";
$page_date = $_POST["page_date"];
$value .= ",page_date='{$page_date}'";

//制作者は変更されない
/*$user_id = $_POST["user_id"];
$value .= ",user_id='{$user_id}'";*/

if(isset($_POST["sub0"])){
    $value .= ",page_state='0'";
} else if(isset($_POST["sub1"])){
    $value .= ",page_state='1'";
}

$rule = " WHERE page_id='{$page_id}'";

//データベースにデータを上書き
$result = update($table,$value,$rule);

$row_site = site_data();

$site_url = $row_site["site_url"];


if($result){
    $_SESSION["message"] = "<p>編集が完了しました。<a href='{$site_url}/page.php?page_id={$page_id}' target='_blank'>ページを確認</a></p>";
    url_get("index.php?page_id={$page_id}");
    
} else {
    $_SESSION["message"] = "<p>編集失敗しました。</p>";
    url_get("index.php?page_id={$page_id}");
}

?>