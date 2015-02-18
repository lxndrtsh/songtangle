<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserGenresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_genres', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->integer('genre_id')->unsigned();
			$table->timestamps();

			$table->foreign('user_id')
				->references('id')
				->on('users')
				->onUpdate('cascade')
				->onDelete('cascade');

			$table->foreign('genre_id')
				->references('id')
				->on('music_genres')
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
		Schema::table('user_genres', function(Blueprint $table)
		{
			$table->dropForeign('user_genres_user_id_foreign');
			$table->dropForeign('user_genres_genre_id_foreign');
		});

		Schema::drop('user_genres');
	}

}
