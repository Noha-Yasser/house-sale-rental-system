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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->decimal('price');
            $table->string('type');
            $table->integer('bedrooms');
            $table->integer('area');
            $table->integer('bathrooms');
            $table->integer('views_count');
            $table->string('address');
            $table->string('state');
            $table->string('zip_code');
            $table->string('status');
            $table->string('photo'); 
            $table->string('services');
            $table->string('unique_feature');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
