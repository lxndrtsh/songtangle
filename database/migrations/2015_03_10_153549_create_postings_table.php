<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('postings', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('posting_user_id')->unsigned();
            $table->integer('posting_type_id')->unsigned();
            $table->longText('posting_content');
            $table->integer('share_user_id')->unsigned();
            $table->string('url');
			$table->timestamps();
            $table->softDeletes();

            $table->foreign('posting_user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('posting_type_id')
                ->references('id')
                ->on('posting_types')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('share_user_id')
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
        Schema::table('postings', function(Blueprint $table)
        {
            $table->dropForeign('postings_posting_user_id_foreign');
            $table->dropForeign('postings_posting_type_id_foreign');
            $table->dropForeign('postings_share_user_id_foreign');
        });

		Schema::drop('postings');
	}

}
