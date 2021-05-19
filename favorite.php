<?php
  session_start();

  // ログインしていない場合はログインを促す
  if (!isset($_SESSION['user'])) {
    $_SESSION['message'] = 'お気に入りを表示するにはログインしてください。';
    $url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/login_input_email.php';

    // リダイレクト
    header("Location:" . $url);
    exit();
  }
?>
<?php require_once('header.php') ?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <link rel="stylesheet" href="css/commonSytle.css">
    <link rel="stylesheet" href="css/favorite.css">
    <title>野菜を採るなら大原♪｜お気に入り</title>
  </head>
  <body>
    <div class="wrapper container">
      <!-- サイドメニュー -->
<?php
    require_once('side_menu.html');
?>

      <!-- メインコンテンツ -->
      <main>
        <h1>お気に入り</h1>
<?php
          require 'db_connect.php';
          $sql = "select * from favorite, product where user_id = :user_id and product_id = id";
          $stm = $pdo->prepare($sql);
          $stm->bindValue(':user_id', $_SESSION['user']['id'], PDO::PARAM_STR);
          $stm->execute();
          $result = $stm->fetchAll(PDO::FETCH_ASSOC);

          foreach ($result as $row) {
?>
            <!-- <div class="container"> -->
              <div class="container flex-dir-col cont1">
                <div class="course-name">
                  <a href="#"><h2><?= $row['name'] ?></h2></a>
                </div>
        
        
                <div class="container cont2">
                  <div class="item1">
                    <a href="product_detail.php?id=<?= $row['id'] ?>">
                      <img class="course-image" src="images/<?= $row['image_name'] ?>"> </img>
                    </a>
                  </div>
        
                  <div class="item2 flex-dir-col">
                    <a href="product_detail.php?id=<?= $row['id'] ?>" class="product-name border-bottom"><?= $row['name'] ?></a>
                    <p class="">最短翌日出荷</p>
                    
                    
                    <div class="price-space">
                      <span class="price-number"><?= $row['price'] ?></span>
                      <span class="price-unit">円</span>
                      <span class="price-tax">／１パッケージ</span>
                    </div>
                  </div>
        
                  <div class="item3">
                    <form action="cart_insert.php" method="post">
                      <button class="button">カートに入れる</button>
                      <input type="hidden" name="count" value="1">
                      <input type="hidden" name="id" value="<?= $row['id'] ?>">
                      <input type="hidden" name="name" value="<?= $row['name'] ?>">
                      <input type="hidden" name="price" value="<?= $row['price'] ?>">
                      <input type="hidden" name="image_name" value="<?= $row['image_name'] ?>">
                    </form>
                    <a href="favorite_delete.php?id=<?= $row['id'] ?>">
                      <button class="delete-button">削除</button>
                    </a>
                  </div>
                </div>
            </div>
<?php
          }
?>
      </main>
    </div>

    <script src="js/script.js"></script>
  </body>
</html>
