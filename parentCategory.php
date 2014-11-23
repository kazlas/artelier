<?php get_header(); ?>
<body leftmargin="0" rightmargin="0" topmargin="0" bottommargin="0">

<table height="100%" width="768"  bgcolor="#FFFFFF" align="center" cellpadding="0" cellspacing="0" border="0" noborder>
<tr>
<td valign="top" height="1">
<div class="<?php arte_header_class(); ?>">&nbsp;</div>
<?php get_search_form(); ?>
	<table align="center" width="100%" cellpadding="0" cellspacing="0" border="0" noborder>
	<tr>
	
<?php get_sidebar(); ?>

<td valign="top">
<div class="<?php arte_content_class(); ?>" >
<?php

	//Display subcategories
	$category = arte_get_category();
	$categories = arte_get_category_children ($category->cat_ID);
	
	
	foreach ($categories as $category) {
		echo "<h3>" ;
		echo "<a href =\"" . get_category_link($category->cat_ID);
		//Set 'is_subcat' in link to display linked page as subcategory template
		echo "&amp;is_subcat=1\"";
		echo "title =\"". $category->name . "\"";
		echo ">" . $category->name ."</a>";
		echo "</h3>";
	}

?>

</div>
</td>
<?php get_footer(); ?>	
<?php

	/*
	* Get current category children names
	*/
	function arte_get_category_children ($category_id){
		$args = array (
			'orderby' => 'slug',
			'parent' => $category_id
		);
			
		$child_categories = get_categories($args);
		return $child_categories;
	}
	


?>