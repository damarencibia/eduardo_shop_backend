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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->integer('amount');
            $table->string('state');
            $table->string('dimension')->nullable();
            $table->decimal('weight', 10, 2)->nullable();
            $table->string('capacity')->nullable();
            $table->string('ability')->nullable();
            $table->string('color')->nullable();
            // Relaciones directas
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); // Nueva columna
            $table->foreignId('subcategory_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
