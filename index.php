<?php require_once('header.php'); ?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <link rel="stylesheet" href="css/index.css" />
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
        <!-- メインビジュアル -->
        <div class="main-visual">
          <div class="title">
            <h1>無農薬野菜</h1>
            <p>Organic vegetables</p>
          </div>
        </div>
        <p class="site-description">
          やさいのおおはらの野菜は、無農薬はもちろん、無化学肥料で栽培された野菜です。
          中でも有機肥料を使わない「無農薬・無肥料」の自然んお力漲る野菜を中心に取り扱っております。
          全国各地の農家さんから新鮮な無農薬野菜を直送します。
        </p>

        <!-- ソートメニュー -->
        <div class="sort-menu">
          <ul>
            <li><button>価格が安い順</button></li>
            <li><button>価格が高い順</button></li>
            <li><button>カテゴリ｜野菜セット</button></li>
          </ul>
        </div>

        <!-- 商品一覧 -->
        <div class="products">
          <div class="grid">
<?php
            // POSTデータの有無で商品一覧と商品検索処理に分岐
            require 'db_connect.php';
            if (isset($_POST['keyword'])) {
              $sql = "select * from product where name like :keyword";
              $stm = $pdo->prepare($sql);
              $stm->bindValue(':keyword', '%' . $_POST['keyword'] . '%', PDO::PARAM_STR);
              // $stm->execute();
              // $result = $stm->fetchAll(PDO::FETCH_ASSOC);
            } else {
              $sql = "select * from product";
              $stm = $pdo->prepare($sql);
            }
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $row) {
?>
              <div class="item">
                <a href="product_detail.php?id=<?= $row['id'] ?>">
                  <img src="images/<?= $row['image_name'] ?>" class="products-img" />
                  <div class="product-name"><?= $row['name'] ?></div>
                  <div class="quantity">
                    <!-- S/M/L -->
                  </div>
                  <div class="price-space">
                    <span class="price-number"><?= $row['price'] ?></span>
                    <span class="price-unit">円</span>
                  </div>
                </a>
              </div>
<?php
            }
?>
          </div>
        </div>

      </main>
    </div>

    <script src="js/script.js"></script>
  </body>
  </html>
