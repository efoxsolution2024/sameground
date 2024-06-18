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
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->string('website');
            $table->string('author_name');
            $table->string('business');
            $table->string('themes');
            $table->string('wp_version');
            $table->string('duration');
            $table->string('admin_login_link');
            $table->string('admin_username');
            $table->string('admin_password');
            $table->string('auth_login_link');
            $table->string('auth_username');
            $table->string('auth_password');
            $table->string('database_name');
            $table->string('database_username');
            $table->string('database_password');
            $table->boolean('is_active')->default(0);
            $table->boolean('priority')->default(0);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('businesses');
    }
};
