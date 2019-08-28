<?php

  // access the user's session
  session_start();

  // delete all variables in the session
  session_unset();

  // destroy the session and completely invalidate it
  session_destroy();

  // send them back to the login page
  header('Location: index.php?action=loggedout');

 ?>
