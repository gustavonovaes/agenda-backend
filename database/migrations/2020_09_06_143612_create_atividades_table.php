<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtividadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atividades', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('titulo');
            $table->text('descricao')->nullable();
            $table->string('tipo');
            $table->date('data_inicio');
            $table->date('data_prazo')->nullable();
            $table->enum('status', ['aberta', 'concluida']);
            $table->date('data_conclusao')->nullable();
            $table->unsignedBigInteger('user_id')->comment('responsavel');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atividades');
    }
}
