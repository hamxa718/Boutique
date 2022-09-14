<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product_attribute_variant extends Model
{
    protected $fillable = [
        'product_id', '	product_attributes_id','variant_title', 'variant_price', 
    ];

}
