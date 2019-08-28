<?php

  // obtain incoming POST variables
  $username = $_POST['username'];
  $password = $_POST['password'];

  // check the username & password
  if ($_POST['username'] === 'pikachu' && $_POST['password'] === 'pokemon') {
    // drop a cookie
    setcookie('loggedin', 'yes');

    // send them back with some GET data (to trigger a confirmation)
    header('Location: index.php?action=success');
  }

  // otherwise they logged in incorrectly
  else {
    header('Location: index.php?action=failure');
  }

?>
