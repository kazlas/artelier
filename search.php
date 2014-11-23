<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Artelier
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
	
	//The Wordpress Loop
	if (have_posts()) :
		echo "<h3>" . __("Wyniki wyszukiwania:") . "</h3>";
		while (have_posts()) : the_post(); 
?>
					<div>
					<?php
						$category = get_the_category(); 
						$link_name = $category[0]->cat_name;
						
						if (empty($link_name)) {
							$link_name= __("Wi&#281;cej");
						}
					?>
					<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
					<?=$link_name ?>
					</a>
					<?php the_excerpt(); ?>
					</div>
<?php 
		endwhile; 
	else : echo  __("Niestety - nie znaleziono frazy");
	endif; 
?> 


</div>
</td>
<?php get_footer(); ?>	
