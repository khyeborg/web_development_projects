<?php
	include('config.php');

	$nickname = $_POST['nickname'];
	$message = $_POST['message'];
	$message_without_punctuations = "";
	$clean_message = "";
	$num = $_POST['num'];
	$bad_count = 0;

	$badwords_file = file_get_contents($path . '/badwords.txt');
	$badwords = explode("\n", $badwords_file);

	for ($i = 0; $i < strlen($message); $i++) {
		if (ctype_alnum($message[$i]) || ctype_space(($message[$i])) || $message[$i] === "." || $message[$i] === "," || $message[$i] === "!" || $message[$i] === "?") {
			$message_without_punctuations = $message_without_punctuations . $message[$i];
		}
	}


	for ($i = 0; $i < strlen($message); $i++) {
		if (ctype_alnum($message[$i]) || ctype_space(($message[$i]))) {
			$clean_message = $clean_message . $message[$i];
		}
	}

	$clean_message_words = explode(" ", $clean_message);


	for ($i = 0; $i < sizeof($clean_message_words); $i++) {
		for ($j = 0; $j < sizeof($badwords); $j++) {
	    	if ($badwords[$j] === $clean_message_words[$i]) {
	    		$bad_count++;
	    		break;
	    	}
	    }
	}

	$clean_nickname = "";

	for ($i = 0; $i < strlen($nickname); $i++) {
		if (ctype_alnum ($nickname[$i])) {
			$clean_nickname = $clean_nickname . $nickname[$i];
		}
	}

	if ($clean_nickname) {
		if ($bad_count === 0) {
			file_put_contents($path . '/messages' . $num . '.txt', $clean_nickname . ": " . $message_without_punctuations . "\n", FILE_APPEND);

			$data = file_get_contents($path . '/messages' . $num . '.txt');
			print $data;
		}
		else {
			print "BAD WORD(S) DETECTED";
		}
	}
?>