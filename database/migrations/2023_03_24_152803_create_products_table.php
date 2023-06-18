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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->string('short_description')->nullable();
            $table->text('description');
            $table->decimal('regular_price');
            $table->decimal('sale_price');
            $table->string('SKU')->nullable();
            $table->integer('status')->default(1);
            $table->integer('quantity_total');
            $table->string('barecode')->nullable();
            //stock status
            
            $table->unsignedInteger('made_in')->nullable();
            $table->foreign('made_in')->references('id')->on('countries')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('brand_id')->nullable();
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('sub_category_id')->nullable();
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('img_id')->nullable();
            $table->foreign('img_id')->references('id')->on('images')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('img2_id')->nullable();
            $table->foreign('img2_id')->references('id')->on('images')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('img3_id')->nullable();
            $table->foreign('img3_id')->references('id')->on('images')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('img4_id')->nullable();
            $table->foreign('img4_id')->references('id')->on('images')->onDelete('cascade')->onUpdate('cascade');
            //soft delete
            $table->softDeletes();
            //






            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
