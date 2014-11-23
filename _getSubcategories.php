<?php

	//Display subcategories
	$category = arte_get_category();
	$categories = arte_get_category_children ($category->cat_ID);
	
	
	foreach ($categories as $category) {
		echo "<h3>" ;
		echo "<a href =\"" . get_category_link($category->cat_ID);
		echo "title =\"". $category->name . "\"";
		echo ">" . $category->name ."</a>";
		echo "</h3>";
	}


	
?>
