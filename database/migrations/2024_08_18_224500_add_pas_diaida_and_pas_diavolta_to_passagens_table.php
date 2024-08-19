<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('PASSAGENS', function (Blueprint $table) {
            $table->date('PAS_DIAIDA')->nullable();
            $table->date('PAS_DIAVOLTA')->nullable();
        });
    }

    public function down()
    {
        Schema::table('PASSAGENS', function (Blueprint $table) {
            $table->dropColumn(['PAS_DIAIDA', 'PAS_DIAVOLTA']);
        });
    }

};
