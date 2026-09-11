<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OutletSetting extends Model
{
    protected $fillable = [
        'outlet_id', 'packaging_fee_per_item', 'hide_bundle_detail_on_receipt',
        'combine_qty_on_receipt', 'block_price_below_cost', 'hide_split_bill',
        'queue_number_enabled', 'notification_sound', 'notification_browser_popup',
        'notification_tab_counter', 'notification_toast'
    ];

    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }
}
