<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class University extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('universities', function(Blueprint $table)
		{
      $table->engine = 'InnoDB';
			$table->increments('id');
      $table->string('name');
      $table->string('university_domain');
      $table->boolean('is_active');
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
    Schema::drop('universities');
	}

}
