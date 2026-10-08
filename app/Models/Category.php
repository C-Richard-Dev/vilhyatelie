<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $fillable = [
        'uuid',
        'name',
        'slug',
        'description',
    ];

    protected static function booted(): void
    {
        static::creating(function (Category $category) {
            if (empty($category->uuid)) {
                $category->uuid = (string) Str::uuid();
            }
        });
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
