<?php

echo arte_get_search_form();

/**
 * Display search form.
 *
 * This function is primarily used by themes which want to hardcode the search
 * form into the sidebar and also by the search widget in WordPress.
 *
 * There is also an action that is called whenever the function is run called,
 * 'get_search_form'. This can be useful for outputting JavaScript that the
 * search relies on or various formatting that applies to the beginning of the
 * search. To give a few examples of what it can be used for.
 *
 * @since 2.7.0
 * @param boolean $echo Default to echo and not return the form.
 */
function arte_get_search_form($echo = true) {

	$form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
	<table class="search-box" border="0" width="200" align="right">
	<tr><td>
		<input type="text" value="' . get_search_query() . '" name="s" id="s" />
	</td><td>
		<input type="submit" id="searchsubmit" value="'. esc_attr__('Search') .'" />
	</td>
	</tr>
	</table>
	</form>';

	if ( $echo )
		echo apply_filters('get_search_form', $form);
	else
		return apply_filters('get_search_form', $form);
}

?>