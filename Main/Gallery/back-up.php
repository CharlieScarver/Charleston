<?php require_once '../config.php'; ?>
<?php

$connect = mysql_connect($dbhost,$dbusr,$dbpw); //connect to DB
	if (!$connect) //Check is connection was successful
		echo "Failed to connect!";

	if (!mysql_select_db("charleston")) //Check is DB selection was successful
		echo "Failed to select DB!";

$gallery_name = "photography_gallery";
$results = mysql_query("SELECT * FROM `$gallery_name`");
	if (!$results)  // Succession check
		echo "Failed to select elements! :c<br>";



while($row = mysql_fetch_array($results)) { 
	if (in_array($ip, $GLOBALS['admins'])
	&& file_exists($row['Source'])) {	 
		echo "
		<div class=\"image_container\">
			<a href=\"{$row['Source']}\"> <img src=\"{$row['Source']}\" alt=\"{$row['Alt']}\" class=\"gal_images\" onclick=\"clickSelector('{$row['Alt']}');\" /> </a>
			<form method=\"POST\" id=\"image_deletion_form\">
				<input type=\"hidden\" name=\"image_id\" value=\"{$row['Alt']}\">
				<input type=\"submit\" name=\"DeleteImage\" value=\"Delete Image\" >
			</form>
		</div>";
	} else {
		echo "<a href=\"{$row['Source']}\"><img src=\"{$row['Source']}\" alt=\"{$row['Alt']}\" class=\"gal_images\" onclick=\"clickSelector('{$row['Alt']}');\" /></a>";
	}
}



?>
