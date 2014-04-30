<?php

	$my_img = imagecreate( 90, 90 );
	$background = imagecolorallocate( $my_img, 0, 0, 255 );
	$text_colour = imagecolorallocate( $my_img, 255, 255, 0 );
	$line_colour = imagecolorallocate( $my_img, 128, 255, 0 );

	imagesetthickness ( $my_img, 2 );

	imageline( $my_img, 0, 60, 150, 60, $line_colour );
	imageline( $my_img, 0, 30, 150, 30, $line_colour );

	imageline( $my_img, 60, 90, 60, 0, $line_colour );
	imageline( $my_img, 30, 90, 30, 0, $line_colour );

	header( "Content-type: image/png" );
	imagepng( $my_img );
	imagecolordeallocate( $line_color );
	imagecolordeallocate( $text_color );
	imagecolordeallocate( $background );
	imagedestroy( $my_img );

?>