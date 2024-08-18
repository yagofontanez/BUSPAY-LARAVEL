<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'USUARIOS';

    protected $fillable = [
        'US_NOME',
        'US_EMAIL',
        'US_SENHA',
        'US_TIPOCOMPRADOR',
        'US_DOCUMENTO',
    ];

    protected $hidden = [
        'US_SENHA',
        'remember_token',
    ];

    public function getAuthPassword()
    {
        return $this->US_SENHA;
    }

    public function passagensCompradas()
    {
        return $this->hasMany(Passagem::class);
    }

    public function passagensCriadas()
    {
        return $this->hasMany(Passagem::class);
    }


}
