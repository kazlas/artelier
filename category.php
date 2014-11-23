<?php
	/**
	For purple-1, purple-2,.. categories display in special template "category-purple-n.php", others display by normal Wordpress flow
	*/
	
	$category = arte_get_category();
	$start_with_purple = (strncmp ($category->slug, "purple", strlen("purple"))==0);
	
	if ($start_with_purple) {
		get_template_part('category-purple-n');
	}
	else {
		get_template_part('index');
	}


	
	
?>