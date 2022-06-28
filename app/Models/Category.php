<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = [
        'name',
        'image',
        'slug',
        'description',
        'status',
        'popular',
        'meta_title',
        'meta_description',
        'meta_keyword',
    ];
    public function products()
    {
        return $this->hasMany(Product::class,'category_id','id');
    }
}
