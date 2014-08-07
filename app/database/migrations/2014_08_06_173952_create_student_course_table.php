<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentCourseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('student_course', function(Blueprint $table) {
			$table->increments('id');

			$table->integer('student_id');
			$table->integer('course_id');
			$table->foreign('student_id')->references('id')->on('users');
			$table->foreign('course_id')->references('id')->on('course');

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
		Schema::dropIfExists('student');
	}

}
