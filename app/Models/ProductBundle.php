<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class ProductBundle extends Model
{
    use SoftDeletes;

    protected $fillable = ['outlet_id', 'name', 'sku', 'cost_price', 'sell_price', 'is_active'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_bundle_items')->withPivot('qty');
    }
}
