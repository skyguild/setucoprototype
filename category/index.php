<?php

include( "../common/lib.php");

notLogin();

//サイドナビの該当箇所をアクティブにする
$_SESSION["active"] = "category";

$login_name = login_name();

$row_site = site_data();

$m = "";

if(isset($_GET["delete"])){
    $_SESSION["del_cat_id"] = $_GET["delete"];
    url_get("cat_edit.php");
}

if($_SESSION["message"]){
    $m .= $_SESSION["message"];
    $_SESSION["message"] = NULL;
    $m .= "<p><a href='index.php'>OK</a></p>";
}

$retu = "*";
$table = "category";
$rule = " ORDER BY cat_name";

$result = call_data($retu,$table,$rule);

?>

<?php
    include("../common/header.php");
    headerArea("カテゴリーの追加・編集・削除:SetucoCMS",$row_site,$login_name);
?>

                <!-- topicPath START -->
                <div id="topicPath">
                    <p><a href="../index.php">トップ</a><img src="../images/topicPath.gif" width="6" height="11" alt="の中の" /></p>
                    <p>カテゴリーの追加・編集・削除</p>
                </div>
                <!-- topicpath END -->

                <!-- section START -->
                <div class="section">

                    <div id="topichAreaL">

                        <div id="topichAreaR">

                            <div id="topichArea">

                                <h3><img src="../images/h_catAll.jpg" width="208" height="18" alt="カテゴリーの追加・編集・削除" /></h3>

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

                    <form action="cat_edit.php" method="post">

                                    <p style="margin-bottom:10px;"><?php

                                            print '<input type="text" id="cat_name" name="cat_name" value="新規カテゴリー" /><input type="submit" id="sub" name="sub" value="追加" />';

                                    ?></p>

                        <table summary="カテゴリー一覧の表です。カテゴリーの追加・編集・削除ができます。" cellpadding="0" cellspacing="0">

                            <thead>
                                <tr>
                                    <th scope="col" width="80%" id="tableFirst">カテゴリー名<a href="#" title="降順に並び替え">▼</a><a href="#" title="昇順に並び替え">▲</a></th>
                                    <th scope="col" width="10%">編集</th>
                                    <th scope="col" width="10%">削除</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php

                                    //偶数・奇数判定に使うための変数
                                    $i = 0;

                                    //カテゴリーの数だtrを繰り返す
                                    while($row = mysql_fetch_array($result)){

                                        //取得したデータを変数に入れておく
                                        $cat_id = $row["cat_id"];
                                        $cat_name = $row["cat_name"];

                                            //偶数の場合は、checkGをつけてCSSで背景色を変える
                                            $i++;

                                            if($i%2 == 0){
                                                print "<tr class='checkG'>\n";;
                                            } else {
                                                print "<tr>\n";
                                            }

                                            print "<td>";

                                            //編集ボタンが押されたときの処理
                                            if(isset($_GET["edit"])&&$cat_id==$_GET["edit"]){

                                                $edit_no = $_GET["edit"];

                                                print "<input type='text' id='cat_new' name='cat_new' value='{$cat_name}' />";
                                                print '<input type="submit" id="sub" name="sub" value="保存" />';
                                                print '<input type="submit" id="sub" name="sub" value="キャンセル" />';

                                            } else {

                                                //カテゴリー未選択時のカテゴリー
                                                if($cat_id == 0){
                                                    print $cat_name."<span id='autoCatMessage'>（※カテゴリー未選択時に自動選択されるカテゴリーです）</span>";
                                                } else {
                                                    print $cat_name;
                                                }

                                            }

                                            print "</td>";

                                            print "<td>";
                                            print "<a href='index.php?edit={$cat_id}'><img src='../images/btn_edit.png' alt='編集' widrh='27' height='27' /></a>";
                                            print "</td>";

                                            //カテゴリー未選択時のカテゴリー以外には、削除も出す
                                            if($cat_id != 0){

                                                print "<input type='hidden' id='cat_id' name='cat_id' value='{$cat_id}' />";
                                                print "<input type='hidden' id='cat_no' name='cat_no' value='{$edit_no}' />";

                                                print "<td><a href='#' onclick='flg({$cat_id});'><img src='../images/btn_delete.png' alt='削除' widrh='27' height='27' /></a></td>";

                                            } else {
                                                print "<td>&nbsp;</td>";
                                            }

                                            print "</tr>\r";
                                    }

                                ?>

                            </tbody>

                        </table>

                    </form>

                    <div id="pageNav">
                        <ul>
                            <li><a href="#">前へ</a></li>
                            <li class="navNumber"><a href="#">1</a></li>
                            <li class="navNumber current"><a href="#">2</a></li>
                            <li class="navNumber"><a href="#">3</a></li>
                            <li class="navNumber"><a href="#">4</a></li>
                            <li class="navNumber"><a href="#">5</a></li>
                            <li><a href="#">次へ</a></li>
                        </ul>
                    </div>

                </div>
                <!-- section END -->

<?php
    //フッター
    include("../common/footer.php");
?>

<script type="text/javascript">
    <!--
    function flg(id){
        var flg;　//真偽を入れる変数の宣言

        flg=confirm("本当に削除してよろしいですか？"); //真偽の代入

        if (flg==true){
            location.href='index.php?delete='+id;
        }
    }
    // -->
</script>

</body>
</html>