<?php 

if(isset($_POST['NewPost'])) {
	$connect = mysql_connect("localhost","root","rootpass");
		if (!$connect)
			echo "Failed to connect!";

		if (!mysql_select_db("charleston"))
			echo "Failed to select database!";

$results = mysql_query("SELECT * FROM `blog_posts`");
		if (!$results)
			echo "Failed to insert elements! :c<br>";

	while($row = mysql_fetch_array($results)) {$id = $row['ID'];}
	$id++;

	if ($_POST['Author'] != "" && $_POST['Content'] != "") {

		$author = htmlspecialchars(trim($_POST['Author']), ENT_QUOTES);		
		$content = htmlspecialchars(trim($_POST['Content']), ENT_QUOTES);
		$content = str_replace("\r\n", "<br>", $content);
		$content = str_replace("<br>   -", "<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; -", $content);


		date_default_timezone_set("Europe/Sofia");
		$date = date('Y-m-d');
		$time = date('h:i:s');
		$cp = date('A');

	
		$results = mysql_query("INSERT INTO `blog_posts`(`ID`, `Author`, `Content`, `Date`, `Time`, `ClockPeriod`) VALUES ('$id', '$author','$content','$date','$time','$cp')");
			if (!$results) {
				echo "Failed to insert elements! :c<br>";
			} else {
				echo("<meta http-equiv=\"refresh\" content=\"0\">");
			}
	} else { echo "NILL VALUES!"; }
}

?>