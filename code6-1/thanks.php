<?php
	$name = isset($_GET['name'])?htmlspecialchars($_GET['name']):'名前がないよ';
	$nenrei = isset($_GET['nenrei'])?htmlspecialchars($_GET['nenrei']):'年齢がないよ';
	$jusho = isset($_GET['jusho'])?htmlspecialchars($_GET['jusho']):'住所がないよ';
	$seibetu = isset($_GET['seibetu'])?htmlspecialchars($_GET['seibetu']):'性別が入力されてないよ';
	if (!isset($_GET['seibetu'])) {	
		$seibetu = '性別がないよ';
	} elseif ($_GET['seibetu'] == 'm') {
		$seibetu = '男';
	} else {
		$seibetu = '女';
	}
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
</body>
</html>
