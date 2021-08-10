<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Card; 

class Buy extends Model
{
    protected $fillable = [
        'user_id',
        'tarjeta_id',
        'estado',
        'price',
        'valor',
        'currency',
    ];

    public function usert()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function card()
    {
        return $this->hasOne(Card::class, 'id', 'tarjeta_id');
    }

}