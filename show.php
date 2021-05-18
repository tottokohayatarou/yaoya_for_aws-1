<?php
  session_start();


  
  print_r($_SESSION);
// require_once('db_connect.php');
//   $sql = 'select * from user ';
//   $stm = $pdo->prepare($sql);
//   $stm->execute();
//   $result = $stm->fetchAll(PDO::FETCH_ASSOC);
//   print_r($result);
?>

<a href="index.php">index</a>
<a href="login_input_email.php">email</a>
<a href="login_input_password.php">password</a>
<a href="login_output.php">output</a>
<a href="unset.php">unset</a>