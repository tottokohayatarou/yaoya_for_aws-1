<?php session_start(); ?>
<?php
  if (isset($_SESSION['user'])) {
  //MySQLデータベースに接続する
  require 'db_connect.php';
  //SQL文を作る（プレースホルダを使った式）
  $sql = "delete from favorite where user_id = :user_id and product_id = :product_id";
  //プリペアードステートメントを作る
  $stm = $pdo->prepare($sql);
  //プリペアードステートメントに値をバインドする
  $stm->bindValue(':user_id', $_SESSION['user']['id'], PDO::PARAM_STR);
  $stm->bindValue(':product_id', $_REQUEST['id'], PDO::PARAM_STR);
  //SQL文を実行する
  $stm->execute();
  //結果の取得（連想配列で受け取る）
  $result = $stm->fetchAll(PDO::FETCH_ASSOC);
  $_SESSION['message'] = 	'お気に入りから商品を削除しました。';
?>
<?php
  } else {
    $_SESSION['message'] = 	'お気に入りから商品を削除しました。';
  }
  $url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/favorite.php';
  header("Location:" . $url);
  exit();
?>