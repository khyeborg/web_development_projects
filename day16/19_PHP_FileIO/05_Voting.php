<?php

  // if we have a color value we should store it
  if (isset($_POST['color']) && $_POST['color'] !== '') {
    // YOU NEED TO CHANGE THIS LINE IN ORDER FOR THIS PROGRAM TO WORK!
    $folder = '';
    $file = $folder . '/votes.txt';
    file_put_contents($file, $_POST['color'] . "\n", FILE_APPEND);
    $vote_ok = true;
  }
  else {
    $vote_ok = false;
  }

?>

<!DOCTYPE html>
<html lang="en-us">
  <head>
    <title>Day 19</title>
    <meta charset="utf-8">
  </head>

  <body>
    <h1>Vote!</h1>
    <?php
      if ($vote_ok) {
        print "<p>Your vote has been recorded!</p>";
      }
     ?>
    <form method="POST" action="05_Voting.php">
      What's your favorite color?
      <select name="color">
        <option value="">Select a color</option>
        <option value="red">Red</option>
        <option value="green">Green</option>
        <option value="blue">Blue</option>
      </select>
      <input type="submit" value="Vote!">
    </form>
  </body>
</html>
