<?php

include("variable.php");

//ページのデータ
$result_page = call_data("*","page"," ORDER BY page_date DESC");

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
                -->

                <form action="" method="post" style="margin-top:40px;">

                    <dl>

                        <dt><label for="keyword"><img src="images/serch.gif" alt="フリーワード検索" width="23" height="22" /></label></dt>
                                <dd><input type="text" name="keyword" id="keyword" value="キーワードを入力して下さい" onFocus="if (this.value == 'キーワードを入力して下さい') { this.value=''; }" onBlur="if(this.value == '') { this.value='キーワードを入力して下さい'; }" tabindex="2" /></dd>
                    </dl>

                    <p><a href="search.php"><img src="images/btn_serch.jpg" alt="検索" /></a></p>

                </form>

            </div>

        </div>

    </div>
    <!-- HEADER END -->

    <div id="content">

        <!-- mainContent START -->
        <div id="mainContent">

Main;

                    echo <<<ENTRY

                    <!-- entry START -->
                    <div class="entry">

                        <div class="entryHead">

                            <h2>フリースペース</h2>

                        </div>

                        <div class="entryBody">

                            <p>テスト運用中。フリーエリアです。</p>

                        </div>

                    </div>
                    <!-- entry END -->

                    <!-- entry START -->
                    <div class="entry">

                        <div class="entryHead">

                            <h2>新着ページ</h2>

                        </div>

                        <div class="entryBody">

                            <ul>
ENTRY;

                    $result_page = call_data("page_id,page_title,page_state","page"," ORDER BY page_date DESC");

                    $i = 0;

                    while($row_page = mysql_fetch_array($result_page)){

                        $page_state = $row_page["page_state"];
                        $page_id = $row_page["page_id"];

                        if($page_state == 1){
                            print "<li><a href='page.php?page_id={$page_id}'>{$row_page['page_title']}</a></li>";
                            $i++;
                        }

                        if($i==10){
                            break;
                        }

                    }
                            echo <<<ENTRY2
                            </ul>

                        </div>

                        <p class="backTop"><a href="#wrapper">ページの先頭に戻る</a></p>

                    </div>
                    <!-- entry END -->

ENTRY2;


echo <<<FOOT

        </div>
        <!-- mainContent END -->

FOOT;

include("subNav.php");

    print "</div>";

    print "<p id='copyright'>Copyright&nbsp;&copy;&nbsp;2009&nbsp;{$site_name}&nbsp;AllRight&nbsp;reserved.</p>";

echo <<<FOOT2
</div>
<!-- wrapper END -->

</body>

</html>

FOOT2;

?>
