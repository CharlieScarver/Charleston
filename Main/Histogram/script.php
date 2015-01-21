<?php

	// Main output function which reads the file and runs it through histogram equalization for the various color channels.
	function outputPicture($filename) {

		$reds = array();
		$blues = array();
		$greens = array();
		
		$freqr = array();
		$freqb = array();
		$freqg = array();
		
		$info = getimagesize($filename);
		
		$width = $info[0];
		$height = $info[1];
		$totalpixels = $width * $height;
		
		
		$img = imagecreatefromjpeg($filename);
		
		if ($img) {
			buildHistograms($img, $width, $height, $reds, $greens, $blues);
			buildFrequencies($reds, $greens, $blues, $freqr, $freqg, $freqb);
		}
		
		$alpha = (float)(255.0 / (float)$totalpixels);
		$newimg = @imagecreatetruecolor($width, $height);
		$color = imagecolorallocate($newimg, 255, 255, 255);
		
		for ($i = 0; $i < $height; $i++) {
			for ($j = 0; $j < $width; $j++) {
				$rgb = imagecolorat($img, $j, $i);
				$r = ($rgb >> 16) & 0xFF;
				$g = ($rgb >> 8) & 0xFF;
				$b = $rgb & 0xFF;
				
				$adjR = (int)((float)$freqr[$r] * $alpha);
				$adjG = (int)((float)$freqg[$g] * $alpha);
				$adjB = (int)((float)$freqb[$b] * $alpha);
				
				$color = imagecolorallocate($newimg, $adjR, $adjG, $adjB); 
				imagesetpixel($newimg, $j, $i, $color);
			}
		}
		
		header('Content-Type: image/jpg');
		imagejpeg($newimg, NULL, 100);
		imagedestroy($newimg);
	}
	
	
	// Fills $reds, $greens, $blues arrays with counts (histograms) based on picture $img.
	function buildHistograms($img, $width, $height, &$reds, &$greens, &$blues) {
		for ($i = 0; $i < $height; $i++) {
			for ($j = 0; $j < $width; $j++) {
				$rgb = imagecolorat($img, $j, $i);
				$r = ($rgb >> 16) & 0xFF;
				$g = ($rgb >> 8) & 0xFF;
				$b = $rgb & 0xFF;
				
				// Add counts to our histogram arrays for each color.
				if (!isset($reds[$r])) {
					$reds[$r] = 0;
				}
				if (!isset($greens[$g])) {
					$greens[$g] = 0;
				}
				if (!isset($blues[$b])) {
					$blues[$b] = 0;
				}

				$reds[$r]++;
				$greens[$g]++;
				$blues[$b]++;
			}
		}
		
		// Sort them by keys into order
		ksort($reds);
		ksort($greens);
		ksort($blues);
	}
	
	
	// Build frequency charts for all colors
	function buildFrequencies(&$arR, &$arG, &$arB, &$freqR, &$freqG, &$freqB) {
		// Loop through all values and sum counts from 0 to current column $i
		for ($i = 0; $i <= 255; $i++) {
			$sumR = 0;
			$sumG = 0;
			$sumB = 0;
			
			for ($j = 0; $j <= $i; $j++) {
				// Sums for Red, Green, Blue
				if (isset($arR[$j])) { $sumR += $arR[$j]; }
				if (isset($arG[$j])) { $sumG += $arG[$j]; }
				if (isset($arB[$j])) { $sumB += $arB[$j]; }
			}
			
			// Stash sums into frequency charts for each color
			$freqR[$i] = $sumR;
			$freqG[$i] = $sumG;
			$freqB[$i] = $sumB;
		}
	}
	
	outputPicture("se.jpg");
	//outputPicture("hmv.jpg");


	//$a = array();
	//$a[4]++;
	//print_r($a);
?>

