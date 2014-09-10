<html>
	<head>
		<?php echo $_SERVER['REQUEST_URI']; ?>
		<title> Charleston </title>
		<meta charset="UTF-8">
		<meta name="keywords" content="Charleston, Charlie Scarver, Danniesaurus, Charleston Photography, Charleston Blog, Charleston Relax, 37">
		<meta name="description" content="Browse our Gallery and Blog or relax in the Relax section">
		<meta name="author" content="Charlie Scarver">
		<link rel="stylesheet" type="text/css" href="style.css" media="screen">
		<script type="text/JavaScript" src="Gallery/gallery_script.js"></script>
		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
		<link rel="shortcut icon" href="Other/icon.png" />

		<?php 
		if(!session_start())
			die("Session could not be resumed!");

		$GLOBALS['admins'] = array("192.168.1.1","46.238.53.111");
		$GLOBALS['client_ip'] = $_SERVER['REMOTE_ADDR'];

		
		if (!in_array($GLOBALS['client_ip'], $GLOBALS['admins'])) {

			if (!mysql_connect("localhost","root","rootpass")) //Check if connection was successful
				echo "Failed to connect!";

			if (!mysql_select_db("charleston")) //Check if DB selection was successful
				echo "Failed to select DB!";

			$results = mysql_query("UPDATE views SET Count = Count + 1");
				if (!$results)  // Succession check
					echo "Failed to update! :c<br>";

		}

		?>

	</head>

	<div id="too_small_div">
			<p>
			<b>Why are you doing this?! &nbsp T.T</b><br>
			<br>
			Please maximize your browser... please...
			</p>
	</div>

	<body>
		<a href="#top"></a>

		<div id="null_field">
			<div id="null_l_eye"></div>
			<div id="null_r_eye"></div>
		</div>



		<div id="header">
			<a href="http://charleston.onthewifi.com">
				<img src="Other/charleston.png" alt="charleston">
			</a>
		</div>
		


		<div id="follow_us_block">
			<div id="follow_us_bg">
				<a href="https://www.facebook.com/CharlieScene37">
		            <img src="Other/facebook.png" id="facebook_icon" class="follow_icons" alt="facebook_icon">
				</a>
				
				<a href="https://twitter.com/ChScarver">
					<img src="Other/twitter.png" id="twitter_icon" class="follow_icons" alt="twitter_icon">
				</a>

				<a href="http://danniesaurus.deviantart.com">
					<img src="Other/deviantart.png" id="deviantart_icon" class="follow_icons" alt="deviantart_icon">
				</a>

				<a href="https://github.com/CharlieScarver">
					<img src="Other/github.png" id="github_icon" class="follow_icons" alt="github_icon">
				</a>
			</div>
		</div>


		<div id="menu_div">
			<form method="GET" id="menu_form">
				
					<input type="submit" name="page" value="Home">
					<input type="submit" name="page" value="Gallery">
					<input type="submit" name="page" value="About">

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
				case 'Thanks':
					require_once 'Thanks/thanks.php';
					break;
			}

		} else {
			require_once 'home.php';
		}

		?>
