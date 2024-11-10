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
        Schema::create('user_permissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_fk_id')->constrained('school_employees')->onDelete('cascade');
            $table->foreignId('permission_fk_id')->constrained('permission_data')->onDelete('cascade');
            $table->timestamps();
            $table->unique(['user_fk_id', 'permission_fk_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_permissions');
    }
};
