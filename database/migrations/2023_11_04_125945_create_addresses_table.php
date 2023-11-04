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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('city_id')
                ->nullable()
                ->constrained('cities');
            $table->morphs('addressable');
            $table->text('street')->nullable()->comment('улица');
            $table->text('building')->nullable()->comment('здания');
            $table->text('apartment')->nullable()->comment('дом');
            $table->text('location')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
