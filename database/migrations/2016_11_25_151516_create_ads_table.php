<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ads', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('title', 65535)->nullable();
			$table->float('price', 10, 0)->nullable();
			$table->text('description', 65535)->nullable();
			$table->boolean('is_sold')->nullable();
			$table->integer('seller_id')->nullable();
			$table->timestamps();
			$table->integer('category_id')->unsigned()->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ads');
	}

}
