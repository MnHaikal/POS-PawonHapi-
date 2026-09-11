<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PosNote extends Model
{
    protected $fillable = ['user_id', 'outlet_id', 'title', 'content', 'color'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }
}
