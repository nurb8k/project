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
            $table->string('street')->nullable()->comment('улица');
            $table->string('city_district')->nullable()->comment('район');
            $table->string('house_number')->nullable()->comment('номер дома');
            $table->string('amenity')->nullable()->comment('заведение');
            $table->string('building')->nullable()->comment('здания');
//            $table->text('apartment')->nullable()->comment('дом');
            $table->string('suburb')->nullable()->comment('пригород|ықшам аудан');
            $table->string('_coordinates')->nullable()->comment('координаты');
            $table->string('_address_type')->nullable()->comment('тип адреса');
            $table->json('_info')->nullable()->comment('полная информация');
            $table->string('description')->nullable()->comment("display_name|для показа");
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
