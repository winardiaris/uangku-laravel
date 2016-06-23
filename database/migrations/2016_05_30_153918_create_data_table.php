<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('data', function($table) {
        $table->increments('id');
        $table->string('tipe');
        $table->string('voucher');
        $table->date('tanggal');
        $table->double('jumlah');
        $table->string('orang');
        $table->string('bukti',100);
        $table->string('bukti_gambar',255);
        $table->longText('keterangan');
        $table->integer('sumber_dana_id');
        $table->string('nomor_akun_id');
        $table->integer('program_id');
        $table->integer('users_id');
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
        		Schema::drop('data');
    }
}
