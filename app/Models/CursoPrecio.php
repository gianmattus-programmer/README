<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CursoPrecio extends Model
{
    use HasFactory;

    protected $fillable = [
        'precio',
        'descuento',
        'listado_id',
        'inicio',
        'duracion',
        'horarios',
        'estatus'
    ];

    protected $table = 'cursoprecios';

    public function listado() {
        return $this->belongsTo('App\Models\CursoListado', 'listado_id', 'id');
    }
}
