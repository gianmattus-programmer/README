<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InShoppingCart extends Model
{
    use HasFactory;

    protected $fillable = [
        'listado_id',
        'precio_id',
        'shopping_cart_id',
        'cantidad'
    ];

    protected $table = 'in_shopping_carts';
}