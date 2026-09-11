<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductBundleItem extends Model
{
    protected $fillable = ['product_bundle_id', 'product_id', 'qty'];
}
