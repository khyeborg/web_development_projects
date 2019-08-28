<?php
	if ($_GET['reset'] === 'yes') {
		unset($_COOKIE['pokemon']);
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Assigment 06</title>
		<meta charset="utf-8" />

		<style>
			.hidden {
				display: none;
			}

			#main, #main2 {
				margin: auto;
				text-align: center;
				position: relative;
				background-color: white;
				color: black;
				font-family: Helvetica;
			}

			div {
				position: relative;
			}

			#vote {
				border: 5px solid black;
				border-radius: 10px;
				width: 250px;
				margin: auto;
				font-size: 95%;
				min-height: 225px;
			}

			p {
				margin-bottom: 0px;
			}

			#who_you_are {
				border: 5px solid black;
				border-radius: 10px;
				width: 250px;
				margin: auto;
				font-size: 95%;
				min-height: 225px;
			}

		</style>
	</head>

	<body>

		<?php
			// check  to see if there is a pokemon cookie on the machine
			if ($_COOKIE['pokemon']) { ?>
				<!-- print "Your pokemon is " . $_COOKIE['pokemon']; // " " will not interpret super global variables
				print "<br>";
				print '<a href="index.php?reset=yes">Try again?</a>'; -->
				<div id="main2">
					<h1>What's My Spirit Pokemon?</h1>
					<br>
					<div id="who_you_are">
						<p>You are <?php print $_COOKIE['pokemon']; ?>!</p>
						<br>
						<img src="<?php print $_COOKIE['pokemon_image']; ?>">
						<br><br>
						<a href="index.php?reset=yes"><button id="tryagain_button" type="submit">Try again?</button></a>
					</div>
					<br><br><br>
					<a href="results.php">See Aggregate Results</a>
				</div>

		<?php	
			}

			else {
		?>

		<div id="main">
			<h1>What's My Spirit Pokemon?</h1>
			<br id="error_message_hold">
			<p id="error_message" class="hidden">Error! Please answer all questions!</p>
			<div id="vote">
				<form method="POST" action="savevotes.php"> <!-- difference between POST and GET: POST is more obscured, things are hidden, more secured; GET is attaching the data to the url -->
					<br>
					<p>What is your favorite color?</p>
					<select id="select_color" name="color">
						<option value="none" selected>Select a color</option>
						<option value="red">Red</option>
						<option value="green">Green</option>
						<option value="blue">Blue</option>
						<option value="yellow">Yellow</option>
					</select>
					<p>What is your favorite food?</p>
					<select id="select_food" name="food">
						<option value="none" selected>Select a food</option>
						<option value="pizza">Pizza</option>
						<option value="cake">Cake</option>
						<option value="fruit">Fruit</option>
						<option value="vegetables">Vegetables</option>
					</select>
					<p>What is your favorite hobby?</p>
					<select id="select_hobby" name="hobby">
						<option value="none" selected>Select a hobby</option>
						<option value="video_games">Video Games</option>
						<option value="hiking">Hiking</option>
						<option value="chess">Chess</option>
						<option value="programming">Programming</option>
					</select>
					<br><br><br>
					<button id="submit_button" type="submit">What Pokemon am I?</button>
				</form>
			</div>
			<br><br><br>
			<a href="results.php">See Aggregate Results</a>
		</div>

		<script>
			var submitButton = document.getElementById("submit_button");
			var selectColor = document.getElementById("select_color");
			var selectFood = document.getElementById("select_food");
			var selectHobby = document.getElementById("select_hobby");
			var errorMessage = document.getElementById("error_message");
			var errorMessageHold = document.getElementById("error_message_hold");

			submitButton.addEventListener('click', function(event) {
				if (selectColor.value === "none" || selectFood.value === "none" || selectHobby.value=== "none") {
					event.preventDefault();
					errorMessage.classList.remove("hidden");
					errorMessageHold.classList.add("hidden");
				}
				else {
					errorMessage.classList.add("hidden");
					errorMessageHold.classList.remove("hidden");
				}
			});
		</script>

		<?php
			}
		?>


	</body>
</html>
















