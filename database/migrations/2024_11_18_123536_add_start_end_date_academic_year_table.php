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
        Schema::table('academic_years', function (Blueprint $table) {

            $table->date('start_date')->after('academic_year_name')->nullable();
            $table->date('end_date')->after('start_date')->nullable();

        });
    }

    public function down(): void
    {
        Schema::table('academic_years', function (Blueprint $table) {

        
        });

    }
};
