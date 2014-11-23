<!-- menu -->	
	<td valign="top" align="right" width="230">

<?php 
	get_template_part('_getMenu');
		
	//newsletter box
	require (dirname(__FILE__) . '/lib/newsletter.php'); 
	
	//facebook box
	facebook_like_box('150306438371589','0','5','200','700','Hide','pl_PL'); 
?>
	</td>

	