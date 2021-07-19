<?php

namespace App\Http\Controllers;

use App\Models\Goods;
use Illuminate\Http\Request;

class GoodsController extends Controller
{
    public function index()
    {
        $goods = Goods::with('category')
            ->orderbY('id', 'desc')
            ->paginate(8);

        return view('goods.index', [
            'goodslist' => $goods
        ]);
    }

    public function show(Goods $goods)
    {
        return view('goods.show', [
            'productOne' => $goods
        ]);
    }
}
