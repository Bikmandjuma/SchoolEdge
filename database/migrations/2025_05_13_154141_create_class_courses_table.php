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
        Schema::create('class_courses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('levelClass_fk_id');
            $table->string('course_name');
            $table->integer('quiz_mark_total')->nullable();
            $table->integer('exam_total')->nullable();
            $table->integer('total_mark')->nullable();
            $table->timestamps();
            $table->foreign('levelClass_fk_id')->references('id')->on('level_classes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_courses');
    }
};
