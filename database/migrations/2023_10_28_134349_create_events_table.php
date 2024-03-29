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
            $table->unsignedInteger('status')->default(0)->comment('status значении');
            $table->foreignId('priority')->default(0)->comment('приоритет айди');
//            $table->enum('type_code', \App\Enums\Event\Type::getValues())->nullable()->comment('тип ивента');
            $table->foreignId('user_id')->comment('создатель')->constrained('users');
            $table->unsignedInteger('capacity')->nullable()->comment('вместимость людей');
            $table->boolean('is_commendable')->default(false)->comment('является ли командой');
            $table->boolean('is_private')->default(false)->comment('является ли приватным');
            $table->string('key')->nullable()->comment('ключ для приватного ивента');
            $table->timestamp('start_time')->comment('начало');
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
