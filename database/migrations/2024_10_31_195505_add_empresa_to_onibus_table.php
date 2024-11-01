<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('ONIBUS', function (Blueprint $table) {
            $table->unsignedBigInteger('ON_EMPRESA_ID')->nullable();

            $table->foreign('ON_EMPRESA_ID')
                ->references('id')
                ->on('USUARIOS')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ONIBUS', function (Blueprint $table) {
            $table->dropForeign(['ON_EMPRESA_ID']);
            $table->dropColumn('ON_EMPRESA_iD');
        });
    }
};
