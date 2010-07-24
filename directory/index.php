<?php

include( "../common/lib.php");

notLogin();

//サイドナビの該当箇所をアクティブにする
$_SESSION["active"] = "directory";

$login_name = login_name();

$row_site = site_data();

?>

<?php
	include("../common/header.php");
	headerArea("サイト構造（カテゴリー・ページの一覧）:SetucoCMS",$row_site,$login_name);
?>

                <!-- topicPath START -->
                <div id="topicPath">
                    <p><a href="../index.php">トップ</a><img src="../images/topicPath.gif" width="6" height="11" alt="の中の" /></p>
                    <p>サイト構造（カテゴリー・ページの一覧）</p>
                </div>
                <!-- topicpath END -->

                <!-- section START -->
                <div class="section">

                    <div id="topichAreaL">

                        <div id="topichAreaR">

                            <div id="topichArea">

                                <h3><img src="../images/h_directory.jpg" width="208" height="18" alt="サイト構造（カテゴリー・ページの一覧）" /></h3>

                            </div>

                        </div>

                    </div>
					

<div style="margin-left:15px;">
					
				<p><a id="plus" href="#" onclick="toggle(1);">+</a><a id="minuse" style="display:none;" href="#" onclick="toggle(0);">-</a>　トップ <a href="all.php">（43）</a></p>
				<div id="toggleArea" style="display:none;">
				<p>　<a href="">-</a>　└サブカテゴリー1 <a href="all.php">（20）</a></p>
				<p>　　<a href="">+</a>　└サブカテゴリー1-1 <a href="all.php">（15）</a></p>
				<p>　　<a href="">-</a>　└サブカテゴリー1-2 <a href="all.php">（5）</a></p>
				<p>　　　　　└<a href="../page/edit/index.php?page_id=63">今日は電設部の勉強会</a> </p>
				<p>　　　　　└<a href="../page/edit/index.php?page_id=63">ガンブラー対策について</a> </p>
				<p>　　　　　└<a href="../page/edit/index.php?page_id=63">語る夕べ～先生、彼らは誰ですか？～</a> </p>
				<p>　　　　　└<a href="../page/edit/index.php?page_id=63">電設部とは</a> </p>
				<p>　　　　　└<a href="../page/edit/index.php?page_id=63">技能五輪全国大会レポート</a> </p>
				<p>　<a href="">+</a>　└サブカテゴリー2 <a href="all.php">（23）</a></p>
				</div>
</div>

                </div>
                <!-- section END -->

<?php
    //フッター
    include("../common/footer.php");
?>

<script type="text/javascript">
    <!--

	function toggle(check){
		if(check == 1){
			document.getElementById('toggleArea').style.display = 'block';
			document.getElementById('plus').style.display = 'none';
			document.getElementById('minuse').style.display = 'inline-block';
		}
		if(check == 0){
			document.getElementById('toggleArea').style.display = 'none';
			document.getElementById('plus').style.display = 'inline-block';
			document.getElementById('minuse').style.display = 'none';
		}
	}

    // -->
</script>

</body>
</html>