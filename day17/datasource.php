<?php

	// $name = $_GET['name'];
	// print "hi " . $name;

	// grab the message
	$message = $_GET['message'] . "\n";

	file_put_contents("/Users/khyeborg/Documents/MAMP/webdev/day17/data/messages.txt", $message, FILE_APPEND);

	print "ok";
?>