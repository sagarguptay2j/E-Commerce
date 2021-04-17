<?php
require('connection.inc.php');
require('functions.inc.php');

		unset($_SESSION['USER_LOGIN']);
		unset($_SESSION['USER_EMAIL']);
		unset($_SESSION['USER_ID']);
	
	header('location:index.php');
	die();


?>
 