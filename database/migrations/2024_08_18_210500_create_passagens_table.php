<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('PASSAGENS', function (Blueprint $table) {
            $table->id();
            $table->string('PAS_CIDADEIDA');
            $table->string('PAS_ESTADOIDA');
            $table->string('PAS_CIDADEVOLTA')->nullable();
            $table->string('PAS_ESTADOVOLTA')->nullable();
            $table->time('PAS_HORASIDA');
            $table->time('PAS_HORASVOLTA')->nullable();
            $table->decimal('PAS_PRECO', 8, 2);
            $table->string('PAS_EMPRESA');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('passagens');
    }
};
