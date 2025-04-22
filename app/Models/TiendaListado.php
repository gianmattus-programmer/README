<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiendaListado extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'tiendacategoria_id',
        'file',
        'informacion',
        'precio',
        'descuento',
        'estado',
        'estatus'
    ];

    protected $table = 'tiendalistados';

    public function categoria() {
        return $this->belongsTo('App\Models\TiendaCategoria', 'tiendacategoria_id', 'id');
    }
}
