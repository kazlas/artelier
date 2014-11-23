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
		$category = arte_get_category();

		while (have_posts()) : the_post(); 
			echo "<div>";
			echo "<h3>"; the_title(); echo "</h3>";
			echo "<p>" . arte_header_links($category) . "</p>";
			
			the_content();
			
			//Back link
			echo arte_back_link($category);
			
			echo "</div>";

		endwhile; 
	endif; 
	
	
	/*
	* Prepare header links for survey, condtitions and contact form
	*/
	function arte_header_links($category) {
		$headerLinks = "";
		$parentCategory = get_category($category->category_parent, false);

		//Get page by slug
		$conditions_page = get_page_by_path("conditions");
		$contact_form_page = get_page_by_path("entry-form");
			
		//Link to survey
		if (arte_is_survey_active ("ARTESonda")) {
			$artesonda_page = get_page_by_path("artesonda");
			$headerLinks = $headerLinks . "<a></a>&nbsp;&nbsp;<a href=\"?page_id=" . $artesonda_page->ID . "\">ARTESonda</a>";
		};
			
		//Links: "conditions" and "participation form"
		$headerLinks = $headerLinks . "&nbsp;&nbsp;" . "<a href=\"?page_id="  . $conditions_page->ID . "\">Warunki uczestnictwa</a>";
		$headerLinks = $headerLinks . "&nbsp;&nbsp;" . "<a href=\"?page_id="  . $contact_form_page->ID . "\">Formularz zg&#322;oszeniowy</a>";
			

		return $headerLinks;
	}
	
	/*
	* Check status for survey
	*/
	function arte_is_survey_active ($name){
		$survey_details = array();
		$wpdb = $GLOBALS['wpdb'];
		$survey_details = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}surveys_survey WHERE name='{$name}'");
		
		return $survey_details->status;
	}
	
	
	/*
	* Prepare back link
	*/
	function arte_back_link($category){
		
		$backLink = $backLink . "&lt;&lt;&nbsp;";
		$backLink = $backLink . "<a href =\"" . get_category_link($category->cat_ID);
		$backLink = $backLink . "\">" . $category->name ."</a>";
			
		return $backLink;
	}
	

?>
		</div>
	</td>
	</tr>
	</table>
	
<?php get_footer(); ?>	
