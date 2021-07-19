<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Goods;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $goods = Goods::orderBy('id', 'desc')
            ->take(8)
            ->get();

        return view('index', [
            'goodslist' => $goods
        ]);
    }
}
