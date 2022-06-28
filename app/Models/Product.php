<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'image',
        'slug',
        'description',
        'small_description',
        'category_id',
        'quantity',
        'original_price',
        'selling_price',
        'status',
        'trending',
        'meta_title',
        'meta_description',
        'meta_keyword',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
