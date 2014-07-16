<!DOCTYPE html>
<html>
<head>
	<title>Are you sure?</title>
	<meta charset="UTF-8">
	<meta name="keywords" content="Charleston, Charlie Scarver, Danniesaurus, 37, Oranges, happy orange, orange, oranges are cool">
	<meta name="description" content="It's all about oranges">
	<meta name="author" content="Charlie Scarver">
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
	<link rel="shortcut icon" href="../Other/orange.png" />

	<style>
	body {
		background: linear-gradient(90deg, #FF7D40, white, white, #FF7D40);
		-webkit-background: linear-gradient(90deg, #FF7D40, white, white, white, #FF7D40);
		-o-background: linear-gradient(90deg, #FF7D40, white, white, white, #FF7D40);
		-moz-background: linear-gradient(90deg, #FF7D40, white, white, white, #FF7D40);
		margin: 0;
	}
	a {	text-decoration: none; }
	a:link, a:visited, a:active { color: #FF8600; }

	#content {
		color: grey;
	}
	
	/*#content {border: 2px solid orange;}*/
	
	#header {
		background-image: url("http://www.pecoeyecare.com/sitebuilder/images/white_header_flip-1095x196.jpg");
		background-size: cover;   
  		background-repeat: no-repeat;
  		background-position: center;
		height: 80px;
		width: 100%;
		overflow: hidden;
		text-align: center;
		font: bold 40px Arial, Helvetica, sans-serif;
		position: fixed;
		top: 0;
	}

	#logo {
		float: left;
		min-width: 100px; 
		max-height: 100%; 
	}

	#title { 
		position: relative;
		top: 15px;
	}

	#content {
		min-width: 730px;
		max-width: 940px;
		margin: 80px auto 0 auto;
		padding: 10px 40px;
		font-size: 2em;
	}
	#content > h1 { text-align: center; }

	#footer { 
		background-color: #99CC33; /*#A2C257;*/
		height: 50px;
		padding: 10px;
		text-align: center;
		color: black;
	}

	@media all and (max-width: 1800px) and (min-width: 1701px) {
		body { 
			background: linear-gradient(90deg, #FF7D40, white, white, white, #FF7D40);
			-webkit-background: linear-gradient(90deg, #FF7D40, white, white, white, #FF7D40);
			-o-background: linear-gradient(90deg, #FF7D40, white, white, white, #FF7D40);
			-moz-background: linear-gradient(90deg, #FF7D40, white, white, white, #FF7D40);
				}
	}

	@media all and (max-width: 1700px) and (min-width: 1601px) {
		body { 
			background: linear-gradient(90deg, #FF7D40, white, white, white, white, #FF7D40);
			-webkit-background: linear-gradient(90deg, #FF7D40, white, white, white, #FF7D40);
			-o-background: linear-gradient(90deg, #FF7D40, white, white, white, #FF7D40);
			-moz-background: linear-gradient(90deg, #FF7D40, white, white, white, #FF7D40);
		}
	}

	@media all and (max-width: 1600px) and (min-width: 1501px) {
		body { 
			background: linear-gradient(90deg, #FF7D40, white, white, white, white, white, #FF7D40);
			-webkit-background: linear-gradient(90deg, #FF7D40, white, white, white, #FF7D40);
			-o-background: linear-gradient(90deg, #FF7D40, white, white, white, #FF7D40);
			-moz-background: linear-gradient(90deg, #FF7D40, white, white, white, #FF7D40);
		}
	}

	@media all and (max-width: 1500px) and (min-width: 1401px) {
		body { 
			background: linear-gradient(90deg, #FF7D40, white, white, white, white, white, white, #FF7D40);
			-webkit-background: linear-gradient(90deg, #FF7D40, white, white, white, #FF7D40);
			-o-background: linear-gradient(90deg, #FF7D40, white, white, white, #FF7D40);
			-moz-background: linear-gradient(90deg, #FF7D40, white, white, white, #FF7D40);
		}
	}

	@media all and (max-width: 1400px) and (min-width: 1301px) {
		body { 
			background: linear-gradient(90deg, #FF7D40, white, white, white, white, white, white, white, #FF7D40);
			-webkit-background: linear-gradient(90deg, #FF7D40, white, white, white, #FF7D40);
			-o-background: linear-gradient(90deg, #FF7D40, white, white, white, #FF7D40);
			-moz-background: linear-gradient(90deg, #FF7D40, white, white, white, #FF7D40);
		}
	}

	@media all and (max-width: 1300px) and (min-width: 1201px) {
		body { 
			background: linear-gradient(90deg, #FF7D40, white, white, white, white, white, white, white, white, #FF7D40);
			-webkit-background: linear-gradient(90deg, #FF7D40, white, white, white, #FF7D40);
			-o-background: linear-gradient(90deg, #FF7D40, white, white, white, #FF7D40);
			-moz-background: linear-gradient(90deg, #FF7D40, white, white, white, #FF7D40);
		}
	}

	@media all and (max-width: 1200px) and (min-width: 1101px) {
		body { 
			background: linear-gradient(90deg, #FF7D40, white, white, white, white, white, white, white, white, white, #FF7D40);
			-webkit-background: linear-gradient(90deg, #FF7D40, white, white, white, #FF7D40);
			-o-background: linear-gradient(90deg, #FF7D40, white, white, white, #FF7D40);
			-moz-background: linear-gradient(90deg, #FF7D40, white, white, white, #FF7D40);
		}
	}

	@media all and (max-width: 1100px) and (min-width: 1001px) {
		body { 
			background: linear-gradient(90deg, #FF7D40, white, white, white, white, white, white, white, white, white, white, #FF7D40);
			-webkit-background: linear-gradient(90deg, #FF7D40, white, white, white, #FF7D40);
			-o-background: linear-gradient(90deg, #FF7D40, white, white, white, #FF7D40);
			-moz-background: linear-gradient(90deg, #FF7D40, white, white, white, #FF7D40);
		}
	}

	@media all and (max-width: 1000px) {
		body { background: white; }
	}

	}
	

	</style>


</head>
<body bgcolor="#0">

	
	<div id="header">
		<a href="http://charleston.ddns.net/37/"><img id="logo" src="../Other/orange.png" alt="orange"></a>
		<div id="title_wrap">
			<a href="http://charleston.ddns.net/37/" id="title">Dannie The Happy Orange</a>
		</div>
	</div>

	<div id="content">
		<h1> The Orange </h1>
		<img id="logo" src="../Other/orange.png" alt="orange">
		The orange (specifically, the sweet orange) is the fruit of the citrus species Citrus sinensis in the family Rutaceae. The fruit of the Citrus sinensis is considered a sweet orange, whereas the fruit of the Citrus aurantium is considered a bitter orange. The orange is a hybrid, possibly between pomelo (Citrus maxima) and mandarin (Citrus reticulata), which has been cultivated since ancient times.<br><br>

		Oranges were already cultivated in China as far back as 2500 BC. Arabophone peoples popularized sour citrus and oranges in Europe; Spaniards introduced the sweet orange to the American continent in the mid-1500s.<br><br>

		As of 1987, orange trees were found to be the most cultivated fruit tree in the world. Orange trees are widely grown in tropical and subtropical climates for their sweet fruit. The fruit of the orange tree can be eaten fresh, or processed for its juice or fragrant peel. As of 2012, sweet oranges accounted for approximately 70% of citrus production. In 2010, 68.3 million metric tons of oranges were grown worldwide, production being particularly prevalent in Brazil and the US states of California and Florida.<br><br>

		<b>Nutritional value</b><br><br>
		Oranges, like most citrus fruits, are a good source of vitamin C.<br><br>

		<b>Acidity</b><br><br>
		Being a citrus fruit, the orange is acidic: its pH levels are as low as 2.9, and as high as 4.0.<br><br>

		<b>Grading</b><br><br>

		The United States Department of Agriculture (USDA) has established the following grades for Florida oranges, which primarily apply to oranges sold as fresh fruit: US Fancy, US No. 1 Bright, US No. 1, US No. 1 Golden, US No. 1 Bronze, US No. 1 Russet, US No. 2 Bright, US No. 2, US No. 2 Russet, and US No. 3. The general characteristics graded are color (both hue and uniformity), firmness, maturity, varietal characteristics, texture, and shape. Fancy, the highest grade, requires the highest grade of color and an absence of blemishes, while the terms Bright, Golden, Bronze, and Russet concern solely discoloration.<br><br>

		Grade numbers are determined by the amount of unsightly blemishes on the skin and firmness of the fruit that do not affect consumer safety. The USDA separates blemishes into three categories:<br><br>
			<ol>
				<li>General blemishes: ammoniation, buckskin, caked melanose, creasing, decay, scab, split navels, sprayburn, undeveloped segments, unhealed segments, and wormy fruit</li><br><br>
				<li>Injuries to fruit: bruises, green spots, oil spots, rough, wide, or protruding navels, scale, scars, skin breakdown, and thorn scratches</li><br><br>
				<li>Damage caused by dirt or other foreign material, disease, dryness, or mushy condition, hail, insects, riciness or woodiness, and sunburn.</li><br><br>
			</ol>
		The USDA uses a separate grading system for oranges used for juice because appearance and texture are irrelevant in this case. There are only two grades: US Grade AA Juice and US Grade A Juice, which are given to the oranges before processing. Juice grades are determined by three factors:<br><br>
			<ul>
				 <li>The juiciness of the orange</li><br><br>
				 <li>The amount of solids in the juice (at least 10% solids are required for the AA grade)</li><br><br>
				 <li>The proportion of anhydric citric acid in fruit solids</li><br><br>
			</ul>
		</div>

	<div id="footer">
		<p>by Charlie Scarver</p>
	</div>

</body>
</html>

<?php?>