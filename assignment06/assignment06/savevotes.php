<?php
	
	include('config.php'); // include is similar to import in Python
	
	// grab incoming variables
	$color = $_POST['color'];
	$food = $_POST['food'];
	$hobby = $_POST['hobby'];

	// diagnose what pokemon they are based on answers
	$pokemon = "unknown";
	$pokemon_image = "";

	// do both the variables have a value?
	if ($color && $food) {
		$charmander = 0;
		$bulbasaur = 0;
		$squirtle = 0;
		$pikachu = 0;

		if ($color === 'red') {
			$charmander += 1;
		}
		else if ($color === 'green') {
			$bulbasaur += 1;
		}
		else if ($color === 'blue') {
			$squirtle += 1;
		}
		else if ($color === 'yellow') {
			$pikachu += 1;
		}

		if ($food === 'pizza') {
			$charmander += 1;
		}
		else if ($food === 'cake') {
			$bulbasaur += 1;
		}
		else if ($food === 'fruit') {
			$squirtle += 1;
		}
		else if ($food === 'vegetables') {
			$pikachu += 1;
		}

		if ($hobby === 'video_games') {
			$charmander += 1;
		}
		else if ($hobby === 'hiking') {
			$bulbasaur += 1;
		}
		else if ($hobby === 'chess') {
			$squirtle += 1;
		}
		else if ($hobby === 'programming') {
			$pikachu += 1;
		}

		if ($charmander > $bulbasaur && $charmander > $squirtle && $charmander > $pikachu) {
			$pokemon = 'Charmander';
			$pokemon_image = "images/charmander.png";
		}
		else if ($bulbasaur > $charmander && $bulbasaur > $squirtle && $bulbasaur > $pikachu) {
			$pokemon = 'Bulbasaur';
			$pokemon_image = "images/bulbasaur.png";
		}
		else if ($squirtle > $charmander && $squirtle > $bulbasaur && $squirtle > $pikachu) {
			$pokemon = 'Squirtle';
			$pokemon_image = "images/squirtle.png";
		}
		else {
			$pokemon = 'Pikachu';
			$pokemon_image = "images/pikachu.png";
		}
	}

	// store the results for later
	file_put_contents("$path/votes.txt", "$pokemon\n", FILE_APPEND);
	// print "You are $pokemon";

	// set a cookie to indicate which pokemon they are (setting a cookie in php is easy) + there cannot be any print statement before the setcookie statement
	setcookie('pokemon', $pokemon);
	setcookie('pokemon_image', $pokemon_image);

	// send them back to the voting page
	header('Location: index.php');
	exit; // forces php to stop, no code will be evaluated beyond this point

?>