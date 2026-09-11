<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id', 'item_type', 'product_id', 'product_bundle_id',
        'item_name', 'unit_price', 'qty', 'addon_total', 'note', 'subtotal'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function productBundle()
    {
        return $this->belongsTo(ProductBundle::class);
    }

    public function orderItemAddons()
    {
        return $this->hasMany(OrderItemAddon::class);
    }
}
