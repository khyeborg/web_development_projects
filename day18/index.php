<!DOCTYPE html>
<html>
	<head>
		<title>Web Development</title>
		<meta charset="utf8">
		
	</head>

	<body>
		<h1>AJAX</h1> 

		<div id="results"></div>

		<!-- <form method="GET" action="dosomething.php">
			<input type="submit">
		</form> -->

		<!-- <?php print "hello"; ?>  -->

		<!-- impoty jQuery -->
		<script src="jquery-3.3.1.min.js"></script>

		<script>
			
			$(document).ready(function() {

				console.log("DOM is ready!");

				$.ajax({ // ajax is asynchronistic 
					url: 'parrot.php',
					type: 'POST',
					data: {
						message: "Hello world from pikachu",
						somethingElse: 'blah'
					},
					success: function(data, status) { // only run if it successfully links the url???
						console.log("Parrot was successful");
						console.log("Data was", data);
					}
				});

				function getStuff() {

					$.ajax({ // ajax is asynchronistic 
						url: 'foo.txt',
						success: function(data, status) { // only run if it successfully links the url???
							console.log("request was successful");
							console.log("status was", status);
							console.log("data was", data);
							document.getElementById("results").innerHTML = data;

							setTimeout(getStuff, 3000);
						},
						error: function(request, data, status) {
							console.log("request failed!");
							console.log("status was", status);
							console.log("data was", data);
						}
					});

					console.log("blah blah blah");
				}

				// getStuff();

			});










		</script>

		

	</body>
</html>