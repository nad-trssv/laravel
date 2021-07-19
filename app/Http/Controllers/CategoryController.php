<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Goods;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->get();

        return view('categories.index', [
            'categoryList' => $categories
        ]);
    }
    public function show(Category $category)
    {

        $categoryID = $category->id - 1;
        $goodsList = Goods::all();

        $categoryName = $category->title;

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
