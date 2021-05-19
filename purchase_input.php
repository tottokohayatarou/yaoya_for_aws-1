<?php
 session_start();
 if (!isset($_SESSION['user'])) {
	$_SESSION['message'] = "購入手続きを行うにはログインしてください。";
	$url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/login_input_email.php';
	header("Location:" . $url);
	exit();
}
  ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>購入画面</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>



		<table>
			<tr>
				<td>お名前：</td>
				<td><?= $_SESSION['user']['name'] ?></td>
			</tr>
			<tr>
				<td>ご住所：</td>
				<td><input type="text" name="" id=""></td>
			</tr>
		</table>
		<hr>

		<hr>

		<p>内容をご確認いただき、ご講習を確定してください。</p>
		<a href="purchase_output.php">購入を確定する</a>
	<?php
	
	?>
	
</body>

</html>