<!DOCTYPE html>
<html>
	<head> 
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		</style><title>Histogram Equalization</title> 

		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<style type="text/css">
            ${demo.css}

            .charts {
                float: left;
            }
		</style>
		

		<style type="text/css">
		${demo.css}

		body {
			background-color: #f1f4f5;
			font-family: "Myriad Pro", "Gill Sans", "Gill Sans MT", Calibri, sans-serif;
			color: #7f9bcc;
		}

		#container { width: 722px; margin: 0 auto; }

		input {
			background-color: #ffffff;
			margin: 0 10px;
			border: none;
			border-radius: 7px;
			padding: 10px 19px;
			color: #7f9bcc;
			font-family: "Myriad Pro", "Gill Sans", "Gill Sans MT", Calibri, sans-serif;
			font-size: 1.25em;
			cursor: pointer;
		}

		form {
			background-color: #d3e7eb;
			border-radius: 10px;
			padding: 15px;
			margin: 0 auto 100px auto;
			width: 530px;
		}

		#title {
			width: 530px;
			display: block;
			margin: 100px auto 40px auto;
		}

		.output-pics {
			max-width: 720px;
			display: block;
			margin: 20px auto 40px auto;
		}

		#image-input {
			max-width: 341px;
		}

		#b1 {
			position: absolute;
			right: 59px;
			top: 137px;
			opacity: 0.1;
			background-color: #f1f4f5;
		}

		#special {

			position: absolute;
			top: 0;
			right: 0;
			left: 0;
			bottom: 0;

			z-index: -2;
		}

		</style>
	</head>
	<body>
		<script src="js/highcharts.js"></script>
        <script src="js/modules/exporting.js"></script>

		<img src="i.jpg" id="special" \>

		<div id="container">
			<a href="http://charleston.ddns.net/Histogram"> <img src="ohe.png" alt="title" id="title"> </a>


			<form enctype="multipart/form-data" method="post" id="image-form">
				<input type="file" name="image" id="image-input">

				<input type="submit" value="Submit" name="SubmitImage">
			</form>
			<br>
			<button id="b1"></button>
			<script type="text/javascript">
					$('#special').hide();

					var i = false;
					$('#b1').click(function() {
						if(!i) {
							$('#special').fadeToggle();
							$('body').css("background-color","black");
							$('input').css("background-color","black");
							$('form').css("background-color","#3B9C9C");
							i = true;
						} else {
							$('#special').fadeToggle();
							$('body').css("background-color","#f1f4f5");
							$('input').css("background-color","#ffffff");
							$('form').css("background-color","#d3e7eb");
							i = false;
						}
					});
			</script>
			<br>

		<?php

			if (isset($_POST['SubmitImage'])) {

				$userfile = $_FILES['image']['tmp_name'];
				$userfile_name = $_FILES['image']['name'];
				$userfile_ext = end(explode('.', $userfile_name));
				$userfile_size = $_FILES['image']['size'];
				$userfile_type = $_FILES['image']['type'];
				$userfile_error = $_FILES['image']['error'];

				if($userfile_error > 0){
				    echo 'Problem : ';
				    switch ($userfile_error)
				    {
				         case UPLOAD_ERR_INI_SIZE:
			                echo "The uploaded file exceeds the upload_max_filesize directive in php.ini";
			                break;
			            case UPLOAD_ERR_FORM_SIZE:
			                echo "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form";
			                break;
			            case UPLOAD_ERR_PARTIAL:
			                echo "The uploaded file was only partially uploaded";
			                break;
			            case UPLOAD_ERR_NO_FILE:
			                echo "No file was uploaded";
			                break;
			            case UPLOAD_ERR_NO_TMP_DIR:
			                echo "Missing a temporary folder";
			                break;
			            case UPLOAD_ERR_CANT_WRITE:
			                echo "Failed to write file to disk";
			                break;
			            case UPLOAD_ERR_EXTENSION:
			                echo "File upload stopped by extension";
			                break; 
					}
					exit;
				}

				if ($userfile_ext != "jpg" && $userfile_ext != "jpeg" && $userfile_ext != "JPG" ) {
					echo "Please upload a .jpg image! <br>";
					exit;
				}

				$str = array('0' => 0, '1' => 1, '2' => 2, '3' => 3, '4' => 4, 
							'5' => 5, '6' => 6, '7' => 7, '8' => 8, '9' => 9,
							'10' => 'A', '11' => 'B', '12' => 'C', '13' => 'D',
							'14' => 'E', '15' => 'F', '16' => 'G', '17' => 'H',
							'18' => 'I', '19' => 'J', '20' => 'K', '21' => 'L',
							'22' => 'M', '23' => 'N', '24' => 'O', '25' => 'P',
							'26' => 'Q', '27' => 'R', '28' => 'S', '29' => 'T',
							'30' => 'U', '31' => 'V', '32' => 'W', '33' => 'X',
							'34' => 'Y', '35' => 'Z');

				$new_name = "";
				do {
					
					$new_name = ($str[rand(0,17)] . $str[rand(0,17)] . $str[rand(0,17)] . $str[rand(0,17)] . $str[rand(0,17)]) . ".$userfile_ext";

				} while (file_exists("C:\\xampp\\htdocs\\Histogram\\Images\\$new_name"));

				if (move_uploaded_file($userfile, "C:\\xampp\\htdocs\\Histogram\\Images\\$new_name")) {

					$reds = array();
					$blues = array();
					$greens = array();
					
					$freqR = array();
					$freqG = array();
					$freqB = array();

					$info = getimagesize("Images\\$new_name");

					$width = $info[0];
					$height = $info[1];
					$pixels = $width * $height;

					$img = imagecreatefromjpeg("Images\\$new_name");

					if ($img) {
						//echo "Rya! <br>";

						buildHistogram($img, $width, $height, $reds, $greens, $blues);
						buildFrequencies($reds, $greens, $blues, $freqR, $freqG, $freqB);


						$origHist = array('red' => "", 'green' => "", 'blue' => "");
						foreach ($reds as $key => $value) {
		            		//echo "$value,";
		            		$origHist['red'] = $origHist['red'] . $value;
		            		$origHist['red'] = $origHist['red'] . ',';
		            	} 

		            	foreach ($greens as $key => $value) {
		            		//echo "$value,";
		            		$origHist['green'] = $origHist['green'] . $value;
		            		$origHist['green'] = $origHist['green'] . ',';
		            	} 

		            	foreach ($blues as $key => $value) {
		            		//echo "$value,";
		            		$origHist['blue'] = $origHist['blue'] . $value;
		            		$origHist['blue'] = $origHist['blue'] . ',';
		            	} 


		            	echo "
		            	<script type=\"text/javascript\">
		            			$(function () {
		            			    $('#chart1').highcharts({
								        chart: {
								            zoomType: 'x'
								        },
								        title: {
								            text: 'Original R'
								        },

								        xAxis: {
								            min: 0,
								            max: 255
								        },
								        yAxis: {
								           min: 0,
								            title: {
								                text: 'Pixels'
								            }
								        },
								        legend: {
								            enabled: true
								        },
								        plotOptions: {
								            area: {
								                fillColor: 'red',  
								                lineWidth: 1,
								                states: {
								                    hover: {
								                        lineWidth: 1
								                    }
								                },
								                threshold: null
								            }
								        },

								        series: [{
								            type: 'area',
								            name: 'Red',
								            pointStart: 0,
								            color: 'red',
								            data: [
								              ".rtrim($origHist['red'], ",")."
								            ]
								        }]
								    });

								    $('#chart2').highcharts({
								        chart: {
								            zoomType: 'x'
								        },
								        title: {
								            text: 'Original G'
								        },

								        xAxis: {
								            min: 0,
								            max: 255
								        },
								        yAxis: {
								           min: 0,
								            title: {
								                text: 'Pixels'
								            }
								        },
								        legend: {
								            enabled: true
								        },
								        plotOptions: {
								            area: {
								                fillColor: 'green',  
								                lineWidth: 1,
								                states: {
								                    hover: {
								                        lineWidth: 1
								                    }
								                },
								                threshold: null
								            }
								        },

								        series: [{
								            type: 'area',
								            name: 'Green',
								            pointStart: 0,
								            color: 'Green',
								            data: [
								              ".rtrim($origHist['green'], ",")."
								            ]
								        }]
								    });
								    $('#chart3').highcharts({
								        chart: {
								            zoomType: 'x'
								        },
								        title: {
								            text: 'Original B'
								        },

								        xAxis: {
								            min: 0,
								            max: 255
								        },
								        yAxis: {
								           min: 0,
								            title: {
								                text: 'Pixels'
								            }
								        },
								        legend: {
								            enabled: true
								        },
								        plotOptions: {
								            area: {
								                fillColor: 'blue',  
								                lineWidth: 1,
								                states: {
								                    hover: {
								                        lineWidth: 1
								                    }
								                },
								                threshold: null
								            }
								        },

								        series: [{
								            type: 'area',
								            name: 'Blue',
								            pointStart: 0,
								            color: 'blue',
								            data: [
								              ".rtrim($origHist['blue'], ",")."
								            ]
								        }]
								    });
								});
		            	</script>
		            	";


						$alpha = (float)(255.0 / (float)$pixels);
						$new_img = imagecreatetruecolor($width, $height);
						$color = imagecolorallocate($new_img, 255, 255, 255);

						$_GLOBALS['red'] = array_merge(array(), $reds); 

						for ($i=0; $i < $height; $i++) { 
							
							for ($j=0; $j < $width; $j++) { 
								
								$rgb = imagecolorat($img, $j, $i);
								$r = ($rgb >> 16) & 0xFF;
								$g = ($rgb >> 8) & 0xFF;
								$b = $rgb & 0xFF;

								$adjR = (int)((float)$freqR[$r] * $alpha);
								$adjG = (int)((float)$freqG[$g] * $alpha);
								$adjB = (int)((float)$freqB[$b] * $alpha);

								$color = imagecolorallocate($new_img, $adjR, $adjG, $adjB);
								imagesetpixel($new_img, $j, $i, $color);

							}

						}

						imagejpeg($new_img, "C:\\xampp\\htdocs\\Histogram\\Equalized\\$new_name", 100);
						imagedestroy($new_img);

						$img = imagecreatefromjpeg("Equalized\\$new_name");

						if ($img) {

							$reds = array();
							$greens = array();
							$blues = array();

							buildHistogram($img, $width, $height, $reds, $greens, $blues);

							$equaHist = array('red' => "", 'green' => "", 'blue' => "");
							foreach ($reds as $key => $value) {
			            		//echo "$value,";
			            		$equaHist['red'] = $equaHist['red'] . $value;
			            		$equaHist['red'] = $equaHist['red'] . ',';
			            	} 

			            	foreach ($greens as $key => $value) {
			            		//echo "$value,";
			            		$equaHist['green'] = $equaHist['green'] . $value;
			            		$equaHist['green'] = $equaHist['green'] . ',';
			            	} 

			            	foreach ($blues as $key => $value) {
			            		//echo "$value,";
			            		$equaHist['blue'] = $equaHist['blue'] . $value;
			            		$equaHist['blue'] = $equaHist['blue'] . ',';
			            	} 


			            	echo "
		            	<script type=\"text/javascript\">
		            			$(function () {
		            			    $('#chart4').highcharts({
								        chart: {
								            zoomType: 'x'
								        },
								        title: {
								            text: 'Equalized R'
								        },

								        xAxis: {
								            min: 0,
								            max: 255
								        },
								        yAxis: {
								           min: 0,
								            title: {
								                text: 'Pixels'
								            }
								        },
								        legend: {
								            enabled: true
								        },
								        plotOptions: {
								            area: {
								                fillColor: 'red',  
								                lineWidth: 1,
								                states: {
								                    hover: {
								                        lineWidth: 1
								                    }
								                },
								                threshold: null
								            }
								        },

								        series: [{
								            type: 'area',
								            name: 'Red',
								            pointStart: 0,
								            color: 'red',
								            data: [
								              ".rtrim($equaHist['red'], ",")."
								            ]
								        }]
								    });

								    $('#chart5').highcharts({
								        chart: {
								            zoomType: 'x'
								        },
								        title: {
								            text: 'Equalized G'
								        },

								        xAxis: {
								            min: 0,
								            max: 255
								        },
								        yAxis: {
								           min: 0,
								            title: {
								                text: 'Pixels'
								            }
								        },
								        legend: {
								            enabled: true
								        },
								        plotOptions: {
								            area: {
								                fillColor: 'green',  
								                lineWidth: 1,
								                states: {
								                    hover: {
								                        lineWidth: 1
								                    }
								                },
								                threshold: null
								            }
								        },

								        series: [{
								            type: 'area',
								            name: 'Green',
								            pointStart: 0,
								            color: 'Green',
								            data: [
								              ".rtrim($equaHist['green'], ",")."
								            ]
								        }]
								    });
								    $('#chart6').highcharts({
								        chart: {
								            zoomType: 'x'
								        },
								        title: {
								            text: 'Equalized B'
								        },

								        xAxis: {
								            min: 0,
								            max: 255
								        },
								        yAxis: {
								           min: 0,
								            title: {
								                text: 'Pixels'
								            }
								        },
								        legend: {
								            enabled: true
								        },
								        plotOptions: {
								            area: {
								                fillColor: 'blue',  
								                lineWidth: 1,
								                states: {
								                    hover: {
								                        lineWidth: 1
								                    }
								                },
								                threshold: null
								            }
								        },

								        series: [{
								            type: 'area',
								            name: 'Blue',
								            pointStart: 0,
								            color: 'blue',
								            data: [
								              ".rtrim($equaHist['blue'], ",")."
								            ]
								        }]
								    });
								});
		            	</script>
		            	";

						}

						echo "
							<div id=\"container\">
								<h3> Original: </h3>
								<img src=\"./Images/$new_name\" alt=\"original-image\" class=\"output-pics\" \\>
								<br>
								<br>
								<h3> Equalized Histogram: </h3>
								<img src=\"./Equalized/$new_name\" alt=\"equalized-image\" class=\"output-pics\" \\>			
							</div>
						";

					}

				}

			} 

			function buildHistogram($img, $width, $height, &$reds, &$greens, &$blues) {

				for ($i=0; $i < $height; $i++) { 
					for ($j=0; $j < $width; $j++) { 

						$rgb = imagecolorat($img, $j, $i);
						$r = ($rgb >> 16) & 0xFF;
						$g = ($rgb >> 8) & 0xFF;
						$b = $rgb & 0xFF;

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

				ksort($reds);
				ksort($greens);
				ksort($blues);
			}

			function buildFrequencies(&$arR, &$arG, &$arB, &$freqR, &$freqG, &$freqB) {

				for ($i=0; $i <= 255; $i++) { 

					$sumR = 0;
					$sumG = 0;
					$sumB = 0;

					for ($j=0; $j < $i; $j++) { 
						if (isset($arR[$j])) {
							$sumR += $arR[$j]; 
						}
						if (isset($arG[$j])) {
							$sumG += $arG[$j]; 
						}
						if (isset($arB[$j])) {
							$sumB += $arB[$j]; 
						}
					}

					$freqR[$i] = $sumR;
					$freqG[$i] = $sumG;
					$freqB[$i] = $sumB;
				}
			}

		?>
		</div>
		<div style="overflow: hidden; width: 900px; margin: 10px auto;">
			 <div id="chart1" style="width: 300px; height: 300px; margin: 0 auto" class="charts"></div>
			 <div id="chart2" style="width: 300px; height: 300px; margin: 0 auto" class="charts"></div>
			 <div id="chart3" style="width: 300px; height: 300px; margin: 0 auto" class="charts"></div>
		</div>
		<div style="overflow: hidden; width: 900px; margin: 10px auto;">
			 <div id="chart4" style="width: 300px; height: 300px; margin: 0 auto" class="charts"></div>
			 <div id="chart5" style="width: 300px; height: 300px; margin: 0 auto" class="charts"></div>
			 <div id="chart6" style="width: 300px; height: 300px; margin: 0 auto" class="charts"></div>
		</div>

	</body>
</html>
