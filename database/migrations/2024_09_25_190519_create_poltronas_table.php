<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('POLTRONAS', function (Blueprint $table) {
            $table->id();
            $table->string('POL_NUMERO');
            $table->string('POL_CLIENTE');
            $table->unsignedBigInteger('POL_ONIBUSID');
            $table->timestamps();

            $table->foreign('POL_ONIBUSID')->references('id')->on('ONIBUS')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('POLTRONAS');
    }
};
