<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserSettingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_settings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->boolean('allow_friend_requests');
			$table->boolean('allow_band_requests');
			$table->boolean('allow_view_age');
			$table->boolean('allow_view_gender');
			$table->boolean('allow_view_email');
			$table->boolean('allow_view_phone');
			$table->boolean('allow_view_profile');
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
		Schema::table('user_settings', function(Blueprint $table)
		{
			$table->dropForeign('user_settings_user_id_foreign');
		});

		Schema::drop('user_settings');
	}

}
