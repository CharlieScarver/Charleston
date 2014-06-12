<?php

if (isset($_POST['DeleteImage'])) { // Delete Image => name

	$connect = mysql_connect("localhost","root","rootpass"); //connect to DB
		if (!$connect) //Check is connection was successful
			echo "Failed to connect!";

		if (!mysql_select_db("charleston")) //Check is DB selection was successful
			echo "Failed to select DB!";

	$gallery_name = "photography_gallery";
	$img_id = $_POST['image_id'];

	$results = mysql_query("SELECT `Extension` FROM `$gallery_name` WHERE `Alt` = '$img_id'");
		if (!$results)  // Succession check
			echo "Failed to select elements! :c<br>";

	//$ext = ".jpg";
	while($row = mysql_fetch_array($results)) { 
		$ext = $row['Extension'];
	}
	//echo "ext - {$ext}";

	$results = mysql_query("DELETE FROM `$gallery_name` WHERE `Alt` = '$img_id'");
	// delete database entry
	if (!$results)  // Succession check
		echo "Failed to delete image! :c<br>";
	else {
		$file = "Gallery/Pictures/photography_gallery/" . $_POST['image_id'] . "." . $ext;
		if (file_exists($file) && is_readable($file)) {
			unlink($file);
		} // delete image

		$file = "Gallery/Pictures/Thumbnails/" . $_POST['image_id'] . "_small." . $ext;
		if (file_exists($file) && is_readable($file)) {
			unlink($file);
		} // delete small thumbnail

		$file = "Gallery/Pictures/Thumbnails/" . $_POST['image_id'] . "_big." . $ext;
		if (file_exists($file) && is_readable($file)) {
			unlink($file);
		} // delete big thumbnail
	}

} 

?>