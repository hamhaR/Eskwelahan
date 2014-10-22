<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestAnswerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('testanswers', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('student_id');
			$table->foreign('student_id')->references('id')->on('users');
			$table->integer('test_id');
			$table->foreign('test_id')->references('id')->on('tests');
			$table->integer('question_id');
			$table->foreign('question_id')->references('id')->on('questions');
			$table->char('user_answer', 1);

			

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
		Schema::drop('testanswers');
	}

}
