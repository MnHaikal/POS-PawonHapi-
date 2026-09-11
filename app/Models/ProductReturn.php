<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductReturn extends Model
{
    protected $fillable = ['order_id', 'return_number', 'reason', 'refund_amount', 'processed_by'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function processedBy()
    {
        return $this->belongsTo(User::class, 'processed_by');
    }

    public function returnItems()
    {
        return $this->hasMany(ReturnItem::class, 'product_return_id');
    }

    public static function generateReturnNumber()
    {
        $date = now()->format('Ymd');
        $lastReturn = self::whereDate('created_at', now()->toDateString())
            ->orderBy('id', 'desc')
            ->first();

        $sequence = 1;
        if ($lastReturn && preg_match('/RET-\d{8}-(\d{4})/', $lastReturn->return_number, $matches)) {
            $sequence = (int)$matches[1] + 1;
        }

        return 'RET-' . $date . '-' . str_pad($sequence, 4, '0', STR_PAD_LEFT);
    }
}
