<?php session_start(); ?>

	<?php
	if (isset($_SESSION['user'])) {
		//MySQLデータベースに接続する
		require 'db_connect.php';

		$sql = "insert into favorite values(:user_id, :product_id)";
		$stm = $pdo->prepare($sql);
		$stm->bindValue(':user_id', $_SESSION['user']['id'], PDO::PARAM_INT);
		$stm->bindValue(':product_id', $_REQUEST['id'], PDO::PARAM_INT);
		//SQL文を実行する
		$stm->execute();
		$_SESSION['message'] = 'お気に入りに商品を追加しました。';
	?>
	} else {
	?>
		$_SESSION['message'] = 'お気に入りに商品を追加するには、ログインしてください。';
	<?php
	}
	$url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/favorite.php';
	header("Location:" . $url);
	exit();
	?>