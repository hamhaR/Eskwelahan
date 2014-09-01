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
		Schema::create('tests', function(Blueprint $table){
			$table->increments('id');
			$table->text('question');
			$table->text('choice1');
			$table->text('choice2');
			$table->text('choice3');
			$table->text('choice4');
			$table->varchar('answer')->nullable();

			$table->integer('teacher_id');
			$table->foreign('teacher_id')->references('id')->on('users');
			$table->integer('course_id');
			$table->foreign('course_id')->references('id')->on('courses');

			$table->timestamp('deleted_at')->nullable();
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
