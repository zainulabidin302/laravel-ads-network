<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdsaleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('adsale', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('ad_id')->nullable();
			$table->integer('buyer_id')->nullable();
			$table->float('sold_price', 10, 0)->nullable();
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
		Schema::drop('adsale');
	}

}
