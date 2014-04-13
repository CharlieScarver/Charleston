<?php

if(isset($_POST['Import'])) {
	$allowedExts = array("gif", "jpeg", "jpg", "png", "JPG");
	$temp = explode(".", $_FILES["file"]["name"]);
	$extension = end($temp);

	if ((($_FILES['file']['name'] != "" )
	|| ($_FILES["file"]["type"] == "image/gif")
	|| ($_FILES["file"]["type"] == "image/jpeg")
	|| ($_FILES["file"]["type"] == "image/jpg")
	|| ($_FILES["file"]["type"] == "image/pjpeg")
	|| ($_FILES["file"]["type"] == "image/x-png")
	|| ($_FILES["file"]["type"] == "image/png"))
	&& ($_FILES["file"]["size"] < 70000000)
	&& in_array($extension, $allowedExts))
	{
		if ($_FILES["file"]["error"] > 0) {
		  echo "Error: " . $_FILES["file"]["error"] . "<br>";
		} else {		

			if (file_exists("Gallery/Pictures/photography_gallery/" . $_FILES["file"]["name"])) {
		     	echo $_FILES["file"]["name"] . " already exists. <br>";
		    } else {
		      	move_uploaded_file($_FILES["file"]["tmp_name"], "Gallery/Pictures/photography_gallery/" . $_FILES["file"]["name"]);

		      	$connect = mysql_connect("localhost","root","rootpass"); //connect to DB
				if (!$connect) { //Check is connection was successful
					echo "Failed to connect!";
				}

				if (!mysql_select_db("charleston")) { //Check is DB selection was successful
					echo "Failed to select DB!";
				}

				$gallery_name = "photography_gallery";
				$src = "Gallery/Pictures/photography_gallery/" . $_FILES["file"]["name"];
		      	$name = explode('.', $_FILES["file"]["name"]);
		      	$alt = $name[0];
		      	$results = mysql_query("INSERT INTO `$gallery_name` (`Source`, `Alt`, `Extension`) VALUES ('$src', '$alt', '$extension')");
		      	if (!$results)  // Succession check
					echo "Failed to import image! :c<br>";
		    }

		    list($w, $h) = getimagesize("Gallery/Pictures/photography_gallery/" . $_FILES["file"]["name"]);
			//echo "width - " . $w . "<br>";
			//echo "height - " . $h . "<br>";
		}

	} else {
		echo "<b>Invalid file</b> <br><br>";
	}

}

?>


