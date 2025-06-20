<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
     public function up()
    {
        Schema::table('period_prices', function (Blueprint $table) {
            $table->dropColumn('student_limit');
        });
    }

    public function down()
    {
        Schema::table('period_prices', function (Blueprint $table) {
        });
    }
};
