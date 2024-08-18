<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('ADMS', function (Blueprint $table) {
            $table->id();
            $table->string('ADM_NOME');
            $table->string('ADM_EMAIL')->unique();
            $table->string('ADM_DOCUMENTO');
            $table->string('ADM_SENHA');
            $table->string('ADM_TOKENACESSO');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('ADMS');
    }
};
