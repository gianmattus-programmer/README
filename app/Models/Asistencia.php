<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    use HasFactory;

    protected $fillable = [
        'profesor_id',
        'user_id',
        'listado_id',
        'fecha',
        'hora',
        'estatus'
    ];

    protected $table = 'asistencias';

    public function user() {
        return $this->belongsTo('App\Models\User', 'profesor_id', 'id');
    }

    public function profesor() {
        return $this->belongsTo('App\Models\User', 'profesor_id', 'id');
    }

    public function listado() {
        return $this->belongsTo('App\Models\CursoListado', 'listado_id', 'id');
    }
}
