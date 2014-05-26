<?php 

$serverName = "localhost";
$userName = "root";
$password = "rootpass";
$dbname = "charleston";
$gallery_name = "photography_gallery";

$connection = mysql_connect($serverName, $userName, $password) or die('Unable to connect to Database host' . mysql_error());
$dbselect = mysql_select_db($dbname, $connection) or die("Unable to select database:$dbname" . mysql_error());

$studentid = 5; //$_POST['student_id'];

$result = mysql_query("SELECT `ID` FROM `$gallery_name` WHERE `ID` = '$studentid'", $connection);

while($row = mysql_fetch_array($result))
    echo $row['ID'];

?>