<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
        'image_url',
        'category_id',
        'featured',
        'status',
        'deleted_by',
        'updated_by',
        'created_by',
    ];
}
