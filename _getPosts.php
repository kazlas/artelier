<?php 
	//Get posts only for current category, exclude subcategories
	$current_cat = intval (get_query_var('cat'));
	$paged =  (get_query_var('paged')) ? get_query_var('paged') :1;
	$args = array (
		category__in => array($current_cat),
		paged => $paged,
		post_status => 'publish'
	);
	query_posts($args);
	
	//The Wordpress Loop
	if (have_posts()) :
		while (have_posts()) : the_post(); 
?>		
		<div>
		<h4><?php the_title(); ?></h4>
		<?php the_content("Szczeg&#243;&#322;y"); ?>
		</div>
		<br>
<?php			
		endwhile; 
	endif; 

	//For paging use nagigation
	echo "<div>";
 	posts_nav_link();
	echo "</div>";
	
	//Come back to original query
	wp_reset_query();
?>
