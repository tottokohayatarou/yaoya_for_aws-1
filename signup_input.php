<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css" />  <!--リセットCSS-->
    <link rel="stylesheet" href="css/login.css">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet"><!-- フォントオーサム -->
    <title>野菜を採るなら大原♪｜新規登録</title>
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


    <!-- Signup文字列 -->
    <h1 class="signup-h1">
        <span class="ao esu">S</span><span class="aka yon">i</span><span class="kiiro yon">g</span><span class="ao yon">n</span> <span class="midori yon">u</span><span class="aka yon">p</span>
    </h1>


    <!-- 入力フォーム -->
    <div class="search-window">
      <form method="post" action="signup_output.php" class="search_container">
<?php
      // sessionとPOSTデータの状況により入力項目を変更させる処理
      if (!isset($_SESSION['signup']['name'])) {
        //sessionにnameがないので名前入力画面フィールドを表示
        if (isset($_POST['name'])) {
          echo '<input type="text" class="text-area" name="name" value="' . $_POST['name'] . '" >';
        } else {
          echo '<input type="text" class="text-area" name="name" placeholder="Name">';
        }
      } elseif (!isset($_SESSION['signup']['email'])) {
        //sessionにemailがないのでemail入力画面フィールドを表示
        echo '<input type="email" class="text-area" name="email" placeholder="Email Address">';
      } else {
        //sessionにemailとnameがあるのでパスワード入力フォームにする
        echo '<input type="text" class="text-area" name="password" placeholder="Password">';
      }
?>
          <button class="login-btn" type="submit" value=""><i class="fas fa-user-plus"></i></button>
      </form>
    </div>


    <!-- 移動リンクボタン -->
    <div class="link-area">
      <button class="link-left"><a href="index.php">トップへ戻る</a></button>
<?php
      // email入力画面のときは「名前を変更」ボタンを表示
      if (
         isset($_SESSION['signup']['name']    ) &&
        !isset($_SESSION['signup']['password'])
      ) {
        echo '<button><a href="signup_revise_name.php">名前を変更</a></button>';
      }
?> 
    </div>


    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/header.js"></script>
  </body>
</html>