<!-- menu -->	
	<td valign="top" align="right" width="230">

		<ul id="menu">
		<?php arte_category_list(); ?>
		</ul>
		
<?php 
	//newsletter box
	require (dirname(__FILE__) . '/lib/newsletter.php'); 
	
	//facebook box
	facebook_like_box('150306438371589','0','5','200','700','Hide','pl_PL'); 
?>
	</td>
