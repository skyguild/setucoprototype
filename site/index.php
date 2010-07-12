<?php

$docroot = $_SERVER['DOCUMENT_ROOT'];
include("../common/lib.php");

notLogin("../login.php");

//サイドナビの該当箇所をアクティブにする
$_SESSION["active"] = "site";

$login_name = login_name();

$row_site = site_data();

if($_SESSION["message"]){
    $m .= $_SESSION["message"];
    $_SESSION["message"] = NULL;
    $m .= "<p><a href='index.php'>OK</a></p>";
}

$result = call_data("*","site","");
$row = mysql_fetch_array($result);

?>

<?php
	include("../common/header.php");
	headerArea("サイト情報の編集:SetucoCMS",$row_site,$login_name);
?>
            
                <!-- topicPath START -->
                <div id="topicPath">
                    <p><a href="../index.php">トップ</a><img src="../images/topicPath.gif" width="6" height="11" alt="の中の" /></p>
                    <p>サイト情報の編集</p>
                </div>
                <!-- topicpath END -->
        
                <!-- section START -->
                <div class="section">
                
                    <div id="topichAreaL">
                    
                        <div id="topichAreaR">
                        
                            <div id="topichArea">
                            
                                <h3><img src="../images/h_siteEdit.jpg" width="122" height="18" alt="サイト情報の編集" /></h3>
                                
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
                        
                            <dt><label for="site_name">サイト名</label></dt>
                                <dd><input type="text" id="site_name" name="site_name" value='<?php print $row["site_name"] ?>' onblur="if(this.value == '') { this.value='<?php print $row["site_name"] ?>'; }" /></dd>
                                
                            <dt><label for="site_name">サイトURL<br /><span>（リンク切れに注意）</span></label></dt>
                                <dd><input type="text" id="site_url" name="site_url" value='<?php print $row["site_url"] ?>' onblur="if(this.value == '') { this.value='<?php print $row["site_url"] ?>'; }" /></dd>
                                
                            <dt id="site_description_h"><label for="site_description">説明</label></dt>
                                <dd id="site_description_d"><textarea rows="2" id="site_description" name="site_description"><?php print $row["site_description"] ?></textarea></dd>
                                <!--<dd><input type="text" id="site_description" name="site_description" value='<?php //print $row["site_description"] ?>' /></dd>-->
                                
                            <dt><label for="site_keyword">キーワード<br /><span>（カンマ[&nbsp;,&nbsp;]で区切る）</span></label></dt>
                                <dd><input type="text" id="site_keyword" name="site_keyword" value='<?php print $row["site_keyword"] ?>' /></dd>
                                
                        </dl>
                        
                        <p class="editAreaP"><input type="submit" id="sub" name="sub" value="サイト情報を変更" /></p>
                    
                    </form>

                </div>
                <!-- section END -->
                
<?php
    //フッター
    include("../common/footer.php");
?>

            
</body>
</html>
