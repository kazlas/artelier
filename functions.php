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

define ("DEFAULT_HEADER", "header_img");
define ("DEFAULT_CLASS_STYLE", "green");
define ("DEFAULT_NORMAL_STYLE", "normal");
 
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
* Get category CSS name where category suffix "-[x]" is stripped away as category number
*/
function arte_category_css ($category) {
	//Use category slug for CSS class, category suffix "-[x]" is stripped away as category number
	$slug = $category->slug;
	$pos = strrpos($slug , "-");
	if ($pos != FALSE) {
		$css = substr($slug,0,$pos);
	}
	else {
		$css = $slug;
	}
	
	return $css;
}



/**
* Get header CSS name "header_img [+ <category-prefix>]"
* Prefix is counted till first "-" (minus sign)
*/
function arte_header_class() {
	$css = arte_category_css (arte_get_category());
	
	//For front page use default header
	if (is_front_page()) {
		 echo DEFAULT_HEADER . "_" .DEFAULT_CLASS_STYLE;
		 return;
	};
	
	//Use category header
	if (!empty($css)){
		echo DEFAULT_HEADER ."_". $css ;
	}
	else {
		 echo DEFAULT_HEADER . "_" .DEFAULT_CLASS_STYLE;
	}
};

/**
* Get content CSS name
*/
function arte_content_class() {
	$css = arte_category_css (arte_get_category());
	
	//For front page use default header
	if (is_front_page()) {
		 echo DEFAULT_NORMAL_STYLE ." + " .DEFAULT_CLASS_STYLE;
		 return;
	};
	
	//Use category header, default is green
	if (!empty($css)){
		echo DEFAULT_NORMAL_STYLE ." + ". $css ;
	}
	else {
		echo DEFAULT_NORMAL_STYLE ." + " .DEFAULT_CLASS_STYLE;
	}
	
}



/**
* Generate list of categories links with CSS class. 
* List only main categories (with parent = 0)
*/
function arte_category_list() {
	$categories = get_categories('orderby=id&parent=0');
	foreach ( (array) array_keys( $categories ) as $key ) {
		echo "<li class=\"" .arte_category_css ($categories[$key]) ."\">";
		echo "<a href=\"" .  get_category_link($categories[$key]->cat_ID)  . "\">" . $categories[$key]->name . "</a>";
		echo "</li>";
	}
}


	

?>