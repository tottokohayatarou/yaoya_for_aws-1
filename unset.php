<?php
  session_start();
  print_r($_SESSION);
  unset($_SESSION['email']);
  unset($_SESSION['signup']);
  print_r($_SESSION);
?>

<a href="login_input_email.php">login_input_emailへ</a>
<a href="show.php">showへ</a>