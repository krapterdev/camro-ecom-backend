<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('website_home_features_products', function (Blueprint $table) {
            $table->id();
            $table->string('text'); // pehla text field
            $table->string('text2'); // dusra text field
            $table->boolean('status')->default(1); // 1 active, 0 inactive
            $table->boolean('active_in_home')->default(1); // 1 show in home, 0 not show
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('website_home_features_products');
    }
};
