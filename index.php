<?php require_once('header.php'); ?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <!-- <link rel="stylesheet" href="css/index.css" /> -->
    <title>野菜を採るなら大原♪｜トップ</title>
    <style>
      * {
  box-sizing: border-box;
}
body {
  font-family: sans-serif;
  color: #383838;
  font-size: 94%;
}

a {
  text-decoration: none;
  color: inherit;
}

a:hover {
  color: rgb(163, 131, 75);

}

p {
  line-height: 1.75;
  max-width: 48rem;
}

ul {
  list-style: none;
}

img:hover {
  opacity: 0.8;
}

.wrapper {
  max-width: 1300px;
  margin: 26px auto 0;
  padding: 0 13px;
}

.price-unit {
  font-size: 0.88em;
}
.attention{
  font-size: 0.68em;
}

.container {
  display: flex;
  /* margin-top: 31px; */
}

/* メイン */
main {
  padding-left: 31px;
}


/* メインビジュアル */
.main-visual {
  width: 986px;
  height: 112px;
  background-image: url("images/image.jpg");
  background-position: center;
  background-size: cover;
  padding: 1.8rem;
}

.title {
  text-align: center;
}

.main-visual h1 {
  padding: 0.4rem;
  font-size: 1.375rem;
  font-family: sans-serif;
  font-weight: bold;
  line-height: 1.3;
  color: white
}

.main-visual p {
  margin-top: 8px;
  font-size: 10px;
  color: white;
  margin: 0 auto;
}

.site-description {
  margin: 48px auto 48px;
}


/* ソートメニュー */
.sort-menu ul {
  display: flex;
  margin-top: 16px;
  margin-bottom: 16px;
}

.sort-menu ul li {
  height: 40px;
}

.sort-menu ul li button{
  font-size: 14px;
  line-height: 1.4;
  letter-spacing: inherit;
  text-align: center;
  color: #383838;
  height: 17px;
  vertical-align: middle;
  padding: 8px 15px;
}

.sort-menu ul li:hover{
  background-color: rgb(227, 227, 227);
}


/* 商品一覧 */
.grid {
  display: grid;
  justify-content: space-between;
  grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
  gap: 32px;
}

.products-img {
  width: 287px;
  height: 215px;
}

.grid a {
  color: #383838;
  font-family: serif;
}

.grid a:hover {
  color: rgb(163,131,75);
}

.product-name {
  font-weight: bold;
  font-size: 18px;
  max-width: 287px;
}

.quantity {
  font-size: 16px;
  max-width: 287px;
}

/* 値段表示 */
.price-space {
  font-family: sans-serif;
  margin-top: 7px;
  max-width: 287px;
}

.price-number {
  font-size: 18px;
  font-weight: 520;
}
.price-unit{
  font-size: 0.88rem;
}


    </style>
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
                    <span class="price-number"><?= number_format($row['price']) ?></span>
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
