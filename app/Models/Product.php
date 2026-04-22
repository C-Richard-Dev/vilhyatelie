<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'category_id',
        'status',
    ];

    public function setPriceAttribute($value)
    {
        // Remove tudo que não for número ou vírgula
        $value = preg_replace('/[^0-9,]/', '', $value);
        // Troca vírgula por ponto
        $this->attributes['price'] = str_replace(',', '.', $value);
    }

    public function getPriceAttribute($value)
    {
        // Formata para BR: 1.234,56
        return number_format($value, 2, ',', '.');
    }

    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return null;
        }
        // Se já for uma URL completa
        if (str_starts_with($this->image, 'http')) {
            return $this->image;
        }
        return asset('storage/' . $this->image);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function fabrics()
    {
        return $this->belongsToMany(Fabric::class, 'product_fabrics');
    }
}
