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
        Schema::create('student_class_assignments', function (Blueprint $table) {
            // Foreign key to students table
            $table->unsignedBigInteger('student_fk_id');
            $table->foreign('student_fk_id')->references('id')->on('students')->onDelete('cascade');

            // Foreign key to class_courses table
            $table->unsignedBigInteger('LevelClass_fk_id');
            $table->foreign('LevelClass_fk_id')->references('id')->on('level_classes')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_class_assignments');
    }
};
