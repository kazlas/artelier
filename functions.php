<?php
/**
 * Arte functions and definitions
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. 
 *
 *
 * @package WordPress
 * @subpackage Arte
 * @since Arte 1.0
 */

define ("DEFAULT_CLASS_STYLE", "green");
 
/*
* Get category from address param or from post ID
*/
function arte_get_category() {
	$category = "";

	$cat_ID = get_query_var('cat');
	
	if (!empty($cat_ID)) {
		$category = get_category($cat_ID, false);
	}
	else {
		$categories = get_the_category();
		$category = $categories[0];
	}
	
	return $category;	
}
 
/**
* Get header class name "header_img [+ <category-name>]"
*/
function arte_header_class() {
	$category = arte_get_category();
	
	//Use category slug for CSS
	$slug = $category->slug;
	$default_header = "header_img";
	
	//For front page use default header
	if (is_front_page()) {
		 echo $default_header . "_" .DEFAULT_CLASS_STYLE;
		 return;
	};
	
	//Use category header
	if (!empty($slug)){
		echo $default_header ."_". $slug ;
	}
	else {
		 echo $default_header . "_" .DEFAULT_CLASS_STYLE;
	}
};

/**
* Get conent class name
*/
function arte_content_class() {
	$category = arte_get_category();
	$slug = $category->slug;
	$default_style = "normal";
	
	//For front page use default header
	if (is_front_page()) {
		 echo $default_style ." + " .DEFAULT_CLASS_STYLE;
		 return;
	};
	
	//Use category header, default is green
	if (!empty($slug)){
		echo $default_style ." + ". $slug ;
	}
	else {
		echo $default_style ." + " .DEFAULT_CLASS_STYLE;
	}
	
}

/**
* Generate list of categories links with CSS class. 
* List only main categories (with parent = 0)
*/
function arte_category_list() {
	$categories = get_categories('orderby=id&parent=0');
	foreach ( (array) array_keys( $categories ) as $key ) {
		echo "<li class=\"" .$categories[$key]->slug ."\">";
		echo "<a href=\"" .  get_category_link($categories[$key]->cat_ID)  . "\">" . $categories[$key]->name . "</a>";
		echo "</li>";
	}
}


	

?>