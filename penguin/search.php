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


                    <!-- entry START -->
                    <div class="entry">

                        <div class="entryHead">


                            <h2><span>「キーワード」の検索結果（5件）</span></h2>

                        </div>


                        <table>
                            <colgroup width="28%"></colgroup>
                            <colgroup width="62%"></colgroup>
                            <tr><td><a href="page.php?page_id=39">「技能五輪全国大会レポート」</a></td><td>勉強会プロジェクトでは、Webデザ…　（2009年10月24日）</td></tr>
                            <tr><td><a href="page.php?page_id=39">「技能五輪全国大会レポート」</a></td><td>勉強会プロジェクトでは、Webデザ…　（2009年10月24日）</td></tr>
                            <tr><td><a href="page.php?page_id=39">「技能五輪全国大会レポート」</a></td><td>勉強会プロジェクトでは、Webデザ…　（2009年10月24日）</td></tr>
                            <tr><td><a href="page.php?page_id=39">「技能五輪全国大会レポート」</a></td><td>勉強会プロジェクトでは、Webデザ…　（2009年10月24日）</td></tr>
                            <tr><td><a href="page.php?page_id=39">「技能五輪全国大会レポート」</a></td><td>勉強会プロジェクトでは、Webデザ…　（2009年10月24日）</td></tr>
                        </table>

                        <p class="backTop"><a href="#wrapper">ページの先頭に戻る</a></p>


                    </div>
                    <!-- entry END -->


Main;


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
