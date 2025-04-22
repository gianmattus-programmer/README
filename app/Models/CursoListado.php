<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CursoListado extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'cursocategorias_id',
        'file',
        'video',
        'portada',
        'meses',
        'sesiones',
        'profesor_id',
        'estatus'
    ];

    protected $table = 'cursolistados';

    public function categoria() {
        return $this->belongsTo('App\Models\CursoCategoria', 'cursocategorias_id', 'id');
    }

    public function temarios() {
        return $this->hasMany('App\Models\CursoTemario', 'listado_id', 'id');
    }

    public function precios() {
        return $this->hasMany('App\Models\CursoPrecio', 'listado_id', 'id');
    }

    public function user() {
        return $this->belongsTo('App\Models\User', 'profesor_id', 'id');
    }
}
