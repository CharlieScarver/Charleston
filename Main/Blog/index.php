<html>
	<head>
		
		<title> Charleston </title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="style.css" media="screen">
		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
		<link rel="shortcut icon" href="Other/icon.png" />

	</head>
	<body>
		<a href="#top"></a>

		<div id="header">
			<a href="http://charleston.zapto.org/Blog">
				<img src="../Other/charleston.png" alt="charleston">
			</a>
		</div>		

		<a id="photography_link" href="http://charleston.zapto.org"> 
				Back to the Photography section
		</a> 

		<?php

		if(isset($_GET['page'])) {
				
			switch ($_GET['page']) {
				case 'Home':
					require_once 'home.php';
					break;
			}

		} else {
			require_once 'home.php';
		}

		?>
