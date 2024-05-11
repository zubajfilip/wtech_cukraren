<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    use HasFactory;

    protected $table = 'orderStatuses';

    protected $fillable = [
        'id',
        'name',
    ];

    public function getIdAttribute()
    {
        return $this->attributes['id']; 
    }
}
