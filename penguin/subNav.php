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
					
						<li class="level10"><a href="#">タグ10</a><li>
						<li class="level1"><a href="#">タグ1</a><li>
						<li class="level5"><a href="#">タグ5</a><li>
						<li class="level2"><a href="#">タグ2</a><li>
						<li class="level7"><a href="#">タグ7</a><li>
						<li class="level6"><a href="#">タグ6</a><li>
						<li class="level3"><a href="#">タグ3</a><li>
						<li class="level8"><a href="#">タグ8</a><li>
						<li class="level9"><a href="#">タグ9</a><li>
						<li class="level4"><a href="#">タグ4</a><li>
						
					</ul> 
					
				</div>
				 
		    </div>		
        
        </div>
        <!-- subContent END -->



