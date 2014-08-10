<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomeworkTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('homework', function(Blueprint $table){
			$table->increments('homework_id');
			$table->integer('homework_num');
			$table->text('homework_description');
			$table->dateTime('homework_deadline');

			$table->integer('teacher_id');
			$table->foreign('teacher_id')->references('id')->on('users');
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
		Schema::dropIfExists('homework');
	}

}
