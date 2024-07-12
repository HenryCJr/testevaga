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
        //criação de tabela muito mais simples
        Schema::create('contatos', function (Blueprint $table) {
            $table->id();
            $table->string('nm_contato');
            $table->string('nm_email');
            $table->char('nm_telefone', 13);
            $table->text('nm_obs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contatos');
    }
};
