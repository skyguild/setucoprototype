<?php

include( "../common/lib.php");

notLogin();

$m = "";

if(isset($_SESSION["del_tag_id"])){
    $tag_no = $_SESSION["del_tag_id"];
    $_SESSION["del_tag_id"] = NULL;

    if($tag_no != 0){

        $result_d = call_data("tag_name","tag"," WHERE tag_id='{$tag_no}'");
        $row_d = mysql_fetch_array($result_d);

        $r = delete("tag","tag_id='{$tag_no}'");

        if($r == ok){
            $m .= "<p>「{$row_d[0]}」を削除しました。</p>";
        } else if($r == ng){
            $m .= "<p>失敗しました。</p>";
        }
    }

    if($m != ""){
        $_SESSION["message"] = $m;
        url_get("index.php");
    }

}

notPost("index.php");

//タグ名変更か、新規追加時のキャンセル
if($_POST["sub"] == "キャンセル"){
    url_get("index.php");
}

//タグ名変更
if($_POST["sub"] == "保存"){

    if($_POST["tag_new"]==""){

        $m .= "<p>タグ名を空白にはできません。</p>";
        $_SESSION["message"] = $m;
        url_get("index.php");

    }

    $tag_new = htmlspecialchars($_POST["tag_new"],ENT_QUOTES,"UTF-8");
    $tag_no = $_POST["tag_no"];

    $result_c = call_data("tag_name","tag"," WHERE tag_id='{$tag_no}'");
    $row_c = mysql_fetch_array($result_c);

    update("tag","tag_name='{$tag_new}'"," WHERE tag_id='{$tag_no}'");

    $m = "<p>「{$row_c["0"]}」を「{$tag_new}」に変更しました。</p>";
}

//新規追加
if($_POST["sub"] == "追加"){
    $table = "tag";

    $retu = "tag_name";

    $tag_name = htmlspecialchars($_POST["tag_name"],ENT_QUOTES,"UTF-8");

    $value = "'{$tag_name}'";

    $result = add_data($table,$retu,$value);

    if($result){
        $m .= "<p>{$tag_name}を作成しました。</p>";
    } else {
        $m .=  "<p>失敗しました。同じタグ名のものがないかご確認ください。</p>";
    }
}

if($m != ""){
    $_SESSION["message"] = $m;
    url_get("index.php");
}

?>