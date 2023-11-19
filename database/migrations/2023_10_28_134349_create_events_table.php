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
            $table->text('description')->nullable()->comment("Описание о ивенте");
            $table->text('short_description')->nullable()->comment("короткий описание о ивенте");
            $table->text('comment')->nullable()->comment('Комментарии');
            $table->unsignedInteger('status')->default(0)->comment('status znachenie');
            $table->foreignId('priority')->default(0)->comment('приоритет айди');
            $table->foreignId('user_id')->comment('создатель')->constrained('users');
            $table->unsignedInteger('capacity')->nullable()->comment('вместимость людей');
            $table->timestamp('end_time')->comment('оканчание');
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
