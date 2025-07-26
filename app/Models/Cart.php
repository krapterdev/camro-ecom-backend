<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'user_id',
        'product_id',
        'attr_id',
        'image',
        'slug',
        'size',
        'size_type',
        'weight',
        'weight_type',
        'price',
        'quantity',
        'hsncode',
    ];
}
