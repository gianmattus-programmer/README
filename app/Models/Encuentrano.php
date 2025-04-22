<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encuentrano extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'sede',
        'file',
        'estatus'
    ];

    protected $table = 'encuentranos';

    public function popups() {
        return $this->hasMany('App\Models\Popup', 'encuentranos_id', 'id');
    }
}
