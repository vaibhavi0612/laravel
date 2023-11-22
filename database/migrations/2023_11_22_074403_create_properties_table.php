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
            $table->string('county')->nullable();
            $table->string('country')->nullable();
            $table->string('town')->nullable();
            $table->longText('description')->nullable();
            $table->longText('full_details_url')->nullable();
            $table->longText('displayable_address')->nullable();
            $table->longText('image_url')->nullable();
            $table->longText('thumbnail_url')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->integer('num_bedrooms')->default(0);
            $table->integer('num_bathrooms')->default(0);
            $table->string('price')->nullable();
            $table->enum('type', ['sale','rent']);
            $table->longText('property_type')->nullable();
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
