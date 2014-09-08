<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionStudentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('section_students', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('section_id');
			$table->integer('student_id');
			$table->foreign('section_id')->references('section_id')->on('sections');
			$table->foreign('student_id')->references('id')->on('users');
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
		Schema::drop('section_students');
	}

}
