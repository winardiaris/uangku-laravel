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
      Schema::create('data', function($table){
        $table->increments('id');
        $table->integer('users_id');
        $table->date('date');
        $table->string('token',100);
        $table->string('type',2);
        $table->double('value');
        $table->longText('desc');
        $table->string('status',1);
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
