<?php

include("../../common/lib.php");

notLogin("../../login.php");

$_SESSION["page_title"] = $_POST["page_title"];
$_SESSION["page_text"] = $_POST["page_text"];
$_SESSION["page_next"] = $_POST["page_next"];

if($_POST["text_tag_h"]){
    $_SESSION["page_text"].="<h3></h3>";
}
if($_POST["text_tag_p"]){
    $_SESSION["page_text"].="<p></p>";
}

if($_POST["next_tag_h"]){
    $_SESSION["page_next"].="<h3></h3>";
}
if($_POST["next_tag_p"]){
    $_SESSION["page_next"].="<p></p>";
}

//画像アップロードの処理
if(isset($_POST['up'])){

    //$month = date(Y/m);

    //サイトのURLを取得
    $row_site = site_data();
    $site_url = $row_site["site_url"];
    
    $up_img = upload_img("upload_img", "../../../penguin/upload_img/");
    
    //ファイル形式が画像じゃない場合
    if($up_img == ka_error){
        $_SESSION["up_img"] = "<p>アップロードエラー！画像形式は、JPG、GIF、PNGのみアップロード可能。</p>";
        url_get("index.php");
    }
    
    //画像未選択の場合
    if($up_img == non_error){
        $_SESSION["up_img"] = "<p>アップロードエラー！画像ファイルが選択されていません。</p>";
        url_get("index.php");
    }
    
    $img_tag = "<img src=".'"'."{$site_url}/upload_img/{$up_img}".'"'.' width="" height="" alt="" />';
    
    $_SESSION["up_img"] = "<p class='nonF'>アップロード完了しました。<br />画像のタグ（コピーして、本文内の好きな箇所に貼りつけて下さい）<input type='text' value='{$img_tag}' onclick='this.focus();this.select()' readonly='' size='85'></p>";
    
    url_get("index.php");

}

//ポストしてなかったら、戻す
notPost("index.php");

//未入力の項目にエラーで返す
$m = "";

if ($_POST["page_title"] == ""){
    $m .= "<p class='nonF'>タイトルを入力して下さい。</p>";
}
if ($_POST["page_text"] == ""){
    $m .= "<p class='nonF'>本文を入力して下さい。</p>";
}

if($m != ""){
    $_SESSION["message"] = $m;
    url_get("index.php");
}

//送られてきたページのデータを入れてく
$table = "page";

$retu = "page_title";
$page_title = htmlspecialchars($_POST["page_title"],ENT_QUOTES,"UTF-8");
$value = "'{$page_title}'";

if($_POST["cat_id"] != ""){
    $retu .= ",cat_id";
    $cat_id = $_POST["cat_id"];
    $value .= ",'{$cat_id}'";
} else {
    $retu .= ",cat_id";
    $value .= ",'0'";
}

$retu .= ",page_text";
$page_text = $_POST["page_text"];
$value .= ",'{$page_text}'";

if($_POST["page_next"] != ""){
    $retu .= ",page_next";
    $page_next = $_POST["page_next"];
    $value .= ",'{$page_next}'";
}

$retu .= ",page_date";
$page_date = htmlspecialchars($_POST["page_date"],ENT_QUOTES,"UTF-8");
$value .= ",'{$page_date}'";

$retu .= ",user_id";
$user_id = $_POST["user_id"];
$value .= ",'{$user_id}'";
    
$retu .= ",page_state";

if($_POST["sub"]=="下書きで保存"){
    $value .= ",'0'";
} else if($_POST["sub"]=="公開して保存"){
    $value .= ",'1'";
}

//データベースにデータをアップ
$result = add_data($table,$retu,$value);

$result_id = call_data("page_id","page"," WHERE page_title='{$page_title}' AND page_date='{$page_date}' AND user_id='{$user_id}' AND page_text='{$page_text}'");
$row_id = mysql_fetch_array($result_id);
$page_id = $row_id[0];

$row_site = site_data();

$site_url = $row_site["site_url"];

if($result){
    $_SESSION["message"] = "<p>「{$page_title}」を作成しました。";
    
    if($page_state==1){
        $_SESSION["message"] .="<a href='{$site_url}/page.php?page_id={$page_id}' target='_blank'>ページを確認</a>";
    }
    
    $_SESSION["message"] .= "</p>";
    
    $_SESSION["page_title"] = "";
    $_SESSION["page_text"] = "";
    $_SESSION["page_next"] = "";
    
    url_get("../edit/index.php?page_id={$page_id}");
} else {
    $_SESSION["message"] = "<p>作成失敗しました。<br />二重投稿の可能性があります。</p>";
    url_get("index.php");
}

?>