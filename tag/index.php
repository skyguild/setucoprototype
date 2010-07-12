<?php

include("../common/lib.php");

notLogin();

//サイドナビの該当箇所をアクティブにする
$_SESSION["active"] = "tag";

$login_name = login_name();

$row_site = site_data();

$m = "";

if(isset($_GET["delete"])){
	$_SESSION["del_tag_id"] = $_GET["delete"];
	url_get("tag_edit.php");
}

if($_SESSION["message"]){
	$m .= $_SESSION["message"];
	$_SESSION["message"] = NULL;
	$m .= "<p><a href='index.php'>OK</a></p>";
}

$retu = "*";
$table = "tag";
$rule = " ORDER BY tag_name";

$result = call_data($retu,$table,$rule);
$num = mysql_num_rows($result);

?>

<?php
	include("../common/header.php");
	headerArea("タグの追加・編集・削除:SetucoCMS",$row_site,$login_name);
?>

				<!-- topicPath START -->
				<div id="topicPath">
					<p><a href="../index.php">トップ</a><img src="../images/topicPath.gif" width="6" height="11" alt="の中の" /></p>
					<p>タグの追加・編集・削除</p>
				</div>
				<!-- topicpath END -->

				<!-- section START -->
				<div class="section">

					<div id="topichAreaL">

						<div id="topichAreaR">

							<div id="topichArea">

								<h3><img src="../images/h_tagAll.jpg" width="168" height="18" alt="タグの追加・編集・削除" /></h3>

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

					<form action="tag_edit.php" method="post">

						<table summary="タグ一覧の表です。タグの追加・編集・削除ができます。" cellpadding="0" cellspacing="0">

							<thead>
								<tr>
									<th scope="col" width="80%" id="tableFirst">タグ名<a href="#">▼</a><a href="#">▲</a></th>
									<th scope="col" width="10%">編集</th>
									<th scope="col" width="10%">削除</th>
								</tr>
							</thead>

							<tbody>

								<?php

									if($num == 0) {
										print "<tr><td colspan='3'>タグが登録されていません。</td></tr>";
									} else {

										//偶数・奇数判定に使うための変数
										$i = 0;

										//タグの数だtrを繰り返す
										while($row = mysql_fetch_array($result)){

											//取得したデータを変数に入れておく
											$tag_id = $row["tag_id"];
											$tag_name = $row["tag_name"];

												//偶数の場合は、checkGをつけてCSSで背景色を変える
												$i++;

												if($i%2 == 0){
													print "<tr class='checkG'>\n";
												} else {
													print "<tr>\n";
												}

												print "<td>";

												//編集ボタンが押されたときの処理
												if(isset($_GET["edit"])&&$tag_id==$_GET["edit"]){

													$edit_no = $_GET["edit"];

													print "<input type='text' id='tag_new' name='tag_new' value='{$tag_name}' />";
													print '<input type="submit" id="sub" name="sub" value="保存" />';
													print '<input type="submit" id="sub" name="sub" value="キャンセル" />';

												} else {

													print $tag_name;

												}

												print "</td>";

												print "<td>";
												print "<a href='index.php?edit={$tag_id}'><img src='../images/btn_edit.png' alt='編集' widrh='27' height='27' /></a>";
												print "</td>";

												print "<input type='hidden' id='tag_id' name='tag_id' value='{$tag_id}' />";
												print "<input type='hidden' id='tag_no' name='tag_no' value='{$edit_no}' />";

												print "<td><a href='#' onclick='flg({$tag_id});'><img src='../images/btn_delete.png' alt='削除' widrh='27' height='27' /></a></td>";

												print "</tr>\r";

										}
									}

								?>

								<tr>

									<td colspan="3">

									<?php
											print '<input type="text" id="tag_name" name="tag_name" value="新規タグ" /><input type="submit" id="sub" name="sub" value="追加" />';

									?>

									</td>

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

<script type="text/javascript">
	<!--
	function flg(id){
		var flg;　//真偽を入れる変数の宣言

		flg=confirm("本当に削除してよろしいですか？"); //真偽の代入

		if (flg==true){
			location.href='index.php?delete='+id;
		}
	}
	 -->
</script>

</body>
</html>