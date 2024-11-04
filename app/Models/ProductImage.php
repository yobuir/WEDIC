<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'image_url', 'is_primary', 'type', 'original_name', 'file_name', 
    'title', 'alt_text', 'size', 'mime_type', 'status','sort_order']; 

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
