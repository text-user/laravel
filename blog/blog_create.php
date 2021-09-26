<head>
<link rel="stylesheet" href="./css/style.css">
</head>
<body>
<?php
require_once("blog.php");
$blogs = $_POST;


$blog = new Blog();
$blog->blogValidate($blogs);
$blog->blogCreate($blogs);
?>
<!-- <p><a href="./blog_top.php">戻る</a></p> -->
</body>