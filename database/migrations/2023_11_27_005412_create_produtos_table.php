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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome'); // nome
            $table->boolean('promocao'); //true ou false
            $table->decimal('preco', 10, 2); // preco
            $table->decimal('desconto', 10, 2)->nullable(); // porcentagem
            $table->integer('quantidade'); // integer
            $table->string('imagem'); //img
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
