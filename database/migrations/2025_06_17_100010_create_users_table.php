<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // public function up(): void
    // {
    //     Schema::create('users', function (Blueprint $table) {
    //         $table->id();
    //         $table->string('name');
    //         $table->string('email')->unique();
    //         $table->timestamp('email_verified_at')->nullable();
    //         $table->string('password');
    //         $table->string('role')->default('customer'); // yeh tu insert kar raha tha error mein
    //         $table->rememberToken(); // default field for auth
    //         $table->timestamps();
    //     });
    // }

    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->string('country')->default('India');
            $table->string('city');
            $table->string('state');
            $table->string('zip_code', 10);
            $table->string('street_address');
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('email_verified')->default(0);
            $table->string('password');
            $table->string('show_password')->nullable();
            $table->enum('role', ['guest', 'customer'])->default('customer');
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
