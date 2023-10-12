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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('mobile_number')->unique();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->string('type')->default('user');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('otp')->nullable();
            $table->boolean('confirmed')->default(false);
            $table->boolean('is_active')->default(true);
            $table->string('password');
            $table->string('language')->default('en');
            $table->string('profile_picture')->nullable();

            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
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
