<?php

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
		default:
			require_once 'home.php';
			break;
	}

} else {
	require_once 'home.php';
}

?>