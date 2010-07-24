<?php

include("common/lib.php");

notPost("login.php");

$m = "";

if($_POST["user_name"] == ""){
    $m .= "<p>アカウント名を入力してください。</p>";
} else {
    $user_name = htmlspecialchars($_POST["user_name"],ENT_QUOTES,"UTF-8");
}
if($_POST["user_pass"] == ""){
    $m .= "<p>パスワードを入力してください。</p>";
} else {
    $user_pass = htmlspecialchars($_POST["user_pass"],ENT_QUOTES,"UTF-8");
}

if($m != ""){
    $_SESSION["message"] = $m;
    url_get("login.php");
}

$conn = connectDB();//DB接続

$user_name = mysql_real_escape_string(trim($user_name)); //入力されたユーザー名から余計な空白を抜く
$user_pass = sha1(trim($user_pass)); //入力されたパスワードを
        
$sql = "SELECT user_id,user_name FROM user ";
$sql .= "WHERE user_name='{$user_name}' AND user_pass='{$user_pass}'"; // SQL文でidとパスワードを持ってくる
    
$result = mysql_query($sql);
$num = mysql_num_rows($result);

if($num == 1){
    //入力したのと一致する値があれば、ログイン成功時のURLへ飛ばす
    
    $row = mysql_fetch_array($result);
        
    $_SESSION["login"] = $row["user_id"]; //ログイン時のユーザ番号を保持

    url_get("index.php");
            
} else {
    $_SESSION["message"] = "true";
    url_get("login.php");
}
        
    $cls=mysql_close($conn);
    

?>