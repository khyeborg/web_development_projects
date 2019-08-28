<!-- <!DOCTYPE html>
<html>
	<head>
		
	</head>
	<body>	
		<h1>Blah!</h1>
	</body>
</html> -->

<!-- php view source: only the output is shown -->

<?php
	
	//print_r($_SERVER); // everything the server knows about the request

	// location of folder to hold data
	$folder = '/Users/khyeborg/Documents/MAMP/webdev/day16/data';

	print "hello, world";

	// extract the 4 words the user supplied
	$noun = $_POST['noun'];
	$verb = $_POST['verb'];
	$adjective = $_POST['adjective'];
	$adverb = $_POST['adverb'];

	// construct a story
	print "The $adjective $noun was very hungry so it decided to $adverb $verb to the nearest restaurant.";

	// store the story on the server 
	$header = $_SERVER['REQUEST_TIME'] . ',' . $_SERVER['REMOTE_ADDR'] . ','; // Time + IP address
	$story = "The $adjective $noun was very hungry so it decided to $adverb $verb to the nearest restaurant.\n\n\n";

	file_put_contents($folder . '/stories.txt', $header . $story, FILE_APPEND);

?>














