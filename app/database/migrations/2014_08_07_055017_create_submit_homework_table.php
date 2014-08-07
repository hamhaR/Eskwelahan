<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubmitHomeworkTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('submit_homework', function(Blueprint $table) {
			$table->increments('submit_homework_id');
			$table->dateTime('date_submitted');

			$table->integer('homework_id');
			$table->foreign('homework_id')->references('homework_id')->on('homework');
			$table->integer('student_id');
			$table->foreign('student_id')->references('user_id')->on('users');

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
		Schema::dropIfExists('submit_homework');
	}

}
