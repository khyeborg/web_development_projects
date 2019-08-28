<!DOCTYPE html>
<html>
	<head>
		<title>Web Development</title>
		<meta charset="utf8">
		
	</head>

	<body>
		<h1>Intro to AJAX</h1> <!-- AJAX does not lose stuff --> 

		<button id="one">Button One</button>
		<input type="text" id="message">

		<script src="jquery-3.3.1.min.js"></script>

		<script>
			// runs when the 'page' is ready
			$(document).ready(function() {

				$("#one").click(function() {

					// call the ajax function
					$.ajax({
						
						type: "GET",
						url: "datasource.php",
						data: {
							name: "pikachu",
							power: "electricity",
							message: document.getElementById("message").value
						},
						success: function(data, status) {
							console.log("Data: " + data);
							console.log("Status: " + status);
							console.log("Message: " + document.getElementById("message").value);
						},
						error: function(request, data, status) {
							console.log("An error occurred!");
							console.log("Status: " + status);
						}

					})

				});
			});
		</script>

		<!-- <script>
			document.getElementById('one').addEventListener('click', function() {

				var request = new XMLHttpRequest(); // allows us to connect without refreshing 
				request.onreadystatechange = function() {
					// the four possible states of AJAX 
					// state 0: not initialized
					// state 1: server communication established
					// state 2: request was received at server
					// state 3: server is processing request
					// state 4: request is finished and response is ready

					/* console.log(this.readyState);
					console.log(this.responseText);
					console.log("------"); */

					if (this.readyState === 4) {
						console.log("All done!");
						console.log(this.responseText);
					}
				}

				request.open("GET", "datasource.php?name=pikachu");
				request.send();

			});
		</script> -->

	</body>
</html>