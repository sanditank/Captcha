<?php


 
	// generate random number and store in session
 
	$randomnr = rand(1000, 9999);
	$_SESSION['randomnr2'] = $randomnr;
 
	//generate image
	$im = imagecreatetruecolor(64, 19);
 
	//colors:
	$randcol = imagecolorallocate($im, rand(199,255), rand(199,255), rand(188,255));
	$grey = imagecolorallocate($im, 128, 128, 128);
	$black = imagecolorallocate($im, 0, 0, 0);
 
	imagefilledrectangle($im, 0, 0, 200, 35, $black);
 
	//draw text:
	
	//imagestring($im,5,rand(0,28),rand(0,4),$randomnr,$randcol);
	
	// pixels
	
	for ($x=0; $x<240; $x++)
	{
		$randcol2 = imagecolorallocate($im, rand(100,255), rand(100,255), rand(100,255));
		imagesetpixel ( $im , rand(0,200), rand(0,35) , $randcol2 );
	}
	
	for ($x=0; $x<5; $x++)
	{
		$randcol3 = imagecolorallocate($im, rand(55,222), rand(55,222), rand(55,222));
		imageline ( $im, rand(0,66),rand(0,15) , rand(0,66),rand(0,15), $randcol3);
	}	
	imagestring($im,5,rand(0,28),rand(0,4),$randomnr,$randcol);
	
	// prevent client side  caching
	header("Expires: Wed, 1 Jan 1997 00:00:00 GMT");
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
	header("Cache-Control: no-store, no-cache, must-revalidate");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");
 
	//send image to browser
	header ("Content-type: image/gif");
	imagegif($im);
	imagedestroy($im);
?>