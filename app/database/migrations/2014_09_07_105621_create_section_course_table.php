<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionCourseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('section_course', function(Blueprint $table)
		{
			$table->increments('section_course_id');
			$table->integer('section_id');
			$table->integer('course_id');
			$table->foreign('section_id')->references('section_id')->on('sections');
			$table->foreign('course_id')->references('id')->on('courses');
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
		Schema::drop('section_course');
	}

}
