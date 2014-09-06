<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseSectionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('section', function(Blueprint $table) {
			$table->increments('id');
			$table->string('sec_name', 10);
			
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
		Schema::dropIfExists('section');
	}

}
