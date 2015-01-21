<?php require_once '../config.php'; ?>
<?php

$connect = mysql_connect($dbhost,$dbusr,$dbpw); //connect to DB
if (!$connect) { //Check is connection was successful
	die("Failed to connect to MySQL!");
}

if (!mysql_select_db("charleston")) { //Check is DB selection was successful
	die("Failed to select DB!");
}

if(isset($_POST['Register'])) { // If the Register button has been pressed
	$user = $_POST['Username']; // Get the entered Username
	$password = $_POST['Password']; // Get the entered Password
	$email = $_POST['Email']; // Get the entered Email
	$secquestion = $_POST['SecQuestion']; // Get the entered Secret Question
	$secanswer = $_POST['SecAnswer']; // Get the entered Secret Answer
	$date = date('Y-m-d'); // Get the current Date

	if ($secquestion == "") {
		$secquestion = NULL;
	} else if ($secanswer == ""){
		$secanswer = NULL;
	}

	if ($user != "" && $password != "" && $email != "") { // If Username, Password and Email field are NOT empty
		$elems = mysql_query("SELECT `Username` FROM `accounts` WHERE `Username` = '$user'");
		// Find and Select the Username in the DB (not working check??)
		$row = mysql_fetch_row($elems); // Extract the Username

		if (!is_null($row[0])) { // If the Username is NOT NULL (exists)
			echo "User ", $row[0], " already exists!<br>";
			$user = htmlspecialchars(trim($_POST['Username'])); // Crypt the Username
			$password = md5(htmlspecialchars(trim($_POST['Password']))); //Crypt the Password
		} else { // If the Username IS NULL (does not exists)

			do { // Everything is in a loop so we can break at anytime! (important for captcha)
			
			//------Beginning of CAPTCHA Code-------
			require_once 'recaptchalib.php';
			$privatekey = "6Lc-__YSAAAAALXkaLaOG2t0ndwwYNNKT7IvUylh";
			$resp = recaptcha_check_answer($privatekey, 
				$_SERVER["REMOTE_ADDR"], 
				$_POST["recaptcha_challenge_field"], 
				$_POST["recaptcha_response_field"]);

			if (!$resp->is_valid) {
				echo "Wrong Captcha Phrase";
				break;
			}
			//------End of CAPTCHA Code------------

			echo "Registring New User...<br>";
			$user = htmlspecialchars(trim($_POST['Username'])); // Crypt the Username
			$password = md5(htmlspecialchars(trim($_POST['Password']))); // Crypt the Password
			$dir = "Gallery/Pictures/" . $user; // The new Gallery Directory name

			if(mkdir($dir)) { // If the folder was created successfully
				$results = mysql_query("INSERT INTO `accounts` (`Username`, `Password`, `Email`, `SecretQuestion`, `SecretAnswer`, `RegDate`) VALUES ('$user', '$password', '$email', '$secquestion', '$secanswer', '$date')");  // Insert the new user's Data into the DB
				if ($results) { // The Data was INSERTED successfully
					$gallery_name = "gallery_" . $user;
					$table_create = mysql_query("CREATE TABLE `$gallery_name` (ID INT(3) NOT NULL AUTO_INCREMENT PRIMARY KEY, Source VARCHAR(100), Alt VARCHAR(70))"); 
					if (!$table_create)  // Succession check
						echo "Failed to create gallery table :c<br>";
					else {
						header("Location: http://charleston.onthewifi.com/Relax/?page=Reg_Success");
						exit;
					}
				}
			} else
				echo "Failed to create user directory";

			break; // Making sure that the loop will be executed once
			} while (1 == 1); // End of do-while	
			
		}

	} else { // If Username, Password and Email fields are EMPTY
		echo "Obligatory fields not filled!<br>";
	}

} // If the Register button has been pressed

?>
