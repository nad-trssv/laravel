<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Goods;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $categoryModel = new Category();
        $categories = $categoryModel->getCategories();

        $goodsModel = new Goods();
        $goods = $goodsModel->getGoods();

        return view('index', [
            'goodslist' => $goods,
            'categorylist' => $categories
        ]);
    }
}
