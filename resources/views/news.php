<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Новости</title>
</head>
<body>
<header>
<?php include_once 'menue.php'?>
</header>
<div class="content">
    <h1>Главные новости</h1>
</div>
<div class="mainNews">
    <?php foreach ($news as $item):?>
        <?php if ($item['main'] == true):?>
        <a href="<?=route('NewsOne', $item['id'])?>"><?=$item['title']?></a><br><br>
        <?php endif;?>
    <?php endforeach;?>
</div>
<h1>Категории:</h1>
<div class="category">
    <ul>
        <?php foreach ($category as $item):?>
            <li><a href="<?=route('NewsCategoryOne', $item['name'])?>"><?=$item['name']?></a></li>
        <?php endforeach;?>
    </ul>
</div>
</body>
</html>
