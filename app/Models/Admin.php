<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable {
    use Notifiable;

    protected $table = 'ADMS';

    protected $fillable = [
        'ADM_NOME',
        'ADM_EMAIL',
        'ADM_DOCUMENTO',
        'ADM_SENHA',
        'ADM_TOKENACESSO',
    ];

    protected $hidden = [
        'ADM_SENHA',
        'remember_token',
    ];

    public function getAuthPassword() {
        return $this->ADM_SENHA;
    }
}
