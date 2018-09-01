<?php
	if (isset($_GET['name'])) {
		$name = $_GET['name'];
	} else {
		$name = '名前がないよ';
	}
	if (isset($_GET['nenrei'])) {
		$nenrei = $_GET['nenrei'];
	} else {
		$nenrei = '年齢がないよ';
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
	<p>お名前：<?php echo $name ?></p>
	<p>年齢：<?php echo $nenrei; ?></p>
</body>
</html>
