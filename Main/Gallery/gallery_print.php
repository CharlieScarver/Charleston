<?php

require_once 'data_getter.php';

$pics = getImgData();
$i = count($pics) - 1;

while($i > -1) { 
	if (in_array($ip, $GLOBALS['admins'])
	&& file_exists($pics[$i]['ImgSource'])) {	 
		echo "
		<div class=\"image_container\">
			 <img src=\"{$pics[$i]['ThumbSource']}\" alt=\"{$pics[$i]['Alt']}\" class=\"gal_images\" id=\"{$pics[$i]['ID']}\" /> 
			<form method=\"POST\" id=\"image_deletion_form\">
				<input type=\"hidden\" name=\"image_id\" value=\"{$pics[$i]['Alt']}\">
				<input type=\"submit\" name=\"DeleteImage\" value=\"Delete Image\" >
			</form>
		</div>";
	} else {
		echo "<a href=\"{$pics[$i]['ImgSource']}\"><img src=\"{$pics[$i]['ThumbSource']}\" alt=\"{$pics[$i]['Alt']}\" class=\"gal_images\" id=\"{$pics[$i]['ID']}\" /></a>";
	}
	$i--;
}


// <a href=\"\"> </a>
?>