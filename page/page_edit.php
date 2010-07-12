<?php

include("../common/lib.php");

notLogin("../login.php");

//削除
if(isset($_SESSION["del_page_id"])){
    $page_no = $_SESSION["del_page_id"];
    $_SESSION["del_page_id"] = NULL;
    
    $result_d = call_data("page_title","page"," WHERE page_id='{$page_no}'");
    
    $row_d = mysql_fetch_array($result_d);
    
    $r = delete("page","page_id='{$page_no}'");
    
    if($r == ok){
        $m .= "<p>「{$row_d[0]}」を削除しました。</p>"; 
    } else if($r == ng){
        $m .= "<p>失敗しました。</p>"; 
    }
    $_SESSION["message"] = $m;
    
    url_get("index.php");
}

notPost("index.php");

//カテゴリーか公開状態の変更のキャンセル
if($_POST["sub"] == "キャンセル"){
    url_get("index.php");
}

//カテゴリー変更
if($_POST["sub"] == "変更"){
    $cat_new = $_POST["cat_new"];
    $page_id = $_POST["page_id"];

    $result_t = call_data("page_title","page"," WHERE page_id='{$page_id}'");
    $row_t = mysql_fetch_array($result_t);
    
    $result = update("page","cat_id='{$cat_new}'"," WHERE page_id='{$page_id}'");
    
    if($result){
        $m .= "<p>「{$row_t[0]}」のカテゴリーを変更しました。</p>"; 
    } else if($result){
        $m .= "<p>変更失敗しました。</p>"; 
    }
    $_SESSION["message"] = $m;
    
    url_get("index.php");
}

//公開状態の変更
if($_POST["sub"] == "保存"){
    $state_new = $_POST["state_new"];
    $edit_page_id = $_POST["edit_page_id"];
    $result = update("page","page_state='{$state_new}'"," WHERE page_id='{$edit_page_id}'");

    $result_t = call_data("page_title","page"," WHERE page_id='{$edit_page_id}'");
    
    $row_t = mysql_fetch_array($result_t);
    
    if($result){
        $m .= "<p>「{$row_t[0]}」の公開状態を変更しました。</p>"; 
    } else if($result){
        $m .= "<p>変更失敗しました。</p>"; 
    }
    $_SESSION["message"] = $m;
    
    url_get("index.php");
}

?>