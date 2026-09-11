<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItemAddon extends Model
{
    protected $fillable = ['order_item_id', 'addon_option_id', 'addon_name', 'addon_price'];

    public function orderItem()
    {
        return $this->belongsTo(OrderItem::class);
    }

    public function addonOption()
    {
        return $this->belongsTo(AddonOption::class);
    }
}
