<?php require_once('header.php') ?>
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
            
            <tr>
              <td class="product-img-cell">
                <a href="#"><img class="cart-product-img" src="images/tomato.jpg" alt=""></a>
                <a href="#">湘南産直！伝統野菜詰め合わせセット (M)</a>
              </td>
              <td>2,400円</td>
              <td>１Kg</td>
              <td>2,400円</td>
              <td><a href="#"><i class="trash-icon fas fa-trash-alt"></i></a></td>
            </tr>
            
            <tr>
              <td class="product-img-cell">
                <a href="#"><img class="cart-product-img" src="images/ninhin.jpg" alt=""></a>
                <a href="#">湘南産直！伝統野菜詰め合わせセット (M)</a>
              </td>
              <td>1,840円</td>
              <td>１Kg</td>
              <td>1,840<span class="price-unit">円</spen></td>
              <td><a href="#"><i class="trash-icon fas fa-trash-alt"></i></a></td>
            </tr>
            
            <tr>
              <td class="product-img-cell">
                <a href="#"><img class="cart-product-img" src="images/retasu.jpg" alt=""></a>
                <a href="#">湘南産直！伝統野菜詰め合わせセット (M)</a>
              </td>
              <td>1,400円</td>
              <td>１Kg</td>
              <td>1,400円</td>
              <td><a href="#"><i class="trash-icon fas fa-trash-alt"></i></a></td>
            </tr>
            
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
            
            <div class="cart-subtotal">
              <div class="text">商品合計(税込)</div>
              <div class="amount">4,840円</div>
            </div>
            
            <div class="cart-shipping-price">
              <div class="text">送料</div>
              <div class="price">
                <span class="sub-amount">1,192円~
                  <div class="fontsize-mini">お届け先により変動</div>
                  <a href="#" class="ship-price-link"><i class="far fa-clone"></i> 詳しい送料はこちら</a>
                </span>
              </div>
            </div>
              
            <p class="shipping-info">あと5,780円で送料無料</p>
            <a href="index.php" class="shipping-info-return link-hover"><span class="arrow-left"><i class="fas fa-angle-double-left"></i></span> るる自然農園の商品を見る</a>
            <button class="buy-button">ご購入手続きにすすむ <i class="fas fa-angle-double-right"></i></button>
          </div>
            
          <div class="cart-price-area-bottom">
            <p>アカウントをお持ちの方は<a href="login_input_email.php" class="link-hover">こちらからログイン</a></p>
            <a href="index.php"><button class="return-button"><i class="fas fa-caret-left"></i> 買い物を続ける</button></a>
          </div>
        </div>

      </div>
    </div>

    <script src="js/script.js"></script>
  </body>
</html>