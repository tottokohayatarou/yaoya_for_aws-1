<?php
  session_start();


  unset($_SESSION['product'][$_GET['id']]);
  $_SESSION['message'] = 'カートから商品を削除しました。';


  $url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/cart.php';
  header("Location:" . $url);
  exit();
?>