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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email', 191)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('phone')->nullable();
            $table->tinyInteger('role_as')->default('1')->comment('1=admin,2=instructor,3=secretary,4=users');
            $table->string('image')->nullable();
            $table->string('api_token',80)->unique()->nullable()->default(null);
            $table->string('status')->default('pending')->comment('pending,active');
            $table->string('verification_token')->nullable()->unique();
            $table->text('bio')->nullable();
            $table->text('experience')->nullable();
            $table->string('specialization')->nullable();
            $table->string('schedule')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
