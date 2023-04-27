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
        Schema::create('food', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('ingredient')->nullable();
            $table->string('picture')->nullable();
            $table->foreignId('restaurant_id')->constrained(
                table: 'restaurants', indexName: 'food_restaurant_id'
            );
            $table->foreignId('category_id')->constrained(
                table: 'food_categories', indexName: 'food_category_id'
            );
            $table->integer('discount_percent')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food');
    }
};
