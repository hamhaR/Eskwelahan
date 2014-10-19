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
			$table->integer('section_course_id');
			$table->date('deadline')->nullable();

			$table->foreign('section_course_id')->references('section_course_id')->on('section_course');

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
