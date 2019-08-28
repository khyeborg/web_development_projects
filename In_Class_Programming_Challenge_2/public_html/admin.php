<?php
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
          <li><a href="admin.php" class="navlink active">Admin</a></li>
        </ul>
      </div>
      <div id="rightcolumn">
        <div id="header">
          Welcome to Hogwarts
        </div>
        <div id="content">
          <?php 
            include($file_path . 'admin.txt'); 

            if($_COOKIE['login']) {
              print "Welcome " . $_COOKIE['firstname'] . " " . $_COOKIE['lastname'] . "!";

              if($_GET["update"] == "success") {
                print "<br>You have successfully updated the database.";
              }
          ?>

            <br>
            <a href="admin_report.php">View Admin Report</a>
            <br>

          <?php
              $encoded_home = htmlentities(htmlentities(file_get_contents($file_path . 'home.txt')));
              $encoded_about = htmlentities(htmlentities(file_get_contents($file_path . 'about.txt')));
              $encoded_policies = htmlentities(htmlentities(file_get_contents($file_path . 'policies.txt')));
              $encoded_admin = htmlentities(htmlentities(file_get_contents($file_path . 'admin.txt')));

          ?>
          <form action="updatecontent.php" method="POST">
              <p>Home:</p>
              <textarea name="home"><?php print $encoded_home; ?></textarea>
              <p>About:</p>
              <textarea name="about"><?php print $encoded_about; ?></textarea>
              <p>Policies:</p>
              <textarea name="policies"><?php print $encoded_policies; ?></textarea>
              <p>Admin:</p>
              <textarea name="admin"><?php print $encoded_admin; ?></textarea>
              <button type="submit">Submit</button>
              <br><br>
            </form>
            <form action="logout.php" method="POST">
              <button id="logout" name="action">Logout</button>
            </form>

          <?php
            }
            else {
          ?>

          <form action="login.php" method="POST">
            <br>
            Username: <br><input type="text" name="username">
            <br>
            Password: <br><input type="text" name="password">
            <br><br>
            <button type="submit">Login</button>
          </form>
          <br>

          <?php

              if($_GET["action"] == "loggedout") {
                print "You have successfully logged out.";
              }
            }
          ?>
          
        </div>
      </div>
    </div>
  </body>
</html>
