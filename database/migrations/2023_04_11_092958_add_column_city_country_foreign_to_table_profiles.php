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
        Schema::table('profiles', function (Blueprint $table) {
            //
            $table->unsignedInteger('country')->nullable();
            $table->foreign('country')->references('id')->on('countries')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('city')->nullable();
            $table->foreign('city')->references('id')->on('cities')->onDelete('cascade')->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            //
        });
    }
};
