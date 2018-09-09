<?php
  session_start();

  // 空っぽかどうか
  $mode = !empty($_POST['mode']) ? $_POST['mode'] : '';
  
  // 初期化
  $name = "";
  $email = "";
  $honbun = "";
  $error = "";
  $error_name = "";
  $error_email = "";
  $error_honbun = "";
  
  // modeが空白でなければ（ここでは空白）
  if ($mode) {
    // $_SESSIONが空でないかチェック token空であればそもそも入力画面にアクセスしていない
    if (empty($_SESSION['token']) || $_SESSION['token'] != $_POST['token']) {
      die ('不正な遷移です。');
    }
    if (empty($_POST['name'])) {
      $error_name = "お名前を入力してください\n";
    } else {
      $name = htmlspecialchars($_POST['name']);
    }
    if (empty($_POST['email'])) {
      $error_email = "メールアドレスを入力してください\n";
    } else {
      $email = htmlspecialchars($_POST['email']);
    }
    if (empty($_POST['honbun'])) {
      $error_honbun = "本文を入力してください\n";
    } else {
      $honbun = htmlspecialchars($_POST['honbun']);
    }

    // エラーがあったらinputを入れる
    if (!$error_name || !$error_email || !$error_honbun) {
      $mode = 'input';
    }

    if ($mode == 'submit') {
      session_destroy();

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
        $mode = 'error';
        $error = 'メール送信に失敗しました。';
      }
    }
  } else {
    $mode = 'input';
    // ランダムな文字列をtoken変数に代入
    $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(16));
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

<?php if ($mode == 'input'): ?>
    <form action="index.php" method="POST">
      <input type="hidden" name="mode" value="confirm">
      <input type="hidden" name="token" value=<?php echo $_SESSION['token']; ?>>

        <?php if ($error_name): ?><p><em><?php echo $error_name; ?></em></p><?php endif; ?>
        <p>お名前：<input type="text" name="name" value="<?php echo $name; ?>"></p>
        <?php if ($error_email): ?><p><em><?php echo $error_email; ?></em></p><?php endif; ?>
        <p>メールアドレス：<input type="email" name="email" value="<?php echo $email; ?>"></p>
        <?php if ($error_honbun): ?><p><em><?php echo $error_honbun; ?></em></p><?php endif; ?>
        <p>本文：<textarea name="honbun" cols="50" rows="10"><?php echo $honbun; ?></textarea></p>
        <p><button type="submit">確認</button></p>
    </form>

<!-- 確認画面 -->
<?php elseif ($mode == 'confirm'): ?>

    <p>お名前：<?php echo $name; ?></p>
    <p>メールアドレス：<?php echo $email; ?></p>
    <p>本文：</p>
    <p><?php echo nl2br($honbun); ?></p>

    <form action="index.php" method="post">
      <input type="hidden" name="mode" value="submit">
      <input type="hidden" name="token" value="<?php echo $_SESSION['token'] ?>">
      <input type="hidden" name="name" value="<?php echo $name; ?>">
      <input type="hidden" name="email" value="<?php echo $email; ?>">
      <input type="hidden" name="honbun" value="<?php echo $honbun; ?>">
      <p><button type="submit">送信</button></p>
    </form>

    <form action="index.php" method="post">
      <input type="hidden" name="mode" value="input">
      <input type="hidden" name="token" value="<?php echo $_SESSION['token'] ?>">
      <input type="hidden" name="name" value="<?php echo $name; ?>">
      <input type="hidden" name="email" value="<?php echo $email; ?>">
      <input type="hidden" name="honbun" value="<?php echo $honbun; ?>">
      <p><button type="submit">戻る</button></p>
    </form>

<?php else: ?>

    <p>エラーが発生しました。</p>
    <?php if ($error): ?><p><em><?php echo $error; ?></em></p><?php endif; ?>

<?php endif; ?>

</body>
</html>
