<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $categoryName }}</title>
</head>

<body>
    <a href="/">Главная</a>
    <a href="/categories">Категории</a>
    <a href="/goods">Товары</a>
    <a href="/cart">Корзина</a>

    <hr>
    <h1>Категория: {{ $categoryName }}</h1>

    @foreach ($goodslist as $goods)
        <div class="">
            <h2><a href="{{ route('goods.show', ['id' => $loop->iteration]) }}"><?= $goods['title'] ?></a></h2>
            <p>Категория: {{ $goods['category'] }}</p>
            <p>Цена: {{ $goods['price'] }} &euro;</p>
        </div>
    @endforeach
</body>

</html>
