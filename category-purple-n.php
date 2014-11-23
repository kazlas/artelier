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
		if (have_posts()) :
			$category = arte_get_category();
			echo "<h3>" . $category->name ."</h3>";
			
			while (have_posts()) : the_post(); 
?>

					<table class="<?php arte_content_class(); ?>">
					<tr>
					<td><div class="purple_item">&nbsp;</div></td>
					<td>
					<a href="<?php  echo get_permalink(); ?>"><?php the_title(); ?></a>
					</td>
					</tr>
					</table>
<?php			
			endwhile; 
						
			//Back link			
			echo "&lt;&lt;&nbsp;";
			$purple_category = get_category_by_slug("purple");
			echo "<a href =\"" . get_category_link($purple_category->cat_ID) . "\">" . $purple_category->name ."</a>";

		endif; 

?>

</div>
</td>
<?php get_footer(); ?>	
?>