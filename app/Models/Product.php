<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class product extends Model
{
    // use HasFactory;
    protected $fillable = [
        'category_id',
        'product_name',
        'product_image',
        'product_slug',
        'brand',
        'model',
        'product_desc',
        'sort_order',
        'stock',
        'meta_title',
        'meta_keywords',
        'meta_desc',
        'status'
    ];

    // 🔁 Relationships
    public function variants()
    {
        return $this->hasMany(ProductMoreAttr::class, 'product_id');
    }

    public function moreImages()
    {
        return $this->hasMany(ProductMoreImage::class, 'product_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
