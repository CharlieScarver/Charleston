<?php require_once '../config.php'; ?>
<?php

$connect = mysql_connect($dbhost,$dbusr,$dbpw); //connect to DB
	if (!$connect) //Check is connection was successful
		echo "Failed to connect!";

	if (!mysql_select_db("charleston")) //Check is DB selection was successful
		echo "Failed to select DB!";

$results = mysql_query("SELECT * FROM `questions`");
	if (!$results)  // Succession check
		echo "Failed to select elements! :c<br>";

//echo $results;
echo "<hr>";

while($row = mysql_fetch_array($results)) { ////////
	echo "<p id=\"question_par\"> {$row['Question']} <br><br> {$row['Answer']} <br> by: {$row['Author']} </p>  ";
	echo "<hr>";
}



?>
