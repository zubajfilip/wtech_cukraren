<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cartItems';

    protected $fillable = [
        'id',
        'shoppingCartId',
        'productId',
        'quantity',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'productId', 'id');
    }

    public function shoppingCart()
    {
        return $this->belongsTo(ShoppingCart::class, 'shoppingCartId', 'id');
    }

    public function getIdAttribute()
    {
        return (string) $this->attributes['id']; 
    }
}
