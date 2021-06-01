<?php session_start(); ?>
<?php
  //MySQLデータベースに接続する
  require 'db_connect.php';
  //purchaseテーブル最終行 id + 1 を取得
  $purchase_id = 1;
  foreach ($pdo->query('select max(id) from purchase') as $row) {
    $purchase_id = $row['max(id)'] + 1;
  }
  //SQL文を作成する
  $sql = "INSERT INTO purchase VALUES(:id, :user_id)";
  //プリペアードステートメントを作成
  $stm = $pdo->prepare($sql);
  $stm->bindValue(':id', $purchase_id, PDO::PARAM_INT);  //実際には入力されたデータをエスケープやtrimする
  $stm->bindValue(':user_id', $_SESSION['user']['id'], PDO::PARAM_INT);  //実際には入力されたデータをエスケープやtrimする
  if ($stm->execute()) {
    //SQL成功
    //セッションに入ってる商品の数だけpurchase_detailに保存
    foreach ($_SESSION['product'] as $product_id => $product) {
      $sql = "INSERT INTO purchase_detail VALUES(:purchase_id, :product_id, :count)";
      //プリペアードステートメントを作成
      $stm = $pdo->prepare($sql);
      //プリペアードステートメントに値をバインド
      $stm->bindValue(':purchase_id', $purchase_id, PDO::PARAM_INT);
      $stm->bindValue(':product_id', $product_id, PDO::PARAM_INT);
      $stm->bindValue(':count', $product['count'], PDO::PARAM_INT);
      //SQL文を実行
      $stm->execute();
    }
    unset($_SESSION['product']);
    $_SESSION['message'] = '購入手続きが完了しました。ありがとうございます。';
  } else {
    //SQL失敗
    $_SESSION['message'] = "購入手続き中にエラーが発生しました。申し訳ございません。";
  }

  $url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
  header("Location:" . $url);
  exit();
?>

