<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductFabric extends Model
{
    public $incrementing = false;
    public $timestamps = false;
    protected $table = 'product_fabrics';
    protected $primaryKey = ['product_id', 'fabric_id'];
    protected $fillable = ['product_id', 'fabric_id'];

    /**
     * Override for Eloquent composite primary key support (for queries only).
     */
    protected function setKeysForSaveQuery($query)
    {
        $query->where('product_id', $this->getAttribute('product_id'));
        $query->where('fabric_id', $this->getAttribute('fabric_id'));
        return $query;
    }
}
