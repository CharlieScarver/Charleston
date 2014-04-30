<?php



	$file = "Gallery/Thumbnails/DSC_0012.JPG";
		if (file_exists($file) && is_readable($file)) {
			echo "{$file} exists!";
		}


?>