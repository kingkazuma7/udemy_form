<?php
$mode = !empty($_POST['mode']) ? $_POST['mode'] : '';
 
$name = "";
$email = "";
$honbun = "";
$error = "";
$error_name = "";
$error_email = "";
$error_honbun = "";
 
if ($mode) {
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
 
    if ($error_name || $error_email || $error_honbun) {
        $mode = 'input';
    }
 
    if ($mode == 'submit') {
        $to = 'yourmail@example.com';
        $subject = 'お問合せがありました';
        $message = 'お名前：' . $name . "\n"
                . 'メールアドレス：' . $email . "\n"
                . '本文：' . $honbun . "\n";
        $header = 'From: sendonly@example.com';
        $result = mb_send_mail($to, $subject, $message, $header);
 
        if ($result) {
            header('Location: ./thanks.html');
            exit;
        } else {
            $mode = 'error';
            $error = 'メール送信に失敗しました';
        }
    }
} else {
    $mode = 'input';
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>index.php</title>
</head>
<body>
 
<?php if ($mode == 'input'): ?>
 
    <form action="index.php" method="post">
        <input type="hidden" name="mode" value="confirm">
 
        <?php if ($error_name): ?><p><em><?php echo $error_name; ?></em></p><?php endif; ?>
        <p>お名前：<input type="text" name="name" value="<?php echo $name; ?>"></p>
        <?php if ($error_email): ?><p><em><?php echo $error_email; ?></em></p><?php endif; ?>
        <p>メールアドレス：<input type="email" name="email" value="<?php echo $email; ?>"></p>
        <?php if ($error_honbun): ?><p><em><?php echo $error_honbun; ?></em></p><?php endif; ?>
        <p>本文：<textarea name="honbun" cols="50" rows="10"><?php echo $honbun; ?></textarea></p>
        <p><button type="submit">確認</button></p>
    </form>
 
<?php elseif ($mode == 'confirm'): ?>
 
    <p>お名前：<?php echo $name; ?></p>
    <p>メールアドレス：<?php echo $email; ?></p>
    <p>本文：</p>
    <p><?php echo nl2br($honbun); ?></p>
 
    <form action="index.php" method="post">
        <input type="hidden" name="mode" value="submit">
        <input type="hidden" name="name" value="<?php echo $name; ?>">
        <input type="hidden" name="email" value="<?php echo $email; ?>">
        <input type="hidden" name="honbun" value="<?php echo $honbun; ?>">
        <p><button type="submit">送信</button></p>
    </form>
 
    <form action="index.php" method="post">
        <input type="hidden" name="mode" value="input">
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
