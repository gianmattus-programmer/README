<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CursoTemario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'listado_id',
        'file',
        'temario',
        'estatus'
    ];

    protected $table = 'temarios';

    public function listado() {
        return $this->belongsTo('App\Models\CursoListado', 'listado_id', 'id');
    }

    public function modulos() {
        return $this->hasMany('App\Models\CursoModulo', 'temario_id', 'id');
    }
}
