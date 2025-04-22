<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'session_id',
        'product_id',
        'quantity',
        'categoria',
        'categoria_id',
        'precio',
        'descuento',
        'precio_id'
    ];
    
    protected $table = 'carts';

    public function product()
    {
        return $this->belongsTo(CursoListado::class);
    }
}
