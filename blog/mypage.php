<?php
ini_set('display_errors', true);

session_start();
require_once './UserLogic.php';
require_once './function.php';

// ログインしているかチェク
// できてなかったら新規登録画面に戻す
$result = UserLogic::checkLogin();
if (!$result) {
    $_SESSION['login_err'] = 'ユーザを登録してログインしてください';
    header('Location: signup_form.php');
    return;
}
$login_user = $_SESSION['login_user']

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>マイページ</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<h2>マイページ</h2>
<!-- <p>ログインユーザ:<?php print h($login_user['name']) ?></p>
<hp>メールアドレス:<?php print h($login_user['email']) ?></p> -->
<p><a href="blog_top.php">ブログ投稿ページへ</a></p>
<form action="logout.php" method="POST">
    <input type="submit" name="logout" value="ログアウト">
</form>
</body>
</html>