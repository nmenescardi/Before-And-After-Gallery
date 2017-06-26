<?php
if(isset($_GET['debug'])){
error_reporting(E_ALL);
ini_set('display_errors',1);
}

	$abspath = dirname(dirname(dirname(dirname(__FILE__))));

	require_once dirname(__FILE__) . '/lib/WideImage.php';

	$width = $_GET['width'];
	$height = $_GET['height'];	
	
	if(isset($_GET['img2'])){

		$path1 = urldecode($_GET['img']);
		$path2 = urldecode($_GET['img2']);
				
		$img1 = WideImage::load($abspath . $path1);
		$img2 = WideImage::load($abspath . $path2);

		$img1 = $img1->resize($width, $height, 'outside')->crop('center', 'center', $width, $height);
		$img2 = $img2->resize($width, $height, 'outside')->crop('center', 'center', $width, $height);
		
		$img1 = $img1->resizeCanvas('200%', '100%', 0, 0);

		$img1->merge($img2, 'right', 'top', 100)->output('jpg');	
	}
	else{
		$path = urldecode($_GET['img']);
		$img = WideImage::load($abspath .$path);
		$img->resize($width, $height, 'outside')->crop('center', 'center', $width, $height)->output('jpg');
	}

?>