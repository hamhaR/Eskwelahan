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
			$table->text('test_instructions');
			$table->dateTime('time_start');
			$table->dateTime('time_end');

			$table->integer('section_id');
			$table->foreign('section_id')->references('section_id')->on('sections');
			$table->integer('teacher_id');
			$table->foreign('teacher_id')->references('id')->on('users');
			

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
