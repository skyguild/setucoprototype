<?php

include( "../common/lib.php");

notLogin();

$login_name = login_name();

$row_site = site_data();

if($_SESSION["message"]){
    $m .= $_SESSION["message"];
    $_SESSION["message"] = NULL;
    $m .= "<p><a href='index.php'>OK</a></p>";
}

$result = call_data("*","goal","");
$row = mysql_fetch_array($result);

?>

<?php
	include("../common/header.php");
	headerArea("目標設定の編集:SetucoCMS",$row_site,$login_name);
?>

                <!-- topicPath START -->
                <div id="topicPath">
                    <p><a href="../index.php">トップ</a><img src="../images/topicPath.gif" width="6" height="11" alt="の中の" /></p>
                    <p>目標設定の編集</p>
                </div>
                <!-- topicpath END -->

                <!-- section START -->
                <div class="section">

                    <div id="topichAreaL">

                        <div id="topichAreaR">

                            <div id="topichArea">

                                <h3><img src="../images/h_goal.jpg" width="109" height="18" alt="目標設定の編集" /></h3>

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

                    <form action="edit.php" method="post">

                        <dl class="editArea">

                            <dt><label for="goal_span">更新間隔</label></dt>
                                <dd><input type="text" id="goal_span" name="goal_span" value='<?php print $row["goal_span"] ?>' onblur="if(this.value == '') { this.value='<?php print $row["goal_span"] ?>'; }" />日置き</dd>

                            <dt><label for="goal_month">一ヶ月の更新数</label></dt>
                                <dd><input type="text" id="goal_month" name="goal_month" value='<?php print $row["goal_month"] ?>' onblur="if(this.value == '') { this.value='<?php print $row["goal_month"] ?>'; }" />ページ</dd>

                        </dl>

                        <p class="editAreaP"><input type="submit" id="sub" name="sub" value="目標設定を変更" /></p>

                    </form>

                </div>
                <!-- section END -->

<?php
    //フッター
    include("../common/footer.php");
?>

</body>
</html>
