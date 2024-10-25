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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('title')->nullable();
            $table->string('desc')->nullable();
            $table->string('fb')->nullable();
            $table->string('insta')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('skills')->nullable();
            $table->string('education')->nullable();
            $table->string('image')->nullable();
            $table->string('imgone')->nullable();
            $table->string('imgtwo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
