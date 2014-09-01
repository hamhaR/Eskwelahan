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
		Schema::create('submit_homeworks', function(Blueprint $table) {
			$table->increments('id');
			$table->dateTime('date_submitted');
			$table->dateTime('deadline');

			$table->integer('homework_id');
			$table->foreign('homework_id')->references('id')->on('homeworks');
			$table->integer('student_id');
			$table->foreign('student_id')->references('id')->on('users');

			$table->timestamp('deleted_at')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('submit_homeworks');
	}

}
