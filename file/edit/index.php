<?php

include( "../../common/lib.php");

notLogin();

//サイドナビの該当箇所をアクティブにする
$_SESSION["active"] = "file";

$login_name = login_name();

$row_site = site_data();

if($_SESSION["message"]){
    $m .= $_SESSION["message"];
    $_SESSION["message"] = NULL;
    $m .= "<p><a href='index.php'>OK</a></p>";
}

?>

<?php
	include("../../common/header.php");
	headerArea("「logo.jpg」の編集:SetucoCMS",$row_site,$login_name);
?>

                <!-- topicPath START -->
                <div id="topicPath">
                    <p><a href="../../index.php">トップ</a><img src="../../images/topicPath.gif" width="6" height="11" alt="の中の" /></p>
                    <p><a href="../index.php">ファイルの追加・編集・削除</a><img src="../../images/topicPath.gif" width="6" height="11" alt="の中の" /></p>
                    <p>「logo.jpg」の編集</p>
                </div>
                <!-- topicpath END -->

                <!-- section START -->
                <div class="section">

                    <div class="hArea">

                        <h3 id="textType">「logo.jpg」の編集</h3>

                    </div>

                    <?php

                        if($m != ""){
                            print "<div id='messageArea'>";
                            print $m;
                            print "</div>";
                        }

                    ?>

                    <form action="#" method="post" ENCTYPE="MULTIPART/FORM-DATA">

                        <dl id="inputArea">

                            <dt><span class="attentionMessage">※一度にアップできるファイルは、1ファイル**KB、合計**MBまでです。</span></dt>
                                <dd><a href="#"><img src="../../images/logo.jpg" width="152" height="39" /></a></dd>
                                <dd>ファイル名:<input type="text" id="file_name" name="file_name" value="200100613.jpg" /></dd>
                                <dd>説明:<input type="text" id="file_name" name="file_name" value="テキストテキスト" /></dd>
                            <dt><span class="attentionMessage">**MB</span></dt>

                                <dd ><input type="submit" class="upSub" id="up" name="up" value="編集を保存する" /></dd>
                        </dl>

                    </form>




                </div>
                <!-- section END -->
				
<script>

</script>

<?php
    //フッター
    include("../../common/footer.php");
?>

</body>
</html>
