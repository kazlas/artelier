<?php

	//Display menu - the list of category sisters
	$category = arte_get_category();
	$categories = arte_get_category_children ($category->category_parent);
	
	echo	"<ul id=\"menu\">";
	foreach ( (array) array_keys( $categories ) as $key ) {
		echo "<li class=\"" .arte_category_slug_prefix ($categories[$key]) ."\">";
		echo "<a href=\"" .  get_category_link($categories[$key]->cat_ID)  . "\">" . $categories[$key]->name . "</a>";
		echo "</li>";
	}

	echo	"</ul>";

	
	
?>