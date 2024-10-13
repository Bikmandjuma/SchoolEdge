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
        Schema::create('school_social_media', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('school_fk_id');
            $table->string('phone')->unique()->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('address')->unique()->nullable();
            $table->string('facebook_link')->unique()->nullable();
            $table->string('whatsapp_no')->unique()->nullable();
            $table->string('instagram_link')->unique()->nullable();
            $table->string('linkedin_link')->unique()->nullable();
            $table->string('twitter_link')->unique()->nullable();
            $table->foreign('school_fk_id')->references('id')->on('customers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_social_media');
    }
};
