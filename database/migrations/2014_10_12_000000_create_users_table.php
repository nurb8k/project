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
            $table->string('username')->unique()->nullable()->comment('никнейм пользователя');
            $table->string('email')->unique()->nullable()->comment('email пользователя');
            $table->string('phone')->unique()->nullable()->comment('телефон пользователя');
            $table->string('password')->comment('пароль пользователя');
            $table->enum('gender', ['female', 'male', 'unknown'])->nullable()->comment('пол пользователя');
            $table->boolean('is_online')->nullable()->comment('статус пользователя');
            $table->string('pronouns')->nullable()->comment('местоимение пользователя');
            $table->json('socials')->nullable()->comment('социальные сети пользователя');
            $table->text('bio')->nullable()->comment('биография пользователя');
            $table->text('avatar')->nullable()->comment('аватар пользователя');
            $table->timestamp('birth_date')->nullable()->comment('дата рождения пользователя');
            $table->timestamp('email_verified_at')->nullable()->comment('дата подтверждения email');
            $table->timestamp('login_blocked_at')->nullable()->comment('дата блокировки входа');
            $table->timestamp('last_seen_at')->nullable()->comment('дата последнего входа');
            $table->softDeletes()->comment('дата удаления пользователя');
            $table->rememberToken()->comment('токен пользователя');
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
