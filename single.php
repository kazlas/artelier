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
		$category = arte_get_category();
		$parentCategory = get_category($category->category_parent, false);

		while (have_posts()) : the_post(); 
			echo "<div>";
			
			echo "<h3>"; the_title(); echo "</h3>";
			
			if ($parentCategory->slug == 'purple'){
				echo "<p>" . arte_header_links() . "</p>";
			}
			the_content();
			
			
			//Back link			
			echo "&lt;&lt;&nbsp;";

			echo "<a href =\"" . get_category_link($category->cat_ID);
			echo "&amp;is_subcat=1";
			echo "\">" . $category->name ."</a>";
			
			echo "</div>";

		endwhile; 
	endif; 
	
	
	/*
	* Prepare header links for condtitions and contact form
	*/
	function arte_header_links() {
		//Get page by slug
		$conditions_page = get_page_by_path("conditions");
		$contact_form_page = get_page_by_path("entry-form");
		
		//Separator consists of links: "conditions" and "participation form"
		$moreSeparator = $moreSeparator . "<a></a>&nbsp;&nbsp;<a href=\"?page_id=" . $conditions_page->ID . "\">Warunki uczestnictwa</a>";
		$moreSeparator = $moreSeparator . "&nbsp;&nbsp;" . "<a href=\"?page_id="  . $contact_form_page->ID . "\">Formularz zg&#322;oszeniowy</a>";
		
		return $moreSeparator;
	}

?>
		</div>
	</td>
	</tr>
	</table>
	
<?php get_footer(); ?>	
