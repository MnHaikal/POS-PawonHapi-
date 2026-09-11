<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AddonOption extends Model
{
    protected $fillable = ['addon_group_id', 'name', 'extra_price', 'is_active', 'sort_order'];

    public function addonGroup()
    {
        return $this->belongsTo(AddonGroup::class);
    }
}
