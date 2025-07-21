<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductMoreAttr extends Model
{
    protected $table = 'product_more_attr';

    protected $fillable = [
        'product_id',
        'size',
        'size_type',
        'weight',
        'weight_type',
        'mrp_price',
        'discount',
        'selling_price',
        'tax_type',
        'tax_in_percentage',
        'net_price',
        'tax_in_value',
        'hsncode',
        'in_stock'
    ];


    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
