<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationToTableData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //users
        Schema::table('data', function (Blueprint $table) {
            $table->integer('users_id')->unsigned()->change();
            $table->foreign('users_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');

            //sumber dana
            $table->integer('sumber_dana_id')->unsigned()->change();
            $table->foreign('sumber_dana_id')->references('id')->on('sumber_dana')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('program_id')->unsigned()->change();
            $table->foreign('program_id')->references('id')->on('program')
                ->onUpdate('cascade')->onDelete('cascade');

            //nomor akun
            $table->string('nomor_akun_id')->unsigned()->change();
            $table->foreign('nomor_akun_id')->references('nomor_akun')->on('nomor_akun')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
		//users
        Schema::table('data', function (Blueprint $table) {
          $table->dropForeign('data_users_id_foreign');
        });
        Schema::table('data', function(Blueprint $table){
          $table->dropIndex('data_users_id_foreign');
        });
        Schema::table('data', function(Blueprint $table){
          $table->integer('users_id')->change();
        });
		

		//sumber dana
		 Schema::table('data', function (Blueprint $table) {
          $table->dropForeign('data_sumber_dana_id_foreign');
        });
        Schema::table('data', function(Blueprint $table){
          $table->dropIndex('data_sumber_dana_id_foreign');
        });
        Schema::table('data', function(Blueprint $table){
          $table->integer('sumber_dana_id')->change();
        });

		//program
		 Schema::table('data', function (Blueprint $table) {
          $table->dropForeign('data_program_id_foreign');
        });
        Schema::table('data', function(Blueprint $table){
          $table->dropIndex('data_program_id_foreign');
        });
        Schema::table('data', function(Blueprint $table){
          $table->integer('program_id')->change();
        });
		
		//nomor akun
		 Schema::table('data', function (Blueprint $table) {
          $table->dropForeign('data_nomor_akun_id_foreign');
        });
        Schema::table('data', function(Blueprint $table){
          $table->dropIndex('data_nomor_akun_id_foreign');
        });
        Schema::table('data', function(Blueprint $table){
          $table->string('nomor_akun_id')->change();
        });
    }
}
