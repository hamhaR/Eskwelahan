<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTakeTestTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('take_test', function(Blueprint $table){
			$table->increments('take_test_id');
			$table->dateTime('time_started');
			$table->dateTime('time_remaining');

			$table->integer('student_id');
			$table->foreign('student_id')->references('user_id')->on('users');
			$table->integer('test_id');
			$table->foreign('test_id')->references('test_id')->on('test');

			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('take_test');
	}

}
