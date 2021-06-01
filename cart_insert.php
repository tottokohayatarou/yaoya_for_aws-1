<?php
  session_start();

  
  $id = $_POST['id'];
  if (!isset($_SESSION['product'])) {
    $_SESSION['product'] = [];
  }

  $count = 0;
  if (isset($_SESSION['product'][$id])) {
    $count = $_SESSION['product'][$id]['count'];
  }

  if (empty($_POST['count'])) {
    $_POST['count'] = 1;
  }


  $_SESSION['product'][$id] = [
    'name' => $_POST['name'],
    'price' => $_POST['price'],
    'count' => $count + $_POST['count'],
    'image_name' => $_POST['image_name'],
  ];
  $_SESSION['message'] = 'カートに商品を追加しました。';

  $url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/cart.php';
  header("Location:" . $url);
  exit();
?>
