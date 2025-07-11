<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('category_id');
            $table->string('product_name');
            $table->string('product_slug')->unique();

            $table->string('product_image');
            $table->boolean('product_stock')->default(1);

            $table->text('short_desc')->nullable();
            $table->longText('product_desc')->nullable();

            $table->integer('sort_order')->default(0);
            $table->boolean('status')->default(1);

            $table->string('meta_title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('meta_desc')->nullable();

            // Status Management
            $table->boolean('in_stock')->default(1);
            $table->boolean('cod_available')->default(0);
            $table->boolean('is_featured')->default(0);
            $table->boolean('is_trending')->default(0);
            $table->boolean('is_new_arrival')->default(0);
            $table->boolean('is_combo')->default(0);
            $table->boolean('is_flavor')->default(0);
            $table->boolean('is_savor')->default(0);

            $table->timestamps();

            // Foreign key
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
