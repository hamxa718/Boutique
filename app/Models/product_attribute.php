<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product_attribute extends Model
{
    protected $fillable = [
        'product_id', '	variation', 'variation_title', 'variation_price',
    ];
}
