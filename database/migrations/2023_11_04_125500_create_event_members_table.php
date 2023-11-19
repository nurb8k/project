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
        Schema::create('event_members', function (Blueprint $table) {
            $table->id();
            $table->string('status')->comment('enum');
            $table->foreignId('event_id')
                ->constrained('events')
                ->nullOnDelete();
            $table->foreignId('user_id')->constrained('users');
            $table->unsignedTinyInteger('role')->default(0)->comment("роль участника");
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_members');
    }
};
