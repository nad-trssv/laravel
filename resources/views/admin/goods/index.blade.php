<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel</title>
</head>

<body>
    <h1>Добро пожаловать в Админ Панель!</h1>
    <a href="categories">Категории</a>
    <a href="goods">Товары</a>
    <a href="cart">Корзина</a>

    <hr>
    <h1>Список товаров</h1>

    @foreach ($goodslist as $key => $goods)
        <div class="">
            <h2><a href="<?= route('goods.show', ['id' => ++$key]) ?>"><?= $goods['title'] ?></a></h2>
            <p><?= $goods['price'] ?></p>
        </div>
    @endforeach
</body>

</html>
