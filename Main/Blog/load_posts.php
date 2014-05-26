<?php

$connect = mysql_connect("localhost","root","rootpass");
	if (!$connect)
		echo "Failed to connect!";

	if (!mysql_select_db("charleston"))
		echo "Failed to select database!";

$results = mysql_query("SELECT * FROM `blog_posts`");
	if (!$results)
		echo "Failed to select elements! :c<br>";

$i = 0;
while($row = mysql_fetch_array($results)) {
	$posts[$i]['ID'] = $row['ID'];

	$posts[$i]['Author'] = $row['Author'];
	$posts[$i]['Content'] = $row['Content'];

	$posts[$i]['Date'] = $row['Date'];
	$posts[$i]['Time'] = $row['Time'];
	$posts[$i]['ClockPeriod'] = $row['ClockPeriod'];
	$i++;
}
$i--;


while($i > -1) {

	echo "
	<div class=\"post\">
		<p class=\"post_content\"> {$posts[$i]['Content']} </p>
		<p class=\"post_info\"> &nbsp &nbsp &nbsp by {$posts[$i]['Author']} on {$posts[$i]['Date']} at {$posts[$i]['Time']} {$posts[$i]['ClockPeriod']} </p>
	</div>
	";
	$i--;
	}
	
?>