<?php
  session_start();


  // 新規登録用のsessionを破棄
  if (isset($_SESSION['signup'])) {
    unset($_SESSION['signup']);
  }

  // 新規登録ページへリダイレクト
  $url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/signup_input.php';
  header("Location:" . $url);
  exit();
?>