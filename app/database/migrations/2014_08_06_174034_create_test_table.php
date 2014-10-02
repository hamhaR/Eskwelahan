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
			$table->string('test_name', 30);
			$table->DateTime('testDate');

			$table->integer('teacher_id');
			$table->foreign('teacher_id')->references('id')->on('users');
			$table->integer('course_id');
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
		Schema::dropIfExists('tests');
	}

}
