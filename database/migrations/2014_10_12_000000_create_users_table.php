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
            $table->string('firstname')->nullable()->comment('имя пользователя');
            $table->string('surname')->nullable()->comment('фамилия пользователя');
            $table->string('username')->unique();
            $table->string('email')->unique()->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('password');
            $table->enum('gender', ['female', 'male', 'unknown'])->nullable();
            $table->boolean('is_online')->nullable();
            $table->string('pronouns')->nullable();
            $table->json('socials')->nullable();
            $table->text('bio')->nullable();
            $table->text('avatar')->nullable();
            $table->timestamp('birth_date')->nullable();
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
