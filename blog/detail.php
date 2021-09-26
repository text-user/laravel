<?php
require_once('blog.php');

$blog = new Blog();
$result = $blog->getById($_GET['id']);

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ブログの詳細</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <h2>ブログの詳細</h2>
    <h3>タイトル:<?php print $result['title'] ?></h3>
    <p>投稿日時:<?php print $result['post_at'] ?></p>
    <p>カテゴリ:<?php print $blog->SetCategoryName($result['category']) ?></p>
    <hr>
    <p>本文:<?php print $result['content'] ?></p>
    <p><a href="./blog_top.php">戻る</a></p>
</body>
</html>