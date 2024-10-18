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
        Schema::create('permission_data', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slang');
            $table->unsignedBigInteger('permissiongroupBy_fk_id');
            $table->foreign('permissiongroupBy_fk_id')->references('id')->on('permission_group_bies')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permission_data');
    }
};
