<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{    
    protected $fillable = [
        'name',
        'description',
        'path',
        'price',
        'top',
        'limited',
        'precios',
    ];
}
