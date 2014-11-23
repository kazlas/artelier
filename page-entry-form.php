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

	//Show messages - only if set session_start() in wp-config.php
	if ("" != $_SESSION['error']){
		echo $_SESSION['error'] . "<br><br>";
	}
	$_SESSION['error'] = "";
	
	if ("" != $_SESSION['message']){
		echo $_SESSION['message'] . "<br><br>";
	}
	$_SESSION['message'] = "";

	//Show page content in form to be sent to ./lib/postMail.php
	echo "<form lang=\"pl\" action=\""; 
	echo bloginfo('template_directory');  //find this theme directory
	echo "/lib/postMail.php\" enctype=\"multipart/form-data\" method=\"POST\">";
	the_post();
	the_content();
	echo "</form>";
	
?>
		
</div>
</td>
<?php get_footer(); ?>	


