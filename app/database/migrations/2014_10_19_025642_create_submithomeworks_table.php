<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubmithomeworksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('submithomeworks', function(Blueprint $table)
		{
		
			$table->increments('id');
			$table->dateTime('date_submitted');
			$table->text('homework_body');

			$table->integer('homework_id');
			$table->foreign('homework_id')->references('id')->on('homeworks');
			$table->integer('student_id');
			$table->foreign('student_id')->references('id')->on('users');

			$table->timestamps();
            $table->softDeletes();
			//
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('submithomeworks');

	}

}
