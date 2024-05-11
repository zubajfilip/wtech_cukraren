<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'orderStatusId',
        'customerEmail',
        'customerPhoneNumber',
        'paymentMethod',
        'deliveryMethod',
        'deliveryAddressId',
        'price',
    ];

    public function getIdAttribute()
    {
        return $this->attributes['id']; 
    }
}
