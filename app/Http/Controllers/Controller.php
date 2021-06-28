<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected array $goods;
    protected array $categories;

    protected function getGoods()
    {
        $this->getCategories();
        $faker = Factory::create('en_EN');
        $categoryList = $this->categories;

        foreach ($categoryList as $category) {
            for ($i = 0; $i < 4; $i++) {
                $idGoods = $i + 1;
                $this->goods[] =
                    [
                        'id' => $idGoods,
                        'category' => $category['name'],
                        'title' => "Товар " . $faker->name(),
                        'price' => "Цена: " . $faker->numberBetween($min = 20, $max = 150) . " &euro; "
                    ];
            }
        }
        return $this->goods;
    }

    protected function getCategories()
    {
        $categoryName = [
            'Ноутбуки',
            'Мониторы, персональные компьютеры',
            'Наушники, микрофоны и компьютерные динамики',
            'Периферийные устройства и программное обеспечение',
            'Принтеры и сканеры'
        ];
        for ($i = 0; $i < 5; $i++) {
            $idCategory = $i + 1;
            $this->categories[] =
                [
                    'id' => $idCategory,
                    'name' => $categoryName[$i]
                ];
        }
        return $this->categories;
    }
}
