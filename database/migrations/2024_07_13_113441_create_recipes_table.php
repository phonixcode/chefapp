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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Chef who created the recipe
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); // Category of the recipe
            $table->string('title'); // Recipe title
            $table->string('slug')->unique(); // SEO-friendly URL
            $table->text('description'); // Recipe description
            $table->longText('long_description')->nullable(); // long description description
            $table->longText('additional_description')->nullable(); // additional description
            $table->decimal('price', 8, 2); // Price of the recipe
            $table->string('label')->nullable(); // Recipe label (e.g., Lunch)
            $table->string('sku')->nullable(); // SKU for the recipe
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
