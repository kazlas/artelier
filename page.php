<?php get_header(); ?>
<body leftmargin="0" rightmargin="0" topmargin="0" bottommargin="0">

<table height="100%" width="768"  bgcolor="#FFFFFF" align="center" cellpadding="0" cellspacing="0" border="0" noborder>
<tr>
<td valign="top" height="1">
<div class="header_img_purple">&nbsp;</div>
	<table align="center" width="100%" cellpadding="0" cellspacing="0" border="0" noborder>
	<tr>
	
<?php get_sidebar(); ?>

<td valign="top">
<div class="normal + purple" >

<?php
	//Show only page content
	the_post();
	the_content();

	//Back link	
	echo "&lt;&lt;&nbsp;";
	$purple_category = get_category_by_slug("purple");
	echo "<a href =\"" . get_category_link($purple_category->cat_ID) . "\">Cofnij</a>";
?>
		
</div>
</td>
<?php get_footer(); ?>	


