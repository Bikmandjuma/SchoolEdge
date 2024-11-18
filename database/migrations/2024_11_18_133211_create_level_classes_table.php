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
        Schema::create('level_classes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('level_fk_id');
            $table->unsignedBigInteger('term_fk_id');
            $table->unsignedBigInteger('school_fk_id');
            $table->foreign('level_fk_id')->references('id')->on('levels')->onDelete('cascade');
            $table->foreign('term_fk_id')->references('id')->on('academic_terms')->onDelete('cascade');
            $table->foreign('school_fk_id')->references('id')->on('customers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('level_classes');
    }
};
