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
            $table->string('state'); // Ejemplo: "disponible", "agotado"
            $table->string('dimension')->nullable(); // Ejemplo: "10x20x5 cm"
            $table->decimal('weight', 10, 2)->nullable(); // En kilogramos
            $table->string('capacity')->nullable(); // Ejemplo: "5 litros"
            $table->string('ability')->nullable(); // Habilidad o funcionalidad
            $table->string('color')->nullable();
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
