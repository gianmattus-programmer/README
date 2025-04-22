<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Politica extends Model
{
    use HasFactory;

    protected $fillable = [
        'informacion',
        'estatus'
    ];

    protected $table = 'politicas';
}
