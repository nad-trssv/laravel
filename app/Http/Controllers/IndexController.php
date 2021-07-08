<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('index', [
            'goodslist' => $this->getGoods(),
            'categorylist' => $this->getCategories()
        ]);
    }
}
