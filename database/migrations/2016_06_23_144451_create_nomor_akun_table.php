<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNomorAkunTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('nomor_akun',function($table){
        $table->string('nomor_akun');
        $table->string('sub');
        $table->string('nama_akun');
        $table->primary('nomor_akun');
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
      Schema::drop('nomor_akun');
    }
}
