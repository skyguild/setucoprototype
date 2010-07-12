<?php

include("../../common/lib.php");

notLogin("../../login.php");

$login_name = login_name();

$row_site = site_data();

//各々のページを選んで飛んできていなかったら、一覧へ戻す
if(!isset($_GET["page_id"])){

    url_get("../index.php");

} else {

    $page_id = $_GET["page_id"];

}

//ログインしているユーザID
$login = $_SESSION["login"];

//メッセージを表示
$m = "";

if($_SESSION["message"]){
    $m .= $_SESSION["message"];
    $_SESSION["message"] = NULL;
    $page_id = $_GET["page_id"];
    $m .= "<p><a href='index.php?page_id={$page_id}'>OK</a></p>";
}

//アップロードメッセージ表示
$up_m = "";

if(isset($_SESSION["up_img"])){
    $up_m .= $_SESSION["up_img"];
    $_SESSION["up_img"] = NULL;
    $up_m .= "<p><a href='index.php?page_id={$page_id}'>OK</a></p>";
}

//ページのデータを取得
$retu = "*";
$table = "page";
$rule = " WHERE page_id='{$page_id}'";

//カテゴリーのデータを取得
$result = call_data($retu,$table,$rule);
$row = mysql_fetch_array($result);

$retu_c = "cat_id,cat_name";
$table_c = "category";
$rule_c = " ORDER BY cat_name";

$result_c = call_data($retu_c,$table_c,$rule_c);

?>

<?php
	include("../../common/header.php");
	headerArea("「".$row['page_title']."」の編集:SetucoCMS",$row_site,$login_name);
?>

                <!-- topicPath START -->
                <div id="topicPath">
                    <p><a href="../../index.php">トップ</a><img src="../../images/topicPath.gif" width="6" height="11" alt="の中の" /></p>
                    <p><a href="../index.php">ページの編集・削除</a><img src="../../images/topicPath.gif" width="6" height="11" alt="の中の" /></p>
                    <p>「技能五輪全国大会レポート」の編集</p>
                </div>
                <!-- topicpath END -->

                <!-- section START -->
                <div class="section">

                    <div class="hArea">

                        <h3 id="textType">「<?php print $row["page_title"]; ?>」の編集</h3>

                    </div>

                    <?php

                        if($m != ""){
                            print "<div id='messageArea'>";
                            print $m;
                            print "</div>";
                        }

                    ?>

                        <input type="hidden" id="user_id" name="user_id" value="<?php print $login; ?>" />

                        <ul>
                            <li class="inputAreaL"><a href="preview.php">プレビュー</a></li>
                            <li class="inputAreaL"><input type="submit" id="sub" name="sub" value="下書きで保存" /></li>
                            <li class="inputAreaL"><input type="submit" id="sub" name="sub" value="公開して保存" /></li>
                        </ul>

                        <dl id="inputArea">

                            <dt><label for="page_title">[必須]ページタイトル</label></dt>
                                <dd><input type="text" id="page_title" name="page_title" value="技能五輪全国大会レポート" /></dd>

                            <dt><label for="cat_id">カテゴリー</label></dt>
                                <dd>
                                    <select id="cat_id" name="cat_id">
                                        <option value="" selected="selected">カテゴリーを選択</option>
                                        <?php
                                            while($row = mysql_fetch_array($result)){
                                                $cat_id = $row["cat_id"];
                                                print "<option value='{$cat_id}'>{$row[1]}</option>";
                                            }
                                        ?>
                                    </select>
                                </dd>

                            <dt><label for="page_date">作成日時</label></dt>
                                <dd class="upload"><input type="text" id="page_date" name="page_date" value="2010-06-14 07:05:08" onblur="if(this.value == '') { this.value='<?php print $page_date; ?>'; }" /></dd>
                                <dd class="upload"><input  type="submit" class="upSub" value="時刻を更新" /></dd>

                            <dt><label for="page_title">ページの概要</label></dt>
                                <dd><input type="text" id="page_title" name="page_title" value="技能五輪全国大会のレポートです。" /></dd>

                            <dt><label for="page_title">キーワード</label></dt>
                                <dd><input type="text" id="page_title" name="page_title" value="技能五輪,茨城,PHP" /></dd>
								
                            <dt style="clear:both;"><label for="cat_id">タグ</label></dt>
								<dd class="upload">タグ <a href="#">×</a>　</dd>
								<dd class="upload">タグ2 <a href="#">×</a></dd>
                                <dd class="upload" style="clear:both;">
                                    <select id="cat_id" name="cat_id">
                                        <option value="" selected="selected">新規タグ</option>
                                        <option value="">タグ</option>
                                        <option value="">タグ2</option>
                                    </select>
                                </dd>
                                <dd class="upload"><input type="submit" class="upSub" id="up" name="up" value="追加" /></dd>

                            <dt style="clear:both;"><label for="cat_id">[必須]コンテンツ</label></dt>
                                <dd class="upload">
                                    <select id="cat_id" name="cat_id">
                                        <option value="" selected="selected">コンテンツブロックを選択</option>
                                        <option value="">大見出し</option>
                                        <option value="">中見出し</option>
                                        <option value="">小見出し</option>
                                        <option value="">極小見出し</option>
                                        <option value="">段落</option>
                                        <option value="">段落＋右画像</option>
                                        <option value="">段落＋左画像</option>
                                        <option value="">箇条書きリスト</option>
                                        <option value="">番号付きリスト</option>
                                        <option value="">定義リスト</option>
                                    </select>
                                </dd>
                                <dd class="upload"><input type="submit" class="upSub" id="up" name="up" value="挿入" /></dd>
								
                            <dd class="tags" style="clear:both;"><input type="submit" class="tag" id="" name="" value="リンク" /></dd>
                            <dd class="tags"><input type="submit" class="tag" id="" name="" value="強調" /></dd>
                            <dd class="tags"><input type="submit" class="tag" id="" name="" value="引用" /></dd>
                            <dd class="tags"><input type="submit" class="tag" id="" name="" value="コード" /></dd>
							
							<dt>大見出し　<a href="#">×</a></dt>

                                <dd><textarea id="page_text" name="page_text" cols="12" rows="1">技能五輪全国大会レポート</textarea></dd>
							
							<dt>段落　<a href="#">×</a></dt>

                                <dd><textarea id="page_text" name="page_text" cols="12" rows="2">テキスト&lt;strong&gt;テキスト&lt;/strong&gt;&lt;a href="#"&gt;テキスト&lt;/a&gt;</textarea></dd>
							
							<dt>中見出し　<a href="#">×</a></dt>

                                <dd><textarea id="page_text" name="page_text" cols="12" rows="1">見出し</textarea></dd>
							
							<dt>段落+右画像　<a href="#">×</a></dt>

                                <dd><a href="#">アップロードされているファイルから選択</a></dd>
                                <dd><input type="file" name="upload_img" id="upload_img" size="55" /></dd>
                                <dd><img src="../../images/logo.jpg" width="152" height="39" />　logo.jpg</dd>
                                <dd><textarea id="page_text" name="page_text" cols="12" rows="2">テキストテキスト</textarea></dd>

                        </dl>

                        <ul>
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