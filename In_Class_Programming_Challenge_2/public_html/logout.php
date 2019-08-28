<?php
	include('config.php');

 	setcookie('login', '', time()-3600);
 	setcookie('username', '', time()-3600);
 	setcookie('firstname', '', time()-3600);
 	setcookie('lastname', '', time()-3600);

 	$currentTime = time();
	$username_log = $_COOKIE['username'];
	file_put_contents($file_path . 'adminlog.txt', "$currentTime,$username_log,logout\n", FILE_APPEND);

	header('Location: admin.php?action=loggedout');
	exit;

?>