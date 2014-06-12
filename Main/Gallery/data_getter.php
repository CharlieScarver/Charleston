<?php

function getImgData() {
	$connect = mysql_connect("localhost","root","rootpass"); //connect to DB
		if (!$connect) //Check is connection was successful
			echo "Failed to connect!";

		if (!mysql_select_db("charleston")) //Check is DB selection was successful
			echo "Failed to select DB!";

	$gallery_name = "photography_gallery";
	$results = mysql_query("SELECT * FROM `$gallery_name`");
		if (!$results)  // Succession check
			echo "Failed to select elements! :c<br>";

			
	$i = 0;
	while($row = mysql_fetch_array($results)) { 
		$pics[$i]['ID'] = $row['ID'];
		$pics[$i]['ImgSource'] = $row['ImgSource'];
		$pics[$i]['ThumbSource'] = $row['ThumbSource'];
		$pics[$i]['Alt'] = $row['Alt']; 
		$pics[$i]['Extension'] = $row['Extension']; 
		$i++;
	}
	$i--;

	if (!isset($pics[0]['ID']))
		$pics[0]['ID'] = 0;

	return $pics;
}



?>