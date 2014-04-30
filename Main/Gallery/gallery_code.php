<?php
require_once 'data_getter.php';
require_once 'thumbnail_creator.php';


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

			$img_src = "Gallery/Pictures/photography_gallery/" . $_FILES["file"]["name"];

			if (file_exists($img_src)) {
		     	echo $_FILES["file"]["name"] . " already exists. <br>";
		    } else {
		      	if (!move_uploaded_file($_FILES["file"]["tmp_name"], $img_src)) {
		      		echo "Failed to move uploaded file!<br>";
		      	} else {

			      	$gallery_name = "photography_gallery";
			      	$thumb_src = "Gallery/Pictures/Thumbnails/" . $_FILES["file"]["name"];
			      	$name = explode('.', $_FILES["file"]["name"]);
			      	$alt = $name[0];

			      	if (!createThumb("$img_src", "$thumb_src", 750)) {
			      		echo "Failed to create thumbnail! <br>";
			      	} else {
			      		
						$pics = getImgData();
						$i = count($pics) - 1;
						$id = $pics[$i]['ID'] + 1;

				      	$results = mysql_query("INSERT INTO `$gallery_name` (`ID`, `ImgSource`, `ThumbSource`, `Alt`, `Extension`) VALUES ('$id', '$img_src', '$thumb_src', '$alt', '$extension')");
				      	if (!$results)  // Succession check
							echo "Failed to import image! :c<br>";

		    		}
		    	}
		    }

		    //list($w, $h) = getimagesize($img_src);
			//echo "width - " . $w . "<br>";
			//echo "height - " . $h . "<br>";
		}

	} else {
		echo "<b>Invalid file</b> <br><br>";
	}

}

?>


