<?php

$connect = mysql_connect("localhost","root","rootpass"); //connect to DB
	if (!$connect) //Check is connection was successful
		echo "Failed to connect!";

	if (!mysql_select_db("charleston")) //Check is DB selection was successful
		echo "Failed to select DB!";

$gallery_name = "photography_gallery";
$results = mysql_query("SELECT * FROM `$gallery_name`");
	if (!$results)  // Succession check
		echo "Failed to select elements! :c<br>";

require_once 'Gallery/thumbnail_creator.php';	

while($row = mysql_fetch_array($results)) { 
	$pics['ImgSource'] = $row['ImgSource']; 
	$pics['ThumbSource'] = $row['ThumbSource']; 
	$pics['Alt'] = $row['Alt']; 
	$pics['Extension'] = $row['Extension']; 
	
	createThumb("{$pics['ImgSource']}", "{$pics['ThumbSource']}", 750);
}


?>