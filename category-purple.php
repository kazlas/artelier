<?php get_header(); ?>
<body leftmargin="0" rightmargin="0" topmargin="0" bottommargin="0">

<table height="100%" width="768"  bgcolor="#FFFFFF" align="center" cellpadding="0" cellspacing="0" border="0" noborder>
<tr>
<td valign="top" height="1">
<div class="<?php arte_header_class(); ?>">&nbsp;</div>
	<table align="center" width="100%" cellpadding="0" cellspacing="0" border="0" noborder>
	<tr>
	
<?php get_sidebar(); ?>

<td valign="top">
<div class="<?php arte_content_class(); ?>" >

<?php

	//Display subcategories of 'purple'
	$categories = arte_get_category_children ('purple');
	
	foreach ($categories as $category) {
		arte_show_category ($category);
	}

?>

</div>
</td>
<?php get_footer(); ?>	
<?php

	/*
	* Get current category children names
	*/
	function arte_get_category_children ($category_name){
		$category = get_category_by_slug($category_name);
		$args = array (
			'orderby' => 'slug',
			'parent' => $category->cat_ID
		);
			
		$child_categories = get_categories($args);
		return $child_categories;
	}
	
	/* 
	* Show posts only for given category name
	*/
	function arte_show_category ($category) {
		$args = array (
			'cat' => $category->cat_ID,
			'paged' => get_query_var('paged')
		);
		
		//The Wordpress Loop
		query_posts($args);
		if (have_posts()) :
			echo "<h3>" . $category->name . "</h3>";
			
			while (have_posts()) : the_post(); 
?>

					<table class="<?php arte_content_class(); ?>">
					<tr>
					<td><div class="purple_item">&nbsp;</div></td>
					<td>
					<a href="<?php  echo get_permalink(); ?>" ><?php the_title(); ?></a>
					</td>
					</tr>
					</table>
				
							
<?php			
			endwhile; 
						
			echo "<p>";
			posts_nav_link();
			echo "</p>";
		endif; 
		
		//Reset query
		wp_reset_query();
	}


?>