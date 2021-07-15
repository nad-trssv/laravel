<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function getCategories()
    {
        return \DB::table($this->table)
            ->select(['id', 'title', 'created_at'])
            ->orderByDesc('id')
            ->get();
    }

    public function getCategoryById(int $id)
    {
        return \DB::table($this->table)
            ->find($id);
    }
}
