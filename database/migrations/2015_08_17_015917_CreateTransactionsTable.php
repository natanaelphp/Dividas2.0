<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->decimal('value');
			$table->string('description');
            $table->integer('paid_by')->unsigned();
			$table->integer('created_by')->unsigned();
			$table->timestamps();

            $table->foreign('paid_by')->references('id')->on('users');
            $table->foreign('created_by')->references('id')->on('users');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('transactions');
    }
}
