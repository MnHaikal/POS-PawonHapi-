<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
        'npwp',
        'logo_path',
        'is_active',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function outletSetting()
    {
        return $this->hasOne(OutletSetting::class);
    }

    public function posNotes()
    {
        return $this->hasMany(PosNote::class);
    }
}
