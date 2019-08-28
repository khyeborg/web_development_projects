<?php
  if($_COOKIE['login']) {
	  // before we load the page we need to load in our 'config.php' file
	  // this file contains PHP variables that our page will need to access,
	  // such as the file path of the 'data' folder
	  include('config.php');

	  $data = file_get_contents($file_path . 'alerts.txt');
?>

	<!DOCTYPE html>
	<html lang="en-us">
	  <head>
	    <title>Hogwarts School Management System</title>
	    <link type="text/css" href="styles.css" rel="stylesheet" />
	  </head>
	  <body>
	    <?php 
	        if ($data) {
	    ?>
	        <div id="alert">
	          <?php print $data; ?>
	        </div>
	    <?php
	        }
	    ?>
	    <div id="container">
	      <div id="leftcolumn">
	        <img src="images/hogwarts_logo.png">
	        <ul>
	          <li><a href="index.php" class="navlink">Home</a></li>
	          <li><a href="about.php" class="navlink">About</a></li>
	          <li><a href="policies.php" class="navlink">Policies</a></li>
	          <li><a href="admin.php" class="navlink">Admin</a></li>
	          <li><a href="admin_report.php" class="navlink active">Admin Report</a></li>
	        </ul>
	      </div>
	      <div id="rightcolumn">
	        <div id="header">
	          Admin Report
	        </div>
	        <div id="content">
	        	<table>
	        		<tr>
					    <th>Time</th>
					    <th>Username</th>
					    <th>Activity</th>
				  	</tr>
				  
	          	<?php 

		          	$data = file_get_contents($file_path . 'adminlog.txt');
		          	$split_line = explode("\n", $data);

		          	for ($i = 0; $i < sizeof($split_line) - 1; $i++) {
	 					$split_comma = explode(",", $split_line[$i]);
	 			 ?>

				  	<tr>
					    <td><?php print date('Y-m-d H:i:s', $split_comma[0]); ?></td>
					    <td><?php print $split_comma[1]; ?></td>
					    <td><?php print $split_comma[2]; ?></td>
					</tr>
				
				<?php
	 				}
	 			?>

	 			</table>
	        </div>
	      </div>
	    </div>
	  </body>
	</html>

<?php
  }

  else {
  	header('Location: admin.php');
	exit;
  }
?>
