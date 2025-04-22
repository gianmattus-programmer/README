<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiendaCategoria extends Model
{
    use HasFactory;use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'file',
        'estatus'
    ];

    protected $table = 'tiendacategorias';

    public function productos() {
        return $this->hasMany('App\Models\TiendaListado', 'tiendacategoria_id', 'id');
    }
}
