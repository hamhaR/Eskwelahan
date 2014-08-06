<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('course', function(Blueprint $table) {
			$table->increments('course_id');

			$table->string('course_code', 10);
			$table->string('course_title', 32);
			$table->string('course_description', 250);

			$table->integer('test_id');
			$table->integer('homework_id');
			$table->foreign('test_id')->references('test_id')->on('test');
			$table->foreign('homework_id')->references('homework_id')->on('homework');

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
		Schema::dropIfExists('course');
	}

}
