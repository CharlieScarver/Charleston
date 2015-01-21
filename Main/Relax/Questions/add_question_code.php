<?php require_once '../config.php'; ?>
<?php

$connect = mysql_connect($dbhost,$dbusr,$dbpw); //connect to DB
if (!$connect) { //Check is connection was successful
	die("Failed to connect to MySQL!");
}

if (!mysql_select_db("charleston")) { //Check is DB selection was successful
	die("Failed to select DB!");
}

if(isset($_POST['AddQuestion'])) { // If the AddQuestion button has been pressed
	$author = $_POST['Author']; // Get the entered Author	
	$question = $_POST['Question']; // Get the entered Question
	$answer = $_POST['Answer']; // Get the entered Answer
	$date = date('Y-m-d'); // Get the current Date

	if ($question != "" && $answer != "" && $author != "") { // If Question and Answer fields are NOT empty

		$elems = mysql_query("SELECT `Question` FROM `questions` WHERE `Question` = '$question'");
		// Find and Select the Question in the DB 
			if (!$elems)
				echo "Data selection failed <br>";
		$row = mysql_fetch_row($elems); // Extract the Question

		if (!is_null($row[0])) { // If the Question is NOT NULL (exists)
			echo "Question: <br>", $row[0], "<br> already exists!<br>";

		} else { 
			$results = mysql_query("INSERT INTO `questions` (`Author`, `Question`, `Answer`, `Date`) 
												VALUES ('$author', '$question', '$answer', '$date')");  
			// Insert the new Data into the DB
			echo "|{$results}|";
			if (!$results) { // The Data was NOT INSERTED successfully
				echo "Failed to insert data :c<br>";
			} else {
				header("Location: http://charleston.zapto.org/?page=Add_Success");
				exit;
			}
		}
		
	} else { // If Question and Answer fields are EMPTY
		echo "Obligatory fields not filled!<br>";
	}

} // If the AddQuestion button has been pressed

?>
