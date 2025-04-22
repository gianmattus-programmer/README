<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'metodo',
        'subtotal',
        'igv',
        'descuento',
        'total',
        'estatus'
    ];

    protected $table = 'checkouts';

    public function detalles()
    {
        return $this->hasMany('App\Models\Detalle', 'checkout_id', 'id');
    }

    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
