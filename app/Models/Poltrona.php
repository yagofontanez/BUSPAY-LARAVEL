<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poltrona extends Model {
    use HasFactory;

    protected $table = 'POLTRONAS';

    protected $fillable = [
        'POL_NUMERO',
        'POL_CLIENTE',
        'POL_DISPONIVEL',
        'POL_ONIBUSID'
    ];
}
