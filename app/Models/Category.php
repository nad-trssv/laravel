<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'title',
        'description',
        'color'
    ];

    public function goods(): HasMany
    {
        return $this->hasMany(Goods::class, 'category_id', 'id');
    }
}
