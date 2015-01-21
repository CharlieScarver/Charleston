<?php require_once '../config.php'; ?>
<?php

$connect = mysql_connect($dbhost,$dbusr,$dbpw); //connect to DB
	if (!$connect) //Check is connection was successful
		echo "Failed to connect!";

	if (!mysql_select_db("charleston")) //Check is DB selection was successful
		echo "Failed to select DB!";

$gallery_name = "gallery_" . $_SESSION['user'];
$results = mysql_query("SELECT * FROM `$gallery_name`");
	if (!$results)  // Succession check
		echo "Failed to select elements! :c<br>";

//echo $results;
echo "<hr>";

while($row = mysql_fetch_array($results)) { ////////////////////////////////////////////////////////
	echo "<img src=\"{$row['Source']}\" alt=\"{$row['Alt']}\" id=\"{$row['Alt']}\" class=\"gal_images\" onclick=\"clickSelector('{$row['Alt']}');\" />";
}



?>
