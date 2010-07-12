<?php

// 最初にセッションスタートする
session_start();

//設定ファイル
include("localconfig.php");

//関数をまとめたファイル

/* ------------------------ */
/* -- タブ表示			 -- */
/* ------------------------ */
function tab($t){
	echo str_repeat("\t",$t);
}

/* ------------------------ */
/* -- データベースに接続 -- */
/* ------------------------ */

function connectDB(){

//error_reporting(-1);

	$con=mysql_connect($GLOBALS["host"], $GLOBALS["user"], $GLOBALS["pass"]);
	$conn=mysql_select_db($GLOBALS["db"], $con);

	mysql_query("SET NAMES {$GLOBALS['charset']}");

	return $conn;

}

/* ------------------------- */
/* -- header関数でurl遷移 -- */
/* ------------------------- */

function url_get($url){
	header("Location:$url");
	exit();
}

/* -------------------------------------- */
/* -- ログインしてなかったら別ページへ -- */
/* -------------------------------------- */

function notLogin(){
	if(!isset($_SESSION["login"])){
		url_get($GLOBALS["rootpath"] . "login.php");
	}
}

/* ------------------------------------ */
/* -- ポストしてなかったら別ページへ -- */
/* ------------------------------------ */

function notPost($url){
	if(!isset($_POST["sub"])){
		url_get($url);
	}
}

/* -------------------- */
/* -- 結果を引き出す -- */
/* -------------------- */

function call_data($retu,$table,$rule){

	$conn = connectDB();

	$sql = "SELECT {$retu} FROM {$table}{$rule}";

	$result = mysql_query($sql);
	//var_dump($sql); //テスト用

	return $result;

	$cls=mysql_close($conn);

}

/* -------------------------------------- */
/* -- ログインしているアカウント名取得 -- */
/* -------------------------------------- */

function login_name() {
	$retu = "user_name";
	$table = "user";
	$login = $_SESSION['login'];
	$rule = " WHERE user_id = '{$login}'";

	$result = call_data($retu,$table,$rule);
	$row = mysql_fetch_array($result);
	$re = $row[0];

	return $re;
}

/* -------------------- */
/* -- アップデート   -- */
/* -------------------- */

function update($table,$value,$rule){

	$conn = connectDB();

	$sql = "UPDATE {$table} SET {$value}{$rule}";

	//var_dump($sql); //テスト用

	$result = mysql_query($sql);

	//var_dump($result); //テスト用
	return $result;

	$cls=mysql_close($conn);
}

/* ---------------------- */
/* ------ 登録処理 ------ */
/* ---------------------- */

function add_data($table,$retu,$value){
	$conn = connectDB();//DB接続

	//SQL文
	$sql = "INSERT INTO {$table} ";
	$sql .= "({$retu}) ";
	$sql .= "VALUES ({$value})";

	$result = mysql_query($sql);

	 //var_dump($sql); //テスト用
	// var_dump($result); //テスト用

	return $result;

	$cls=mysql_close($conn);

}

/* -------------------------------- */
/* ---- 削除機能			   ---- */
/* -------------------------------- */
function delete($table,$rule){
	$conn = connectDB();//DB接続

	$sql = "DELETE FROM {$table} WHERE {$rule}";

	$result = mysql_query($sql);

	//var_dump($sql);//テスト用
	//var_dump($result);//テスト用

	$r = "";

	if($result){
		$r .= "ok";
	} else {
		$r .= "ng";
	}

	return $r;

	$cls=mysql_close($conn);
}

/* -------------------------------- */
/* ---- サイトのデータ全部	   ---- */
/* -------------------------------- */
function site_data(){

	$result_site = call_data("*","site","");
	$row_site = mysql_fetch_array($result_site);

	return $row_site;

}

/* -------------------------------- */
/* ---- ファイルアップロード   ---- */
/* -------------------------------- */

//$fはフォーム投稿した時のinputタグ名。$dは保存するディレクトリ名
function upload_img($f, $d){

	$up_img = "";//アップロードしたファイルのサーバ側でのURLが入る。

    //以下のif文は、アップロードのファイルが無い場合、空文字をreturnしている。
    if($_FILES[$f]['name']==""){
		$up_img = "non_error";
		return $up_img;
	}

	if($_FILES[$f]['type']=="image/gif"){
		$ext="gif";
	} else if($_FILES[$f]['type']=="image/pjpeg" || $_FILES[$f]['type']=="image/jpeg"){
		$ext="jpg";
	} else if($_FILES[$f]['type']=="image/png"){
		$ext="png";
	} else {
		$up_img = "ka_error";
		return $up_img;
	}

	$imgname = date("Y_md_His").".".$ext;//重複名にならないように現在時刻から命名

	//var_dump($imgname);

	if(move_uploaded_file($_FILES[$f]['tmp_name'], $d.$imgname)){
		$up_img = $imgname;
	}else{
		exit("ファイルのアップロードに失敗しました。");
	}

    return $up_img;
}

?>
