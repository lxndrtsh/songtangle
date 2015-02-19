<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserBasicInformationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_basic_information', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->string('firstname');
			$table->string('lastname');
			$table->dateTime('date_of_birth');
			$table->string('gender');
			$table->string('address');
			$table->string('address_2');
			$table->string('city');
			$table->string('state');
			$table->string('zip_code');
			$table->string('phone_number');
			$table->timestamps();

			$table->foreign('user_id')
				->references('id')
				->on('users')
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
		Schema::table('user_basic_information', function(Blueprint $table)
		{
			$table->dropForeign('user_basic_information_user_id_foreign');
		});

		Schema::drop('user_basic_information');
	}

}
