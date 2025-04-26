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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('school_fk_id');
            $table->foreign('school_fk_id')->references('id')->on('customers')->onDelete('cascade');
            $table->string('student_number')->unique();
            $table->string('firstname');
            $table->string('middle_name')->nullable();
            $table->string('lastname');
            $table->string('province');
            $table->string('district');
            $table->string('sector');
            $table->string('cell');
            $table->string('village');
            $table->string('gender');
            $table->date('dob');
            $table->string('father_names')->nullable();
            $table->string('father_phone')->nullable();
            $table->string('mother_names')->nullable();
            $table->string('mother_phone')->nullable();
            $table->string('guardian_names')->nullable();
            $table->string('guardian_phone')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
