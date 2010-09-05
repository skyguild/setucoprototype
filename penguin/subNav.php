<?php

echo <<<NAV

<!-- subContent START -->
        <div id="subContent">

            <div id="navArea">

NAV;

                print '<div class="navList">';


                    print "<h3>カテゴリー</h3>";

                    print "<ul>";

                    $result_cat = call_data("cat_id,cat_name","category"," ORDER BY cat_name");

                    while($row_cat = mysql_fetch_array($result_cat)){

                        print "<li><a href='cat.php'>{$row_cat['cat_name']}</a></li>";

                    }

                    print "</ul>";

                print "</div>";


?>
				<div class="navList">

					<h3>タグクラウド</h3>

					<ul id="tagCloud">

						<li class="level10"><a href="tag.php">タグ10</a></li>
						<li class="level1"><a href="tag.php">タグ1</a></li>
						<li class="level5"><a href="tag.php">タグ5</a></li>
						<li class="level2"><a href="tag.php">タグ2</a></li>
						<li class="level7"><a href="tag.php">タグ7</a></li>
						<li class="level6"><a href="tag.php">タグ6</a></li>
						<li class="level3"><a href="tag.php">タグ3</a></li>
						<li class="level8"><a href="tag.php">タグ8</a></li>
						<li class="level9"><a href="tag.php">タグ9</a></li>
						<li class="level4"><a href="tag.php">タグ4</a></li>

					</ul>

				</div>

		    </div>

        </div>
        <!-- subContent END -->



