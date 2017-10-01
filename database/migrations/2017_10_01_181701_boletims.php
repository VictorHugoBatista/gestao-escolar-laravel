<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Boletims extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boletims', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('id_aluno')->unsigned();
            $table->string('materia');
            $table->integer('nota');
            $table->integer('faltas');

            $table
                ->foreign('id_aluno')
                ->references('id')
                ->on('alunos')
                ->inDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('boletims', function(Blueprint $table) {
            $table->dropForeign('boletims_id_aluno_foreign');
        });
    }
}
