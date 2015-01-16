<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAppointmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('appointments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->dateTime('date');
			$table->integer('car_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->integer('dealer_id')->unsigned();
			$table->integer('workshop');
			$table->timestamps();

			$table->foreign('car_id')
			      ->references('id')
			      ->on('cars');
			$table->foreign('user_id')
			      ->references('id')
			      ->on('users');
			$table->foreign('dealer_id')
			      ->references('id')
			      ->on('dealers');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('appointments');
	}

}
