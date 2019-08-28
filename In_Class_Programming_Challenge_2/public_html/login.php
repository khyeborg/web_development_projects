<?php
	include('config.php');
 	$data = file_get_contents($file_path . 'teacheraccounts.txt');

 	$username = $_POST['username'];
	$password = $_POST['password'];
	$login = 'yes';

 	$split_line = explode("\n", $data);

 	for ($i = 0; $i < sizeof($split_line); $i++) {
 		$split_comma = explode(",", $split_line[$i]);
 		if ($username == trim($split_comma[0]) && $password == trim($split_comma[1])) {
 			setcookie('login', $login);
			setcookie('username', $split_comma[0]);
			setcookie('firstname', $split_comma[2]);
			setcookie('lastname', $split_comma[3]);

			$currentTime = time();
			$username_log = trim($split_comma[0]);
			file_put_contents($file_path . 'adminlog.txt', "$currentTime,$username_log,login\n", FILE_APPEND);

			header('Location: admin.php');
			exit;
 		}
 	}

 	header('Location: admin.php');
	exit;

?>