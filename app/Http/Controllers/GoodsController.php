<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoodsController extends Controller
{
    public function index()
    {
        return view('goods.index', [
            'goodslist' => $this->getGoods()
        ]);
    }

    public function show(int $id)
    {
        $product = $this->getGoods();

        $productOne = $product[$id];

        return view('goods.show', [
            'productOne' => $productOne,
            'id' => $id
        ]);
    }
}
