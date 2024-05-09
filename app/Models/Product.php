<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    public function getIdAttribute()
    {
        return (string) $this->attributes['id']; 
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'categoryProducts', 'productId', 'categoryId');
    }
}
