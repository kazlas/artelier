<?php
	//Set front page to display category
	if (is_front_page()) {
		//For front page display only "blue" category
		$blue_category =  get_category_by_path("blue");
		$location = "Location: " . "?cat=" . $blue_category->cat_ID;
		header ($location);
	}
?>

	
