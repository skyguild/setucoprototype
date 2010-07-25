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
$page_date = date("Y-m-d H:i");

?>

<?php
    include("../../common/header.php");
    headerArea("ページの新規作成:SetucoCMS",$row_site,$login_name);
?>

                <!-- topicPath START -->
                <div id="topicPath">
                    <p><a href="../../index.php">トップ</a><img src="../../images/topicPath.gif" width="6" height="11" alt="の中の" /></p>
                    <p>ページの新規作成</p>
                </div>
                <!-- topicpath END -->

                <!-- section START -->
                <div class="section">

                    <div id="topichAreaL">

                        <div id="topichAreaR">

                            <div id="topichArea">

                                <h3><img src="../../images/h_pageNew.jpg" width="122" height="18" alt="ページの新規作成" /></h3>

                            </div>

                        </div>

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
                            <li class="inputAreaL"><a href="preview.php">プレビュー</a></li>
                            <li class="inputAreaL"><input type="submit" id="sub" name="sub" value="下書きで保存" /></li>
                            <li class="inputAreaL"><input type="submit" id="sub" name="sub" value="公開して保存" /></li>
                        </ul>

                        <dl id="inputArea">

                            <dt><label for="page_title">[必須]ページタイトル</label></dt>
                                <dd><input type="text" id="page_title" name="page_title" value="<?php print $page_title_v; ?>" /></dd>

                            <dt><label for="cat_id">カテゴリー</label></dt>
                                <dd>
                                    <select id="cat_id" name="cat_id">
                                        <?php
                                            while($row = mysql_fetch_array($result)){
                                                $cat_id = $row["cat_id"];
                                                print "<option value='{$cat_id}'";
                                                if($cat_id == 0){
                                                    print " selected='selected'";
                                                }
                                                print">{$row[1]}</option>";
                                            }
                                        ?>
                                        <option value="">－新規カテゴリーの追加－</option>
                                    </select>
                                </dd>

                            <dt style="clear:both;"><label for="cat_id">[必須]コンテンツ</label></dt>
                                <dd><textarea id="page_text" name="page_text" cols="80" rows="10"><?php print $page_text_v; ?></textarea></dd>

                            <dt><label for="page_title">ページの概要</label></dt>
                                <dd><input type="text" id="page_title" name="page_title" value="<?php print $page_title_v; ?>" /></dd>

                            <dt style="clear:both;"><label for="cat_id">タグ</label>（複数指定する場合はカンマ「,」で区切ってください）</dt>
                                <dd><input type="text" id="page_title" name="page_title" value="<?php print $page_title_v; ?>" /></dd>

                            <dt><label for="page_date">作成日時</label></dt>
                                <dd><input type="text" id="page_date" name="page_date" value="<?php print $page_date; ?>" onblur="if(this.value == '') { this.value='<?php print $page_date; ?>'; }" /></dd>
                        </dl>

                        <ul style="clear:both;">
                            <li class="inputAreaL"><a href="preview.php">プレビュー</a></li>
                            <li class="inputAreaL"><input type="submit" id="sub" name="sub" value="下書きで保存" /></li>
                            <li class="inputAreaL"><input type="submit" id="sub" name="sub" value="公開して保存" /></li>
                        </ul>

                    </form>

                </div>
                <!-- section END -->

<?php
    //フッター
    include("../../common/footer.php");
?>

</body>
</html>