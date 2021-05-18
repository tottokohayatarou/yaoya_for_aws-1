<?php require_once('header.php') ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8"> 
    <title>野菜を採るなら大原♪｜購入履歴</title>
    <link rel="stylesheet" href="css/history.css">
  </head>
  <body>
  <div class="wrapper container">
      <!-- サイドメニュー -->
<?php
    require_once('side_menu.html');
?>

      <!-- メインコンテンツ -->
      <main>
        <h1>購入履歴</h1>
        
        <div class="cart-detail">
<?php 
          require_once('db_connect.php');
          if (isset($_SESSION['user'])) {
            $sql = "select * from purchase where user_id = :id";  // purchaseテーブルからuser_idがsession_idとなっているレコードを取り出すSQL文
            $stm = $pdo->prepare($sql);
            $stm->bindValue(':id',$_SESSION['user']['id'],PDO::PARAM_INT);
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);
            
            foreach ($result as $row) {
              $sql2 = "
                select product.id as product_id, name, price, count, image_name
                from purchase_detail, product
                where purchase_id = :purchase_id and product_id = product.id
              ";
              $stm2 = $pdo->prepare($sql2);
              $stm2->bindValue(':purchase_id',$row['id'],PDO::PARAM_INT);
              $stm2->execute();
              $result2 = $stm2->fetchAll(PDO::FETCH_ASSOC); 
              $total = 0;
?>
              <table class="cart-table">
                <tr class="th-tr">
                  <th class="cart-th1">ご注文商品</th>
                  <th class="cart-th2">価格(税込)</th>
                  <th class="cart-th3">注文数</th>
                  <th class="cart-th4">小計(税込)</th>
                  <th class="cart-th5">取消</th>
                </tr>
                
<?php              
                foreach ($result2 as $row2) {
                  $subTotal = $row2['price'] * $row2['count'];
                  $total += $subTotal; 
?>
                    <tr class="td-tr">
                      <td class="product-img-cell">
                        <a href="#"><img class="cart-product-img" src="images/<?= $row2['image_name'] ?>" alt=""></a>
                        <a href="#"><?= $row2['name'] ?></a>
                      </td>
                      <td><?= $row2['price'] ?></td>
                      <td><?= $row2['count'] ?></td>
                      <td><?= $row2['price'] ?></td>
                      <td><a href="#"><i class="trash-icon fas fa-trash-alt"></i></a></td>
                    </tr>
<?php
              }
?>
                    <tr class="sub-total-tr">
                      <td></td>
                      <td></td>
                      <td>合計</td>
                      <td class="history-total"><?= $total ?>円</td>
                      <td></td>
                    </tr>
<?php
            }
          } else {
            $_SESSION['message'] = '購入履歴を表示するにはログインしてください。';
          }
?>
        </div>
      </main>
    </div>

    <script src="js/script.js"></script>
  </body>
</html>