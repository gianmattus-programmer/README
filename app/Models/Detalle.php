<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{
    use HasFactory;

    protected $fillable = [
        'checkout_id',
        'cursocategorias_id',
        'cursolistados',
        'cursoprecios',
        'nombre',
        'categoria',
        'precio',
        'descuento',
        'cantidad',
        'inicio',
        'duracion',
        'horarios',
        'estatus'
    ];

    protected $table = 'detalles';

    public function checkout()
    {
        return $this->belongsTo('App\Models\Checkout', 'checkout_id', 'id');
    }

    // Definimos la relación con CursoListado
    public function listado()
    {
        return $this->belongsTo('App\Models\CursoListado', 'listado_id', 'id');
    }
}
