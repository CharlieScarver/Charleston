<html>
	<head>
		
		<title> Charleston </title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="style.css" media="screen">
		<script type="text/JavaScript" src="Gallery/gallery_script.js"></script>
		<link rel="shortcut icon" href="Other/icon.png" />

	</head>
	<body>
		<a href="#top"></a>


		<div id="null_field">
			<div id="null_l-eye"></div>
			<div id="null_r-eye"></div>
		</div>


		<div id="follow_us_block">
			<div id="follow_us_bg">
				<a class="click" href="https://www.facebook.com/CharlieScene37" id="facebook">
		            <img src="Other/facebook.png" class="follow_icons" alt="facebook_icon">
				</a>
				
				<a href="https://twitter.com/ChScarver" id="twitter">
					<img src="Other/twitter.png" class="follow_icons" alt="twitter_icon">
				</a>

				<a href="http://danniesaurus.deviantart.com" id="deviantart">
					<img src="Other/deviantart.png" id="deviantart_icon" class="follow_icons" alt="deviantart_icon">
				</a>

				<a href="https://github.com/CharlieScarver" id="github">
					<img src="Other/github.png" class="follow_icons" id="github_icon" alt="github_icon">
				</a>
			</div>
		</div>


		<a href="http://charleston.zapto.org"> 
			<div id="header">
				<span id="header_title"> Charleston </span>

				<div id="header_eye">
					<div class="pupils"> </div>
				</div>
			</div>
		</a>
		<?php
			if (isset($_GET['page']) && $_GET['page'] != 'Home') {		
				echo "
				<style type=\"text/css\">
					#header_eye {left: 747;}
				</style>";
			}
		?>


		<div id="menu_div">
			<form method="GET" id="menu_form">
				
					<input type="submit" name="page" value="Home" >
					<input type="submit" name="page" value="Gallery" >
					<input type="submit" name="page" value="About" >

			</form>
		</div>	
		

		<?php

		if(isset($_GET['page'])) {
				
			switch ($_GET['page']) {
				case 'Home':
					require_once 'home.php';
					break;
				case 'Gallery':
					require_once 'Gallery/gallery.php';
					break;
				case 'About':
					require_once 'About/about.php';
					break;
			}

		} else {
			require_once 'home.php';
		}

		?>
