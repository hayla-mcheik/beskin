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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('image')->nullable();
            $table->string('titleone')->nullable();
            $table->string('descone')->nullable();
            $table->string('titletwo')->nullable();
            $table->string('desctwo')->nullable();
            $table->string('titlethree')->nullable();
            $table->string('descthree')->nullable();
            $table->string('titlefour')->nullable();
            $table->string('descfour')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
