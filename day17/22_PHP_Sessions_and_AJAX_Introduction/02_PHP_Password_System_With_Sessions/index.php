<!DOCTYPE html>
<html>
  <head>
    <title>NYU Web Development</title>
  </head>
  <body>
    <h1>NYU Web Development</h1>

    <?php
      // start up the session (make available any variables in the
      // $_SESSION superglobal)
      session_start();

      // see if they are logged in
      if (isset($_SESSION['loggedin'])) {

        // have we been told that the user just logged in?
        if ($_GET['action'] === 'success') {
          print "<p>Login Success!</p>";
        }

        // success message
        print '<p>You are logged in!</p>';
        print '<a href="logout.php">Logout</a>';
      }

      // they aren't logged in
      else {
        // have we been told that a login failure occurred?
        if ($_GET['action'] === 'failure') {
          print "<p>Incorrect username & password!</p>";
        }

        // have we been told that the user just logged out?
        if ($_GET['action'] === 'loggedout') {
          print "<p>You have been logged out</p>";
        }

        // the form
        print '<form method="post" action="login.php">
          Username: <input type="text" name="username">
          Password: <input type="text" name="password">
          <input type="submit" name="submit" value="Login">
        </form>';
      }
    ?>

  </body>
</html>
