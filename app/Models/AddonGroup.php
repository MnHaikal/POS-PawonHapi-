<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AddonGroup extends Model
{
    protected $fillable = ['outlet_id', 'name', 'is_required', 'is_multiple', 'sort_order'];

    public function addonOptions()
    {
        return $this->hasMany(AddonOption::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_addon_group');
    }
}
