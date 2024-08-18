<?php

use App\TipoComprador;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('USUARIOS', function(Blueprint $table) {
            $table->id();
            $table->string('US_NOME');
            $table->string('US_EMAIL')->unique();
            $table->string('US_SENHA');
            $table->string('US_TIPOCOMPRADOR')->default(TipoComprador::PESSOA_FISICA->value);
            $table->string('US_DOCUMENTO')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('USUARIOS');
    }
};
