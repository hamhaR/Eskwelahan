<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('test', function(Blueprint $table){
			$table->increments('test_id');
			$table->integer('test_num');
			$table->text('questions');
			$table->text('answer_key');

			$table->integer('teacher_id');
			$table->foreign('teacher_id')->references('user_id')->on('users');
			$table->integer('course_id');
			$table->foreign('course_id')->references('course_id')->on('course');

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
		Schema::dropIfExists('test');
	}

}
