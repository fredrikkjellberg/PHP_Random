

<?php // upload.php Image uploader (upload.php)


function ImageTrueColorToPalette2( $image, $dither, $ncolors )
{
    $width = imagesx( $image );
    $height = imagesy( $image );
    $colors_handle = ImageCreateTrueColor( $width, $height );
    ImageCopyMerge( $colors_handle, $image, 0, 0, 0, 0, $width, $height, 100 );
    ImageTrueColorToPalette( $image, $dither, $ncolors );
    ImageColorMatch( $colors_handle, $image );
    ImageDestroy( $colors_handle );
}

function getcolorXY()
{
		// get a color
	$start_x = 40;
	$start_y = 50;
	$color_index = imagecolorat($im, $start_x, $start_y);

	// make it human readable
	$color_tran = imagecolorsforindex($im, $color_index);

	// what is it ?
	print_r($color_tran);
	echo $color_tran;
	echo "/n";
}



function colordiff_power($r, $g, $b, $xr, $xg, $xb)
{
	$power_diff = (($r-$xr) + ($b-$xb) + ($g-$xg));
	return $power_diff;
}

function colordiff_norm($r, $g, $b, $xr, $xg, $xb)
{
	$diff = ($r*$g*$b)/($xr*$xg*$xb);
	return $diff;
}

echo <<<_END

<!DOCTYPE html>
<html>
  <head>
    <title>Bootstrap 101 Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
 	 </head>
  	<body>
  	<style type="text/css">
            * {
                text-align: center;
            }
    </style>
    <img src="drop.jpg" height="100" width="100">
    <h1>FLUID HEALTH HACK</h1>
    <h3>Simply pee on a stick 2.0</h3>
    <br>
	<form style=''method='post' action='index.php' enctype='multipart/form-data'>
	Load pee pix: <input type='file' name='filename' /> <input type='submit' value='Upload' />
	</form>
_END;


if ($_FILES) {
	$picture_uploaded = $_FILES['filename']['name']; 
	move_uploaded_file($_FILES['filename']['tmp_name'], $picture_uploaded); 
echo "Uploaded image '$picture_uploaded' <br /><img src='$picture_uploaded'/>";
	
	// open an image
$im = imagecreatefromstring(file_get_contents($picture_uploaded));

// gets size of the picture
$max_x = imagesx($im);
$max_y = imagesy($im);

// get the img color palettet for im
imagetruecolortopalette($im, false, 255);

// Save the image
imagepng($im, './paletteimage.png');

// Search colors (RGB)
$colors = array(
    array(254, 145, 154, 50),
    array(153, 145, 188, 127),
    array(153, 90, 145, 0),
    array(255, 137, 92, 84)
);

// Loop through each search and find the closest color in the palette.
// Return the search number, the search RGB and the converted RGB match
foreach($colors as $id => $rgb)
{
    $result = imagecolorclosestalpha($im, $rgb[0], $rgb[1], $rgb[2], $rgb[3]);
    $result = imagecolorsforindex($im, $result);
    $result_color = "{$result['red']}, {$result['green']}, {$result['blue']}";
    $search_color = "$rgb[0], $rgb[1], $rgb[2]";

    echo "<p style='background-color:rgb($search_color)'> #$id: Search ($rgb[0], $rgb[1], $rgb[2], $rgb[3])</p>";
    echo  "<p style='background-color:rgb($result_color )'>Closest match: $result_color .</p>";
    echo  "difference from original color";
    echo  colordiff_norm($rgb[0], $rgb[1], $rgb[2], $result['red'], $result['green'], $result['blue']);
}

}
echo "</body></html>"; 


//// slush code //////

// http://venturebeat.com/2012/10/23/huge-news-php-developers-can-now-design-build-and-publish-mobile-apps-right-in-zend-studio/
// http://www.php.net/manual/en/ref.image.php

// int imagecolorat ( resource $image , int $x , int $y )

// Sometimes this function gives ugly/dull colors (especially when ncolors < 256).  
// Here is a replacement that uses a temporary image and ImageColorMatch() to match the colors more accurately.  
// It might be a hair slower, but the file size ends up the same:

?>