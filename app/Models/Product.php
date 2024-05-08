<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    // converting the uuid to string
    // so it doesnt break the show function 
    public function getIdAttribute()
    {
        return (string) $this->attributes['id']; 
    }
}
