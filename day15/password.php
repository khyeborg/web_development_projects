<!doctype php>
<html>
	<head>
		
	</head>

	<body>
		<h1>Password</h1>

		<?php

			if ($_GET['pass']) 
			{
				if ($_GET['pass'] == 'pika') 
				{
					print "Welcome!";
				}
				else 
				{
					print "Intruder!";
				}
			}

		?>

		<form method="GET" action="password.php">
			Password: <input type="password" name="pass">
			<input type="submit">
		</form>
	</body>
</html>