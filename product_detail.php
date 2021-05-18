<?php require_once('header.php') ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8"> 
    <title>野菜を採るなら大原♪｜購入履歴</title>
    <link rel="stylesheet" href="css/product_detail.css">
  </head>
  <body>
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
        $stm->bindValue(':id',$_REQUEST['id'],PDO::PARAM_STR);
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
?>
          <div class="contauner">
            <a href="product-img">
              <img src="images/<?= $row['image_name'] ?>">
            </a>
            <form action="cart_insert.php" method="post">
              <p class="product_name">商品名：<?= $row['name'] ?></p>
              <p　class="price-number" >価格：<?= $row['price'] ?></p>
              <p>個数：<select name="count">
                <?php
                for ($i = 1; $i <= 10; $i++) {
                  ?>
                  <option value="<?= $i ?>"><?= $i ?></option>
                  <?php
                }
                ?>
              </select></p>
              <input type="hidden" name="id" value="<?= $row['id'] ?>">
              <input type="hidden" name="name" value="<?= $row['name'] ?>">
              <input type="hidden" name="price" value="<?= $row['price'] ?>">
              <p><input type="submit" value="カートに追加"></p>
            </form>
            <p><a href="favorite_insert.php?id=<?= $row['id'] ?>">お気に入りに追加</a></p>
          </div>
<?php
        }
?>
       
      </main>
    </div>

    <script src="js/script.js"></script>
  </body>
</html>


