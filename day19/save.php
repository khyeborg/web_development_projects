<?php

  // define the file path (PUT YOUR PATH HERE!)
  $path = '/Users/khyeborg/Documents/MAMP/webdev/day18b/data';

  // grab the incoming form data
  $left = $_POST['left'];
  $top = $_POST['top'];
  $message =  $_POST['message'];
  $id = uniqid(); // generates a random string of characters that is unique based on the time stamp, enforces singularity

  // save this pin
  if ($left && $top && $message) {
    $line = "$id|$left|$top|$message\n";
    file_put_contents($path.'/pins.txt', $line, FILE_APPEND);
    print $id;
  }
  else {
    print "FAILURE";
  }

 ?>
