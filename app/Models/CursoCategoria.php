<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CursoCategoria extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'file',
        'estatus'
    ];

    protected $table = 'cursocategorias';

    public function cursos() {
        return $this->hasMany('App\Models\Cursolistado', 'cursocategorias_id', 'id');
    }
}
