<?php

require_once 'data_getter.php';

$pics = getImgData();
if ($pics[0]['ID'] != 0) {

	$i = count($pics) - 1;

	while($i > -1) { 
		if (in_array($ip, $GLOBALS['admins'])
		&& file_exists($pics[$i]['ImgSource'])) {	 
			echo "
			<div class=\"image_container\">
				 <img src=\"{$pics[$i]['ThumbSource']}{$pics[$i]['Alt']}_small.{$pics[$i]['Extension']}\" alt=\"{$pics[$i]['Alt']}\" class=\"gal_images\" id=\"{$pics[$i]['ID']}\" /> 
				<form method=\"POST\" id=\"image_deletion_form\">
					<input type=\"hidden\" name=\"image_id\" value=\"{$pics[$i]['Alt']}\">
					<input type=\"submit\" name=\"DeleteImage\" value=\"Delete Image\" >
				</form>
			</div>";
		} else {
			 
			//list($w, $h) = getimagesize($pics[$i]['ThumbSource']);
			//echo "<div>width - " . $w . "<br>";
			//echo "height - " . $h . "<br></div>";

			echo "<img src=\"{$pics[$i]['ThumbSource']}{$pics[$i]['Alt']}_small.{$pics[$i]['Extension']}\" alt=\"{$pics[$i]['Alt']}\" class=\"gal_images\" id=\"{$pics[$i]['ID']}\" />";

		}
		$i--;
	}
} else {}


// <a href=\"\"> </a>
?>