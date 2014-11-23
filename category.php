<?php
	/**
	For parameter 'is_subcat' categories display in special template for subcategories "subCategory.php". 
	others display by normal Wordpress flow
	*/
	if (isset ($wp_query->query_vars['is_subcat'])){
		get_template_part('subCategory');
	}
	else {
		get_template_part('index');
	}
	
	

?>