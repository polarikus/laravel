<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<header>
<?php include_once 'menue.php'?>
</header>
<div class="content">
   <h1><?=$news['title']?></h1>
    <p><?=$news['text']?></p>
</div>
</body>
</html>
