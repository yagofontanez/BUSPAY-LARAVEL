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
        Schema::table('PASSAGENS', function (Blueprint $table) {
            $table->unsignedBigInteger('PAS_ONIBUS_ID')->nullable()->after('PAS_ESTADOVOLTA');

            $table->foreign('PAS_ONIBUS_ID')
                ->references('id')
                ->on('ONIBUS')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('PASSAGENS', function (Blueprint $table) {
            $table->dropForeign(['PAS_ONIBUS_ID']);
            $table->dropColumn('PAS_ONIBUS_ID');
        });
    }
};
