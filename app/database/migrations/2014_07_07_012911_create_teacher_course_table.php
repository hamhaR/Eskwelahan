<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeacherCourseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('teacher', function(Blueprint $table) {
			$table->increments('teacher_course_id');

			$table->integer('teacher_id');
			$table->integer('course_id');
			$table->foreign('teacher_id')->references('id')->on('users');
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
		Schema::dropIfExists('teacher');
	}

}
