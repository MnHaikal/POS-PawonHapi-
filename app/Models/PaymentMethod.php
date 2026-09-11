<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $fillable = ['outlet_id', 'name', 'type', 'account_number', 'is_active', 'sort_order'];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
