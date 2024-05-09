<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;

    protected $table = 'shoppingCarts';

    protected $fillable = [
        'id'
    ];

    public function items()
    {
        return $this->hasMany(CartItem::class, 'shoppingCartId', 'id');
    }

    public function getIdAttribute()
    {
        return (string) $this->attributes['id']; 
    }

    public function shoppingCart()
    {
        return $this->hasOne(User::class, 'id');
    }
}
