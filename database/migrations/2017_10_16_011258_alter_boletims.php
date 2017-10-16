<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterBoletims extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('boletims', function(Blueprint $table){
          $table->dropForeign('boletims_id_aluno_foreign');
          $table->renameColumn('id_aluno', 'aluno_id');
          $table
                ->foreign('aluno_id')
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
       Schema::table('boletims', function(Blueprint $table){
           //
       });
    }
}
