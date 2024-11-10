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
        Schema::create('role_permissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_fk_id')->constrained('user_roles')->onDelete('cascade');
            $table->foreignId('permission_fk_id')->constrained('permission_data')->onDelete('cascade');
            $table->timestamps();
            $table->unique(['role_fk_id', 'permission_fk_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_permissions');
    }
};
