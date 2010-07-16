<?php

include("common/lib.php");

notLogin();

//サイドナビの該当箇所をアクティブにする
$_SESSION["active"] = "top";

//ログインしているアカウントID
$login_name = login_name();

//サイトに関するデータ全部
$row_site = site_data();

//野望を変更
if($_POST["sub"]=="保存"){
	$goal_yabou = $_POST["goal_yabou"];
	$table = "goal";
	$value = "goal_yabou='{$goal_yabou}'";
	$rule = "";
	update($table,$value,$rule);
}

//サイトの日付の-を/にする
$date = $row_site["site_date"];
$site_date = str_replace("-","/",$date);

//ページのデータ全部
$result_page = call_data("*","page"," ORDER BY page_date DESC LIMIT 0,5");

//総ページ数
$result_all_page = call_data("page_id","page","");
$num_page = mysql_num_rows($result_all_page);

//今月の更新数
$year = date(Y);
$month = date(m);

$result_month_page = call_data("page_id","page"," WHERE page_date LIKE '{$year}-{$month}%'");
$num_month_page = mysql_num_rows($result_month_page);

//最終更新ページの日付の-を/にする
$result_page_last = call_data("page_date","page"," ORDER BY page_date DESC");
$row_page_last = mysql_fetch_array($result_page_last);

$last = $row_page_last[0];
$last_date_array = str_replace("-","/",$last);
$last_date = substr($last_date_array,0,10);

//現在の日付からの経過日数(未実装)
//$last_date_now = ;

//目標のデータ全部
$result_goal = call_data("*","goal","");
$row_goal = mysql_fetch_array($result_goal);

//今月の目標まであと何件か
$goal_month = $num_month_page - $row_goal["goal_month"];

if($goal_month < 0){
	$goal_month = trim($goal_month,"-");
	$goal_month_m = "目標まであと{$goal_month}ページ！";
} else if($goal_month == 0){
	$goal_month_m = "目標達成！";
} else {
	$goal_month_m = "目標からプラス{$goal_month}ページ！";
}

?>

<?php
	include("common/header.php");
	headerArea("SetucoCMSトップ",$row_site,$login_name);
?>

				<!-- section"野望" START -->
				<div class="section">

					<form action="index.php" method="post">

						<dl id="designs">

								<?php

									//野望の編集
									$yabou = $row_goal["goal_yabou"];

									if($_GET["edit"]==true){

										print '<dt><label for="goal_yabou">野望</label></dt>';
										print '<dd><em>';
										print "<input type='text' id='goal_yabou' name='goal_yabou' value='{$yabou}' />";
										print "</em>";
										print "<input type='submit' id='sub' name='sub' value='保存' />";
										print "<input type='submit' id='sub' name='sub' value='キャンセル' />";
										print "</dd>";

									} else {

										print '<dt>野望</dt>';
										print '<dd><em>';
										print "「";
										print $yabou;
										print "」</em>";
										print "<a href='index.php?edit=true'><img src='images/btn_edit.gif' alt='野望を変更する' width='21' height='21' /></a></dd>";

									}

								?>

						</dl>

					</form>

				</div>
				<!-- section"野望" END -->

				<!-- section"現在の状況" START -->
				<div id="topicSection">

					<div id="topichAreaL">

						<div id="topichAreaR">

							<div id="topichArea">

								<h3><img src="images/h_nowData.gif" alt="現在の状況" width="110" height="22" /></h3>

								<p><a href="goal/index.php">更新目標の編集</a></p>

							</div>

						</div>

					</div>

					<dl class="check">

						<dt>更新状況</dt>
							<dd>良い！</dd>

					</dl>


					<dl class="straight">

						<dt>最終更新日</dt>
							<dd><?php print $last_date; ?>（0日経過）</dd>

					</dl>

					<dl class="check">

						<dt>今月の更新</dt>
							<dd><?php print $num_month_page."ページ"."（".$goal_month_m."）"?></dd>

					</dl>

					<dl class="straight">

						<dt>総ページ数</dt>
							<dd><?php print $num_page; ?>ページ</dd>

					</dl>

					<dl class="check">

						<dt>経過日数</dt>
							<dd>113日目（<?php print $site_date; ?>開設）</dd>

					</dl>

				</div>
				<!-- section"現在の状況" END -->

				<!-- section"最近作ったページ" START -->
				<div class="section">

					<div class="hArea">

						<h3 id="recentry"><img src="images/h_recentlyPage.gif" alt="最近作ったページ" width="150" height="23" />（5件）</h3>

						<p><a href="/page/index.php">ページの一覧（編集・削除）へ</a></p>

					</div>

					<?php

						//偶数・奇数判定に使う変数
						$i = 0;

						while($row_page = mysql_fetch_array($result_page)){

							//ページ作成日時
							$page_date = str_replace("-","/",$row_page['page_date']);

							//ページID
							$page_id = $row_page["page_id"];

							//タイトル
							$page_title = $row_page["page_title"];

							//カテゴリー
							$cat_id = $row_page["cat_id"];
							$result_cat = call_data("cat_name","category"," WHERE cat_id='{$cat_id}'");
							$cat_name = mysql_fetch_array($result_cat);

							//制作者
							$user_id = $row_page["user_id"];
							$result_u = call_data("user_name","user"," WHERE user_id='{$user_id}'");
							$user_name = mysql_fetch_array($result_u);

							//公開状態
							if($row_page["page_state"]==0){
								$page_state = "下書き";
							} else if($row_page["page_state"]==1) {
								$page_state = "公開";
							}

							//偶数だったらcontentsListG、奇数だったらcontentsListKをつけて、CSSで背景色を入れる
							$i++;

							if($i%2 == 0){
								print "<dl class='contentsListG'>";
							} else {
								print "<dl class='contentsListK'>";
							}

							echo <<<COM

								<dt class="pageDate">{$page_date}</dt>

								<dd class="pageTitle"><a href='page/edit/index.php?page_id={$page_id}'>{$page_title}</a></dd>

									<dt>カテゴリー</dt>
									<dd>{$cat_name[0]}</dd>

									<dt>制作者</dt>
									<dd>{$user_name[0]}</dd>

									<dt>公開状態</dt>
									<dd>{$page_state}</dd>

								</dl>

COM;

						}

					?>

				</div>

				<!-- section"最近作ったページ" END -->

<?php
	//フッター
	include("common/footer.php");
?>

</body>

</html>
