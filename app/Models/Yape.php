<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Yape extends Model
{
    use HasFactory;

    protected $fillable = [
        'checkout_id',
        'file',
        'estatus'
    ];

    protected $table = 'yapes';
}
