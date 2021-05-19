<?php require_once('header.php') ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8"> 
    <title>野菜を採るなら大原♪｜商品詳細</title>
    <link rel="stylesheet" href="css/product_detail.css">
    <link rel="stylesheet" href="css/commonSytle.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">

  </head>
  <body>
    <!-- slick slider用の記述 -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
 
    <script type="text/javascript">
    $(function() {
      $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.slider-nav'
      });  
      $('.slider-nav').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        asNavFor: '.slider-for',
        dots: true,
        centerMode: true,
        focusOnSelect: true,
      }); 
    }); 
  </script>



  <div class="wrapper container">
      <!-- サイドメニュー -->
<?php
    require_once('side_menu.html');
?>

      <!-- メインコンテンツ -->
      <main>
<?php
        require_once('db_connect.php');
        $sql = "select * from product where id = :id";
        $stm = $pdo->prepare($sql);
        $stm->bindValue(':id',$_GET['id'],PDO::PARAM_STR);
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
?>
        <!-- 商品スライド -->
        <div class="slide">

          <div class="slider-for" style="margin-bottom: 10px;">
            <figure><img src="images/<?= $row['image_name'] ?>" /></figure>
            <figure><img src="images/retasu.jpg" /></figure>
            <figure><img src="images/onion.jpg" /></figure>
            <figure><img src="images/imo.jpg" /></figure>
            <figure><img src="images/papurika.jpg" /></figure>
            <figure><img src="images/ninhin.jpg" /></figure>
            <figure><img src="images/nasu.jpg" /></figure>
          </div>
          <div class="slider-nav">
            <figure><img src="images/<?= $row['image_name'] ?>" /></figure>
            <figure><img src="images/retasu.jpg" /></figure>
            <figure><img src="images/onion.jpg" /></figure>
            <figure><img src="images/imo.jpg" /></figure>
            <figure><img src="images/papurika.jpg" /></figure>
            <figure><img src="images/ninhin.jpg" /></figure>
            <figure><img src="images/nasu.jpg" /></figure>
          </div>
        </div>

        <!-- 商品情報 -->
        <div class="description">
          <div class="description-left">
            <img src="images/<?= $row['image_name'] ?>" alt="">
          </div>
          <div class="description-right">
            <div class="flex">
               <i class="farm-logo-icon orange fab fa-critical-role"></i>
               <p class="farm-name">るる自然農園
              </p>
            </div>
            <h1 class="product-name"><?= $row['name'] ?></h1>
            <a href="shipping_fee.php" class="ship-price-link"><i class="far fa-clone"></i> 東京都までの送料 660円〜</a>
            <p class="badge"><img src="images/badge.png"></p>
            <div class="amount"><?= $row['price'] ?><span class="price-unit">円</span><span class="attention">(送料別)</span></div>
            
            <!-- カートへのフォーム -->
            <form action="cart_insert.php" method="post">
            <!-- セレクトボックス -->
            <div class="cp_ipselect cp_sl04">
              <select name="count"　required>
                <option value="" hidden>Choose</option>
<?php
                for ($i = 1; $i <= 10; $i++) {
?>
                  <option value="<?= $i ?>"><?= $i ?></option>
<?php
                }
?>
              </select>
            </div>

            <!-- 配送について -->
            <div class="ship-info">
              <p DD>古新聞・古段ボールでの発送になります。脱プラスチックにご協力をお願いいたします。</p>
            </div>
            <!-- ----------- -->

              <input type="hidden" name="id" value="<?= $row['id'] ?>">
              <input type="hidden" name="name" value="<?= $row['name'] ?>">
              <input type="hidden" name="price" value="<?= $row['price'] ?>">
              <input type="hidden" name="image_name" value="<?= $row['image_name'] ?>">
              <button type="submit" class="buy-button">カートに追加 <i class="fas fa-angle-double-right"></i></button>
            </form>
            <!-- <a href="favorite.php"><button class="favorite-button">お気に入りに追加 <i class="fas fa-angle-double-right"></i></button></a> -->
            <a href="favorite_insert.php?id=<?= $row['id'] ?>"><button class="favorite-button">お気に入りに追加 <i class="fas fa-angle-double-right"></i></button></a>
            <h3 class="ship-discription-title">配送にいて</h3>
            <a href="shipping_fee.php" class="ship-fee-link">この地域の送料を見る</a>
            <p class="ship-info-text">
              この商品はるる自然農園が千葉県から発送します。<br>
              発送までの平均日数 :2日~4日<br>
              この商品は火曜日・木曜日・土曜日に出荷します。<br>
            </p>
            
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


