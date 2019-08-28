<!DOCTYPE html>
<html>
  <head>
    <title>Mad Libs!</title>
  </head>
  <body>
    <h1>Mad Libs!</h1>
    <p>
<?php

  // get incoming form values
  $noun = $_POST['noun'];
  $verb = $_POST['verb'];
  $adjective = $_POST['adjective'];
  $adverb = $_POST['adverb'];

  // construct story
  $story = "The $adjective $noun was very hungry so it decided to $adverb $verb to the nearest restaurant.";

  print $story;
?>
    </p>
  </body>
</html>
