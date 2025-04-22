<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CursoModulo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'informacion',
        'temario_id',
        'examen',
        'ordermod',
        'estatus'
    ];

    protected $table = 'cursomodulos';

    public function temario() {
        return $this->belongsTo('App\Models\CursoTemario', 'temario_id', 'id');
    }
}
