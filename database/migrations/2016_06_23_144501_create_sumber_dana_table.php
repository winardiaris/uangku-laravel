<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSumberDanaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('sumber_dana',function($table){
        $table->increments('id');
        $table->string('nama_sumber_dana');
        $table->longText('alamat');
        $table->string('telepon');
        $table->string('fax');
        $table->string('email');
        $table->string('website');
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
      Schema::drop('sumber_dana');
    }
}
