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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id('cliente_id');
            $table->string('nome', 100);
            $table->string('email', 100);
            $table->string('telefone', 20);
            $table->date('data_nascimento');
            $table->string('genero', 10);
            $table->decimal('altura', 5, 2);
            $table->decimal('peso', 5, 2);
            $table->string('objetivo', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
