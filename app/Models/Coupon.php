<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = [
        'outlet_id', 'code', 'discount_type', 'discount_value', 'min_purchase',
        'max_discount', 'valid_from', 'valid_until', 'usage_limit', 'used_count', 'is_active'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
