<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdgalleryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('adgallery', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('image_url', 65535)->nullable();
			$table->integer('ad_id')->unsigned()->nullable()->index('asdf');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('adgallery');
	}

}
