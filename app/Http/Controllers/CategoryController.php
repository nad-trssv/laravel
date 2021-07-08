<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('categories.index', [
            'categoryList' => $this->getCategories()
        ]);
    }
    public function show(int $id)
    {

        $categoryID = $id - 1;
        $goodsList = $this->getGoods();

        $categories = $this->getCategories();
        $categoryName = $categories[$categoryID]['title'];

        foreach ($goodsList as $key => $goods) {
            if ($goods['category'] == $categoryName) {
                $productByCategory[] =
                    [
                        'id' => $goods['id'],
                        'category' => $goods['category'],
                        'title' => $goods['title'],
                        'price' => $goods['price']
                    ];
            }
        }
        return view('categories.show', [
            'goodslist' => $productByCategory,
            'categoryName' => $categoryName
        ]);
    }
}
