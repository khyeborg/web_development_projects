<?php

  // obtain incoming POST variables
  $username = $_POST['username'];
  $password = $_POST['password'];

  // check the username & password
  if ($_POST['username'] === 'pikachu' && $_POST['password'] === 'pokemon') {
    // start the PHP session
    session_start();

    // generate a new PHPSESSID cookie name
    session_regenerate_id();

    // set a session value -- this data is being stored on the SERVER,
    // not on the client!
    $_SESSION['loggedin'] = 'yes';

    // send them back to the login page with some GET data
    header('Location: index.php?action=success');
  }

  // otherwise the login was incorrect
  else {
    header('Location: index.php?action=failure');
  }

?>
