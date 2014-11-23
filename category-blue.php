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
<?php 
	
	//The Wordpress Loop
	//query_posts('&orderby=meta_value&meta_key=sort&order=ASC');
	if (have_posts()) :
		while (have_posts()) : the_post(); 

	
	
?>
					<table class="<?php arte_content_class(); ?>">
					<tr>
					<td></td>
					<td>
					<h3><i><?php the_title(); ?></i></h3>
					<?php the_time('j F Y') ?>
					<?php the_content("Szczeg&#243;&#322;y"); ?>
					</td>
					</tr>
					</table>
				

<?php 
		endwhile; 
	endif; 
?>

</td>
<?php get_footer(); ?>	
