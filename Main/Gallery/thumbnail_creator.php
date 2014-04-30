<?php

function createThumb( $pathToImage, $pathToThumb, $thumbWidth ) 
{
  // parse path for the extension
  $info = pathinfo($pathToImage);
  // continue only if this is a JPEG image
  if ( strtolower($info['extension']) == 'jpg' )
  {
    //echo "Creating thumbnail for {$fname} <br />";

    // load image and get image size
    $img = imagecreatefromjpeg( "{$pathToImage}" );
      if (!$img)
        return false;
    $width = imagesx( $img );
    $height = imagesy( $img );


    // calculate thumbnail size
    $new_width = $thumbWidth;
    $new_height = floor( $height * ( $thumbWidth / $width ) );

    // create a new temporary image
    $tmp_img = imagecreatetruecolor( $new_width, $new_height );
      if (!$tmp_img)
        return false;

    // copy and resize old image into new image 
    if (!imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height ))
      return false;

    // save thumbnail into a file
    if (!imagejpeg( $tmp_img, "{$pathToThumb}" ))
      return false;

    return true;
  } else {
    return false;
  }
}
// call createThumb function and pass to it as parameters the path 
// to the directory that contains images, the path to the directory
// in which thumbnails will be placed and the thumbnail's width. 
// We are assuming that the path will be a relative path working 
// both in the filesystem, and through the web for links

//createThumb("Pictures/photography_gallery/","Pictures/Thumbnails/",750);

?>
