<?php
  session_start();

  // 前処理
  require_once('db_connect.php');  //DB接続
  $url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);  //リダイレクト用にフォルダ名までを指定したURL


  if (!isset($_SESSION['signup']['name'])) {
    $_SESSION['signup']['name'] = $_POST['name'];
    $url .= '/signup_input.php';
  } elseif (!isset($_SESSION['signup']['email'])) {
    $_SESSION['signup']['email'] = $_POST['email'];
    $url .= '/signup_input.php';
  } else {
    // DBに新規ユーザーを登録
    $sql = "INSERT INTO user VALUES(null, :name, :email, :password)";
    $stm = $pdo ->prepare($sql);
    $stm->bindValue(':name',     $_SESSION['signup']['name'],  PDO::PARAM_STR);
    $stm->bindValue(':email',    $_SESSION['signup']['email'], PDO::PARAM_STR);
    $stm->bindValue(':password', $_POST['password'],           PDO::PARAM_STR);
    $stm->execute();

    // ユーザー情報をセッションに設定(ログイン処理) ※ユーザー情報に重複がない前提！！
    $sql = 'select * from user where email = :email and password = :password';
    $stm = $pdo->prepare($sql);
    $stm->bindValue(':email',    $_SESSION['signup']['email'],    PDO::PARAM_STR);
    $stm->bindValue(':password', $_POST['password'], PDO::PARAM_STR);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row ) {
      $_SESSION['user'] = [
        'id'    => $row['id'],
        'name'  => $row['name'],
        'email' => $row['email'],
      ];
    }
    // sessionを破棄してトップページにリダイレクト
    unset($_SESSION['signup']);
    $url .= '/index.php';
    $_SESSION['message'] = '新規登録が完了しました。';
  }
  
  // リダイレクト
  header("Location:" . $url);
  exit();



?>
  </body>
</html>