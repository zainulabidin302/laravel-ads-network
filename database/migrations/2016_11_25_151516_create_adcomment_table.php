<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdcommentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('adcomment', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('comment', 65535)->nullable();
			$table->timestamps();
			$table->integer('ad_id')->unsigned()->nullable();
			$table->integer('user_id')->unsigned()->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('adcomment');
	}

}
