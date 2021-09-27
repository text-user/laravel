<head>
<link rel="stylesheet" href="./css/style.css">
</head>
<?php
require_once('blog.php');

$blogs = $_POST;

$blog = new Blog();
$blog->blogValidate($blogs);
$blog->blogUpdate($blogs);
?>
<p><a href="./blog_top">戻る</a></p>