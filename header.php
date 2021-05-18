<?php if(!isset($_SESSION)){ session_start(); }; ?><!-- sessionが開始されていなければ開始する -->
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css" />  <!--リセットCSS-->
  <link rel="stylesheet" href="css/commonSytle.css">
  <link rel="stylesheet" href="css/header.css" />
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet"><!-- フォントオーサム -->
</head>
<body>
  <!-- ヘッダー -->
  <div class="head-area">

    <header class="">
      <a href="index.php">
        <div class="logo">
          <div class="logo-icon"><i class="fab fa-canadian-maple-leaf"></i></div>
          <div class="logo-name">やさいのおおはら</div>
        </div>
      </a>
      
      <nav class="main-nav">
        <div class="serch-field">
          <form action="index.php" method="GET">                                     <!--後でメソッドポストに変更する-->
          <input type="text"   class="search-window" name="keyword" placeholder="商品検索"><button type="submit" class="search-button"><i class="fas fa-search"></i></button>
        </form>
      </div>
      
      <ul class="header-links link-hover">
        <?php 
        if (isset($_SESSION['user'])) {
          ?>
          <li><a href="logout.php">ログアウト</a></li>
          <li><a href="history.php">購入履歴</a></li>
          <?php
        } else {
          ?>
          <li><a href="login_input_email.php">ログイン</a></li>
          <li><a href="delete_signup_session.php">新規登録</a></li>
          <?php
        }
        ?>
          <li><a href="favorite.php">お気に入り</a></li>
          <li><a href="cart.php"><i class="cart-icon fas fa-shopping-cart"></i></a></li>
        </ul>
      </nav>
      
    </header>
    </div>
    <?php
      // フラッシュメッセージ
      if (isset($_SESSION['message'])) {
        echo '<div id="message" class="message">';
        echo $_SESSION['message'];
        echo '</div>';
        unset($_SESSION['message']);
      }
      ?>
    <div class="header-blank"></div>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/header.js"></script>
  </body>
</html>
