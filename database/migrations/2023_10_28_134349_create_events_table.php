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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->text('short_description');
            $table->foreignId('status_id')
                ->nullable()
                ->constrained('event_statuses')
                ->nullOnDelete();
            $table->foreignId('priority_id')
                ->nullable()
                ->constrained('event_priorities')
                ->nullOnDelete();
            $table->foreignId('user_id')->constrained('users');
            $table->integer('capacity')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
