<?php
	
	include("config.php");

	// get the data from the file
	$data = file_get_contents($path . '/votes.txt');

	// figure out the number of each pokemon
	$split = explode("\n", $data); // explode is like the split function in python

	$charmander = 0;
	$bulbasaur = 0;
	$squirtle = 0;
	$pikachu = 0;

	for ($i = 0; $i < sizeof($split); $i++) { // sizeof is like the len function
		// print $split[$i] . "<br>";
		if ($split[$i] == 'Charmander') {
			$charmander++;
		}
		else if ($split[$i] == 'Bulbasaur') {
			$bulbasaur++;
		}
		else if ($split[$i] == 'Squirtle') {
			$squirtle++;
		}
		else if ($split[$i] == 'Pikachu') {
			$pikachu++;
		}
	}

	// print "$charmander $bulbasaur $squirtle $pikachu"

	$total = $charmander + $bulbasaur + $squirtle + $pikachu;
	$charmander_percent = intval($charmander / $total * 100);
	$bulbasaur_percent = intval($bulbasaur / $total * 100);
	$squirtle_percent = intval($squirtle / $total * 100);
	$pikachu_percent = intval($pikachu / $total * 100);

	// php happens first!!!
	// print "$charmander_percent $bulbasaur_percent $squirtle_percent $pikachu_percent";

	// update the histogram

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Assignment 06 Results</title>
		<style>

			.hidden {
				display: none;
			}

			#main {
				margin: auto;
				text-align: left;
				position: relative;
				background-color: white;
				color: black;
				font-family: Helvetica;
			}

			div {
				position: relative;
			}

			#char {
				height: 80px;
				background-color: orange;
				width: <?php print $charmander_percent; ?>%;
				border: 1px solid black;
			}

			#bulb {
				height: 80px;
				background-color: lightgreen;
				width: <?php print $bulbasaur_percent; ?>%;
				border: 1px solid black;
			}

			#squirt {
				height: 80px;
				background-color: aqua;
				width: <?php print $squirtle_percent; ?>%;
				border: 1px solid black;
			}

			#pika {
				height: 80px;
				background-color: yellow;
				width: <?php print $pikachu_percent; ?>%;
				border: 1px solid black;
			}

			#back {
				text-align: center;
			}

		</style>
	</head>
	<body>
		<div id="main">
			<h1>Pokemon Quiz Results</h1>
			<div id="char">Charmander <?php print $charmander_percent; ?>%</div>
			<div id="bulb">Bulbasaur <?php print $bulbasaur_percent; ?>%</div>
			<div id="squirt">Squirtle <?php print $squirtle_percent; ?>%</div>
			<div id="pika">Pikachu <?php print $pikachu_percent; ?>%</div>
			<br><br><br>
			<div id="back"><a href="index.php">Back To Quiz</a></div>
		</div>
	</body>
</html>











