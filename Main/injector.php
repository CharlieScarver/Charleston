<?php

require_once 'Gallery/data_getter.php';

$gallery_name = "photography_gallery";
$pics = getImgData();
$i = count($pics) - 1;
echo $i;

$i--;
while($i > -1) { 
	$alt = $pics[$i]['Alt'];
	$thumb_src = "Gallery/Pictures/Thumbnails/" . $alt . ".jpg";
	$results = mysql_query("UPDATE `$gallery_name` SET `ThumbSource` = '$thumb_src' WHERE `Alt` = '$alt'");
	if (!$results)  // Succession check
		echo "Failed to update entry $i! :c<br>";
	$i--;
}

?>