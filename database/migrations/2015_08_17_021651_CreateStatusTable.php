<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('debtor')->unsigned()->nullable();
			$table->integer('receiver')->unsigned()->nullable();
			$table->decimal('value');

            $table->foreign('debtor')->references('id')->on('users');
			$table->foreign('receiver')->references('id')->on('users');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('status');
    }
}
