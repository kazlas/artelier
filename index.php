<?php
	//Set front page to display category
	if (is_front_page()) {
		//For front page display only "blue" category
		$blue_category =  get_category_by_path("blue");
		$location = "Location: " . "?cat=" . $blue_category->cat_ID;
		header ($location);
	} 
?>
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
	
	//The Wordpress Loop
	if (have_posts()) :
		while (have_posts()) : the_post(); 
?>
					<div>
						<?php the_content("Szczeg&#243;&#322;y"); ?>
					</div>
<?php 
		endwhile; 
	endif; 
?>

</div>
</td>
<?php get_footer(); ?>	
