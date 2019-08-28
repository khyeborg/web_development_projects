<?php

  // delete the cookie
  setcookie('loggedin', '', time()-3600);

  // send them back to the main page with some GET data (for a confirmation)
  header('Location: index.php?action=loggedout');

 ?>
