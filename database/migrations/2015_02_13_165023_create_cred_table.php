<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCredTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cred', function(Blueprint $table)
		{
			$table->increments('id');
      $table->integer('user_id')->unsigned();
      $table->integer('event_id')->unsigned();
      $table->integer('cred');
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
		Schema::drop('cred');
	}

}
