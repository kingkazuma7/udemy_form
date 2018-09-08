<?php
  // 初期化
  $name = "";
  $email = "";
  $honbun = "";
  $error = "";
  $error_name = "";
  $error_email = "";
  $error_honbun = "";
  if (isset($_POST['name'])) {
    if (empty($_POST['name'])) {
      $error_name = "お名前を入力してください";
    } else {
      $name = htmlspecialchars($_POST['name']);
    }
    if (empty($_POST['email'])) {
      $error_email = "メールアドレスを入力してください";
    } else {
      $email = htmlspecialchars($_POST['email']);
    }
    if (empty($_POST['honbun'])) {
      $error_honbun = "本文を入力してください";
    } else {
      $honbun = htmlspecialchars($_POST['honbun']);
    }

    if (!$error_name && !$error_email && !$error_honbun){
      $to = 'takanashikazuma1@gmail.com';
      $subject = "お問い合わせがありました";
      $message = 'お名前：' .$name. "\n"
        .'メールアドレス：' .$email. "\n"
        .'本文：' .$honbun. "\n";
      $header = 'From: nasionasio7@gmail.com';
      $result = mb_send_mail($to, $subject, $message, $header);
      if ($result) {
        header('Location: ./thanks.html');
        exit;
      } else {
        $message = 'メール送信に失敗しました';
      }
    }
  }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>index.html</title>
</head>
<body>
  <h1>index.html</h1>
  <form action="index.php" method="POST">
      <?php if ($error_name): ?><p><em><?php echo $error_name; ?></em></p><?php endif; ?>
      <p>お名前：<input type="text" name="name" value="<?php echo $name; ?>"></p>
      <?php if ($error_email): ?><p><em><?php echo $error_email; ?></em></p><?php endif; ?>
      <p>メールアドレス：<input type="email" name="email" value="<?php echo $email; ?>"></p>
      <?php if ($error_honbun): ?><p><em><?php echo $error_honbun; ?></em></p><?php endif; ?>
      <p>本文：<textarea name="honbun" cols="50" rows="10"><?php echo $honbun; ?></textarea></p>
      <p><button type="submit">送信</button></p>
  </form>
</body>
</html>
