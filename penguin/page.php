<?php

include("variable.php");

//ページのデータ
$page_id = $_GET["page_id"];
$result_page = call_data("*","page"," WHERE page_id='{$page_id}'");
$row_page = mysql_fetch_array($result_page);

include("head.php");

echo <<<Main

<body>
    
<!-- wrapper START -->
<div id="wrapper">

    <!-- HEADER START -->
    <div id="header_innerL">
        
        <div id="header_innerR">
            
            <div id="header_inner">
            
                <div id="discript">
                    <h1><a href="{$site_url}" tabindex="1">{$site_name}</a></h1>
                    <p>{$site_description}</p>
                </div>

                <!--            
                <div id="utility">
                    <ul>
                        <li><a href="#">お問い合わせ</a></li>
                        <li id="RSS"><a href="#" tabindex="4">RSSフィード</a></li>
                    </ul>
                </div>
                
                <form action="" method="post">
                    
                    <dl>
                        
                        <dt><label for="keyword"><img src="images/serch.gif" alt="フリーワード検索" width="23" height="22" /></label></dt>
                                <dd><input type="text" name="keyword" id="keyword" value="キーワードを入力して下さい" onFocus="if (this.value == 'キーワードを入力して下さい') { this.value=''; }" onBlur="if(this.value == '') { this.value='キーワードを入力して下さい'; }" tabindex="2" /></dd>
                    </dl>
                    
                    <p><input type="image" src="images/btn_serch.jpg" alt="検索" tabindex="3" /></p>
                    
                -->
                </form>
            
            </div>
        
        </div>
    
    </div>
    <!-- HEADER END -->
    
    <div id="content">
    
        <!-- mainContent START -->
        <div id="mainContent">
        
Main;
            
                $page_title = $row_page["page_title"];
                $page_text = $row_page["page_text"];
                
                $page_id = $row_page["page_id"];
                
                //カテゴリー名の取得
                $page_cat_no = $row_page["cat_id"];
                
                $result_page_cat = call_data("cat_name","category"," WHERE cat_id='{$page_cat_no}'");
                $row_page_cat = mysql_fetch_array($result_page_cat);
                $page_cat = $row_page_cat["0"];
                
                //投稿者名の取得
                $page_user_no = $row_page["user_id"];
                
                $result_page_user = call_data("user_name","user"," WHERE user_id='{$page_user_no}'");
                $row_page_user = mysql_fetch_array($result_page_user);
                
                $page_user = $row_page_user["0"];
                
                if(isset($row_page["page_next"])){
                    $page_next = $row_page["page_next"];
                }
                
                //ページの投稿日時の取得
                $page_date_r = $row_page["page_date"];
                $page_date_array = str_replace("-","/",$page_date_r);
                $page_date = substr($page_date_array,0,16);
                
                $page_state = $row_page["page_state"];
                
                if($page_state == 1){
                        
                    echo <<<ENTRY
                    
                    <!-- entry START -->
                    <div class="entry">
                    
                        <div class="entryHead">
                        
                            <h2><a href="#">{$page_title}</a></h2>
                            
                            <p>{$page_date}</p>
                        
                        </div>
                        
                        <dl class="category">
                        
                            <dt>カテゴリー：</dt>
                                <dd>{$page_cat}</dd>
                        
                            <dt>投稿者：</dt>
                                <dd>{$page_user}</dd>
                                
                        </dl>
                        
                        <div class="entryBody">
                        
                            {$page_text}
                            
                            {$page_next}
                            
                        </div>
                        
                        <p class="backTop"><a href="#wrapper">ページの先頭に戻る</a></p>
                        
                    </div>
                    <!-- entry END -->
                
ENTRY;

            }
            
echo <<<FOOT
        
        </div>
        <!-- mainContent END -->

FOOT;

include("subNav.php");
    
echo <<<FOOT2
    </div>
    
    <p id="copyright">Copyright&nbsp;&copy;&nbsp;2009&nbsp;penguin&nbsp;AllRight&nbsp;reserved.</p>

</div>
<!-- wrapper END -->

</body>

</html>

FOOT2;

?>
