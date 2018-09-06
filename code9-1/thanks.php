<?php
	$error = "";
	if (empty($_POST['name'])) {
		$error .= "お名前を入力してください\n";
	} else {
		$name = htmlspecialchars($_POST['name']);
	}
	if (empty($_POST['email'])) {
		$error .= "メールアドレスを入力してください\n";
	} else {
		$email = htmlspecialchars($_POST['email']);
	}
	if (empty($_POST['honbun'])) {
		$error .= "本文を入力してください\n";
	} else {
		$honbun = htmlspecialchars($_POST['honbun']);
	}
	
	// $errorの中にエラーが空っぽならば条件を満たしてるので下記表示
	if (!$error){
		$to = 'takanashikazuma1@gmail.com';
		$subject = "お問い合わせがありました";
		$message = 'お名前：' .$name. "\n"
			.'年齢：' .$nenrei. "\n"
			.'住所：' .$jusho. "\n"
			.'性別：' .$seibetu. "\n"
			.'本文：' .$honbun. "\n";
		$header = 'From: nasionasio7@gmail.com';
		$result = mb_send_mail($to, $subject, $message, $header);
		if ($result) {
			$message = 'メール送信に成功しました';
		} else {
			$message = 'メール送信に失敗しました';
		}
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
		<?php if ($error): ?>
			<p><strong><?php echo nl2br($error); ?></strong></p>
		<?php else: ?>
			<p><strong><?php echo $message; ?></strong></p>
			<p>お名前：<?php echo $name; ?></p>
			<p>メールアドレス：<?php echo $email; ?></p>
			<p>本文：</p>
			<p><?php echo nl2br($honbun); ?></p>
		<?php endif; ?>
	</body>
	</html>
	
