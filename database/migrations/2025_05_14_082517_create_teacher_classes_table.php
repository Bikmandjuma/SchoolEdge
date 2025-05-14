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
        Schema::create('teacher_classes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('classCourse_fk_id');
            $table->unsignedBigInteger('schoolEmployee_fk_id');
            $table->timestamps();

            $table->foreign('classCourse_fk_id')->references('id')->on('class_courses')->onDelete('cascade');
            $table->foreign('schoolEmployee_fk_id')->references('id')->on('school_employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher_classes');
    }
};
