<?php
session_start();

if (empty($_SESSION['product'])) {
  $_SESSION['message'] = 'カートに商品がありません。';
  $url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
  header("Location:" . $url);
  exit();
}
require_once('header.php');
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <link rel="stylesheet" href="css/cart.css" />
    <title>野菜を採るなら大原♪｜カート</title>
  </head>
  <body>
    <!-- タイトル -->
    <div class="cart">
      <div class="cart-title">
        <div class="cart-logo-icon"><i class=" orange fab fa-critical-role"></i></div>
        <div class="cart-logo-name">るる自然農園のショッピングカート</div>
      </div>
      
      <div class="cart-container">
<?php
?>
        <!-- 注文詳細 -->
        <div class="cart-detail">
          <table class="cart-table">
            
            <tr class="th-tr">
              <th class="cart-th1">ご注文商品</th>
              <th class="cart-th2">価格(税込)</th>
              <th class="cart-th3">注文数</th>
              <th class="cart-th4">小計(税込)</th>
              <th class="cart-th5">取消</th>
            </tr>
<?php
          $total = 0;
          foreach ($_SESSION['product'] as $id => $product) {
            if ($product['count'] === 0) {
              $product['count'] = 1;
            }
            $subtotal = $product['price'] * $product['count'];
            $total += $subtotal;
?>
            <tr>
              <td class="product-img-cell">
                <a href="product_detail.php?id=<?= $id ?>"><img class="cart-product-img" src="images/<?= $product['image_name'] ?>" alt=""></a>
                <a href="product_detail.php?id=<?= $id ?>"><?= $product['name'] ?></a>
              </td>
              <td><?= number_format($product['price']) ?></td>
              <td><?= $product['count'] ?></td>
              <td><?= number_format($subtotal) ?></td>
              <td><a href="cart_delete.php?id=<?= $id ?>"><i class="trash-icon fas fa-trash-alt"></i></a></td>
            </tr>
<?php
          }
?>
          </table>
        </div>
        
        
        <!-- 注文金額詳細 -->
        <div class="cart-price-area">
          <div class="cart-price-area-top">
            <!-- 注文内容枠に表示用の会社名 -->
            <div class="cart-title">
              <div class="cart-logo-icon"><i class=" orange fab fa-critical-role"></i></div>
              <div class="cart-logo-name">るる自然農園のご注文内容</div>
            </div>
            
            <!-- 合計金額を表示 -->
            <div class="cart-subtotal">
              <div class="text">商品合計(税込)</div>
              <div class="amount"><?= number_format($total) ?><span class="price-unit">円</span></div>
            </div>
            
            <!-- 送料の表示と送料一覧へのリンク -->
            <div class="cart-shipping-price">
              <div class="text">送料</div>
              <div class="price">
                <span class="sub-amount">660<span class="price-unit"><span class="price-unit">円</span>~
                  <div class="fontsize-mini">お届け先により変動</div>
                  <a href="shipping_fee.php" class="ship-price-link"><i class="far fa-clone"></i> 詳しい送料はこちら</a>
                </span>
              </div>
            </div>


            <!-- 合計額によって表示を分岐 -->
<?php
          $balance = 10000 - $total; 
          if ($balance > 0) {
?>
            <p class="shipping-info">あと<?= number_format($balance) ?><span class="price-unit">円</span>で送料無料</p>
            <a href="index.php" class="shipping-info-return link-hover">
              <span class="arrow-left">
                <i class="fas fa-angle-double-left"></i>
              </span>
              るる自然農園の商品を見る
            </a>
            <?php
          } else {
?>              
            <p class="shipping-info">送料無料！！</p>
            
<?php
          }
?>
            <!-- 購入ボタン -->
            <a href="purchase_input.php"><button class="buy-button">ご購入手続きにすすむ <i class="fas fa-angle-double-right"></i></button></a>
          </div>


          <!-- ログインリンクと買い物継続用の戻るリンク -->
          <div class="cart-price-area-bottom">
<?php 
            // ログインしていなければログインリンクを表示
            if (!isset($_SESSION['user']['id'])) {
?>
              <p>アカウントをお持ちの方は<a href="login_input_email.php" class="link-hover">こちらからログイン</a></p>
<?php 
          }
?>
            <a href="index.php"><button class="return-button"><i class="fas fa-caret-left"></i> 買い物を続ける</button></a>
          </div>
        </div>

      </div>
    </div>

    <script src="js/script.js"></script>
  </body>
</html>