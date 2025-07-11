<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductMoreImage extends Model
{
    protected $table = 'product_more_images';

  protected $fillable = [
    'product_id',
    'img_name',
    'status',
];

    public function product()
    {
        return $this->belongsTo(Product::class, 'pid');
    }
}
