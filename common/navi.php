<?php

$active = $_SESSION["active"]; // cat, page, tag ,file ,site
$rootpath = $GLOBALS["rootpath"];


?>

        <!-- gNav START -->
        <ul id="gNav">

            <li><a href="<?php print $rootpath; ?>index.php" title="管理画面のトップに戻ります"><img src="<?php print $rootpath; ?>images/btn_menu_top.jpg" alt="トップ" width="150" height="30" /></a></li>

            <li>
                <dl>
                    <dt><a href="<?php print $rootpath; ?>directory/index.php"><img src="<?php print $rootpath; ?>images/h_menu_directory.jpg" alt="サイト構造" width="150" height="30" /></a></dt>
                        <dd<?php if ($active == 'directory') print ' id="active"'; ?>><a href="<?php print $rootpath; ?>directory/index.php">カテゴリー・ページの一覧</a></dd>
                </dl>
            </li>

            <li>
                <dl>
                    <dt><a href="<?php print $rootpath; ?>category/index.php"><img src="<?php print $rootpath; ?>images/h_menu_category.jpg" alt="カテゴリー" width="150" height="30" /></a></dt>
                        <dd<?php if ($active == 'category') print ' id="active"'; ?>><a href="<?php print $rootpath; ?>category/index.php">追加・編集・削除</a></dd>
                </dl>
            </li>

            <li>
                <dl>
                    <dt><a href="<?php print $rootpath; ?>page/index.php"><img src="<?php print $rootpath; ?>images/h_menu_page.jpg" alt="ページ" width="150" height="30" /></a></dt>
                        <dd<?php if ($active == 'pageContribution') print ' id="active"'; ?>><a href="<?php print $rootpath; ?>page/contribution/index.php">新規作成</a></dd>
                        <dd<?php if ($active == 'page') print ' id="active"'; ?>><a href="<?php print $rootpath; ?>page/index.php">編集・削除</a></dd>
                </dl>
            </li>

            <li>
                <dl>
                    <dt><a href="<?php print $rootpath; ?>tag/index.php"><img src="<?php print $rootpath; ?>images/h_menu_tag.jpg" alt="タグ" width="150" height="30" /></a></dt>
                        <dd<?php if ($active == 'tag') print ' id="active"'; ?>><a href="<?php print $rootpath; ?>tag/index.php">追加・編集・削除</a></dd>
                </dl>
            </li>
            <li>
                <dl>
                    <dt><a href="<?php print $rootpath; ?>file/index.php"><img src="<?php print $rootpath; ?>images/h_menu_file.jpg" alt="ファイル" width="150" height="30" /></a></dt>
                        <dd<?php if ($active == 'file') print ' id="active"'; ?>><a href="<?php print $rootpath; ?>file/index.php">追加・編集・削除</a></dd>
                </dl>
            </li>

            <li>
                <dl>
                    <dt><a href="<?php print $rootpath; ?>site/index.php"><img src="<?php print $rootpath; ?>images/h_menu_site.jpg" alt="サイト全般" width="150" height="30" /></a></dt>
                        <dd<?php if ($active == 'site') print ' id="active"'; ?>><a href="<?php print $rootpath; ?>site/index.php">サイト情報の編集</a></dd>
                </dl>
            </li>

        </ul>
        <!-- gNav END -->
