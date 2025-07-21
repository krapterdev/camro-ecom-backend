<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'product_name',
        'product_slug',
        'product_image1',
        'product_image2',
        'product_desc',
        'meta_title',
        'meta_keywords',
        'meta_desc',
        'status'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function productAttrs()
    {
        return $this->hasMany(ProductMoreAttr::class, 'product_id');
    }

    public function productImages()
    {
        return $this->hasMany(ProductMoreImage::class, 'product_id');
    }
    
}
