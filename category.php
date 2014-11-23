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
	$category = arte_get_category();
	echo "<h3>" . $category->name ."</h3>";

	//Get all posts and list all subcatories below (if any)
	get_template_part('_getPosts');
	get_template_part('_getSubcategories');
	
	//Back link	to parent category		
	$parentCategory = get_category($category->category_parent, false);
	if (isset($parentCategory->cat_ID)){
		echo "<a href =\"" . get_category_link($parentCategory->cat_ID) . "\">&lt;&lt;&nbsp;" . $parentCategory->name ."</a>";
	}

	
?>


</div>
</td>
<?php get_footer(); ?>