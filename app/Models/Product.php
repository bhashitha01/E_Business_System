<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    protected $fillable = [
            'category_id',
            'name',
            'slug',
            'sku',
            'image',
            'description',
            'price',
            'discount_price',
            'stock',
            'status',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
