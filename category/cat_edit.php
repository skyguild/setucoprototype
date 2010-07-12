<?php

include("../common/lib.php");

notLogin("../login.php");

$m = "";

if(isset($_SESSION["del_cat_id"])){
    $cat_no = $_SESSION["del_cat_id"];
    $_SESSION["del_cat_id"] = NULL;
    
    if($cat_no == 0){
        $m .= "<p>「未分類」は削除できません。（カテゴリー未選択時に自動選択するようになってます）</p>"; 
    } else {
    
        $result_d = call_data("cat_name","category"," WHERE cat_id='{$cat_no}'");
        $row_d = mysql_fetch_array($result_d);
        
        $r = delete("category","cat_id='{$cat_no}'");
        
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

//カテゴリー名変更か、新規追加時のキャンセル
if($_POST["sub"] == "キャンセル"){
    url_get("index.php");
}

//カテゴリー名変更
if($_POST["sub"] == "保存"){

    if($_POST["cat_new"]==""){
    
        $m .= "<p>カテゴリー名を空白にはできません。</p>";
        $_SESSION["message"] = $m;
        url_get("index.php");
        
    }

    $cat_new = htmlspecialchars($_POST["cat_new"],ENT_QUOTES,"UTF-8");
    $cat_no = $_POST["cat_no"];
    
    $result_c = call_data("cat_name","category"," WHERE cat_id='{$cat_no}'");
    $row_c = mysql_fetch_array($result_c);
    
    update("category","cat_name='{$cat_new}'"," WHERE cat_id='{$cat_no}'");
    
    $m = "<p>「{$row_c["0"]}」を「{$cat_new}」に変更しました。</p>";
}

//新規追加
if($_POST["sub"] == "追加"){
    $table = "category";
    
    $retu = "cat_name";
    //$retu .= ",cat_parent_id";
    
    $cat_name = htmlspecialchars($_POST["cat_name"],ENT_QUOTES,"UTF-8");
    //$cat_parent_id = $_POST["cat_parent_id"];
    
    $value = "'{$cat_name}'";
    //$value .= ",'{$cat_parent_id}'";
    
    $result = add_data($table,$retu,$value);
    
    if($result){
        $m .= "<p>{$cat_name}を作成しました。</p>";
    } else {
        $m .=  "<p>失敗しました。同じカテゴリー名のものがないかご確認ください。</p>";
    }
}

if($m != ""){    
    $_SESSION["message"] = $m;
    url_get("index.php");
}

?>