<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected array $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function fabrics()
    {
        return $this->belongsToMany(Fabric::class, 'product_fabrics');
    }
}
