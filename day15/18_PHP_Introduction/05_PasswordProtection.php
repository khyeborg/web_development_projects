<!DOCTYPE html>
<html lang="en-us">
  <head>
    <title>Hello, CGI</title>
    <meta charset="utf-8">
  </head>

  <body>
    <h1>Simple Password Protection</h1>

    <?php

      // make sure we have a password to evaluate
      if ( isset($_POST['password']) ) {
        // evaluate the password
        if ($_POST['password'] === 'webdev2018') {
          $ok = true;
    ?>

    <div>This is some secret content!</div>

    <?php
        } // end password content check
        else {
    ?>

    <div>Invalid password, try again

    <?php
        } // end else
      } // end password isset
    ?>


    <?php

      if (!$ok) {

    ?>
    <form action="05_PasswordProtection.php" method="POST">
      Password: <input type="text" name="password">
      <input name="submit" type="submit" value="Log in">
    </form>

    <?php } ?>
  </body>
</html>
