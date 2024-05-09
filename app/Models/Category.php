<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name'
    ];

    public function getIdAttribute()
    {
        return (string) $this->attributes['id']; 
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'categoryProducts', 'categoryId', 'productId');
    }
}
