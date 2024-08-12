<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
   /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->date('data_nascimento');
            $table->string('cep');
            $table->string('endereco');
            $table->string('numero');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('uf', 2); 
            $table->timestamps();
        });
    }

  /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
