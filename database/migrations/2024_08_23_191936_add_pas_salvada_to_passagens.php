<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('PASSAGENS', function (Blueprint $table) {
            $table->text('PAS_SALVADA')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('passagens', function (Blueprint $table) {
            $table->dropColumn(['PAS_SALVADA']);
        });
    }
};
