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
        Schema::create('trains', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 100)->unique();
            $table->string('company', 50);
            $table->string('departure_station', 80);
            $table->string('arrival_station', 80);
            $table->time('departure_time');
            $table->time('arrival_time');
            $table->string('train_code', 50)->unique();
            $table->tinyInteger('carriage_number');
            $table->boolean('in_time')->default(true);
            $table->boolean('deleted')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trains');
    }
};
