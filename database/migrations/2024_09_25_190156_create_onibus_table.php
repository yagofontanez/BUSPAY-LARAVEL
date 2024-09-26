<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ONIBUS', function (Blueprint $table) {
            $table->id();
            $table->string('ON_MARCA');
            $table->string('ON_QTDEPOLTRONAS');
            $table->string('ON_PLACA');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ONIBUS');
    }
};
