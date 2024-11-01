<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passagem extends Model
{
    use HasFactory;

    protected $table = 'PASSAGENS';

    protected $fillable = [
        'PAS_CIDADEIDA',
        'PAS_ESTADOIDA',
        'PAS_CIDADEVOLTA',
        'PAS_ESTADOVOLTA',
        'PAS_HORASIDA',
        'PAS_HORASVOLTA',
        'PAS_PRECO',
        'PAS_EMPRESA',
        'PAS_DIAIDA',
        'PAS_DIAVOLTA',
        'PAS_ONIBUS_ID'
    ];
}
