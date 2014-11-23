<?php
	/**
	Template for sub-category. 
	*/
?>
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
		if (have_posts()) :
			$category = arte_get_category();
			echo "<h3>" . $category->name ."</h3>";
			
			while (have_posts()) : the_post(); 
?>

					<table class="<?php arte_content_class(); ?>">
					<tr>
					<td><div class="purple_item">&nbsp;</div></td>
					<td>
					<?php  
						$post_link = get_permalink();
						//Set 'with_conditions' in link to display post with conditions&regulations links
						//$post_link = $post_link . "&amp;with_conditions=" . get_query_var('with_conditions');
					?>
					<a href="<?php  echo  $post_link  ?>"><?php the_title(); ?></a>
					</td>
					</tr>
					</table>
<?php			
			endwhile; 
						
			//Back link	to parent category		
			$category = arte_get_category();
			$parentCategory = get_category($category->category_parent, false);
			if (isset($parentCategory->cat_ID)){
				echo "&lt;&lt;&nbsp;";
				echo "<a href =\"" . get_category_link($parentCategory->cat_ID) . "\">" . $parentCategory->name ."</a>";
			}

		endif; 

?>

</div>
</td>
<?php get_footer(); ?>	
?>