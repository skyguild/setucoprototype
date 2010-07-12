<?php

include( "../../common/lib.php");

notLogin("../../login.php");

//サイドナビの該当箇所をアクティブにする
$_SESSION["active"] = "pageContribution";

$login_name = login_name();

$row_site = site_data();

if(isset($_SESSION["page_title"])){
    $page_title_v = $_SESSION["page_title"];
}
if(isset($_SESSION["page_text"])){
    $page_text_v = $_SESSION["page_text"];
}
if(isset($_SESSION["page_next"])){
    $page_next_v = $_SESSION["page_next"];
}

//メッセージ表示
$m = "";

if(isset($_SESSION["message"])){
    $m .= $_SESSION["message"];
    $_SESSION["message"] = NULL;
    $m .= "<p><a href='index.php'>OK</a></p>";
}

//アップロードメッセージ表示
$up_m = "";

if(isset($_SESSION["up_img"])){
    $up_m .= $_SESSION["up_img"];
    $_SESSION["up_img"] = NULL;
    $up_m .= "<p><a href='index.php'>OK</a></p>";
}

//カテゴリーの取得
$retu="cat_id,cat_name";
$table="category";
$rule=" ORDER BY cat_name";

$result = call_data($retu,$table,$rule);

//ログインしているユーザID
$login = $_SESSION["login"];

//現在時刻
$page_date = date("Y-m-d H:i:s");

?>

<?php
	include("../../common/header.php");
	headerArea("ページの新規作成（プレビュー）:SetucoCMS",$row_site,$login_name);
?>

                <!-- topicPath START -->
                <div id="topicPath">
                    <p><a href="../../index.php">トップ</a><img src="../../images/topicPath.gif" width="6" height="11" alt="の中の" /></p>
                    <p>ページの新規作成（プレビュー）</p>
                </div>
                <!-- topicpath END -->

                <!-- section START -->
                <div class="section">

                    <div class="hArea">

                        <h3 id="textType">プレビュー</h3>

                    </div>

                    <?php

                        if($m != ""){
                            print "<div id='messageArea'>";
                            print $m;
                            print "</div>";
                        }

                    ?>

                    <form action="contribution_check.php" method="post" ENCTYPE="MULTIPART/FORM-DATA">

                        <input type="hidden" id="user_id" name="user_id" value="<?php print $login; ?>" />

                        <ul>
                            <li class="inputAreaL"><a href="index.php">編集画面に戻る</a></li>
                            <li class="inputAreaL"><input type="submit" id="sub" name="sub" value="公開して保存" /></li>
                        </ul>
						
						<p style="text-align:center;"><img src="../../images/preview.jpg" width="500" height="238" /></p>

                    </form>

                </div>
                <!-- section END -->

<?php
    //フッター
    include("../../common/footer.php");
?>

</body>
</html>