<?php

echo "<style> #main_block {width: 750px;} #block_content {width: 550px;}</style>";

echo '<p id="block_title"> ', $_SESSION['user'], '\'s Profile </p>';

//--------Connect to MySQL and select DataBase--------------

if (!mysql_connect("localhost","root","rootpass")) //connect to MySQL 
//Check is connection was successful
	die("Failed to connect!");

if (!mysql_select_db("charleston"))  //Check is DB selection was successful
	die("Failed to select DB!");

//--------Get Number Of Images in the Gallery---------------

$user = $_SESSION['user'];
$gallery_name = "gallery_" . $user;
$gal_selector = mysql_query("SELECT * FROM `$gallery_name`");
if(!$gal_selector) 
	echo "Selection from DB failed<br>";

$pic_num = 0;

while ($row = mysql_fetch_array($gal_selector)) {
	$pic_num++;
}

//--------Get Email and RegDate---------------------


$data_selector = mysql_query("SELECT `Username`,`Email`,`RegDate` FROM `accounts` WHERE `Username` = '$user'");
// Find and Select the user's Data in the DB (not working check??)

if(!$data_selector) 
	echo "Selection from DB failed<br>";

//---------Print Everything------------------------

while($row = mysql_fetch_array($data_selector)) {

	echo "<p id=\"block_content\">";
	echo "Images in the Gallery: ", $pic_num;
	echo "</p>";
	echo "<hr>";
	echo "Email: {$row['Email']} <br><br>";
	echo "Registered on: ", $row['RegDate'];
	echo "<hr>";

}


?>
