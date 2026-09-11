<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'outlet_id', 'category_id', 'name', 'slug', 'sku', 'barcode',
        'description', 'main_image_path', 'cost_price', 'sell_price',
        'track_stock', 'stock', 'min_stock', 'loyalty_points_per_unit',
        'is_active', 'show_in_pos', 'is_new', 'is_popular', 'is_on_sale',
        'sale_price', 'is_preorder', 'created_by', 'updated_by'
    ];

    public function getIsOutOfStockAttribute()
    {
        return $this->stock <= 0;
    }

    public function scopeLowStock($query)
    {
        return $query->whereColumn('stock', '<=', 'min_stock');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function addonGroups()
    {
        return $this->belongsToMany(AddonGroup::class, 'product_addon_group');
    }

    public function productBundles()
    {
        return $this->belongsToMany(ProductBundle::class, 'product_bundle_items')->withPivot('qty');
    }

    public function stockMovements()
    {
        return $this->hasMany(\App\Models\StockMovement::class);
    }
}
