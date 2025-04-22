<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'ape_pat',
        'ape_mat',
        'reclamo',
        'domicilio',
        'tip_doc',
        'num_doc',
        'email',
        'bien',
        'tip_mon',
        'monto',
        'descripcion',
        'motivo',
        'detalles',
        'pedido',
        'estatus'
    ];

    protected $table = 'libros';
}
