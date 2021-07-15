<?php

namespace App\Http\Controllers;

use App\Models\Goods;
use Illuminate\Http\Request;

class GoodsController extends Controller
{
    public function index()
    {
        $goodsModel = new Goods();
        $goods = $goodsModel->getGoods();

        return view('goods.index', [
            'goodslist' => $goods
        ]);
    }

    public function show(int $id)
    {
        $goodsModel = new Goods();
        $productOne = $goodsModel->getGoodsById($id);
        return view('goods.show', [
            'productOne' => $productOne
        ]);
    }
}
