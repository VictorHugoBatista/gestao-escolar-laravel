<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAlunos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('alunos', function(Blueprint $table) {
            $table->string('telefone');
            $table->string('nome_mae');
            $table->string('nome_pai');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('alunos', function(Blueprint $table) {
            $table->dropColumn('telefone');
            $table->dropColumn('nome_mae');
            $table->dropColumn('nome_pai');
        });
    }
}
