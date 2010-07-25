<?php

include( "../common/lib.php");

notLogin();

//サイドナビの該当箇所をアクティブにする
$_SESSION["active"] = "file";

$login_name = login_name();

$row_site = site_data();

$m="";

if($_POST["up"]){
    $m .= "<p>ファイルをアップロードしました。</p>";
    $m .= "<p><a href='index.php'>OK</a></p>";
}
if($_SESSION["message"]){
    $m .= $_SESSION["message"];
    $_SESSION["message"] = NULL;
    $m .= "<p><a href='index.php'>OK</a></p>";
}

?>

<?php
    include("../common/header.php");
    headerArea("ファイルの追加・編集・削除:SetucoCMS",$row_site,$login_name);
?>

                <!-- topicPath START -->
                <div id="topicPath">
                    <p><a href="../index.php">トップ</a><img src="../images/topicPath.gif" width="6" height="11" alt="の中の" /></p>
                    <p>ファイルの追加・編集・削除</p>
                </div>
                <!-- topicpath END -->

                <!-- section START -->
                <div class="section">

                    <div id="topichAreaL">

                        <div id="topichAreaR">

                            <div id="topichArea">

                                <h3><img src="../images/h_file.jpg" width="193" height="18" alt="ファイルの追加・編集・削除" /></h3>

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
                    <script type="text/javascript">
                        function addElement() {
                            var element = document.createElement('dd');
                            element.innerHTML = '<input type="file" name="upload_img" id="upload_img" size="55" />';

                            var objBody = document.getElementById("inputArea");
                            objBody.appendChild(element);
                            // body要素にdivエレメントを追加
                        }
                    </script>

                    <form action="index.php" method="post" ENCTYPE="MULTIPART/FORM-DATA">

                        <dl id="inputArea">

                                <dd id="firstUpload"><input type="file" name="upload_img" id="upload_img" size="55" /></dd>
                        </dl>
                        <dl style="clear:both;">
                                <dd><a href="#" onclick="addElement()">ファイル選択欄を増やす</a></dd>
                            <dt><span class="attentionMessage">※アップロードできるファイルは、1ファイル**KBまでです。</span></dt>
                                <dd class="upload" style="margin:10px 0 10px -10px;"><input type="submit" class="upSub" id="up" name="up" value="アップロード" /></dd>

                        </dl>

                    </form>

                    <form action="page_edit.php" method="post" name="form" style="clear:both;">
                        <table summary="ファイル一覧の表です。編集ボタンから、ファイルの編集ができます。削除ボタンから削除ができます。サムネイルを押すとファイルを表示します。" cellpadding="0" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col" width="20%" id="tableFirst">表示</th>
                                    <th scope="col" width="40%">ファイル<a href="#" title="降順に並び替え">▼</a><a href="#" title="昇順に並び替え">▲</a></th>
                                    <th scope="col" width="13%">更新日<a href="#" title="降順に並び替え">▼</a><a href="#" title="昇順に並び替え">▲</a></th>
                                    <th scope="col" width="13%">アップロード日<a href="#" title="降順に並び替え">▼</a><a href="#" title="昇順に並び替え">▲</a></th>
                                    <th scope="col" width="7%">編集</th>
                                    <th scope="col" width="7%">削除</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td class="thumb"><a href="#" onclick="openFile(../images/logo.jpg);"><img src="../images/logo.jpg" width="120" height="auto" /></a></td>
                                    <td>logo[jpg]</td>
                                    <td>06月12日</td>
                                    <td>12月24日</td>
                                    <td><a href="edit/index.php"><img src='../images/btn_edit.png' alt='編集' width='27' height='27' /></td>
                                    <td><a href='#' onclick='flg({$page_id});'><img src='../images/btn_delete.png' alt='削除' width='27' height='27' /></a></td>
                                </tr>
                                <tr class="checkG">
                                    <td class="thumb"><a href="upload/HTMLmanual.pdf" target="_blank"><img src="../images/icn_pdf.gif" width="48" height="48" /></a></td>
                                    <td>HTML基礎マニュアル[pdf]</td>
                                    <td>06月12日</td>
                                    <td>12月24日</td>
                                    <td><a href="edit/index.php"><img src='../images/btn_edit.png' alt='編集' width='27' height='27' /></td>
                                    <td><a href='#' onclick='flg({$page_id});'><img src='../images/btn_delete.png' alt='削除' width='27' height='27' /></a></td>
                                </tr>
                                <tr>
                                    <td class="thumb"><a href="#"><img src="../images/logo.jpg" width="120" height="auto" /></a></td>
                                    <td>logo[jpg]</td>
                                    <td>06月12日</td>
                                    <td>12月24日</td>
                                    <td><a href="edit/index.php"><img src='../images/btn_edit.png' alt='編集' width='27' height='27' /></td>
                                    <td><a href='#' onclick='flg({$page_id});'><img src='../images/btn_delete.png' alt='削除' width='27' height='27' /></a></td>
                                </tr>
                                <tr class="checkG">
                                    <td class="thumb"><a href="#"><img src="../images/logo.jpg" width="120" height="auto" /></a></td>
                                    <td>logo[jpg]</td>
                                    <td>06月12日</td>
                                    <td>12月24日</td>
                                    <td><a href="edit/index.php"><img src='../images/btn_edit.png' alt='編集' width='27' height='27' /></td>
                                    <td><a href='#' onclick='flg({$page_id});'><img src='../images/btn_delete.png' alt='削除' width='27' height='27' /></a></td>
                                </tr>
                                <tr>
                                    <td class="thumb"><a href="#"><img src="../images/logo.jpg" width="120" height="auto" /></a></td>
                                    <td>logo[jpg]</td>
                                    <td>06月12日</td>
                                    <td>12月24日</td>
                                    <td><a href="edit/index.php"><img src='../images/btn_edit.png' alt='編集' width='27' height='27' /></td>
                                    <td><a href='#' onclick='flg({$page_id});'><img src='../images/btn_delete.png' alt='削除' width='27' height='27' /></a></td>
                                </tr>
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

</body>
</html>
