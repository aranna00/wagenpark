<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddDealerFkToCarsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cars', function(Blueprint $table)
		{
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
		Schema::table('cars', function(Blueprint $table)
		{
			$table->dropForeign('cars_dealer_id_foreign');
		});
	}

}
