<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockOpname extends Model
{
    protected $fillable = ['outlet_id', 'opname_date', 'note', 'status', 'created_by'];

    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function stockOpnameItems()
    {
        return $this->hasMany(StockOpnameItem::class);
    }
}
