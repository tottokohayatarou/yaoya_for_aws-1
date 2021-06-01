<?php
  // データベースユーザ
  $user = 'LAA1190393';
  $password = 'yaoyapass';
  // 利用するデータベース
  $dbName = 'LAA1190393-yaoya';
  // MySQLサーバ
  $host = 'LAA1190393-yaoya';
  // MySQLのDSN文字列
  $dsn = "mysql:host={$host};dbname={$dbName};charset=utf8";
  //MySQLデータベースに接続する
  try {
    $pdo = new PDO($dsn, $user, $password);
    // プリペアドステートメントのエミュレーションを無効にする
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    // 例外がスローされる設定にする
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo '<span class="error">エラーがありました。</span><br>';
    echo $e->getMessage();
    exit();
  }
  ?>