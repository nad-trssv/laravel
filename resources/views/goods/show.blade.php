<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Goods</title>
</head>

<body>
    <a href="/">Главная</a>
    <a href="/categories">Категории</a>
    <a href="/goods">Товары</a>
    <a href="/cart">Корзина</a>

    <hr>

    <div class="">
        <h2><?= $productOne['title'] ?></h2>
            <p>Категория: <a href=""></a> <?= $productOne['category'] ?></p>
            <p><?= $productOne['price'] ?></p>
        </div>
</body>

</html>
