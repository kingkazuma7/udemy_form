<?php
	$name = isset($_POST['name'])?htmlspecialchars($_POST['name']):'名前がないよ';
	$nenrei = isset($_POST['nenrei'])?htmlspecialchars($_POST['nenrei']):'年齢がないよ';
	$jusho = isset($_POST['jusho'])?htmlspecialchars($_POST['jusho']):'住所がないよ';
	$seibetu = isset($_POST['seibetu'])?htmlspecialchars($_POST['seibetu']):'性別が入力されてないよ';
	if (!isset($_POST['seibetu'])) {	
		$seibetu = '性別がないよ';
	} elseif ($_POST['seibetu'] == 'm') {
		$seibetu = '男';
	} else {
		$seibetu = '女';
	}
	$honbun = isset($_POST['honbun'])?htmlspecialchars($_POST['honbun']):'本文がないよ';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>thanks.html</title>
</head>
<body>
	<?php ini_set('display_errors', 1); ?>

	<h1>thanks.php</h1>
	<p>お名前：<?php echo $name; ?></p>
	<p>年齢：<?php echo $nenrei; ?></p>
	<p>住所：<?php echo $jusho; ?></p>
	<p>性別：<?php echo $seibetu ?></p>
	<p><? echo nl2br($honbun); ?></p>
</body>
</html>
