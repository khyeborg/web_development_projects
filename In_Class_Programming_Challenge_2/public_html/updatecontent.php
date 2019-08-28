<?php
	include('config.php');

	// if user is authenticated
	if (isset($_COOKIE['login'])) {

		$decoded_home = html_entity_decode($_POST["home"]);
     	$decoded_about = html_entity_decode($_POST["about"]);
        $decoded_policies = html_entity_decode($_POST["policies"]);
        $decoded_admin = html_entity_decode($_POST["admin"]);

		// overwrite previous text file content
		file_put_contents($file_path . "home.txt", $decoded_home);
		file_put_contents($file_path . "about.txt", $decoded_about);
		file_put_contents($file_path . "policies.txt", $decoded_policies);
		file_put_contents($file_path . "admin.txt", $decoded_admin);

		$currentTime = time();
		$username_log = $_COOKIE['username'];
		file_put_contents($file_path . 'adminlog.txt', "$currentTime,$username_log,update\n", FILE_APPEND);

		header('Location: admin.php?update=success');
		exit;
	}	

	// if user is not authenticated
	else {
		header('Location: admin.php');
		exit;
	}
?>