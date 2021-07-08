<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categories</title>
</head>

<body>
    <a href="/">Главная</a>
    <a href="categories">Категории</a>
    <a href="goods">Товары</a>
    <a href="cart">Корзина</a>

    <hr>

    <h1>Список Категорий</h1>
    @foreach ($categoryList as $category)
        <nav>
            <ul>
                <li><a href="<?= route('categories.show', ['id' => $loop->iteration]) ?>"><?= $category['title'] ?></a></li>
        </ul>
    </nav>
    @endforeach
</body>

</html>
