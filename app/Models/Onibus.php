<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Onibus extends Model {
    use HasFactory;

    protected $table = 'ONIBUS';

    protected $fillable = [
        'ON_MARCA',
        'ON_QTDEPOLTRONAS',
        'ON_PLACA',
    ];
}
