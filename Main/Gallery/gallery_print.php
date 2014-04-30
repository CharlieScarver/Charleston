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

		
$i = 0;
while($row = mysql_fetch_array($results)) { 
	$pics[$i]['ImgSource'] = $row['ImgSource'];
	$pics[$i]['ThumbSource'] = $row['ThumbSource'];
	$pics[$i]['Alt'] = $row['Alt']; 
	$i++;
}

$i--;
while($i > -1) { 
	if (in_array($ip, $GLOBALS['admins'])
	&& file_exists($pics[$i]['ImgSource'])) {	 
		echo "
		<div class=\"image_container\">
			<a href=\"{$pics[$i]['ImgSource']}\"> <img src=\"{$pics[$i]['ThumbSource']}\" alt=\"{$row['Alt']}\" class=\"gal_images\" onclick=\"clickSelector('{$pics[$i]['Alt']}');\" /> </a>
			<form method=\"POST\" id=\"image_deletion_form\">
				<input type=\"hidden\" name=\"image_id\" value=\"{$pics[$i]['Alt']}\">
				<input type=\"submit\" name=\"DeleteImage\" value=\"Delete Image\" >
			</form>
		</div>";
	} else {
		echo "<a href=\"{$pics[$i]['ImgSource']}\"><img src=\"{$pics[$i]['ThumbSource']}\" alt=\"{$pics[$i]['Alt']}\" class=\"gal_images\" onclick=\"clickSelector('{$pics[$i]['Alt']}');\" /></a>";
	}
	$i--;
}



?>