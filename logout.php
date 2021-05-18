<?php session_start() ?>
<?php
  unset($_SESSION['user']);
  $_SESSION['message'] = 'ログアウトしました。';
    // index.phpにリダイレクト
    $url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
    header("Location:" . $url);
    exit();
?>