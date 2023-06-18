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
            $table->increments('id');
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('utype')->default('USR');
            $table->string('street')->nullable();
            $table->string('city')->nullable(); 
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('zip')->nullable();  
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('img')->default('https://s3.amazonaws.com/37assets/svn/765-default-avatar.png');
            $table->string('phone')->nullable();
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
