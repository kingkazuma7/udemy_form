anks.php

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

    if ($error == "") {
        $to = 'yourmail@example.com';
        $subject = 'お問合せがありました';
        $message = 'お名前：' . $name . "\n"
                . 'メールアドレス：' . $email . "\n"
                . '本文：' . $honbun . "\n";
        $header = 'From:sendonly@example.com';
        $result = mb_send_mail($to, $subject, $message, $header);
    
        if ($result) {
            $message = 'メール送信に成功しました';
        } else {
            $message = 'メール送信に失敗しました';
        }
    }
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>thanks.php</title>
</head>
<body>
<?php if ($error) { ?>
<p><strong><?php echo nl2br($error); ?></strong></p>
<?php } else { ?>
<p><strong><?php echo $message; ?></strong></p>
<p>お名前：<?php echo $name; ?></p>
<p>メールアドレス：<?php echo $email; ?></p>
<p>本文：</p>
<p><?php echo nl2br($honbun); ?></p>
<?php } ?>
</body>
</html>
1
2
3
4
5
6
7
8
9
10
11
12
13
14
15
16
17
18
19
20
21
22
23
24
25
26
27
28
29
30
31
32
33
34
35
36
37
38
39
40
41
42
43
44
45
46
47
48
49
50
51
52
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
 
    if ($error == "") {
        $to = 'yourmail@example.com';
        $subject = 'お問合せがありました';
        $message = 'お名前：' . $name . "\n"
                . 'メールアドレス：' . $email . "\n"
                . '本文：' . $honbun . "\n";
        $header = 'From:sendonly@example.com';
        $result = mb_send_mail($to, $subject, $message, $header);
    
        if ($result) {
            $message = 'メール送信に成功しました';
        } else {
            $message = 'メール送信に失敗しました';
        }
    }
?>
 
<html>
<head>
    <meta charset="UTF-8">
    <title>thanks.php</title>
</head>
<body>
<?php if ($error) { ?>
<p><strong><?php echo nl2br($error); ?></strong></p>
<?php } else { ?>
<p><strong><?php echo $message; ?></strong></p>
<p>お名前：<?php echo $name; ?></p>
<p>メールアドレス：<?php echo $email; ?></p>
<p>本文：</p>
<p><?php echo nl2br($honbun); ?></p>
<?php } ?>
</body>
</html>
