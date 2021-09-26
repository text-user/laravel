<head>
<link rel="stylesheet" href="./css/style.css">
</head>
<body>
<?php
require_once('blog.php');
$blog = new Blog();
$result = $blog->delete($_GET['id']);

?>
<p><a href="./blog_top.php">戻る</a></p>
</body>