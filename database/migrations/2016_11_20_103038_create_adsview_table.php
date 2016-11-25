<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdsviewTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('adsview', function(Blueprint $table)
		{
			$table->increments('id');
			$table->boolean('is_logged_in')->nullable();
			$table->text('from_url', 65535)->nullable();
			$table->text('landing_page_url', 65535)->nullable();
			$table->integer('ad_id')->nullable();
			$table->string('ip')->nullable();
			$table->integer('user_id')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('adsview');
	}

}
