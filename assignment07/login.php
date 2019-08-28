<?php
  include('config.php');
  $data = file_get_contents($path . '/admin_info.txt');

  $username = $_POST['admin_username'];
  $password = $_POST['admin_password'];
  $login = 'yes';

  $split_line = explode("\n", $data);

  for ($i = 0; $i < sizeof($split_line); $i++) {
    $split_comma = explode(",", $split_line[$i]);
    if ($username == trim($split_comma[0]) && $password == trim($split_comma[1])) {
      print "LOGIN SUCCESSFUL";
      exit;
    }
  }

  print "LOGIN FAILURE";
  exit;

?>