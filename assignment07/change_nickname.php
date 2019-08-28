<?php
	include('config.php');

	$data = file_get_contents($path . '/nicknames.txt');
	$nickname = $_POST['nickname'];
	$count = 0;
	$clean_nickname = "";

	for ($i = 0; $i < strlen($nickname); $i++) {
		if (ctype_alnum ($nickname[$i])) {
			$clean_nickname = $clean_nickname . $nickname[$i];
		}
	}

	$lines = explode("\n", $data);
	for ($i = 0; $i < sizeof($lines); $i++) {
    	if ($lines[$i] === $clean_nickname) {
    		$count++;
    	}
	}

	// only include nickname if the nickname has not been used before
	if ($count === 0 && $clean_nickname != "") {
		setcookie('nickname', $clean_nickname);
		$currentTime = time();
		$readable_time = date('Y-m-d H:i:s', $currentTime);
		$activity = "change_nickname";
		file_put_contents($path . '/nicknames.txt', $clean_nickname . "\n", FILE_APPEND);
		file_put_contents($path . '/user_info.txt', $readable_time . ", " . $clean_nickname . ", " . $activity . ", " . $_SERVER['REMOTE_ADDR'] . "\n", FILE_APPEND);
		print $clean_nickname;
	}
	else if ($clean_nickname === "") {
		print "EMPTY CHANGE";
	}
	else {
		print "CHANGE ERROR";
	}

	
?>