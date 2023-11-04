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
            $table->string('surname');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('password');
            $table->enum('gender', ['Female', 'Male', 'Unknown'])->nullable();
            $table->boolean('is_online')->nullable();
            $table->string('pronouns')->nullable();
            $table->json('socials')->nullable();
            $table->text('bio')->nullable();
            $table->text('avatar')->nullable();
            $table->timestamp('birth_date');
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('login_blocked_at')->nullable();
            $table->timestamp('last_seen_at')->nullable();
            $table->softDeletes();
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
