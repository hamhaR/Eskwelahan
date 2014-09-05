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
		Schema::create('homeworks', function(Blueprint $table){
			$table->increments('id');
			$table->string('homework_title', 255);
			$table->text('homework_instruction');
			$table->integer('teacher_id');
			$table->integer('course_id');

			$table->foreign('teacher_id')->references('id')->on('users');
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
		Schema::dropIfExists('homeworks');
	}

}
