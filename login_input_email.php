<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css" />  <!--リセットCSS-->
    <link rel="stylesheet" href="css/login.css">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet"><!-- フォントオーサム -->
    <title>野菜を採るなら大原♪｜ログイン</title>
  </head>
  <body>
<?php
    // フラッシュメッセージ
    if (isset($_SESSION['message'])) {
      echo '<div id="message" class="message">';
      echo $_SESSION['message'];
      echo '</div>';
      unset($_SESSION['message']);
    }
?>

    <!-- ログイン文字列 -->
    <h1 class="login-h1">
        <span class="ao esu">S</span><span class="aka yon">i</span><span class="kiiro yon">g</span><span class="ao yon">n</span> <span class="midori yon">i</span><span class="aka yon">n</span>
    </h1>


    <!-- 入力フォーム -->
    <div class="search-window">
      <form method="post" action="login_output.php" class="search_container">
      <!-- sessionにemailが設定されていればフォームに初期値として出力 -->
<?php
    if(isset($_SESSION['email'])){
?>
      <input type="email" class="text-area" name="email" value="<?php echo $_SESSION['email']; ?>">
<?php 
      unset($_SESSION['email']);
    }else {
?>
      <input type="email" class="text-area" name="email" placeholder="Email Address">
<?php
    }
?>
        <button class="login-btn" type="submit" value=""><i class="signin-icon fas fa-sign-in-alt"></i></button>
      </form>
    </div>


    <!-- 移動リンクボタン -->
    <div class="link-area">
      <button class=""><a href="index.php">トップへ戻る</a></button>
      <button class=""><a href="signup_input.php">新規登録</a></button>
    </div>


    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/header.js"></script>
  </body>
</html>