<?php
  include('config.php');

  $clean_nickname = $_POST['nickname'];
  $currentTime = time();
  $readable_time = date('Y-m-d H:i:s', $currentTime);
  $activity = "logout";
  file_put_contents($path . '/user_info.txt', $readable_time . ", " . $clean_nickname . ", " . $activity . ", " . $_SERVER['REMOTE_ADDR'] . "\n", FILE_APPEND);
  setcookie('nickname', '', time()-3600);
?>