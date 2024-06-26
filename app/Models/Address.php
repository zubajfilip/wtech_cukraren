<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'street',
        'city',
        'postalCode',
        'country',
        'customerEmail',
        'userId',
    ];

    public function getIdAttribute()
    {
        return $this->attributes['id']; 
    }
}
