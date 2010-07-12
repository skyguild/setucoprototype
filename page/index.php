<?php

include( "../common/lib.php");

notLogin();

//サイドナビの該当箇所をアクティブにする
$_SESSION["active"] = "page";

$login_name = login_name();

$row_site = site_data();

$m = "";

//削除が押されたら、ページIDをpage_edit.phpに送る
if(isset($_GET["delete"])){
    $_SESSION["del_page_id"] = $_GET["delete"];
    url_get("page_edit.php");
}

//メッセージを取得
if($_SESSION["message"]){
    $m .= $_SESSION["message"];
    $_SESSION["message"] = NULL;
    $m .= "<p><a href='index.php'>OK</a></p>";
}

//ページのデータを取得
$retu = "*";
$table = "page";
$rule = " ORDER BY page_date DESC LIMIT 0,10";

$result = call_data($retu,$table,$rule);

?>

<?php
	include("../common/header.php");
	headerArea("ページの編集・削除:SetucoCMS",$row_site,$login_name);
?>
                <!-- topicPath START -->
                <div id="topicPath">
                    <p><a href="../index.php">トップ</a><img src="../images/topicPath.gif" width="6" height="11" alt="の中の" /></p>
                    <p>ページの編集・削除</p>
                </div>
                <!-- topicpath END -->

                <!-- section START -->
                <div class="section">

                    <div id="topichAreaL">

                        <div id="topichAreaR">

                            <div id="topichArea">

                                <h3><img src="../images/h_pageAll.jpg" width="135" height="18" alt="ページの編集・削除" /></h3>

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

					<form action="#" method="post" id="searchBox" style="margin-left:10px; margin-bottom:15px;">

						<dt><label for="keyword">キーワード</label>　<small><input id="keyword" name="keyword" type="text" />　<input id="pora1" type="radio" name="pora" checked="checked" /><label for="pora1">部分一致</label>　<input id="pora2" type="radio" name="pora" /><label for="pora2">全文一致</label>　<input id="oora1" type="radio" name="oora" checked="checked" /><label for="oora1">OR</label>　<input id="oora2" type="radio" name="oora" /><label for="oora2">AND</label></small></dt>

						<div id="toggleArea" style="display:none">
							<dt style="margin-top:10px;">カテゴリー
								<select>
									<option value="0" selected="selected">-- 指定なし --</option>
									<option value="1">カテゴリー1</option>
									<option value="2">カテゴリー2</option>
									<option value="3">カテゴリー3</option>
									<option value="4">カテゴリー4</option>
								</select>
							　制作者
								<select>
									<option value="0" selected="selected">-- 指定なし --</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
								</select>
							　公開状態
								<select>
									<option value="0" selected="selected">-- 指定なし --</option>
									<option value="1">公開</option>
									<option value="2">非公開</option>
								</select>
							</dt>

							<dd style="margin-top:10px;"><input type="radio" id="day1" name="day" checked="checked" /><label for="day1">制作日</label>　<input type="radio" id="day2" name="day" /><label for="day2">更新日</label>
								<select>
									<?php
									$i=0;
									for($i=2010;$i>=1910;$i--){
										print("<option value='{$i}'");
										if($i==2009){
											print(" selected='selected'");
										}
										print(">{$i}</option>");
									}
									?>
								</select>
								年
								<select>
									<?php
									$i=0;
									for($i=1;$i<=12;$i++){
										print("<option value='{$i}'");
										if($i==9){
											print(" selected='selected'");
										}
										print(">{$i}</option>");
									}
									?>
								</select>
								月
								<select>
									<?php
									$i=0;
									for($i=1;$i<=31;$i++){
										print("<option value='{$i}'");
										if($i==18){
											print(" selected='selected'");
										}
										print(">{$i}</option>");
									}
									?>
								</select>
								日
								&nbsp;～&nbsp;
								<select>
									<?php
									$i=0;
									for($i=2010;$i>=1910;$i--){
										print("<option value='{$i}'");
										if($i==2010){
											print(" selected='selected'");
										}
										print(">{$i}</option>");
									}
									?>
								</select>
								年
								<select>
									<?php
									$i=0;
									for($i=1;$i<=12;$i++){
										print("<option value='{$i}'");
										if($i==6){
											print(" selected='selected'");
										}
										print(">{$i}</option>");
									}
									?>
								</select>
								月
								<select>
									<?php
									$i=0;
									for($i=1;$i<=31;$i++){
										print("<option value='{$i}'");
										if($i==20){
											print(" selected='selected'");
										}
										print(">{$i}</option>");
									}
									?>
								日
								</select>
							</dd>

							<p style="margin-top:15px;"><input type="button" value="検索" /><a href="#" onclick="toggle();"><small>オプションを隠す</small></a></p>
						</div>

						<p id="toggleBtn" style="margin-top:5px;"><input type="button" value="検索" /><a href="#" onclick="toggle();"><small>オプションを表示</small></a></p>

					</form>

                    <form action="page_edit.php" method="post" name="form">

                        <table summary="ページ一覧の表です。タイトルのリンクと編集ボタンから、ページの編集ができます。削除ボタンから削除ができます。" cellpadding="0" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col" width="7%" id="tableFirst">表示</th>
                                    <th scope="col" width="38%">タイトル<a href="#" title="降順に並び替え">▼</a><a href="#" title="昇順に並び替え">▲</a></th>
                                    <th scope="col" width="13%">制作日<a href="#" title="降順に並び替え">▼</a><a href="#" title="昇順に並び替え">▲</a></th>
                                    <th scope="col" width="10%">制作者</th>
                                    <th scope="col" width="15%">カテゴリー</th>
                                    <th scope="col" width="10%">状態</th>
                                    <th scope="col" width="7%">削除</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php

                                    //偶数・奇数判定に使う変数
                                    $i = 0;

                                    while($row = mysql_fetch_array($result)){

                                        //ページIDの取得
                                        $page_id = $row["page_id"];

                                        //サイトURLの取得
                                        $site_url = $row_site["site_url"];

                                        //ページタイトルの取得
                                        $page_title = $row["page_title"];

                                        //ページの作成日の取得
                                        $page_date_r = $row["page_date"];
                                        $page_date_array = str_replace("-","/",$page_date_r);
                                        $page_date = substr($page_date_array,0,10);

                                        //制作者名の取得
                                        $retu_u = "user_name";
                                        $table_u = "user";

                                        $user_id = $row["user_id"];
                                        $rule_u = " WHERE user_id='{$user_id}'";

                                        $result_u = call_data($retu_u,$table_u,$rule_u);

                                        $row_u = mysql_fetch_array($result_u);

                                        //公開状態の取得
                                        $page_state = $row["page_state"];

                                        //カテゴリー名の取得
                                        $retu_cn = "cat_name";
                                        $table_cn = "category";

                                        $cat_id = $row["cat_id"];
                                        $rule_cn = " WHERE cat_id='{$cat_id}'";

                                        $result_cn = call_data($retu_cn,$table_cn,$rule_cn);

                                        $row_cn = mysql_fetch_array($result_cn);

                                        //偶数だったらcheckGをつけて、CSSで背景色を入れる
                                        $i++;

                                        if($i%2 == 0){
                                            print "<tr class='checkG'>\n";
                                        } else {
                                            print "<tr>\n";
                                        }


                                        //ページの表示
                                        tab("10");

                                        if($page_state==0){

                                            print "<td><img src='../images/btn_check_no.png' alt='下書きは表示できません' widrh='27' height='27' /></td>\n";

                                        } else if($page_state==1){

                                            print "<td><a href='{$site_url}/page.php?page_id={$page_id}' target='_blank'><img src='../images/btn_check.png' alt='表示' widrh='27' height='27' /></a></td>\n";

                                        }

                                        //ページタイトル
                                        tab("10");
                                        print "<td><a href='edit/index.php?page_id={$page_id}'>";
                                        print $page_title;
                                        print "</a></td>\n";

                                        //ページの作成日
                                        tab("10");
                                        print "<td>";
                                        print $page_date;
                                        print "</td>\n";

                                        //制作者名
                                        tab("10");
                                        print "<td>";
                                        print $row_u["user_name"];
                                        print "</td>\n";


                                        //カテゴリー名
                                        tab("10");
                                        print "<td>";

                                        $retu_c = "cat_id,cat_name";
                                        $table_c = "category";
                                        $rule_c = " ORDER BY cat_name";

                                        $result_c = call_data($retu_c,$table_c,$rule_c);

                                        // 編集するページ（onchangeでGETを送ったページ）だったらidをstate_newにする
                                        if($_GET["cat_edit"] == $row['page_id']){

                                            $selectid = "cat_new";

                                        } else {

                                            $selectid = "not_cat";

                                        }

                                        print '<select id="' . $selectid . '" name="' . $selectid . '"';

                                        if(!isset($_GET["cat_edit_id"])){

                                            //selectをチェンジしたら編集するページのIDを送る
                                            //selectで選択したカテゴリーのIDを送る
                                        ?>

                                            onchange="location.href='index.php?cat_edit=<?php print $page_id; ?>&selected=' + (this.options[this.selectedIndex].value);"

                                        <?php

                                        }

                                        print '>';

                                        //GETが送られてきたら、
                                        if($row["page_id"]==$_GET["cat_edit"]){

                                            //カテゴリー全部を出力
                                            while($row_c = mysql_fetch_array($result_c)){

                                                $cat_id = $row["cat_id"];
                                                $cat_id_c = $row_c["cat_id"];

                                                //onchageで選択したのをデフォルト選択
                                                if($cat_id_c==$_GET['selected']){
                                                    print "<option value='{$cat_id_c}' selected='selected'>{$row_c[1]}</option>";
                                                } else {
                                                    print "<option value='{$cat_id_c}'>{$row_c[1]}</option>";
                                                }

                                            }

                                            //送られてきたページ番号をhiddenで送る
                                            $page_id = $_GET["cat_edit"];

                                            print "<input type='hidden' id='page_id' name='page_id' value='{$page_id}' />";

                                            //変更・キャンセルを表示
                                            print '<br />';
                                            print '<input type="submit" id="sub" name="sub" value="変更" />';
                                            print '<input type="submit" id="sub" name="sub" value="キャンセル" />';

                                        } else {

                                            //カテゴリー全部を出力
                                            while($row_c = mysql_fetch_array($result_c)){

                                                $cat_id = $row["cat_id"];
                                                $cat_id_c = $row_c["cat_id"];

                                                //該当するカテゴリーをデフォルト選択
                                                if($cat_id_c==$cat_id){
                                                    print "<option value='{$cat_id_c}' selected='selected'>{$row_c[1]}</option>";
                                                } else {
                                                    print "<option value='{$cat_id_c}'>{$row_c[1]}</option>";
                                                }

                                            }

                                        }

                                        print "</select>";

                                        print "</td>\n";


                                        //公開状態
                                        tab("10");

                                        print "<td>";

                                        // 編集するページ（onchangeでGETを送ったページ）だったらidをstate_newにする
                                        if($_GET["state_edit"] == $row['page_id']){

                                            $selectid = "state_new";

                                        } else {

                                            $selectid = "not_this";

                                        }

                                        print '<select id="' . $selectid . '" name="' . $selectid . '"';

                                        if(!isset($_GET["state_edit"])){

                                            //selectをチェンジしたら編集するページのIDを送る
                                            print 'onchange="'."location.href='index.php?state_edit={$row['page_id']}'".'"';
                                        }

                                        print '>';

                                        if($_GET["state_edit"] == $row['page_id']){

                                            //GETが送られてきたら、現在の公開状態と逆をデフォルト表示
                                            if($page_state==0){

                                                print "<option value='0'>下書き</option>\n";
                                                print "<option value='1' selected>公開</option>\n";

                                            } else if($page_state==1) {

                                                print "<option value='0' selected>下書き</option>\n";
                                                print "<option value='1'>公開</option>\n";

                                            }

                                            $edit_page_id = $_GET["state_edit"];

                                            print "<input type='hidden' id='edit_page_id' name='edit_page_id' value='{$edit_page_id}' />";

                                            print '<br />';
                                            print '<input type="submit" id="sub" name="sub" value="保存" />';
                                            print '<input type="submit" id="sub" name="sub" value="キャンセル" />';

                                        } else {

                                            if($page_state==0){

                                                print "<option value='0' selected>下書き</option>\n";
                                                print "<option value='1'>公開</option>\n";

                                            } else if($page_state==1) {

                                                print "<option value='0'>下書き</option>\n";
                                                print "<option value='1' selected>公開</option>\n";

                                            }

                                        }

                                        print "</select>";

                                        print "</td>\n";

                                        tab("10");
                                        print "\n"; ?>

                                        <?php
                                        //削除
                                        tab("10");
                                        print "<td><a href='#' onclick='flg({$page_id});'><img src='../images/btn_delete.png' alt='削除' widrh='27' height='27' /></a></td>\n";

                                        tab("9");
                                        print "</tr>\n\n";

                                        tab("9");
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

	function toggle(){
		if(document.getElementById('toggleArea').style.display == 'none'){
			document.getElementById('toggleArea').style.display = 'block';
			document.getElementById('toggleBtn').style.display = 'none';
		} else {
			document.getElementById('toggleArea').style.display = 'none';
			document.getElementById('toggleBtn').style.display = 'block';
		}
	}

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