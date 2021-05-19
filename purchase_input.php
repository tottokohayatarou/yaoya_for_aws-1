<?php
 session_start();
 if (!isset($_SESSION['user'])) {
	$_SESSION['message'] = "購入手続きを行うにはログインしてください。";
	$url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/login_input_email.php';
	header("Location:" . $url);
	exit();
}
?>
<?php require_once('header.php'); ?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <link rel="stylesheet" href="css/purchase_input.css" />
    <title>野菜を採るなら大原♪｜トップ</title>
  </head>
  <body>
    <div class="wrapper container">
      <!-- サイドメニュー -->
<?php
    require_once('side_menu.html');
?>

      <!-- メインコンテンツ -->
      <main>
        
        <table>
          <tr>
            <td>お名前：</td>
            <td><?= $_SESSION['user']['name'] ?> 様</td>
          </tr>
          <tr>
            <td>ご住所：</td>
            <td><input type="text"></td>
          </tr>
        </table>
        <p>内容をご確認の上ご購入を確定してください。</p>
        <!-- <a href="purchase_output.php">購入を確定する</a> -->
        <a href="purchase_output.php"><button class="buy-button">購入を確定する <i class="fas fa-angle-double-right"></i></button></a>
      </main>
    </div>

    <script src="js/script.js"></script>
  </body>
</html>
