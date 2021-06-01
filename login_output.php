<?php session_start(); ?>
<?php require('db_connect.php'); ?>
<?php
  require_once('db_connect.php');//DB接続
  unset($_SESSION['user']);//userセッション変数を破棄
  $url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);//リダイレクト用にフォルダ名までを指定したURL


  //sessionにemailが設定されているかで処理を分岐
  if (!isset($_SESSION['email'])) {
    //emailをセットしてパスワード入力画面へ
    $_SESSION['email'] = $_POST['email'];
    $url .= '/login_input_password.php';
  } else {
    //DBからemailを検索
    $sql = 'select * from user where email = :email';
    $stm = $pdo->prepare($sql);
    $stm->bindValue(':email', $_SESSION['email'], PDO::PARAM_STR);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);

    //emailが一致するユーザーがいればpasswordの正誤判定
    if (empty($result)){
      // フラッシュメッセージを作成
      $_SESSION['message'] = 'メールアドレスが間違っています。';
      $url .= '/login_input_email.php';
    }else {
      // passwordが一致したらsessionにユーザー情報をセット  ※ユーザー情報に重複がない前提！！
      foreach ($result as $row) {
        if ($row['password'] === $_POST['password']) {
          $_SESSION['user'] = [
            'id'    => $row['id'],
            'name'  => $row['name'],
            'email' => $row['email'],
          ];

          // フラッシュメッセージを作成
          unset($_SESSION['email']);
          $_SESSION['message'] = 'ログインしました。';
          $url .= '/index.php';
        } else {
          // フラッシュメッセージを作成
          $_SESSION['message'] = 'パスワードが間違っています。';
          $url .= '/login_input_password.php';
        }
      }
    }
  }
  // リダイレクト
  header("Location:" . $url);
  exit();
?>
