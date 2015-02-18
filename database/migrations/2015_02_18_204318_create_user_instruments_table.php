<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInstrumentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_instruments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->integer('instrument_id')->unsigned();
			$table->timestamps();

			$table->foreign('user_id')
				->references('id')
				->on('users')
				->onUpdate('cascade')
				->onDelete('cascade');

			$table->foreign('instrument_id')
				->references('id')
				->on('music_instruments')
				->onUpdate('cascade')
				->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('user_instruments', function(Blueprint $table)
		{
			$table->dropForeign('user_instruments_user_id_foreign');
			$table->dropForeign('user_instruments_instrument_id_foreign');
		});

		Schema::drop('user_instruments');
	}

}
