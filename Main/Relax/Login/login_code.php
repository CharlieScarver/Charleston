		<?php

		$connect = mysql_connect("localhost","root","rootpass"); //connect to DB
		if (!$connect) { //Check is connection was successful
			die("Failed to connect!");
		}

		if (!mysql_select_db("charleston")) { //Check is DB selection was successful
			die("Failed to select DB!");
		}
		
		if(isset($_POST['Login'])) { // If the Login button has been pressed
			$user = $_POST['Username']; // Get the entered username
			$password = $_POST['Password']; // Get the entered password

			if ($user != "" && $password != "") { // If Username and Password field are NOT empty
				$elems = mysql_query("SELECT `Username`,`Password` FROM `accounts` WHERE `Username` = '$user'");
				// Find and Select the Username in the DB (not working check??)
				$row = mysql_fetch_row($elems); // Extract the Username

				if (!is_null($row[0])) { // If the Username is NOT NULL (exists)
	//				echo "User ", $row[0], " found<br>";
	//				echo "Logging in...<br>";

					$user = htmlspecialchars(trim($_POST['Username'])); // Crypt the Username
					$password = md5(htmlspecialchars(trim($_POST['Password']))); //Crypt the Password

					if ($password == $row[1]) {
						$_SESSION['user'] = $user; // SET the Session to the current User
						echo "User ", $row[0], " logged<br>";
						header("Location: http://charleston.zapto.org/Relax");
						exit;
					} else {
						echo "Wrong Password!<br>";
					}


				} else { // If the Username IS NULL
					echo "No such user: $user<br>";
				}

			} else { // If Username and Password fields are EMPTY
				echo "Obligatory fields not filled!<br>";
			}

		}

		?>