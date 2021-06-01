<?php session_start(); ?>
<?php
  if (isset($_SESSION['user'])) {
    //MySQLデータベースに接続する
    require 'db_connect.php';

    // 商品がすでにお気に入りに登録されていないかを確認
    $sql = "select * from favorite where user_id = :user_id and product_id = :product_id";
    $stm = $pdo->prepare($sql);
    $stm->bindValue(':user_id', $_SESSION['user']['id'], PDO::PARAM_INT);
    $stm->bindValue(':product_id', $_REQUEST['id'], PDO::PARAM_INT);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);

    if (empty($result)) {
      $sql = "insert into favorite values(:user_id, :product_id)";
      $stm = $pdo->prepare($sql);
      $stm->bindValue(':user_id', $_SESSION['user']['id'], PDO::PARAM_INT);
      $stm->bindValue(':product_id', $_REQUEST['id'], PDO::PARAM_INT);
      $stm->execute();
      $_SESSION['message'] = 'お気に入りに商品を追加しました。';
    } else {
      $_SESSION['message'] = 'この商品は既にお気に入りに登録されています。';
    }
  } else {
    $_SESSION['message'] = 'お気に入りに商品を追加するには、ログインしてください。';
  }
  $url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/favorite.php';
  header("Location:" . $url);
  exit();
?>