<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('product_more_attr', function (Blueprint $table) {
            $table->engine = 'InnoDB'; // Important

            $table->id();
            $table->unsignedBigInteger('product_id');

            $table->string('weight')->nullable();
            $table->string('weight_type')->nullable();
            $table->string('size')->nullable();
            $table->string('size_type')->nullable();
            $table->decimal('mrp_price', 10, 2)->nullable();
            $table->decimal('discount', 5, 2)->nullable();
            $table->decimal('selling_price', 10, 2)->nullable();
            $table->decimal('tax_in_percentage', 5, 2)->nullable();
            $table->enum('tax_type', ['inclusive', 'exclusive'])->default('exclusive');
            $table->decimal('net_price', 10, 2)->nullable();
            $table->decimal('tax_in_value', 10, 2)->nullable();
            $table->boolean('in_stock')->default(1);
            $table->string('hsncode')->nullable();

            $table->timestamps();

            // Foreign Key Constraint
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_more_attr');
    }
};
