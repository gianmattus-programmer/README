<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Popup extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'encuentranos_id',
        'enlace',
        'file',
        'estatus'
    ];

    protected $table = 'popups';

    public function encuentrano() {
        return $this->belongsTo('App\Models\Encuentrano', 'encuentranos_id', 'id');
    }
}
