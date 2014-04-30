<!DOCTYPE html>
<html>

	<head>
		<title> Charleston </title>
		<meta charset="UTF-8">
		<?php 
		if(session_start())
			;
		else
			die("Session could not be resumed!");

		if (isset($_SESSION['theme'])) {
			switch ($_SESSION['theme']) {
				case 'Red':
					echo '<link rel="stylesheet" type="text/css" href="charleston-red.css" media="screen" >';
					break;
				case 'Blue':
					echo '<link rel="stylesheet" type="text/css" href="charleston-blue.css" media="screen" >';
					echo '<script src="snowstormv144_20131208/snowstormv144_20131208/snowstorm.js"></script>';
					break;
			}

		} else {
			echo '<link rel="stylesheet" type="text/css" href="charleston-blue.css" media="screen" >';
			echo '<script src="snowstormv144_20131208/snowstormv144_20131208/snowstorm.js"></script>';
		}

		
		?>
		<!--<link rel="stylesheet" type="text/css" href="charleston-blue.css" media="screen" >-->
		<link rel="shortcut icon" href="Fantasy-Night-Sky.jpg" />
		<script type="text/JavaScript" src="Gallery/gallery_script.js"></script>
		<script language="JavaScript" src="home_script.js"></script>

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

	</head>

	<body>
		<button id="music_button_show" onclick="togglePlayer()"><b> ♫ </b></button>

		<button id="tip_button_show" onclick="showTip()"><b> :) </b></button>
		<div id="tip"><p id="tip_text"> Use Full Screen (F11) for better experience :) </p></div>

		<a id="photography_link" href="http://charleston.zapto.org"> 
				Back to the Photography section
		</a> 

		<a href="http://charleston.zapto.org/Relax"> <p id="title"> CHARLESTON </p> </a>
		
		
		<!--
		<p id="subtitle" onclick="toggleFullScreen()"> Use Full Screen (F11) for better experience :) </p>
		<! onclick="toggleFullScreen()" -->

		<?php

		if(isset($_POST['Logout'])){ // If Logout is pressed 
			unset($_SESSION['user']); // UNSET the Session from the current user
			header("Location: http://charleston.zapto.org/Relax");
		}

		if (!isset($_SESSION['user'])) {
			echo '<div id="buttons">
					<form method="GET" id="menu_form">
						<input type="submit" name="page" id="login" value="Log in" class="submits">
						|
						<input type="submit" name="page" id="register" value="Register" class="submits">
					</form> 
				</div>';
		} else {
			echo '<div id="buttons">
					<p id="profile_message"> Hello, ', $_SESSION['user'], '! </p>
					<form method="GET" id="menu_form">
						<input type="submit" name="page" id="profile" value="Profile" class="submits">
						<input type="submit" name="page" id="gallery" value="Gallery" class="submits">
						<input type="submit" name="page" id="theme_selector" value="Themes" class="submits">
						|
						<input type="submit" name="page" id="questions" value="Questions" class="submits">
					</form>	
						|
					<form method="POST" id="bi_form">
					    <input type="submit" name="Logout" id="logout" value="Logout" class="submits">
					</form>
				</div>';
		}

		
		if(isset($_GET['page'])) {
			
			switch ($_GET['page']) {
				case 'Log in':
					require_once 'Login/login.php';
					break;
				case 'Register':
					require_once 'Register/register.php';
					break;
				case 'Reg_Success':
					require_once 'Register/reg_success.php';
					break;
				case 'Profile':
					require_once 'Profile/profile.php';
					break;
				case 'Gallery':
					require_once 'Gallery/gallery.php';
					break;
				case 'Themes':
					require_once 'Themes/themes.php';
					break;
				case 'Questions':
					require_once 'Questions/questions.php';
					break;
				case 'Add Question':
					require_once 'Questions/add_question.php';
					break;
				case 'Add_Success':
					require_once 'Questions/add_success.php';
					break;
			}

		} else {
			if (isset($_SESSION['theme'])  && $_SESSION['theme'] == 'Red') {
				require_once 'home_red.php';
			} else {
				require_once 'home_blue.php';
			}
		}

		//--------------Hits--------------------------
		/*
		$page = 'http://charleston.zapto.org/Relax';

		// or you could use $page = $_SERVER['PHP_SELF'] ;

		include ( 'Hits/Example_Hitcounter_v1.0/counter.php');
		addinfo($page);
		*/

		?>

		<audio controls id="player">
			<source src="Hyousa Rurutia [ musicbox ].mp3" type="audio/mpeg">
			<source src="ParagonX9 - Polar240.wav" type="audio/wav">
		</audio>

<!-- Sky Flight

Transperancy: ON OFF
Gallery - Image Deletion Option
User Deletion Tool
Profile Message Edit
Toggle FullScreen Button
Customized Scrollbar
Main Gallery
Images Border
Avatar
Online Between

 -->
