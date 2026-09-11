<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'outlet_id', 'order_number', 'order_type', 'source', 'table_id',
        'customer_name', 'customer_phone', 'cashier_id', 'status', 'payment_status',
        'subtotal', 'discount_amount', 'coupon_id', 'tax_amount', 'service_fee_amount',
        'packaging_fee_amount', 'total_amount', 'down_payment_amount', 'paid_amount',
        'due_date', 'cogs_amount', 'notes', 'confirmed_at', 'completed_at', 'cancelled_at'
    ];

    protected function casts(): array
    {
        return [
            'confirmed_at' => 'datetime',
            'completed_at' => 'datetime',
            'cancelled_at' => 'datetime',
            'due_date' => 'date',
        ];
    }

    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }

    public function table()
    {
        return $this->belongsTo(Table::class);
    }

    public function cashier()
    {
        return $this->belongsTo(User::class, 'cashier_id');
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function returns()
    {
        return $this->hasMany(ProductReturn::class);
    }

    public function getRemainingAmountAttribute()
    {
        return $this->total_amount - $this->paid_amount;
    }

    public static function generateOrderNumber()
    {
        $date = now()->format('Ymd');
        $lastOrder = self::whereDate('created_at', now()->toDateString())
            ->orderBy('id', 'desc')
            ->first();

        $sequence = 1;
        if ($lastOrder && preg_match('/ORD-\d{8}-(\d{4})/', $lastOrder->order_number, $matches)) {
            $sequence = (int)$matches[1] + 1;
        }

        return 'ORD-' . $date . '-' . str_pad($sequence, 4, '0', STR_PAD_LEFT);
    }
}
