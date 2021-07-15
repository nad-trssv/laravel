<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $table = 'goods';

    public function getGoods()
    {
        return \DB::table($this->table)
            ->join('categories', 'category_id', '=', 'categories.id')
            ->select(['goods.*', 'categories.title as categoryName'])
            ->orderByDesc('goods.id')
            ->get();
    }

    public function getGoodsById(int $id)
    {
        return \DB::table($this->table)
            ->find($id);
    }
}
