<?php
	//Newsletter box
	//K.Laskowski 2011-11-18 (kazlaskowski@o2.pl)
	//Please retain this note. Thanks!

	//Get current URL
	function curPageURL() {
	 $pageURL = 'http';
	 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	 $pageURL .= "://";
	 if ($_SERVER["SERVER_PORT"] != "80") {
	  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	 } else {
	  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	 }
	 return $pageURL;
	}

	//Write HTML form action
	echo "<form lang=\"pl\" action=\""; 
	echo bloginfo('template_directory'); 
	echo "/lib/postSignForNewsletterMail.php\" enctype=\"multipart/form-data\" method=\"POST\">";
?>		
<table class="newsletter-box" border="0" width="200">
<tr class="label">
<td><h2>Newsletter</h2></td>
</tr>
<tr><td>
<?php
	//Show messages - only if set session_start() in wp-config.php
	if ("" != $_SESSION['newsletter']['error']){
		echo $_SESSION['newsletter']['error'];
	}
	$_SESSION['newsletter']['error'] = "";
	
	if ("" != $_SESSION['newsletter']['message']){
		echo $_SESSION['newsletter']['message'];
	}
	$_SESSION['newsletter']['message'] = "";
?>
</td></td>
<tr>
<td>Imi&#281;:</td>
</tr>
<tr>
<td><input name="name" type="text"><input name="backurl" type="hidden" value="<?php echo curPageURL(); ?>"></td>
</tr>
<tr>
<td>Telefon:</td>
</tr>
<tr>
<td><input name="phone" type="text"></td>
</tr>
<tr>
<td>E-mail:</td>
</tr>
<tr>
<td><input name="email" type="text"></td>
</tr>
<tr>
<td><input type="submit" value="Zapisz mnie" /> </td>
</tr>
</form>		
</table>