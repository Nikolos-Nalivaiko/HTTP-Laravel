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
        Schema::create('cargos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('weight');
            $table->string('body');
            $table->integer('distance');
            $table->integer('price');
            $table->string('pay_method');
            $table->foreignId('load_region_id')->constrained('regions')->onDelete('cascade');
            $table->foreignId('load_city_id')->constrained('cities')->onDelete('cascade');
            $table->date('load_date');
            $table->foreignId('unload_region_id')->constrained('regions')->onDelete('cascade');
            $table->foreignId('unload_city_id')->constrained('cities')->onDelete('cascade');
            $table->date('unload_date');
            $table->text('description')->nullable();
            $table->boolean('urgent')->default(false);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cargos');
    }
};
